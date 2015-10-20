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
         include './models/IMessage.php';
         include './models/Message.php';
        
        // put your code here
        $message = new Messages();
        
        $message->addMessage('test', 'my class message');
        
        var_dump($message->getAllMessages());
        echo '<br />';
        var_dump($message instanceof IMessage);
        echo '<br />';
        var_dump($message->getAllMessages());
        echo '<br />';
        ?>
    </body>
</html>
