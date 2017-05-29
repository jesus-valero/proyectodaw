<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 8/5/17
 * Time: 17:32
 */

include_once('dbConnect.php');

class mUser extends CI_Model
{

    public function validateRegister($email, $password, $repassword)
    {

        if (strcmp($password, $repassword) != 0)
            return -1;

        $stmt = getdb()->prepare("select count(*) from users where upper(usr_email) = upper(:currentEmail)");
        $stmt->bindValue(":currentEmail", $email);
        $stmt->execute();

        $result = $stmt->fetchColumn(0);

        return $result;
    }

    public function addNewAccount($email, $password, $username)
    {
        $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $saltedPW = $password . $salt;
        $hashedPW = hash('sha256', $saltedPW);

        $stmt = getdb()->prepare("INSERT INTO users(usr_email, usr_password, usr_salt, usr_name) values( :email, :password, :salt, :user_name)");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPW);
        $stmt->bindValue(":salt", $salt);
        $stmt->bindValue(":user_name", $username);

        $stmt->execute();

        //mail($email, $subject, $message, $headers);
    }

    public function requestLogin($email, $password)
    {
        $stmt = getdb()->prepare("SELECT usr_salt from users where upper(usr_email) = upper( :email)");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $salt = $stmt->fetchColumn(0);

        $saltedPW = $password . $salt;
        $hashedPW = hash('sha256', $saltedPW);

        $stmt = getdb()->prepare("SELECT usr_PK, usr_name FROM users WHERE upper(usr_email) = :email and usr_password = :password");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPW);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result == true || count($result)>0 ) {
            return $result;

        } else {
            return -1;
        }
    }

    public function getMyTours($pk)
    {
        $tours = [];

        $stmt = getdb()->prepare("SELECT * FROM tours where tur_FK_usr_PK = :pk and ( DATEDIFF(tur_dt_end,NOW())  >0 or (tur_dt_end = '0000-00-00 00:00:00'))");
        $stmt->bindValue(":pk", $pk);

        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $row) {
                $tours[] = $row;
            }
        }

        return $tours;
    }

    // Persona que lo ha USER(creador), el LOCATION y la fecha de inscripcion(usr_tours)
    public function getToursJoined()
    {
        //Fecha unido y tur PK

        $result = [];

        foreach (getdb()->query("SELECT ust_FK_tur_PK AS pk, ust_dt_joined AS joined FROM users_tours WHERE ust_FK_usr_PK = " . $_SESSION['pk']) AS $item) {

            // Por cada tour subscrito, buscamos su LAT y su Creador
            // PK tour

            foreach (getdb()->query("SELECT u.usr_name AS owner, l.loc_city AS city, t.tur_name as tur_name FROM users u JOIN tours t ON (u.usr_PK = t.tur_FK_usr_PK) JOIN location l ON (  t.tur_FK_loc_PK = l.loc_PK ) WHERE t.tur_PK = " . $item['pk']) AS $subItem) {
                $result[] = array('pk' => $item['pk'], 'tur_name' => $subItem['tur_name'], 'city' => $subItem['city'], 'owner' => $subItem['owner'], 'date' => $item['joined']);

            }

        }

        return $result;
    }

    public function getTourInfo($idTour)
    {

        $query = getdb()->prepare("SELECT u.usr_name AS username, u.usr_PK as userPK, l.loc_city AS city, t.tur_name as tur_name, t.tur_description as tur_description, t.tur_PK as pk, t.tur_dt_ini as dt_ini, t.tur_dt_end as dt_end, l.loc_lat, l.loc_lng as loc_lng, l.loc_place FROM users u JOIN tours t ON (u.usr_PK = t.tur_FK_usr_PK) JOIN location l ON (t.tur_FK_loc_PK = l.loc_PK ) WHERE t.tur_PK = ?");
        $query->execute(array($idTour));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        // GOOGLE IMAGE
        //$result[0] = $result[0] + array('background'=> 'https://maps.googleapis.com/maps/api/staticmap?center='.$result[0]['loc_lat'].','.$result[0]['loc_lng'].'&zoom=13&size=10000x900&maptype=terrain&key=AIzaSyBpBLlnU2tupzhrdh4uXNmHeZhSSkHk4k8');
        // GOOGLE STREET VIEW
        $result[0] = $result[0] + array('background' => 'https://maps.googleapis.com/maps/api/streetview?size=1200x1200&location=' . $result[0]['loc_lat'] . ',' . $result[0]['loc_lng'] . '&fov=90&heading=265&pitch=10&key=AIzaSyBpBLlnU2tupzhrdh4uXNmHeZhSSkHk4k8');

        // Contamos la gente que se ha unido
        $stmt = getdb()->prepare("SELECT count(*) as ene FROM users_tours where ust_FK_tur_PK = :turPK");
        $stmt->bindValue(':turPK', $idTour);
        $stmt->execute();
        $max = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (intval($max[0]['ene']) == 0) {
            $result[0] = $result[0] + array('people' => "Aun no se ha unido gente");
        } else {
            $result[0] = $result[0] + array('people' => "Se han apuntado " . ($max[0]['ene']) . " persona(s)");
        }

        if ($this->getDaysRange(substr($result[0]['dt_ini'], 0, 10)) == 0) {
            $result[0]['dt_ini'] = "Creado hoy";
        } else {

            if ($this->getDaysRange(substr($result[0]['dt_ini'], 0, 10)) > 0) {
                $result[0]['dt_ini'] = "Creado hace " . $this->getDaysRange(substr($result[0]['dt_ini'], 0, 10)) . " dias";
            } else {
                $result[0]['dt_ini'] = "Empezará en " . -$this->getDaysRange(substr($result[0]['dt_ini'], 0, 10)) . " dias";

            }
        }


        if (strcmp($result[0]['dt_end'], "0000-00-00 00:00:00") == 0) {
            $result[0]['dt_end'] = "Sin fecha limite";
        } else {
            $result[0]['dt_end'] = "Acaba en " . ($this->getDaysRange(substr($result[0]['dt_end'], 0, 10), true) + 1) . " dias";
        }

        return $result;
    }

    public function joinUserToTour($pkTour, $pkUser)
    {

        $stmt = getdb()->prepare("INSERT INTO users_tours(ust_FK_usr_PK, ust_FK_tur_PK) values (:pkUser, :pkTour)");
        $stmt->bindValue(':pkUser', $pkUser);
        $stmt->bindValue(':pkTour', $pkTour);
        $stmt->execute();

    }

    public function removeUserTour($pkTour, $pkUser)
    {
        $stmt = getdb()->prepare("DELETE FROM users_tours WHERE ust_FK_usr_PK = :pkUser AND ust_FK_tur_PK = :pkTour");
        $stmt->bindValue(':pkUser', $pkUser);
        $stmt->bindValue(':pkTour', $pkTour);
        $stmt->execute();
    }

    public function getDaysRange($date, $end = false)
    {
        $now = time();
        $your_date = strtotime($date);

        $end ? $datediff = $your_date - $now : $datediff = $now - $your_date;

        return floor($datediff / (60 * 60 * 24));
    }


}