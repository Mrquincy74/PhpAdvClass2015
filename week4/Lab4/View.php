<?php require_once './autoload.php'; ?>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Click the link to Upload File</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="Index.php">Upload Files</a></li> 
      </ul>
    </div>
  </div>
</nav>
        <?php
        $util = new Util();

        if ($util->isPostRequest()) {
              $folder = './new_upload/';
            $delete_file = filter_input(INPUT_POST, 'delete_file');
            try {
                $filename = new File_delete();
                $filename->f_Delete($delete_file);
            } catch (RuntimeException $e) {               
            }
        }
        // put your code here
        //DIRECTORY_SEPARATOR 

        $folder = './new_upload/';
        $directory = scandir('./new_upload/');
        //var_dump($directory);
        ?> 
         
        <table class="table "><thead><td>File Name </td> <td> File Size </td><td> File Type </td><td> Delete </td> </thead>
        <?php foreach ($directory as $file) : ?>         
            <?php
            $size = filesize('./new_upload/' . $file);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $type = $finfo->file('./new_upload/' . $file);
            ?>
            <?php if (is_file($folder . DIRECTORY_SEPARATOR . $file)) : ?>
        
                <tr><td> <a href="<?php echo $folder . DIRECTORY_SEPARATOR . $file; ?>"><?php echo $file; ?></a></td>
                   
                    <td>  <?php echo $size; ?></td>                                      
                    <td><?php echo $type; ?>
                    </td>  
                    <td> <form action="#" method="POST">         
                            <input type="submit" class="btn btn-primary" value="Delete"/> 
                            <input type="hidden" value="<?php echo basename($file) ?>" name="delete_file"/>
                            
                             <a href="Index.php">Upload Files</a>
                        </form>
                    </td>
                </tr>   
            <?php endif; ?>             
        <?php endforeach; ?>

    </table>     


</body>
</html>
