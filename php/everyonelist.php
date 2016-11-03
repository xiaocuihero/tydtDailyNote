<?php  
 header('Content-type:text/html; Charset=utf8');  
header( "Access-Control-Allow-Origin:*");  
header('Access-Control-Allow-Methods:POST,GET,OPTIONS');    
header('Access-Control-Allow-Headers:x-requested-with,content-type'); 

$today="";
$today=$_POST['today'];
$today = date('Y-m-d H:i:s',strtotime($today));
$isdone="";
$isdone=$_POST['isdone'];

 include('conn.php'); 
$para="";
$sql="";


//$sql = "SELECT u.realname,group_concat(concat(p.projectname,'：',c.`Subject`)separator '\r\n') FROM `calendar` c left join `user` u on c.UPAccount=u.id left join `project` p on p.id=c.Location where c.StartTime='".$today."' group by c.`UPAccount`";
$sql = "SELECT u.realname,group_concat(concat('<strong>',p.projectname,'：</strong>',c.`Subject`)separator '<br/>') FROM `calendar` c left join `user` u on c.UPAccount=u.id left join `project` p on p.id=c.Location where c.StartTime='".$today."' and c.Category='".$isdone."' group by c.`UPAccount`";
  $result=mysqli_query($con,$sql);
   if($result!=null) 
   {
	while ($row = mysqli_fetch_row($result)) {
	$para.=$row[0].'}'.$row[1].'{';//项目ID 和项目名称 {区分多条记录，}区分单条记录
	  }
	}
  mysqli_close($con);			
	echo $para;
		  
?>