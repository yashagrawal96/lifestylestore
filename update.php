<!DOCTYPE html>
<?php
// define variables and set to empty values
session_start();
$s=$_SESSION["uid"];
$fname = $lname = $email = $pwd = $pwdcheck = $pno = $address = $dob = $verify = $hash = "";
$fnameErr = $lnameErr = $emailErr = $pwdErr = $pwdcheckErr = $pnoErr = $addressErr = $dobErr = "";
$counter=0;
$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$search = "SELECT fname FROM temp_user WHERE id='".$_SESSION["uid"]."'"; 
              $result=mysqli_query($con,$search);
              while($row = $result->fetch_assoc())
              {
                  $fname=$row["fname"];
              }
          
        $code='<li><a href="update.php"> <span class="glyphicon glyphicon-user"></span> Hi '.$fname.'</a></li> 


                            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>                       
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["fname"])) {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z]/",$fname)) {
      $fnameErr = "Only letters allowed"; 
    }
    else
    {
      $counter=$counter+1;
    }
  } 
  else {
    $fnameErr = "First name is required";
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } 
  else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z]/",$lname)) {
      $lnameErr = "Only letters allowed"; 
    }
    else
    {
      $counter=$counter+1;
    }
  }
  
  if (empty($_POST["pwd"])) {
    $pwdErr = "Password is required";
  } 
  else {
    $pwd = test_input($_POST["pwd"]);
    $counter=$counter+1;
  }
  if (empty($_POST["pwdcheck"])) {
    $pwdcheckErr = "Re enter password";
  } 
  else {
    $pwdcheck = test_input($_POST["pwdcheck"]);
    if($pwdcheck!=$pwd){
      $pwdcheckErr = "Passwords do not match";
    }
    else
    {
      $counter=$counter+1;
    }
  }
  if (empty($_POST["pno"])) {
    $pnoErr = "Phone number is required";
  } 
  else {
    $pno = test_input($_POST["pno"]);
    if (!preg_match("/^[0-9]/",$pno)) {
      $pnoErr = "Only numbers allowed"; 
    }
    else
    {
      $counter=$counter+1;
    }
  }
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } 
  else {
    $address = test_input($_POST["address"]);
    $counter=$counter+1;
  }
  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
  } 
  else {
    $dob = test_input($_POST["dob"]);
     $counter=$counter+1;
  }
  if ($counter==7) {

    $sql = "UPDATE temp_user SET fname='$fname', lname='$lname',dob='$dob',address='$address',pno='$pno',pass='$pwd' WHERE id='$s'";
    mysqli_query($con,$sql);
mysqli_close($con);

header("Location: onupdate.php");
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
                    <a id="navbar_brand" class="navbar-brand" href="index.php">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    <?php echo $code; ?>    
                    </ul>
                </div>
            </div>
        </nav> 
      <div class="abc col-md-4 col-md-offset-4">
        <div style="margin-left: 15px; margin-right: 15px;">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <center>
              <h3 style="font-family: helvetica ; font-style: bold"">Update User Information</h3>
            </center>
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
              <span class="error"><?php echo $fnameErr;?></span>
            </div>
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>">
              <span class="error"><?php echo $lnameErr;?></span>
            </div>
            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" name="pwd" value="<?php echo $pwd;?>">
              <span class="error"> <?php echo $pwdErr;?></span>
            </div>
            <div class="form-group">
              <label for="pwdcheck">Re Enter Password</label>
              <input type="password" class="form-control" name="pwdcheck" value="<?php echo $pwdcheck;?>">
              <span class="error"> <?php echo $pwdcheckErr;?></span>
            </div>
            <div class="form-group">
              <label for="pno">Phone Number</label>
              <input type="Number" class="form-control" name="pno" value="<?php echo $pno;?>">
              <span class="error"> <?php echo $pnoErr;?></span>
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="date" class="form-control" name="dob" placeholder="yyyy-mm-dd" value="<?php echo $dob;?>">
              <span class="error"> <?php echo $dobErr;?></span>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
              <span class="error"> <?php echo $addressErr;?></span>
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