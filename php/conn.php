<?php 
$con = mysqli_connect('localhost', 'sa', '123456', 'calendardb');
mysqli_query($con,"set names 'utf8'");
if (!$con){
	die('Could not connect: ' . mysqli_error());
}	
?>
