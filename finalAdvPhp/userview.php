<?php require_once './autoload.php'; 
$logout = filter_input(INPUT_GET, 'logout');

// if logout == 1 the session user_id = zero 
if ($logout == true) {
    $_SESSION['user_id'] = null;
}

// if user_id session is not set user 
// will be directed to the index page 
if (!isset($_SESSION['user_id'])) {
    header('Location:index.php');
}
// else if user_id session isset the user's 
// directed to the admin page
else if (isset($_SESSION['user_id'])) {
    echo '<H2><a href="?logout=true" >Log Out</a></H2>';
 
            $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';

            $util = new Util(); //connects to the database 
            $userimg = new Userimg(); //new instance for Userimg.php 
            $userimages = array();
            $userimgages = $userimg->showUserImg($_SESSION['user_id']);
        foreach ($userimages as $things){
            echo '<img=src="'.$directory.'//'.$things['filname'].'."/>';
        }


            
                

          
        }
?>