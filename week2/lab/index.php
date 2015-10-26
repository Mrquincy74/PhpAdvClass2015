<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $util = new Util();
        $dbc = new DB($util->getDBConfig());
        $validtor = new Validator();
        $db = $dbc->getDB();
        $login = new Login();

        // error message array
        $errors = array();

        if ($util->isPostRequest()) {

            if ($validtor->emailIsEmpty($email)) {
                $errors[] = 'Please enter your email is required';
            }

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not format invalid';
            }
            if ($validtor->passwordIsEmpty($password)) {
                $errors[] = 'Password is required';
            }
            // if user logs in they will be directed to the admin page 
            // if not loged in return to login page 
            if (count($errors) <= 0) {

                $user_id = $login->verifyCheck($email, $password);
                if ($user_id <= 0) {
                    
                    header('Location: ./login-form.html.php');
                }
                else {
                    header('Location: ./admin.php');
                }
//                if (isset($_SESSION['loggedin']))
//                    $_SESSION['loggedin'] += 1;
//                else
//                    $_SESSION['views'] = 1;
            }
        }
        ?>

        <h1>Login Form</h1>

        <?php include './templates/login-form.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <?php include './templates/errors.html.php'; ?>

    </body>
</html>
