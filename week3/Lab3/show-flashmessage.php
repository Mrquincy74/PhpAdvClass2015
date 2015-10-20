
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
        session_start();
         include './bootstrap.php';
         
         $flashMessage = new FlashMessage();
         $message = $flashMessage->getAllMessages();
         
         print_r($message);
         
        ?>
    </body>
</html>
