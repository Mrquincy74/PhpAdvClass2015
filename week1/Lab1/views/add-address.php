<!DOCTYPE html>

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
        // includes the database connect class and the utility class 
        require_once '../functions/dbconnect.php';
        require_once '../functions/util.php';

        $fullName = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressLine1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthDay = filter_input(INPUT_POST, 'birthday');
        $err_message = array();

        // if statments with regex and fields empty message 
        if (isPostRequest()) {


            if (empty($fullName)) {
                $err_message[] = 'Full name is a required Field.';
            } else if (!preg_match('/^[a-zA-Z$]/', $fullName)) {
                $err_message[] = 'Name is in an invalid format.';
            }
            if (empty($email)) {
                $err_message [] = 'Email is a required Field';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {

                $err_message [] = 'Email is an Invalid Format';
            }
            if (empty($addressLine1)) {
                $err_message [] = 'Address is a required Field';
            } else if (!preg_match('/^[0-9a-zA-Z. ]+$/', $addressLine1)) {
                $err_message [] = 'Address is an Invalid Format';
            }
            if (empty($city)) {
                $err_message [] = 'City is an required Format';
            } else if (!preg_match('/^[a-zA-Z$]/', $city)) {
                $err_message [] = 'City is a Invalid Field';
            }
            if (empty($state)) {
                $err_message[] = 'State is an required Format';
            } else if (!preg_match('/^[a-zA-Z$]/', $state)) {
                $err_message[] = 'State is a Invalid  Field';
            }
//           
            if (empty($zip)) {
                $err_message[] = 'Zip Code is an required Format';
            } else if (!preg_match('/^[0-9]{5}(?:-[0-9]{4})?$/', $zip)) {
                $err_message[] = 'Zip Code is a Invalid  Field';
            }
            if (empty($birthDay)) {
                $err_message [] = 'Birth Date is a required Field';
            } else if (!is_null($birthDay)) {
                 date("F j, Y, g:i a",strtotime($birthDay)); 
              
            } 
             if (addAddressInfo($fullName, $email, $addressLine1, $city, $state, $zip,$birthDay )) {
                $message = 'User Info Added';
                $fullName = '';
                $email = '';
                $addressLine1 = '';
                $city = '';
                $state = '';
                $zip = '';
                $birthDay = '';
               
            }
        }
        // put your code here
        include '../templates/address-form.php';
        include '../templates/message.php';
        include '../templates/view-address.php';
        ?>
    </body>
</html>
