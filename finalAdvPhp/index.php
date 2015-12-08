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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style type="text/css">
            .error-message{
                margin: 20px;
                 #files-img {
                border: 5px dashed #D9D9D9;
                border-radius: 10px;
                padding: 1em 2em;
                text-align: center;

            }
            .over {
                background: #F7F7F7;
            }

            input {
                margin: 0.5em;
                padding: 0.5em;
            }

            #img-file-content img {
                max-width: 100%;
            }
            }
        </style>
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
        
        // instances of the classes 
        $util = new Util();
        $dbc = new DB($util->getDBConfig());
        $validtor = new Validator(); //
        $db = $dbc->getDB(); //gets the PDO by a function call 
        $login = new Login(); // Login class

        /*
         * error message array 
         * creates the messages in an array on the page
         */
        $errors = array();
        
        /*isPostRequest that checks for the email and password
         * If Email format, empty, is incorrect you receive the appropiate message
         * If password is empty or you havent sighned up you receive the appropiate message 
         */ 
        
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
             if (!$login->emailDoesnotExist($email)) {
                $errors[] = 'Please sign up.';
            }
            /* If the error counts less than equal to zero 
             * your email and password will be verified by the verifyCheck
             * function and a session will be started and you can log in 
             *  Hooray for you.
             *  If you have a user id in the database
             * you can log in to the admin page if you do not your 
             * Login will Fail. 
             */ 
            if (count($errors) <= 0) {

                $user_id = $login->verifyCheck($email, $password);
                if ($user_id > 0) {
                    $_SESSION['user_id'] = $user_id;
                    header('Location:addfile.php');
                } else {
                    $errors = 'Login Failed!';
                }
            }
//               
        }
        ?>
        
        
        <!-- includes for the login form & messages/errors -->
        <?php include './templates/login-form.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <?php include './templates/errors.html.php'; ?>
        <!--Sign up Link from this page-->
          <a href="signup.php" class="btn btn-primary btn-sm active">Sign Up</a>

    </body>
</html>
