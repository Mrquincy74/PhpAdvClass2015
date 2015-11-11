
<?php
require_once './autoload.php';

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
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
	.bs-example{
    	margin: 20px;
    }
</style>
</head> 
<body>
<div class="bs-example">
	<div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <h2>Welcome to The Admin Page</h2>
	<div class="embed-responsive embed-responsive-4by3">
		<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Vn0xu5UJrEo?rel=&autoplay=1"  frameborder="0" allowfullscreen>"></iframe>
	</div>
</div>
</body>
</html>                                		