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


}