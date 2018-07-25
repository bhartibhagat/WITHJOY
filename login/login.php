<!DOCTYPE html>
<?php
	session_start();
	include('../include/connection.php');
	$user=$_POST['uname'];
	$pass=md5($_POST['psw']);
	
	
	if($user == ''){
		$msg='3';
          header ('location:page.php?msg='.$msg);
		  return;
	}
	
	if($pass == ''){
		$msg='4';
          header ('location:page.php?msg='.$msg);
		  return;
	}
	
	
	$sql = "SELECT * FROM user_details WHERE EMAIL = '".$user."' AND PASSWORD ='".$pass."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
		$_SESSION['user_id']=$row['ID'];
		$_SESSION['user_name']=$row['NAME'];
		$msg='1';
          header ('location:login_1.php?msg='.$msg);
    }
} else {
	$msg='2';
	session_destroy();
	header('location:login_1.php?msg='.$msg);
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>