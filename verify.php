<?php
    $con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
		if (mysqli_connect_errno()){
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();}
  	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    
    $email = $_GET['email'];
    $hash = $_GET['hash'];

$search = "SELECT email, hash, verify FROM temp_user WHERE email='".$email."' AND hash='".$hash."' AND verify='0'"; 
$result=mysqli_query($con,$search);
$rowcount=mysqli_num_rows($result);
if($rowcount> 0){
    $abc="UPDATE temp_user SET verify='1' WHERE email='".$email."' AND hash='".$hash."' AND verify='0'";
	mysqli_query($con,$abc);

	$cookie_name = "verified";
  $cookie_value = 1;
  setcookie($cookie_name,$cookie_value, time() + 86400, "/");
  header("Location: index.php");
}else{
	  $cookie_name = "verified";
    $cookie_value = 2;
    setcookie($cookie_name,$cookie_value, time() + 86400, "/");
    header("Location: index.php");
}
}
else
{
    $cookie_name = "verified";
    $cookie_value = 3;
    setcookie($cookie_name,$cookie_value, time() + 86400, "/");
    header("Location: index.php");
}
?>