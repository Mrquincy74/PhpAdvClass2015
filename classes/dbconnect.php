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
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

// associative array with database connection 
        function dbconnect() {

            $config = array(
                'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=adv_php',
                'DB_USER' => 'Quincy',
                'DB_PASSWORD' => 'IsaaC'
            );
            /* try catch statment to catch any errors 
             * if their are errors a message will echo with the error
             */
            try {

                /* PDO database wrapper to connect to database to get,post,insert
                 * $config is passing the parameters of DNS,DB,Passsword
                 */
                $db = new PDO($config ['DB_DNS'], $config ['DB_USER'], $config ['DB_PASSWORD']);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (Exception $e) {
                $db = null;
                echo $e->getMessages();
                exit();
            }
            return $db;
        }

// statment to prepare to look for information in the database
//$stmt = $db->prepare('SELECT * FROM test');

        /* executes the statment if rowCount greater than 0
         * fetchAll from prepare statment 
         * messeged out if statment tested database with var dump satisfactory
         */
//if ($stmt->execute() && $stmt->rowCount() > 0) {
//    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($results);
//}
        ?>

    </body>
</html>
