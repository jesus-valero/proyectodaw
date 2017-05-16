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
    public function addNewLocalTour($pk, $name, $description, $dtIni, $dtEnd, $catPk, $lat, $lng, $address)
    {
        $dbTemp = getdb();
        $stmt = $dbTemp->prepare("INSERT INTO location(loc_lat, loc_lng, loc_place) values( :lat, :lng, :address)");
        $stmt->bindValue("lat", $lat);
        $stmt->bindValue("lng", $lng);
        $stmt->bindValue("address", $address);

        $stmt->execute();

        $idLocation = $dbTemp->lastInsertId();

        if (strcmp($dtEnd, "NULL") == 0) {
            $stmt = getdb()->prepare("INSERT INTO tours(tur_FK_usr_PK, tur_FK_loc_PK, tur_FK_cat_PK, tur_name, tur_dt_ini, tur_dt_end, tur_description ) values( :usrPk, :locPk, :catPk, :tourName, :dtIni, NULL, :description)");
        }
        else {
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
            $categoyInfo[] = array('name'=> $category["cat_name"], 'icon' => $category["cat_image"]);
        }
        $result['category'] = $categoyInfo;


        // Get tours

        foreach (getdb()->query("SELECT t.tur_PK as tur_PK, l.loc_lat as loc_lat, l.loc_lng as loc_lng, ca.cat_name as cat_name, t.tur_name as tur_name, t.tur_description as tur_description, t.tur_dt_ini as tur_dt_ini, t.tur_dt_end as tur_dt_end FROM tours t join location l on (t.tur_FK_loc_PK = l.loc_PK) join categories ca on (t.tur_FK_cat_PK = ca.cat_PK)") as $tour) {
            $tours[] = array("id"=> $tour['tur_PK'],
                            "lat"=> $tour["loc_lat"],
                            "lng"=> $tour["loc_lng"],
                            "category"=> $tour["cat_name"],
                            "title"=> $tour["tur_name"],
                            "description"=> $tour["tur_description"],
                            "date_start"=> $tour["tur_dt_ini"],
                            "date_end"=> $tour["tur_dt_end"]);

        }

        $result['tours'] = $tours;

        return $result;

    }

}