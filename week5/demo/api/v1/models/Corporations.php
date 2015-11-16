<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CorpResource
 *
 * @author 001356815
 */
class Corporations implements iRestModel {

    private $db;

    function __construct() {
        /* Uti instance of utilities class
         * 
         */
        $util = new Util();
        // $dbp creates new DB connection 
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }

    /*
     * getAll function getsAll data 
     * from corps table in database 
     * phpadvclassfall2015
     * if the row counts greater than 0
     */

    public function getAll() {
        /*
         *  statments calls getDb to get all info from corps  
         */
        $stmt = $this->getDb()->prepare("SELECT * FROM corps");
        /*
         * creates an array of the results 
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    /*
     * getID function returns 
     * Id from corps table 
     * 
     */

    public function get($id) {

        /*
         * creates an array of the results 
         */
        $results = array();
        
        /*
         * getsDb function then 
         * returns all from corps where id = id
         */
        $stmt = $this->getDb()->prepare("SELECT * FROM corps WHERE id = :id");
        $binds = array(":id" => $id);
        /*
         * executes the statment ans binds it to id 
         * if counts greater than zero 
         */
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            /*
             * all results are returned 
             */
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

//    function post($serverData) {
//        
//    }
    public function post($serverData) {
        /* note you should validate before adding to the data base */
        $stmt = $this->getDb()->prepare("INSERT INTO corps WHERE corp = :corp, incorp_dt = :incorp_dt, "
                . "email = :email1,  owner = :owner, phone = :phone, location = :location");
        $binds = array(
            ":corp" => $serverData['corp'],
            ":incorp_dt" => $serverData['incorp_dt'],
            ":email" => $serverData['email'],
            ":owner" => $serverData['owner'],
            ":phone" => $serverData['phone'],
            ":location" => $serverData['location']
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        } 
        return false;
    }

    // put means update
    function put($id) {
        
        
    }

    function delete($id) {
        $stmt = $this->getDb()->prepare("DELETE FROM corps Where id = :id");
        
        $binds = array (":id" => $id);
        
        
    }


    //put your code here
}
