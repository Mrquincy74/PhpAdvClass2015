<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author Ques
 */
class Util {

    //put your code here
    public function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    public function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }

    public function addAddressInfo($fullName) {

        $db = dbconnect();
        $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname");
        $binds = array(
            ":fullname" => $fullName
//        ":email" => $email,
//        ":addressLine1" => $addressLine1,
//        ":city" => $city,
//        ":state" => $state,
//        ":zip" => $zip,
//        ":birthday" => $birthDay,     
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    public function getAlladdress() {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $results;
}

}
