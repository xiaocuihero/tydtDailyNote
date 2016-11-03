<?php
		      
	$userid="";
	$userid=$_POST['userid'];
	$prostatus="";
	$prostatus=$_POST['prostatus'];
	$stastatus="";
	$stastatus=$_POST['stastatus'];
	$reporttype="";
	$reporttype=$_POST['reporttype'];
       include('conn.php'); 

	$para="";
	$para1="";
		$para="-1,";
		$sql1 = "SELECT * FROM `calendar` where UPAccount='$userid'";
	    $result1=mysqli_query($con,$sql1);
		if($result1 !=null)
		{
		    while ($row = mysqli_fetch_row($result1)) {   
			$para.=$row[2].',';
					  }
		 }
		$para=substr($para,0,-1);//找出userid参加的所有项目

		if($reporttype==0)//如果是添加日志
		{
			if(	$prostatus==4)//如果项目是全部项目		  
		    {
				
                if($stastatus==1)//如果对于员工来说是所有项目，未区分是否参与
                {
					  $sql = "SELECT * FROM `project`";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称
								  }
				}
                elseif($stastatus==0)// 是员工参与的项目
                {
					  $sql = "SELECT * FROM `project` where  `project`.ID in(".$para.")";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称  
						}   
					           	
                }
                else//是员工未参与的项目
				{
					  $sql = "SELECT * FROM `project` where  `project`.ID not in(".$para.")";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称  
					}
				
				}


	         }
	         else//项目有具体状态
	         {
                if($stastatus==1)//如果对于员工来说是所有项目，未区分是否参与
                {
					  $sql = "SELECT * FROM `project` where `project`.status=$prostatus";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称
								  }								  
				}
                elseif($stastatus==0)// 是员工参与的项目
                {
					  $sql = "SELECT * FROM `project` where  `project`.ID in(".$para.") and `project`.status=$prostatus";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称   
						}    					         	
                }
                else//是员工未参与的项目
				{
					  $sql = "SELECT * FROM `project` where  `project`.ID not in(".$para.") and `project`.status=$prostatus";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称 
					}
					
				}	         	
	         }

        }
		else{
					  $sql = "SELECT * FROM `project` where  `project`.projectmonitorid =$userid";
					  $result=mysqli_query($con,$sql);
					  
					  while ($row = mysqli_fetch_row($result)) {
						$para1.=$row[0].','.$row[1].";";//项目ID 和项目名称 
					}

		}

	  mysqli_close($con);  
	  echo $para1;
		
?>