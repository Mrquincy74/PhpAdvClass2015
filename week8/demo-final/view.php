<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Your Website Title" />
        <meta property="og:description"   content="Your description" />
        <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
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
        <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
        <p><a href=".">Home</a></p>
        <?php
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

        <?php endforeach; ?>



        <p><a href=".">Home</a></p>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <div class="fb-share-button" 
		data-href="http://www.your-domain.com/your-page.html" 
		data-layout="button_count">
	</div>

    </body>
</html>