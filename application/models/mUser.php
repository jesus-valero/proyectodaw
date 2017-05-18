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

    public function addNewAccount($email, $password)
    {
        $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $saltedPW = $password . $salt;
        $hashedPW = hash('sha256', $saltedPW);

        $stmt = getdb()->prepare("INSERT INTO users(usr_email, usr_password, usr_salt) values( :email, :password, :salt )");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPW);
        $stmt->bindValue(":salt", $salt);

        $stmt->execute();

        //mail($email, $subject, $message, $headers);
    }

    public function requestLogin($email, $password)
    {
        $stmt = getdb()->prepare("SELECT usr_salt from users where upper(usr_email) = upper( :email)");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $salt = $stmt->fetchColumn(0);

        $saltedPW =  $password . $salt;
        $hashedPW = hash('sha256', $saltedPW);

        $stmt = getdb()->prepare("SELECT usr_PK FROM users WHERE upper(usr_email) = :email and usr_password = :password");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPW);
        $stmt->execute();

        if ($primaryKey = $stmt->fetchColumn(0)) {
            return $primaryKey;
        } else {
            return -1;
        }
    }

    public function getMyTours($pk)
    {
        $tours = [];

        $stmt = getdb()->prepare("SELECT * FROM tours where tur_FK_usr_PK = :pk");
        $stmt->bindValue(":pk", $pk);

        if ($stmt->execute()) {
            foreach ($stmt->fetchAll() as $row) {
                $tours[] = $row;
            }
        }

        return $tours;
    }

    // Persona que lo ha USER, el LOCATION y la fecha de inscripcion(usr_tours)
    public function getToursJoined()
    {
        foreach (getdb()->query("SELECT * FROM users_tours where ust_FK_usr_PK = " . $_SESSION['pk']) as $item) {
            //echo "sape";
        }
    }
}