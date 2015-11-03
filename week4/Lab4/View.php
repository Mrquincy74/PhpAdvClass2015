<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        //DIRECTORY_SEPARATOR 

        $folder = './new_upload';
        $directory = scandir('./new_upload');
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        //var_dump($directory);
        ?>


        <?php foreach ($directory as $file) : ?>        
            <?php if (is_file($folder . DIRECTORY_SEPARATOR . $file)) : ?>
                <h2><?php echo $file;    $type = $finfo->file($folder . DIRECTORY_SEPARATOR . $file);?></h2>                      
                <img src="./new_upload/<?php echo $file; ?>" />
                <?php echo $type; ?>


            <?php endif; ?>
        <?php endforeach; ?>

    </body>
</html>
