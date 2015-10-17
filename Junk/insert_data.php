<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        /*
         * includes for database connection 
         * include for functions 
         * prepare statment inserts information into the table test 
         * if its a PostRequest gets information from the database 
         * 
         */
        include_once '../classes/dbconnect.php';
        include_once '../classes/functions.php';


        /* input post needs to match the name so its populated in the post
         * database connection is for the post and the get 
         * calls the dbconnect function connect information to the database 
         */

        if (isPostRequest()) {
            $db = dbconnect();
            $results = '';
            $mssage = '';
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');

            $stmt = $db->prepare("INSERT INTO test SET first_name = :first_name, last_name = :last_name");

            $binds = array(
                ":first_name" => $first_name,
                ":last_name" => $last_name
            );
            /* if statment executes  and binds the associative array 
             * also checks to see if the row counts greater than 0 
             * if its true a message displays data added 
             * 
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $message = 'Data was added';
            }
        }
        ?>
        <?php
        $db = dbconnect();
        /* $stmt selsect all from test table 
         * 
         */
        $stmt = $db->prepare("SELECT * FROM test");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>


        <h1><?php echo $message; ?> </h1>


        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>F Name</th>
                    <th>Email</th>
                    <th>Email</th>
                    <th>Email</th>
                    <th>Email</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <?php foreach ($row as $column): ?>
                            <td><?php echo $column; ?></td>                    
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br /><br />  
        <form method="post" action="#">            
            First Name: <input type="text" value="" name="first_name" />
            <br /><br />
            Last Name: <input type="text" value="" name="last_name" />
            <br /><br />          
            <input type="submit" value="Submit" />           
        </form>

    </body>
</html>
