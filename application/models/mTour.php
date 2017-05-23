<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 15/5/17
 * Time: 17:17
 */

require_once('dbConnect.php');

class mTour extends CI_Model
{
    // Insert a tabla: tour, loc,
    public function addNewLocalTour($pk, $name, $description, $dtIni, $dtEnd, $catPk, $lat, $lng, $address, $locCity)
    {
        $dbTemp = getdb();
        $stmt = $dbTemp->prepare("INSERT INTO location(loc_lat, loc_lng, loc_place, loc_city) values( :lat, :lng, :address, :loc_city)");
        $stmt->bindValue("lat", $lat);
        $stmt->bindValue("lng", $lng);
        $stmt->bindValue("address", $address);
        $stmt->bindValue(":loc_city", $locCity);

        $stmt->execute();

        $idLocation = $dbTemp->lastInsertId();

        if (strcmp($dtEnd, "NULL") == 0) {
            $stmt = getdb()->prepare("INSERT INTO tours(tur_FK_usr_PK, tur_FK_loc_PK, tur_FK_cat_PK, tur_name, tur_dt_ini, tur_dt_end, tur_description ) values( :usrPk, :locPk, :catPk, :tourName, :dtIni, NULL, :description)");
        } else {
            $stmt = getdb()->prepare("INSERT INTO tours(tur_FK_usr_PK, tur_FK_loc_PK, tur_FK_cat_PK, tur_name, tur_dt_ini, tur_dt_end, tur_description ) values( :usrPk, :locPk, :catPk, :tourName, :dtIni, :dtEnd, :description)");
            $stmt->bindValue(":dtEnd", $dtEnd);
        }
        $stmt->bindValue(":usrPk", $pk);
        $stmt->bindValue(":locPk", $idLocation);
        $stmt->bindValue(":catPk", $catPk);
        $stmt->bindValue(":tourName", $name);
        $stmt->bindValue(":dtIni", $dtIni);
        $stmt->bindValue(":description", $description);

        $stmt->execute();

    }

    public function getTours()
    {
        $categoyInfo = [];
        $tours = [];
        $result = [];

        // Get categories info
        foreach (getdb()->query("SELECT cat_name, cat_image FROM categories") as $category) {
            $categoyInfo[] = array('name' => $category["cat_name"], 'icon' => $category["cat_image"]);
        }
        $result['category'] = $categoyInfo;

        // Get tours
        foreach (getdb()->query("SELECT t.tur_PK as tur_PK, l.loc_lat as loc_lat, l.loc_lng as loc_lng, ca.cat_name as cat_name, t.tur_name as tur_name, t.tur_description as tur_description, ca.cat_image as cat_image, ca.cat_image_off as cat_image_off, t.tur_dt_ini as tur_dt_ini, t.tur_dt_end as tur_dt_end FROM tours t join location l on (t.tur_FK_loc_PK = l.loc_PK) join categories ca on (t.tur_FK_cat_PK = ca.cat_PK)") as $tour) {

            $dtIni = strtotime($tour['tur_dt_ini']);

            $tours[] = array("id"=> $tour['tur_PK'],
                "lat"=> floatval($tour["loc_lat"]),
                "lng"=> floatval($tour["loc_lng"]),
                "category"=> $tour["cat_name"],
                "title"=> $tour["tur_name"],
                "description"=> $tour["tur_description"],
                "cat_image"=> $tour["cat_image"],
                "cat_image_off"=> $tour["cat_image_off"],                            
                "date_start"=> $tour["tur_dt_ini"],
                "date_end"=> $tour["tur_dt_end"],
                "active" => time() > $dtIni ? true : false);

            $result['tours'] = $tours;
        }  

        return $result;

    }

    //get tour data by id
    function getTourById($id){   
        $query = getdb()->prepare("SELECT u.usr_name AS username, l.loc_city AS city, t.tur_name as tur_name, t.tur_description as tur_description, t.tur_PK as pk, t.tur_dt_ini as dt_ini, t.tur_dt_end as dt_end, l.loc_lat, l.loc_place, l.loc_city FROM users u JOIN tours t ON (u.usr_PK = t.tur_FK_usr_PK) JOIN location l ON (t.tur_FK_loc_PK = l.loc_PK ) WHERE t.tur_PK = ?");
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);            

        return $result;
    }

    //update tour on edit
    public function updateTour($new_values){
              
        $pdo = getdb();

        /*$query = "UPDATE tours SET tur_name = :tur_name, tur_description = :tur_description";       
        if(isset($new_values['dt_ini']) && !empty($new_values['dt_ini'])){
            $query.", dt_ini = :dt_ini";           
        } 
        if(isset($new_values['dt_end']) && !empty($new_values['dt_end'])){
            $query.", dt_end = :dt_end";           
        }        
        $query = $query." WHERE pk = :pk";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':tur_name', $new_values['tur_name'], PDO::PARAM_STR);       
        $stmt->bindParam(':tur_description', $new_values['tur_description'], PDO::PARAM_STR); 
        if(isset($new_values['dt_ini']) && !empty($new_values['dt_ini'])){
            $stmt->bindParam(':dt_ini', $new_values['dt_ini'], PDO::PARAM_STR);       
        } 
        if(isset($new_values['dt_end']) && !empty($new_values['dt_end'])){
            $stmt->bindParam(':dt_end', $new_values['dt_end'], PDO::PARAM_STR);       
        }  
        $stmt->bindParam(':pk', $new_values['pk'], PDO::PARAM_STR); 
        
        $stmt->execute();  */     

        $values = array();
        $query = "UPDATE tours SET tur_name=?, tur_description=?";
        $values[] = $new_values['tur_name'];
        $values[] = $new_values['tur_description'];
        if(isset($new_values['dt_ini']) && !empty($new_values['dt_ini'])){
            $query.", dt_ini=?";
            $values[] = $new_values['dt_ini'];
        } 
        if(isset($new_values['dt_end']) && !empty($new_values['dt_end'])){
            $query.", dt_end=?";
            $values[] = $new_values['dt_end'];
        }        
        $query = $query." WHERE pk=?";
        $values[] = $new_values['pk'];
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($values);
        $affected_rows = $stmt->rowCount();
       
    }

}