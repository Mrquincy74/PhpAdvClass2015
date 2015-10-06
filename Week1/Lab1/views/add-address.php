<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>

        <?php
        require_once '../functions/dbconnect.php';
        require_once '../functions/until.php';

        $fullName = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressLine1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
//        $birthDay = filter_input(INPUT_POST, 'birthday');
        
        $address = getAlladdress();

        if (isPostRequest()) {

            if (empty($fullName)) {
                $message = 'FullName is Empty';
            } else if (empty($email)) {
                $message = 'Email is Empty';
            } else if (empty($city)) {
                $message = 'City is Empty';
            } else if (empty($state)) {
                $message = 'State is Empty';
            } else if (empty($zip)) {
                $message = 'Zip Code is Empty';
            } else if (addAddressInfo($fullName, $email, $addressLine1, $city, $state, $zip)) {
                $message = 'User Info Added';
                $fullName = '';
                $email = '';
                $addressLine1 = '';
                $city = '';
                $state = '';
                $zip = '';
//                $birthDay = '';
            }
        }
        // put your code here
        include '../templates/address-form.php';
        ?>
    </body>
</html>
