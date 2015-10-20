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
        // put your code here
        include './models/IMessage.php';
         include './models/ErrorMessage.php';
         include './models/Message.php';
        
        // put your code here
        $message = new ErrorMessage();
        
        $message->ErrorMessage('test', 'my class message');
        
        var_dump($message->ErrorMessage());
        echo '<br />';
        var_dump($message instanceof ErrorMessage);
        echo '<br />';
        var_dump($message->ErrorMessage());
        echo '<br />';
        ?>
        ?>
    </body>
</html>
