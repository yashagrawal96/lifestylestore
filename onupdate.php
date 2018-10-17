<!DOCTYPE html>
<?php
// define variables and set to empty values
session_start();
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
        <div style="margin: 50px 15px;">
        <center>
          <h3 style="font-family: helvetica">Your data has been updated successfully!</h3>
          <a href="index.php">Home</a>
          </center>
        </div>
      </div>

    </body>
</html>