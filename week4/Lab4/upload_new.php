<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>
        <?php
        /*
         * make sure php_fileinfo.dll extension is enable in php.ini
         */
        try {
           
            
           

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            // $_Files for files Super global value 
        
            // You should also check filesize here. 
            if ($_FILES['upfile']['size'] > 1000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            // validExts adds type files to array 
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $validExts = array(
                //'txt' => 'text/plain',
                'html' => 'text/html',
                'pdf' => 'application/pdf',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xls' => 'application/vnd.ms-excel',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            );
            $ext = array_search($finfo->file($_FILES['upfile']['tmp_name']), $validExts, true);


            if (false === $ext) {
                throw new RuntimeException('Invalid file format.');
            }
           
            
            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            // 

            $fileName = sha1_file($_FILES['upfile']['tmp_name']);
            $location = sprintf('./new_upload/%s.%s', $fileName, $ext);

            // is_dir — Tells whether the filename is a directory
            if (!is_dir('./new_upload')) {

                //mkdir — Makes directory
                mkdir('./new_upload');
            }

            if (!move_uploaded_file($_FILES['upfile']['tmp_name'], $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }


            echo 'File is uploaded successfully.';
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
        ?>
    </body>
</html>