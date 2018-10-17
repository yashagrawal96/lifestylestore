<!DOCTYPE html>
<?php
// define variables and set to empty values
session_start();
$s=$_SESSION["uid"];
$pid = $price = $quantity =  $shipping = $image = $brand= "";
$pidErr = $priceErr = $quantityErr =  $shippingErr = $imageErr = $brandErr ="";
$counter=0;
$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }         
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["pid"])) {
    $pid = test_input($_POST["pid"]);
    $search = "SELECT pid FROM product WHERE pid='".$pid."'"; 
      $result=mysqli_query($con,$search);
      $rowcount=mysqli_num_rows($result);
      if($rowcount> 0)
      {
          $counter=$counter+1;
      }
    else
    {
      $pidErr="No such product found";
    }
  } 
   if (empty($_POST["brand"])) {
    $brandErr = "Brand is required";
  } 
  else {
    $brand = test_input($_POST["brand"]);
    if (!preg_match("/^[a-zA-Z]/",$brand)) {
      $brandErr = "Only letters allowed"; 
    }
    else
    {
      $counter=$counter+1;
    }
  }
  
  if (empty($_POST["price"])) {
    $priceErr = "Price is required";
  } 
  else {
    $price = test_input($_POST["price"]);
    $counter=$counter+1;
  }
  if (empty($_POST["quantity"])) {
    $quantityErr = "Quantity is required";
  } 
  else {
    $quantity = test_input($_POST["quantity"]);
      $counter=$counter+1;
  }
  if (empty($_POST["shipping"])) {
    $shippingErr = "Shipping is required";
  } 
  else {
    $shipping = test_input($_POST["shipping"]);
    $counter=$counter+1;
  }
  if (empty($_POST["image"])) {
    $imageErr = "Image is required";
  } 
  else {
    $image = test_input($_POST["image"]);
    $counter=$counter+1;
  }
  if ($counter==6) {

    $sql = "UPDATE product SET brand='$brand', quantity='$quantity',price='$price',shipping='$shipping',image='$image' WHERE pid='$pid'";
    mysqli_query($con,$sql);
mysqli_close($con);

header("Location: onadminupdate.php");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
    <head>
        <title>Lifestyle Store</title>
        
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link href="signup.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery.min.js" ></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="navbar_brand" class="navbar-brand" href="admin.php">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a> <span class="glyphicon glyphicon-user"></span> Hi Admin</a></li> 
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>    
                    </ul>
                </div>
            </div>
        </nav> 
      <div class="abc col-md-4 col-md-offset-4">
        <div style="margin-left: 15px; margin-right: 15px;">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <center>
              <h3 style="font-family: helvetica ; font-style: bold"">Update Product Information</h3>
            </center>
            <div class="form-group">
              <label for="pid">Product ID</label>
              <input type="number" class="form-control" name="pid" value="<?php echo $pid;?>">
              <span class="error"><?php echo $pidErr;?></span>
            </div>
            <div class="form-group">
              <label for="brand">Brand</label>
              <input type="text" class="form-control" name="brand" value="<?php echo $brand;?>">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" value="<?php echo $price;?>">
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity" value="<?php echo $quantity;?>">
            </div>
            <div class="form-group">
              <label for="shipping">Shipping</label>
              <input type="text" class="form-control" name="shipping" value="<?php echo $shipping;?>">
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="text" class="form-control" name="image" value="<?php echo $image;?>">
            </div>
            <center>
              <button type="submit" class="btn btn-primary">Submit</button>
            </center>
            <br>
          </form>
        </div>
      </div>
  </body>
</html>