
<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
            .meme {
                width: 300px; 
                border: 1px solid silver;
                padding: 0.5em;
                text-align: center;
                margin: 0.5em;
                vertical-align: middle;
            }



        </style>
    </head>
    <body>
        <p><a href=".">Home</a></p>
        <?php
        //$user_id = $_SESSION['user_id'];
        if ((!isset($_SESSION['user_id'])) || ($_SESSION['user_id'] == null)) {

            $files = array();
            $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
            //DirectoryIterator impliments the iterator interface
            $dir = new DirectoryIterator($directory);
            foreach ($dir as $fileInfo) {
                if ($fileInfo->isFile()) {
                    $files[$fileInfo->getMTime()] = $fileInfo->getPathname();
                }
            }

            krsort($files);
//ksort($files);

            foreach ($files as $key => $path):
                ?>  
                <div class="meme"> 
                    <img src="<?php echo $path; ?>" /> <br />
                    <?php echo date("l F j, Y, g:i a", $key); ?>
                    <!-- Place this tag where you want the share button to render. -->
                    <div class="g-plus" data-action="share" data-href="<?php echo $path; ?>"></div> 
                </div>

            <?php
            endforeach;
        }
        else {
            $util = new Util(); //connects to the database 
             $userimg = new Userimg(); // new instance o$util = new Util(); //connects to the database f Upload_Save Class 
             $userimages =  array();
             $userimg->showUserImg($_SESSION['user_id']);
            
            
            
        }
        ?>




        <p><a href=".">Home</a></p>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <!--        <a href="https://twitter.com/share" class="twitter-share-button"{count} data-dnt="true">Tweet</a>-->
        <script>!function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }
            (document, 'script', 'twitter-wjs');</script>

    </body>
</html>