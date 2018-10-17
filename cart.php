<!DOCTYPE html>
<?php
            session_start();
            $code=$fname=$ht=$hr="";
            $con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
            if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
            if (isset($_SESSION["uid"])) 
            {
                if ($_SESSION["uid"]=="admin") 
                {
                    $fname="admin";
                }
                else
                {
                    $search = "SELECT fname FROM temp_user WHERE id='".$_SESSION["uid"]."'"; 
                    $result=mysqli_query($con,$search);
                    while($row = $result->fetch_assoc())
                    {
                        $fname=$row["fname"];
                    }
                }
                $code='<li><a href="update.php"> <span class="glyphicon glyphicon-user"></span> Hi '.$fname.'</a></li> 


                                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>                       
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            }
            else
            {
                $code='<li><a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign Up</a></li>                        
                                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
            }


            $search1 = "SELECT pid FROM cart WHERE uid='".$_SESSION["uid"]."'"; 
            $result1=mysqli_query($con,$search1);
            $r=$t="";
            while($row1 = $result1->fetch_assoc())
            {
                 $search2 = "SELECT * FROM product WHERE pid='".$row1["pid"]."'";
                 $result2=mysqli_query($con,$search2);
            while($row2 = $result2->fetch_assoc())
            {
                $ht.='<tr>
                <td>'.$row2["brand"].'</td>
                <td>'.$row2["caption"].'</td>
                <td>'.$row2["price"].'</td>
                </tr>';
                $hr+=$row2["price"];
            }
        }
        $r=$hr*0.4;
        $t=$hr*0.6;
            
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
        <p>Cart</p>
          <table class="table table-bordered table-hover " style="width:100%">
          <thead>
  <tr>
    <th>Product</th>
    <th>Description</th>
    <th>Price</th>
  </tr>
  </thead>
  <tbody>
  <?php echo $ht;?>
  </tbody>
</table>
<br>
<p>Total = <?php echo $hr;?></p>
<p>Discount(40%) = <?php echo $r;?></p>
<p>Final Amount = <?php echo $t;?></p>

          </center>
        </div>
      </div>

    </body>
</html>