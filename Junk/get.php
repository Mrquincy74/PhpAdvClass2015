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
        include_once '../classes/dbconnect.php';
        include_once '../classes/functions.php';
        $db = dbconnect();
             
            $stmt = $db->prepare("SELECT * FROM test");
                // $binds data to the statment 
           
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);  }
       
        ?>
        
        <!--echo results message in the header  -->
        
        
     
          <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
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
      
    </body>
</html>
