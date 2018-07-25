<!DOCTYPE html>
<HTML>
<?php
session_start();
?>
<head>
<title>LOGIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome-5.0.7/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">   
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<section class="login">
<div class="container">
<form method="post" action="login.php">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="login_1">
<h1>LOGIN PAGE</h1>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="image">
<img src="images/login_image.JPG">
</div>
</div>
</div>
<div class="page">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="user">
<p for="uname"><b>Username</b></p>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<?php
	if(isset($_GET['msg']) && $_GET['msg'] == 3){
		echo '<h2 style="color:#fff;"><b>Please enter your username</b></h2>';
	}
?>
	</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="pass">
	<p for="psw"><b>Password</b></p>
    <input type="password" placeholder="Enter Password" name="psw" required>
	<?php
	if(isset($_GET['msg']) && $_GET['msg'] == 4){
		echo '<h2 style="color:#fff;"><b>Please give your password</b></h2>';
	}
?>
</div>
</div>
</div>
<div class="log_1">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="log">
<button type="submit" class="btn btn-warning">LOGIN</button>  
</div>
</div>
</div>
</div>
</div>
</form>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="other_1">
<button type="button" class="cancelbtn">Cancel</button>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="other_2">
<p class="psw">Forgot <a href="#">password?</a></p>
</div>
</div>
</div>
<?php
	if(isset($_GET['msg']) && $_GET['msg'] == 1){
		echo '<h2 style="color:#fff;"><b>successfully logged in</b></h2>';
	}
	if(isset($_SESSION['user_id'])){
		echo '<br><h2 style="color:#fff;"><b> Hii : '.$_SESSION['user_name'].'</b></h2>';
	}
?>

<?php
	if(isset($_GET['msg']) && $_GET['msg'] == 2){
		echo '<h2 style="color:#fff;"><b>you have not entered right email-id and password</b></h2>';
	}
?>


</div>
</section>
</body>
</HTML>