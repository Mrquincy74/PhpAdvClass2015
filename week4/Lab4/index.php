<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <!-- The data encoding type, enctype, MUST be specified as below -->
        <!-- enctype attribute specifies how the form-data should be encoded when submitting it to the server -->
        <!--action to page method post -->
        <form enctype="multipart/form-data" action="#" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="upfile" type="file" />
            <input type="submit" value="Send File" />
        </form>
        <?php
        // new instance of Util class        
        $util = new Util();

        // Checks if page has a post request from Util class 
        if ($util->isPostRequest()) {
            try {
                $upfile = 'upfile';
             
                $upload_file = new Upload_file();
                $upload_file->File_Parameters($upfile);
                $upload_file->IsSizeValid($upfile);
                $upload_file->File_Type($upfile);
              
            } catch (RuntimeException $e) {
                echo $e->getMessage();
            }
        }
        ?>

    </body>
</html>
