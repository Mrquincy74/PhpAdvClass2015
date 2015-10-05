
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include_once './dbconnect.php';
        include_once './functions.php';
        
        $db = dbconnect();
        
        $dataone = '';
        $datatwo = '';
        
        if ( isPostRequest() ) {
            
            $id = filter_input(INPUT_POST, 'i-d');
            $dataone = filter_input(INPUT_POST, 'data-one');
            $datatwo = filter_input(INPUT_POST, 'data-two');
                                   
            $stmt = $db->prepare("UPDATE test SET dataone = :dataone, datatwo = :datatwo WHERE id = :id");
            
            $binds = array(
                ":id" => $id,
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }
            
            
        } else {
            $id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM test where id = :id");
        $binds = array(
             ":id" => $id
         );
         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $dataone =  $result['dataone'];
            $datatwo =  $result['datatwo'];
         } else {
             header('Location: view.php');
             die('ID not found');
             
         }
        
        
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        <form method="post" action="#">            
            Data one: <input type="text" name="data-one" value="<?php echo $dataone ?>" />
            <br />
            Data two: <input type="text" name="data-two" value="<?php echo $datatwo ?>" />
            <br />
            <input type="hidden" name="i-d" value="<?php echo $id ?>" />
            <input type="submit" value="Submit" />
        </form>
        
        <a href="view.php"> Go back </a>
        
    </body>
</html>
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
    </head>
    <body>
        <?php
        include './classes/dbconnect.php';

        // get user_id from the datadase 
        $user_id = filter_input(INPUT_GET, 'user_id');

        //set inputs equal to null
        $first_name = '';
        $last_name = '';
        $favorite_color = '';

        $db = dbconnect();

        //SQL statment requesting all information from user_information where the id = id//
        $stmt = $db->prepare('SELECT * FROM user_information WHERE user_id = :user_id');


        // binds 
        $binds = array("user_id" => $user_id);

        //fetches the results if the row counts greater than zero 
        $results = array();
        if ($stmt->execute($dinds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $first_name = $results['first_name'];
            $last_name = $results['last_name'];
            $favorite_color = $results['favorite_color'];
        }
        ?>
        <form method="post" action="#">

            First Name:<input type="text" name="first_name" id="first_name" maxlength="50" value="<?php echo $first_name ?>" /><br />

            Last Name:<input type="text" name="last_name" id="last_name" maxlength="50" value="<?php echo $last_name ?>" /><br />

            Favorite Color:<input type="text" name="favorite_color" id="favorite_color" maxlength="50" value="<?php echo $favorite_color ?>" /><br />
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
