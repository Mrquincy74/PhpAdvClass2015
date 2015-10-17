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
        require_once '../functions/dbconnect.php';
        require_once '../functions/util.php';
        require_once '../classes/Validation.class.php';

        $fullName = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressLine1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthDay = filter_input(INPUT_POST, 'birthday');

        if (isPostRequest()) {

            if (empty($fullName)) {
                if (!preg_match('/^[a-zA-Z$]/', $fullName)) {
                    $message = 'Full Name is an Invalid Format';
                }
            } else {
                $message = 'Full Name is a required Field';
            }
            if (empty($email)) {
                $message = 'Email is a required Field';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {

                 $message = 'Email is an Invalid Format';
            }
            if (!empty($addressLine1)) {
                if (!preg_match('/^[0-9a-zA-Z. ]+$/', $addressLine1)) {
                    $message = 'Address is an Invalid Format';
                }
            } else {
                $message = 'Address is a required Field';
            }
            if (!empty($city)) {
                if (!preg_match('/^[a-zA-Z$]/', $city)) {
                    $message = 'City is an Invalid Format';
                }
            } else {
                $message = 'City is a required Field';
            }
            if (!empty($state)) {
                if (!preg_match('/^[a-zA-Z$]/', $state)) {
                   $message = 'State is an Invalid Format';
                }
            } else {
                $message = 'State is a required Field';
            }
            if (!empty($zip)) {
                if (!preg_match('/^[0-9]{5}(?:-[0-9]{4})?$/', $zip)) {
                    $message = 'Zip Code is an Invalid Format';
                }
            } else {
                $message = 'Zip Code is a required Field';
            }

//            if (empty($birthDay)) {
//                $message ='Date of Birth Required';
//            }
//            else if (!is_null($birthDay)) {
//                date("F j, Y, g:i a", strtotime($birthDay));
//             
            //           } 
             if (addAddressInfo($fullName, $email, $addressLine1, $city, $state, $zip)) {
              $add_message = 'User Info Added';
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
        include '../templates/message.php';
        ?>
    </body>
</html>
