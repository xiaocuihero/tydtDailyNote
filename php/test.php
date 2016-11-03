<?php
	$con = mysqli_connect('localhost', 'sa', '123456', 'calendardb');
	mysqli_query($con,"set names 'utf8'");
	if (!$con){
		die('Could not connect: ' . mysqli_error());
	}
	
	
	$sqlStr = "SELECT * FROM calendar";
	$result = mysqli_query($con, $sqlStr);
	$para
	if($result != null)
	{
		while($row = mysqli_fetch_row($row))
		{
			$para. = '_'.$row[1];			
		}
	}
	mysqli_close($con);
	echo $para;
?>