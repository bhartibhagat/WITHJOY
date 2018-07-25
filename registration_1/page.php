<!DOCTYPE html>
<html>
<head>
<title>register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome-5.0.7/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">   
<link rel="stylesheet" href="css/page.css">
<body>
<section class="page">
<div class="container">
<form method="post" action="page_1.php">
<div class="row">
<div class="page_1">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2 class="text-uppercase">fill these fields</h2>
</div>
</div>
</div>
<div class="row">
<div class="next">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="first">
<label for="usr" class="text-uppercase">name:</label>
  <input type="text" class="form-control" id="usr" name="usr_name">
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] == 2){
		echo 'Please Enter Your Name';
	}
  ?>
</div>
</div>
</div>
</div>
<div class="row">
<div class="next_1">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="second">
<label for="phn" class="text-uppercase">phone_number:</label>
  <input type="text" class="form-control" id="phn" name="phn">
 <?php
	if(isset($_GET['msg']) && $_GET['msg'] == 3){
		echo 'Please enter your phone number';
	}
  ?> 
</div>
</div>
</div>
</div>
<div class="row">
<div class="next_2">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="third">
<label for="eml" class="text-uppercase">email-ID:</label>
  <input type="text" class="form-control" id="eml" name="eml">
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] == 4){
		echo 'Please Enter your email-id';
	}
  ?>
</div>
</div>
</div>
</div>
<div class="row">
<div class="next_3">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="fourth">
<label for="psw" class="text-uppercase">password:</label>
  <input type="password" class="form-control" id="psw" name="psw">
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] == 5){
		echo 'Please Give your password';
	}
  ?>
</div>
</div>
</div>
</div>
<div class="row">
<div class="next_4">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="creation">
<input type="submit" class="btn btn-warning" value="submit">  
</div>
</div>
</div>
</div>
<?php
	if(isset($_GET['msg']) && $_GET['msg'] == 1){
		echo 'you inserted the field successfully';
	}
	
	if(isset($_GET['msg']) && $_GET['msg']==7){
		echo 'record already exist';
	}
?>
</section>
</body>
</head>
</html>