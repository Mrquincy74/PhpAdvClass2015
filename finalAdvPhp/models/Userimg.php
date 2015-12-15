<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author GFORTI
 */
class Userimg {

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
    /*
     * Deletes File Name 
     */
    public function f_Delete($file) {

        if (unlink('./new_upload/' . $file)) {
            throw new RuntimeException('File not Deleted' . $file);
            //echo "Deleted $file!\n";
        } else {
            echo 'File Deleted' . '' . $file;
        }
    }
    
    /*
     * Deletes File from Data Base 
     */
    public function deleteUserImg ($imgname){
      $stmt = $this->getDb()->prepare('Delete FROM photos WHERE filename = :filename');
       $binds = array (
            "filename" => $imgname         
        );
       if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }        
        return $results;

    }
    


     public function showUserImg($user_id) {

        $stmt = $this->getDb()->prepare('SELECT * FROM photos WHERE user_id = :user_id');

        $binds = array(
            ":user_id" => $user_id
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
        return $results;
    }

}
