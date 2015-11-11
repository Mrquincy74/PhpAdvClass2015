<!--includes all of my Classes -->
<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <!--Links in header allow bootstrap for styling  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>


    <body>
        <?php
        /*
         * delare variables 
         * email
         * password
         */
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        /* created new instances of classes
         * 
         */ 
        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        /*
         * error message array 
         * creates the messages in an array on the page
         */ 
        $errors = array();

          /*isPostRequest that checks for the email and password
         * If Email format, empty, and doesnt exist in the database is incorrect 
           * you receive the appropiate message
         * If password is empty or you havent sighned up you receive the appropiate message 
         */ 
        
        if ($util->isPostRequest()) {

            if ($validtor->emailIsEmpty($email)) {
                $errors[] = 'Email is required';
            }

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }
            if ($validtor->passwordIsEmpty($password)) {
                $errors[] = 'Password is required';
            }
            if ($signup->doesEmailExist($email)) {
                $errors[] = 'Email already exisits';
            }
            /** if $errors are less than or equal to 0 is TRUE a signup completed
             * message id displayed.
             * else a sign
             */ 
            
            if (count($errors) <= 0) {

                if ($signup->save($email, $password)) {
                    $message = 'Signup complete';
                } else {
                    $errors = 'Signup failed';
                }
            }
        }
        ?>        
        <!--Includes for sign up form and messages/errors. -->
        <?php include './templates/messages.html.php'; ?>
        <?php include './templates/errors.html.php'; ?>    
        <?php include './templates/sign_up-form.php'; ?>
        <!--Login link from the sign up page -->
        <a href="index.php">Log In</a>

    </body>
</html>
