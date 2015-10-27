
<?php
if (!isset($_SESSION['user_id'])){
    header('Location:index.php'); 
}
else if (isset ($_SESSION['user_id']))
{
   header('Location:admin.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administration Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <label for="exampleInputEmail1">Administration Page </label> 
        <?php 
        
        ?>
    </body>
</html>
