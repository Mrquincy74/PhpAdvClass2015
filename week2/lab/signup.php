<?php require_once './autoload.php'; ?>
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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        // created instances of classes 
        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        // error message array 
        $errors = array();

        // validator and signup checks validation from appropiate class 
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
            /** if $errors are less than 0  is TRUE a signup completed
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

        <?php include './templates/messages.html.php'; ?>
        <?php include './templates/errors.html.php'; ?>
        <h1>Sign up Form</h1>

        <?php include './templates/login-form.html.php'; ?>
        <a href="index.php">Log In</a>

    </body>
</html>
