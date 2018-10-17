<!DOCTYPE html>
<?php

session_start();
$fname="";
if (isset($_SESSION["uid"])) {
    
    $con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

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
}
else
{
    header('Location: login.php');
}
?>
<html>
    <head>
        <title>Lifestyle Store</title>
        
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
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
                    <a class="navbar-left" href="index.php"><img src="images/cart-icon.png" style="padding: 10px 10px;"></a>
                    <a id="navbar_brand" class="navbar-brand" href="index.php">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
		    <ul class="nav navbar-nav navbar-left">
                        <li> <a href="shoes.php">Shoes</a></li>
                        <li> <a href="watches.php">Watches</a></li>
                        <li> <a href="suits.php">Suits</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><span class="glyphicon glyphicon-user"></span> Hi <?php echo $fname;?></li></a>
			<li> <a href="#" data-toggle="modal" data-target ="#modalUpdate"> <span class="glyphicon glyphicon-refresh"></span> Update Info</a></li> 


                        <li><a href="#" data-toggle="modal" data-target ="#modalCart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>                       
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <center>
        <div class="content">
            <center><div class="banner-image">
                <div class="inner-banner-image">
                    <center><div class="banner-content">
                            <h1 style="font-family: times-new-roman ; font-style: bold">We Sell Lifestyle.</h1>
                            <h2></h2>
                        <h5 style="font-family: times-new-roman ; font-style: bold"> Flat 40% OFF on premium brands </h5> 
                        <h2></h2>
                        <center>
                            <div id="button">
                                <a href="#target"><input type="button" class="btn btn-danger btn-lg" value="Shop Now"></a>
                            </div>
                        </center>
                </div>
            </div>
            </center>
        </div>
    </center>

     <center>
    <div id = "target" class="container" >
    	<div class="row">
	        <div class="col-sm-4 itemsimage">
	            <a href="shoes.php">
	            <image class="img-responsive" src="images/shoes_5.png">
	                <div class="caption">
	                    <h2>Shoes</h2>
	                    <p>Choose among the best available in the world.</p>
	                </div>
	            </a>
	        </div>
	        
	        <div class="col-sm-4 itemsimage">
	            <a href="watches.php">
	                <image class="img-responsive" src="images/watch_1.jpg">
	                <div class="caption">
	                    <h2>Watches</h2>
	                    <p>Original Watches from the best brands.</p>
	                </div>
	            </a>
	        </div>
	        
	        <div class="col-sm-4 itemsimage">
	            <a href="suits.php">
	                <image class="img-responsive" src="images/shirt_2.jpg">
	                <div class="caption">
	                    <h2>Suits</h2>
	                    <p>Our exquisite collection of suits.</p>
	                </div>
	            </a>
	        </div>
	    </div>
    </div>
 	</center>   
    <footer>
        <div class="container">
            <center>
                <h5 style= "font-family :times-new-roman ;">This is a demo website for a project. No products are sold here. All rights reserved by respective owners.</h5>
<h5 style= "font-family :times-new-roman ;">Created by Yash Agrawal</h5>
            </center>
        </div>
    </footer>
    </body>

	<div id="modalUpdate" class="modal fade" style="z-index: 9999;" role="dialog">
	<div class="modal-dialog">

	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
		            <h3 style="font-family: helvetica ; font-style: bold">Update User Information</h3>
                </center>
	      	</div>
	        <div class="modal-body">
			 <form name="myForm" action="update.php" onsubmit="return validateForm()" method="post">
		            <div class="form-group">
                        <div class="form-group" style="width: 47%;float: left;">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" required>
                        </div>
                        <div class="form-group" style="width: 47%;float: right;">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" required>
                        </div>
                    </div>
		            
		            <div class="form-group">
		              <label for="pwd">Password</label>
		              <input type="password" class="form-control" name="pwd" required>
                    </div>
		            <div class="form-group">
		              <label for="pwdcheck">Re Enter Password</label>
		              <input type="password" class="form-control" name="pwdcheck" required>
                    </div>
		            <div class="form-group">
		              <label for="pno">Phone Number</label>
		              <input type="number" class="form-control" name="pno" maxlength ="10" minlength="10" required>
		            </div>
		            <div class="form-group">
		              <label for="dob">DOB</label>
		              <input type="date" class="form-control" name="dob" placeholder="yyyy-mm-dd" required>
		            </div>
		            <div class="form-group">
		              <label for="address">Address</label>
		              <input type="text" class="form-control" name="address" required>
		            </div>
		            <center>
		              <input type="submit" class="btn btn-primary" value="Submit">
		            </center>
		        </form>
		       
		    </div>
		</div>
	</div>
</div>
<div id="modalCart" class="modal fade" style="z-index: 9999;" role="dialog">
	<div class="modal-dialog">

	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
		            <h3 style="font-family: helvetica ; font-style: bold">Cart</h3>
                </center>
	      	</div>
    <div class="modal-body">
		     
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
                <td>'.$row2["shipping"].'</td>
                <td>'.$row2["price"].'</td>
                </tr>';
                $hr+=$row2["price"];
            }
        }
        $r=$hr*0.4;
        $t=$hr*0.6;
            
	?>

	 <div class="abc col-xl-4 col-xl-offset-4">
        <div style="margin: 50px 15px;">
        <center>
        
          <table class="table table-bordered table-hover " style="width:100%">
          <thead>
                  <tr>
                    <th>Product</th>
                    <th>shipping</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php echo $ht;?>
                  </tbody>
                </table>
                <br>
                <p align="right">Total = $<?php echo $hr;?></p>
                <p align="right">Discount(40%) = $<?php echo $r;?></p>
                <p align="right">Final Amount = $<?php echo $t;?></p>

          </center>
          </div>
          </div>
	
         
	     </div>
	  </div>
      </div>
</div>

</html>