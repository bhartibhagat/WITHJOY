<!DOCTYPE HTML>
<HTML>
<head>
<title>REGISTRATION PAGE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome-5.0.7/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">   
<link rel="stylesheet" href="css/registration_1.css">
</head>
<body>
<section class="registration">
<div class="container">
<?php
include('../include/connection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM profile WHERE ID='".$id."'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()){
			//print_r($row);
		      $id=$row['ID'];
			  $y_fname=$row['YOUR_FIRST_NAME'];
			  $y_lname=$row['YOUR_LAST_NAME'];
			  $p_fname=$row['PARTNERS_FIRST_NAME'];
			  $p_lname=$row['PARTNERS_SECOND_NAME'];
			  $when=$row['EVENT_DATE'];
			  $where=$row['EVENT_PLACE'];
		}
}
}
?>
<form method="post" action="registration.php">
<div class="row">
<div class="page">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
<div class="heading">
<h1 class="text-uppercase">welcome to withjoy registration page</h1>
<p>we are trying to make your wedding memorable...share your wedding events,photos etc with your families,friends and other...just fill this page to register your fields</p>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="second">
<label for="usr" class="text-uppercase">your first name:</label>
  <input type="text" class="form-control" id="usr" name="first" value=<?php if(isset($_GET['id'])){ echo $y_fname;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='first'){
		echo 'Please enter your first name';
	}
?>
</div>
<div class="form-group">
  <label for="usr" class="text-uppercase">your last name:</label>
  <input type="text" class="form-control" id="usr" name="first_1" value=<?php if(isset($_GET['id'])){ echo $y_lname;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='second'){
		echo 'Please enter partners first name';
	}
?> 
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="third">
<label for="usr" class="text-uppercase">partners first name:</label>
  <input type="text" class="form-control" id="usr" name="second" value=<?php if(isset($_GET['id'])){ echo $p_fname;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='third'){
		echo 'Please enter your last name';
	}
?>
</div>
<div class="form-group">
  <label for="usr" class="text-uppercase">partners last name:</label>
  <input type="text" class="form-control" id="usr" name="second_1" value=<?php if(isset($_GET['id'])){ echo $p_lname;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='fourth'){
		echo 'Please enter partners last name';
	}
?> 
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="when">
  <label for="usr" class="text-uppercase">when:</label>
  <input type="text" class="form-control" id="usr" name="when" value=<?php if(isset($_GET['id'])){ echo $when;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='fifth'){
		echo 'Please enter the date';
	}
?> 
</div>
<div class="where">
  <label for="usr" class="text-uppercase">where:</label>
  <input type="text" class="form-control" id="usr" name="where" value=<?php if(isset($_GET['id'])){ echo $where;} ?>>
  <?php
	if(isset($_GET['msg']) && $_GET['msg'] =='sixth'){
		echo 'Please enter the place';
	}
?> 
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="creation">
<input type="hidden" name="id" value=<?php if(isset($_GET['id'])){ echo $_GET['id'];} else{echo "0";} ?>>
<button type="submit" class="btn btn-warning">create event</button>  
</div>
</div>
<?php
	if(isset($_GET['msg']) && $_GET['msg'] =='create'){
		echo 'you inserted the field successfully';
	}

?>
</div>
</div>
</div>
</form>
</section>
</body>
</HTML>