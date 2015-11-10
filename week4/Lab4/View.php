<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>View Page </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>

    <body>
        <?php
        // put your code here
        //DIRECTORY_SEPARATOR 

        $folder = './new_upload/';
        $directory = scandir('./new_upload/');

        //var_dump($directory);
        ?>

        <!--        <div class="container-fluid">
                    <div class="row">
                        <div class="list-group gallery">
                            <div class="col-lg-12">-->
        <table class="table "><thead><td>File Name </td> <td> File Size </td><td> File Type </td><td> Delete </td> </thead>
        <?php foreach ($directory as $file) : ?> 
            <?php $size = filesize('./new_upload/' . $file);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $type = $finfo->file('./new_upload/' . $file);
            ?>
    <?php if (is_file($folder . DIRECTORY_SEPARATOR . $file)) : ?>
                <tr><td> <?php echo $file; ?> </td>
                    <td>  <?php echo $size; ?></td>                                      
                    <td><a<?php echo $type; ?>
                    </td>  
                    <td> <form action="#" method="POST">         
                            <button type="button" class="btn btn-primary">Delete</button> 
                            <input type="hidden" name="">
                        </form>
                    </td>
                </tr>   
            <?php endif; ?>
<?php endforeach; ?>
    </table>     


</body>
</html>
