<?php

namespace Data;

use PDO;
use Data\DBConfig;

class SportDAO {

    /**
     * 
     */
    public function createSport($dag, $sportNaam) {
        //TODO: pad van img opslaan
        $sql = "insert into sporten (dag,sportNaam) values (:dag,:sportNaam)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':dag' => $dag, ':sportNaam' => $sportNaam));     
        $dbh = null;
    }
   
}
