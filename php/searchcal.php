<?php  
$userid="";
$userid=$_POST['userid'];
$isdone="";
$isdone=$_POST['isdone'];
$projectname="";
$projectname=$_POST['projectname'];
$choosetime="";
$choosetime=$_POST['choosetime'];	
$choosetime = date('Y-m-d H:i:s',strtotime($choosetime)); 
$para="";
 include('conn.php'); 

	//  $sql = "SELECT * FROM `calendar` where `calendar`.UPAccount='".$userid."' and `calendar`.Location='".$projectname."'and `calendar`.StartTime='".$choosetime."'";
		$sql = "SELECT * FROM `calendar` where `calendar`.UPAccount='".$userid."' and `calendar`.Location='".$projectname."'and `calendar`.StartTime='".$choosetime."'and `calendar`.Category='".$isdone."'";	
		  $result=mysqli_query($con,$sql);
		   if($result) 
		   {
		    while ($row = mysqli_fetch_row($result)) {
			$para=$row[0]."}".$row[1];//项目ID 和项目名称
			  }
     	    echo $para;
		   }
		  mysqli_close($con);		  
?>