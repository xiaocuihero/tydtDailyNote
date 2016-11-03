<?php  
     header('Content-type:text/html; Charset=utf8');  
    header( "Access-Control-Allow-Origin:*");  
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS');    
    header('Access-Control-Allow-Headers:x-requested-with,content-type');    
	
    include('conn.php');  
    $username="";
	$username=$_POST['username'];
	$password="";
	$password=$_POST['password'];
	$para="N";	
	  
	$sql = "SELECT * FROM `user` where name='".$username."' and password='".$password."'";
  $result=mysqli_query($con,$sql);
  if($result !=null)
  {

	while ($row = mysqli_fetch_row($result)) {
		$para=$row[0].','.$row[1].','.$row[2].','.$row[3].','.$row[4].','.$row[5].",Y";
		//0:id 1:name 2:password 3:realname 4:department 5:role 6:Y
	}
  }
  mysqli_close($con);  
  echo $para; 
?>  