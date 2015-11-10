<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Click the link to add Address</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="View.php">View Files</a></li> 
                    </ul>
                </div>
            </div>
        </nav>


        <!-- The data encoding type, enctype, MUST be specified as below -->
        <!-- enctype attribute specifies how the form-data should be encoded when submitting it to the server -->
        <!--action to page method post -->
        <form enctype="multipart/form-data" action="#" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="upfile" type="file" />
            <input type="submit" value="Save File" />              
        </form>
        <?php
        // new instance of Util class        
        $util = new Util();

        // Checks if page has a post request from Util class 
        if ($util->isPostRequest()) {
            try {
                $upfile = 'upfile';
                $upload_file = new Upload_file();
                $upload_file->addFile($upfile);
                //$upload_file->fileDelete($upfile); 
            } catch (RuntimeException $e) {
                echo $e->getMessage();
            }
        }
        ?>

    </body>
</html>
