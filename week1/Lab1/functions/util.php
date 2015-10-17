<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* isPostRequest function 
 * checks Post 
 * 
 */

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/* isGetRequest function 
 * checks Get 
 * 
 */

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

/* addAddressInfo function
 * adds variables Into the address table  
 * binds with an array and if the row counts > than zero the $stmt executes 
 * 
 */

function addAddressInfo($fullName, $email, $addressLine1, $city, $state, $zip, $birthDay) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname , email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday ");
    $binds = array(
        ":fullname" => $fullName,
        ":email" => $email,
        ":addressline1" => $addressLine1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":birthday" => $birthDay,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}

/* getAlladdress function 
 * $stmt selects all from address table 
 * displays the resukts in an array if the counts >0
 * 
 */

function getAlladdress() {

    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}
