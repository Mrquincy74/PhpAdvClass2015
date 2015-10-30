
<?php
require_once './autoload.php';

$logout = filter_input(INPUT_GET, 'logout');

// if logout == 1 the session user_id = zero 
if ($logout == 1) {
    $_SESSION['user_id'] = null;
}

// if user_id session is not set user 
// will be directed to the index page 
if (!isset($_SESSION['user_id'])){
    header('Location:index.php'); 
}
// else if user_id session isset the user's 
// directed to the admin page

else if (isset ($_SESSION['user_id']))
{
  echo 'Welcome To The Admin Page.';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        
    </head>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Click the link below to Log Out</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php" >Log Out</a></li> 
      </ul>
    </div>
  </div>
</nav>
</html>
