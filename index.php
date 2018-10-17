
    <?php
    session_start();
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Lifestyle Store</title>
            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
           	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <link href="newcss.css" rel="stylesheet" type="text/css"/>
            <script type="text/javascript" src="bootstrap/js/jquery.min.js" ></script>
            <script type="text/javascript" src="javascript/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content = "width=device-width, initial-scale=1.0">
            <script type="text/javascript" src="javascript/index.js"></script>
           <?php
        		
    	        if (isset($_SESSION["error"])) {
    				echo " <script type=\"text/javascript\">
    					window.alert(";
    				echo $_SESSION["error"]; 
    				echo ") </script>";
    			}
                if (isset($_COOKIE["verified"])) {
                     echo "<script type=\"text/javascript\">    
                        $(document).ready(function(){
                            $('#modalVerified').modal('show'); 
                        });
                    </script>";
                    $verifyCode = $_COOKIE["verified"];
                    setcookie("registered", "", time() - 3600);
                    setcookie("verified", "", time() - 3600);
                 }
    			if (isset($_COOKIE["registered"])) {
    				 echo "<script type=\"text/javascript\"> 	
    					$(document).ready(function(){
    						$('#modalRegistered').modal('show'); 
    					});
    				</script>";
    				setcookie("registered", "", time() - 3600);
    			 }
                 if (isset($_COOKIE["pwdErr"])) {
                     echo "<script type=\"text/javascript\">    
                        $(document).ready(function(){
                            $('#modalPwdErr').modal('show'); 
                        });
                        </script>";
                    setcookie("pwdErr", "", time() - 3600);
                 }
    			if (isset($_SESSION["uid"])){
    			    header('Location: /welcome.php');
    			    exit;
    			}
    		?>
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
                        <a class="navbar-left" href="index.php"><img src="images/cart-icon.png" style="padding: 5px;"></a>
                        <a id="navbar_brand" class="navbar-brand" href="index.php">Lifestyle Store</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                    	<ul class="nav navbar-nav navbar-left">
                            <li> <a href="shoes.php">Shoes</a></li>
                            <li> <a href="watches.php">Watches</a></li>
                            <li> <a href="suits.php">Suits</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li> <a href="#" data-toggle="modal" data-target ="#modalSignup"> <span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="#" data-toggle="modal" data-target ="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                            <h2></h2>
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
                    <h5 style = "font-family :times-new-roman ;">This is a demo website for a project. No products are sold here. All rights reserved by respective owners.</h5>
     <h5 style= "font-family :times-new-roman ;">Created by Yash Agrawal</h5>
                </center>
            </div>
        </footer>
        </body>


    <div id="modalSignup" class="modal fade" style="z-index: 9999;" role="dialog">
    	<div class="modal-dialog">

    	    <div class="modal-content">
    	    	<div class="modal-header">
    		        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
    		            <h3 style="font-family: helvetica ; font-style: bold">Signup with Lifestyle Store</h3>
                    </center>
    	      	</div>
    	        <div class="modal-body">
    		        <form name="myForm" action="signup.php" onsubmit="return validateForm()" method="post">
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
    		              <label for="email">Email address</label>
    		              <input type="email" class="form-control" name="email" required>
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

    <div id="modalLogin" class="modal fade" style="z-index: 9999;" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Login to Lifestyle Store</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <form name="myForm" action="login.php" method="post">
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password</label>
                          <input type="password" class="form-control" name="pwd" required>
                        </div>
                        <center>
                          <input type="submit" class="btn btn-primary" value="Login">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalRegistered" class="modal fade" style="z-index: 9999;" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Signup Successful</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: times-new-roman">Your form has been submitted successfully!</h4>
              		<h4 style="font-family: times-new-roman">Please click on the verification link in your email to activate your account.</h4>
              		<br>
              		<center><button type="button" class="btn btn-primary" data-dismiss="modal"> OK </button> </center>
                </div>
            </div>
        </div>
    </div>

 <div id="modalPwdErr" class="modal fade" style="z-index: 9999;" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Login Error</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: times-new-roman"><?php echo $_COOKIE["pwdErr"]; ?></h4>
                    <br>
                    <center><button type="button" class="btn btn-primary" data-dismiss="modal"> OK </button> </center> 
                </div>
            </div>
        </div>
    </div>



    <div id="modalVerified" class="modal fade" style="z-index: 9999;" role="dialog">
        <div class="modal-dialog">

            <?php 

            if ($verifyCode == 1) {
                $content = '<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Verification Successful</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: times-new-roman">Your email has been verified successfully!</h4>
                    <h4 style="font-family: times-new-roman">You may now login using your credentials.</h4>
                    <br>
                    <center><button type="button" class="btn btn-primary" data-dismiss="modal"> OK </button> </center>
                </div>
            </div>';
            }
            elseif ($verifyCode == 2) {
               $content = '<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Verification Error</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: times-new-roman">The url is either invalid or you already have activated your account.</h4>
                    <br>
                    <center><button type="button" class="btn btn-primary" data-dismiss="modal"> OK </button> </center>
                </div>
            </div>';
            }
            elseif ($verifyCode == 3) {
               $content = '<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 style="font-family: helvetica ; font-style: bold">Invalid Approach</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: times-new-roman">Please use the link in your link to verify your account.</h4>
                    <br>
                    <center><button type="button" class="btn btn-primary" data-dismiss="modal"> OK </button> </center>
                </div>
            </div>';
            }

            echo $content;
            ?>

            
        </div>
    </div>

    </html>