<?php 
	session_start();
	$p=$_GET["pid"];
	$q=$_SESSION["uid"];
	$code=$fname="";
	$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_SESSION["uid"])) 
	{
		$sql = "INSERT INTO cart (uid,pid) VALUES ('$q','$p')";
        $result = mysqli_query($con,$sql);
        header('Location: welcome.php');
    }
	else {
		echo "<html><script type=\"text/javascript\"> window.alert(\"Signin First!);</script></html>";
		header('Location: index.php');
	}
?>