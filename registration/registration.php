
<?php
	include('../include/connection.php');
	if(isset($_GET['DEL_id'])){
		$DEL_id=$_GET['DEL_id'];
		if($DEL_id > 0){
			$sql="DELETE FROM profile where ID=".$DEL_id;
	if($conn->query($sql)== TRUE){
				$msg='delete';
				header('location:../registration_1/table.php?msg='.$msg);
	         }   else{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	}else{
	$id=$_POST['id'];
	$y_fname=$_POST['first'];
	$y_lname=$_POST['first_1'];
	$p_fname=$_POST['second'];
	$p_lname=$_POST['second_1'];
	$when=$_POST['when'];
	$where=$_POST['where'];
	
	
	if($y_fname == ''){
		$msg='first';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}
	
	if($y_lname == ''){
		$msg='second';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}
	
	if($p_fname == ''){
		$msg='third';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}
	
	if($p_lname == ''){
		$msg='fourth';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}
	
	if($when == ''){
		$msg='fifth';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}
	
	if($where == ''){
		$msg='sixth';
          header ('location:registration_1.php?msg='.$msg);
		  return;
	}

	if($id == 0 ){
	$sql = "INSERT INTO PROFILE (YOUR_FIRST_NAME , YOUR_LAST_NAME , PARTNERS_FIRST_NAME , PARTNERS_SECOND_NAME , EVENT_DATE , EVENT_PLACE)
		VALUES ('".$y_fname."', '".$y_lname."', '".$p_fname."', '".$p_lname."','".$when."','".$where."')";
	if ($conn->query($sql) === TRUE) {
			$msg='create';
			 header ('location:registration_1.php?msg='.$msg);
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
	else{
		$sql="UPDATE `profile` SET `YOUR_FIRST_NAME`='".$y_fname."',`YOUR_LAST_NAME`='".$y_lname."',`PARTNERS_FIRST_NAME`='".$p_fname."',`PARTNERS_SECOND_NAME`='".$p_lname."',`EVENT_DATE`='".$when."',`EVENT_PLACE`='".$where."' WHERE ID='".$id."'";
	
		if ($conn->query($sql) === TRUE) {
			$msg='update';
			 header ('location:../registration_1/table.php?msg='.$msg);
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}
	
?>