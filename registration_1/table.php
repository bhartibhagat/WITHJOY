<!DOCTYPE html>
<HTML>
<head>
<title class="text-uppercase">registration_table</title>
</head>
<body>
<h1 class="text-uppercase"><center>records</center></h1>
<table border="3" style="width:100%">
<tr>
<th class="text-uppercase">your first name</th>
<th class="text-uppercase">your last name</th>
<th class="text-uppercase">partners first name</th>
<th class="text-uppercase">partners last name</th>
<th class="text-uppercase">event_date</th>
<th class="text-uppercase">event_place</th>
</tr>
<?php
	include('../include/connection.php');
$sql="SELECT * FROM profile WHERE 1";
$result=$conn->query($sql);

if($result->num_rows > 0)
{
while($row=$result->fetch_assoc()) {
?>
<tr>
<td><?php echo $row['YOUR_FIRST_NAME'] ?></td>
<td><?php echo $row['YOUR_LAST_NAME'] ?></td>
<td><?php echo $row['PARTNERS_FIRST_NAME'] ?></td>
<td><?php echo $row['PARTNERS_SECOND_NAME'] ?></td>
<td><?php echo $row['EVENT_DATE'] ?></td>
<td><?php echo $row['EVENT_PLACE'] ?></td>
<td><a href="../registration/registration_1.php?id=<?php echo $row['ID']; ?>">EDIT</a></td>
<td><a href="../registration/registration.php?DEL_id=<?php echo $row['ID']; ?>">DELETE</a></td>
</tr>
<?php
}
}
?>
<?php
if(isset($_GET['msg']) && $_GET['msg'] =='update'){
		echo 'updated successfully';
	}

?>
<?php
if(isset($_GET['msg']) && $_GET['msg'] =='delete'){
		echo 'deleted successfully';
	}



?>
</body>
</HTML>