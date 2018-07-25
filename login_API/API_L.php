<?php

//date_default_timezone_set('Asia/kolkata');
//include('../include/connection.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "withjoy_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
//echo "Connected successfully";

	$json=file_get_contents('Php://input');
	$obj=json_decode($json,true);
	
$modulename=mysqli_real_escape_string($conn,$obj['modulename']);
//echo "AAAAAAA".$modulename; die;
if($modulename == "loggedin")
{
		$login_user=mysqli_real_escape_string($conn,$obj['uname']);
		$password=mysqli_real_escape_string($conn,md5($obj['psw']));

	$ar=array();
	$log=$conn->prepare("SELECT ID,NAME,PHONE_NUMBER,EMAIL,PASSWORD,DATE FROM user_details WHERE EMAIL = ? AND PASSWORD =?");
	$log->bind_param('ss',$login_user,$password);
	$log->execute();
	$log->store_result();
	$num=$log->num_rows;
	
	if($num>0){
		$log->bind_result($id,$name,$ph_no,$email,$pass,$dte);
		$ar=array("stat"=>1,"count"=>$num,"msg"=>"login successfully");
		while($log->fetch()){
			$ar['DETAILS'][]=array("ID"=>$id,"NAME"=>$name,"PHONE_NUMBER"=>$ph_no,"EMAIL"=>$login_user,"PASSWORD"=>$password,"DATE"=>$dte);
		}
		
	}
	else
	{
		$ar=array("stat"=>0,"count"=>$num);
	}
	echo json_encode($ar);
}
	if($modulename == "register")
{
        $name=mysqli_real_escape_string($conn,$obj['usr_name']);
		$ph_no=mysqli_real_escape_string($conn,$obj['phn']);
		$email=mysqli_real_escape_string($conn,$obj['eml']);
		$pass=mysqli_real_escape_string($conn,md5($obj['psw']));
		
		$ar=array();
		$reg=$conn->prepare("INSERT INTO user_details (NAME, PHONE_NUMBER, EMAIL, PASSWORD)VALUES (?,?,?,?)");
		$reg->bind_param('ssss',$name,$ph_no,$email,$pass);
		$reg->execute();
		$reg_1=$reg->insert_id;
		
		if($reg_1 > 0){
			$ar['DETAILS'][]=array("NAME"=>$name,"PHONE_NUMBER"=>$ph_no,"EMAIL"=>$email,"PASSWORD"=>$pass);
			$ar=array("stat"=>1,"count"=>$reg_1,"msg"=>"registered successfully");
		}
		else{
			$ar=array("stat"=>0,"count"=>$reg_1);
		}
		echo json_encode($ar);
}
	if($modulename=="update_register")
	{
		$name=mysqli_real_escape_string($conn,$obj['usr_name']);
		$ph_no=mysqli_real_escape_string($conn,$obj['phn']);
		$email=mysqli_real_escape_string($conn,$obj['eml']);
		$pass=mysqli_real_escape_string($conn,md5($obj['psw']));
		$id=mysqli_real_escape_string($conn,$obj['id']);
		
		$ar=array();
		$reg=$conn->prepare("UPDATE user_details set NAME=?,PHONE_NUMBER=?,EMAIL=?,PASSWORD=? WHERE ID=?");
		$reg->bind_param('ssssi',$name,$ph_no,$email,$pass,$id);
		
		if($reg->execute()){
			$ar=array("stat"=>1,"last_updated_id"=>$id,"msg"=>"updated successfully");
			$ar['DETAILS'][]=array("NAME"=>$name,"PHONE_NUMBER"=>$ph_no,"EMAIL"=>$email,"PASSWORD"=>$pass);
		}
		else{
			$ar=array("stat"=>0,"last_updated_id"=>0);
		}
		echo json_encode($ar);	
	}
?>


