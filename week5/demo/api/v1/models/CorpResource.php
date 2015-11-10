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
class CorpResource implements iRestModel{
    
     private $db;

    function __construct() {
        
        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());        
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }
    
    //put your code here
    function getAll(){
        
    }
    function get($id){
        
    }
    function post ($serverData){
        
    }
    // put means update
    function put(){
        
    }
    function delete (){
        
    }
    //put your code here
}
