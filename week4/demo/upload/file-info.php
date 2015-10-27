<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'df7be9dc4f467187783aca68c7ce98e4df2172d0.jpg';
        
        // used to get a certain type of info you want to find 
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        // get information from the file 
        $type = $finfo->file($file);
        
        var_dump($type);
        // gets file size 
        var_dump(filesize($file));
        
        
        ?>
    </body>
</html>
