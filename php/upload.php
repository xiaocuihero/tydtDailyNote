<?php
    $mode="";
	$mode=$_POST['mode'];
    $calendarid="";
	$calendarid=$_POST['calendarid'];		
	$subject="";
	$subject=$_POST['subject'];
	$location="";
	$location=$_POST['location'];
	$masterid="";
	$masterid=$_POST['masterid'];
	$calendartype="";
	$calendartype=$_POST['calendartype'];
	$starttime="0000-00-00 00:00:00";
	$starttime=$_POST['starttime'];
	$endtime="0000-00-00 00:00:00";
	$endtime=$_POST['endtime'];
	$isalldayevent="";
	$isalldayevent=$_POST['isalldayevent'];
	$hasattachment="";
	$hasattachment=$_POST['hasattachment'];
	$instancetype="";
	$instancetype=$_POST['instancetype'];
	$upaccount="";
	$upaccount=$_POST['upaccount'];
	$upname="";
	$upname=$_POST['upname'];
	$Description="";
	$Category="";
	$Category=$_POST['isdone'];		
	$Attendees="";
	$AttendeeNames="";
	$OtherAttendee="";
	$starttime = date('Y-m-d H:i:s',strtotime($starttime));
	$endtime = date('Y-m-d H:i:s',strtotime($endtime));
 include('conn.php'); 
	if($mode=="insert")			
	$sql = "INSERT INTO calendar (Subject,Location,MasterId,Description,CalendarType,StartTime,EndTime,IsAllDayEvent,HasAttachment,Category,InstanceType,Attendees,AttendeeNames,OtherAttendee,UPAccount,UPName,UPTIME) VALUES ('$subject','$location','$masterid','$Description','$calendartype','$starttime','$endtime','$isalldayevent','hasattachment','$Category','$instancetype','$Attendees','$AttendeeNames','$OtherAttendee','$upaccount','$upname','$starttime')";
	elseif($mode=="update")
	$sql = "UPDATE calendar set Subject='{$subject}',HasAttachment= 0 where Id={$calendarid}";
	else
	$sql = "delete from  calendar where Id={$calendarid}";
	
	  if (!mysqli_query($con,$sql))
	  {
       echo 0;
	  die('Error: ' . mysqli_error());
	  }
	  else
      {
		echo 1;	 
	  }
	mysqli_close($con);	
?>