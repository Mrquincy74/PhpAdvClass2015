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
     include './bootstrap.php';

        // put your code here
        $message = new ErrorMessage();

        $message->addMessage('test', 'my class message');

        var_dump($message->getAllMessages());
        echo '<br />';
        var_dump($message instanceof IMessage);
        echo '<br />';
        var_dump($message->removeMessage('test'));
        echo '<br />';
        var_dump($message->getAllMessages());
        echo '<br />';
        ?>
        ?>
    </body>
</html>
