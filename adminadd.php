<?php

session_start();
$s=$_SESSION["uid"];
echo "<html><script>console.log(\"HI\");</script></html>";
$price = $caption =  $description = $image = $brand= $cid = "";

$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }         
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $sql1 = "SELECT MAX(pid) FROM product";
  $result = mysqli_query($con,$sql1);
  $row = $result->fetch_assoc());
  $pid=$row["pid"]+1;

  echo "<html><script>console.log(\"".$pid."\");</script></html>";
  $brand = test_input($_POST["brand"]);
  $price = test_input($_POST["price"]);
  $caption = test_input($_POST["caption"]);
  $description = test_input($_POST["description"]);
  $image = test_input($_POST["image"]);
  $cid = test_input($_POST["cid"]);

    $sql = "INSERT INTO product (pid,brand,cid,price,caption,image,description) VALUES ($pid,'$brand', '$cid','$price','$caption','$image',$description)";
    mysqli_query($con,$sql);
    mysqli_close($con);

header("Location: admin.php");
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>