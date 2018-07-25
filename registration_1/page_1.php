<?php
	include('../include/connection.php');
	$name=$_POST['usr_name'];
	$ph_no=($_POST['phn']);
	$email=($_POST['eml']);
	$pass=md5($_POST['psw']);
	
	if($name == ''){
		$msg='2';
          header ('location:page.php?msg='.$msg);
		  return;
	}
	if($ph_no==''){
		$msg='3';
		header ('location:page.php?msg='.$msg);
		return;
	}
	if($email==''){
		$msg='4';
		header ('location:page.php?msg='.$msg);
		return;
	}

	if($_POST['psw']==''){
		$msg='5';
		header ('location:page.php?msg='.$msg);
		return;
	}
	 $sql="SELECT * FROM user_details WHERE EMAIL='".$email."' AND PASSWORD='".$pass."'";
	 $result=$conn->query($sql);
	if($result->num_rows==0)
	{
	$sql = "INSERT INTO user_details (NAME, PHONE_NUMBER, EMAIL , PASSWORD)
		VALUES ('".$name."', '".$ph_no."', '".$email."', '".$pass."')";

		if ($conn->query($sql) === TRUE) {
			$msg='1';
          header ('location:page.php?msg='.$msg);
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}	
		
	}else{
	$msg='7';
	header('location:page.php?msg='.$msg);
	}		
?>