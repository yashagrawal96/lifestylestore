<!DOCTYPE html>
		<?php
			session_start();
			$category = $_COOKIE["category"];

			$code = $fname = $ht = $hr = "";

			$con=mysqli_connect("localhost", "root", "","lifestylestore") ;
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

			$search1 = "SELECT * FROM product WHERE cid = '".$category."'"; 
		    $result1=mysqli_query($con,$search1);

		    while($row1 = $result1->fetch_assoc())
		    {
		    	/*if ($r==1) {
		    		$ht.='<div class="item active">
		    		<center>
		      <img src="images/'.$row1["image"].'" width="550" height="700">
		      </center>
		      <div class="carousel-caption">
		        <h2>'.$row1["brand"].'</h3>
		        <h4>'.$row1["price"].'</h4>
		        <a href="add'.$t.'.php" class="btn btn-danger btn-lg" role="button">Buy</a>
		      </div>
		    </div>';
		    $t+=1;
		    $r=0;
		    	}
		    	else{
		        $ht.='<div class="item">
		        <center>
		      <img src="images/'.$row1["image"].'" width="550" height="700">
		      </center>
		      <div class="carousel-caption">
		        <h2>'.$row1["brand"].'</h3>
		        <h4>'.$row1["price"].'</h4>
		        <a href="add'.$t.'.php" class="btn btn-danger btn-lg" role="button">Buy</a>
		      </div>
		    </div>';
			$t+=1;
			}
		    }*/
			

		?>
		<html>
		    <head>
		        <title>Lifestyle Store</title>
		        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		        <link href="products.css" rel="stylesheet" type="text/css"/>
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
		                       <?php echo $code;?>
		                    </ul>
		                </div>
		            </div>
		        </nav>
		        <br><br><br><br>
		        <div class="container">
		       		
					<!--<?php echo $ht;?> -->
		  </div>

		  
		</div>
	</div>
		
		   <br>
		    <footer>
		    <div class="container">
		            <center>
		                <h5 style= "font-family :times-new-roman ;">This is a demo website for a project. No products are sold here. All rights reserved by respective owners.</h5>
		 <h5 style= "font-family :times-new-roman ;">Created by Yash Agrawal.</h5>
		            </center>
		            </div>
		    </footer>
		    </body>
		</html>