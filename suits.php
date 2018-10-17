<?php
session_start();
?>

<!DOCTYPE html>        
    <?php
            $category = 2;
            $code = $fname = $ht = $hr = "";

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
                    $result = mysqli_query($con,$search);
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
            $result1 = mysqli_query($con,$search1);
            $ht .= '<div class="container">
            <div class="row">';

            while($row1 = $result1->fetch_assoc())
            {
                $ht.='
                        <div class="col-sm-4 itemsimage">
                            <image class="img-responsive" style="display:block; margin-left:auto; margin-right:auto;" src="images/'.$row1["image"].'" >
                            <center>        
                                <div class="caption">
                                    <h2>'.$row1["brand"].'</h2>
                                    <h4>'.$row1["caption"].'</h4>
                                    <h5>$'.$row1["price"].'</h5>
                                 </div> 
                                <a href="#" style="margin-bottom:30px;" class="btn btn-primary" data-toggle="modal" data-target="#modalProduct'.$row1["pid"].'">Details</a>
                            </center>
                        </div>
                        <div id="modalProduct'.$row1["pid"].'" class="modal fade" style="z-index: 9999999;" role="dialog">
                            
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <center>
                                            <strong><h1>'.$row1["brand"].'</h1></strong>
                                        </center>
                                    </div>
                                    <div class="modal-body" style="min-height: 470px">
                                        <div class="quick-view">
                                            <div class="selected">
                                               <img class="img-responsive" style="display:block; margin-left:auto; margin-right:auto;" src="images/'.$row1["image"].'">
                                               <center>
                                                   
                                                   <h2>'.$row1["caption"].'</h2>
                                                   <p style="font-size: 20px">'.$row1["description"].'</p>
                                                   <h3>$'.$row1["price"].'</h3>  
                                                   <br>
                                                   <a href="add.php?pid='.$row1["pid"].'" class="btn btn-primary">Add To Cart</a>        
                                                </center>                  
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';
            }
            $ht .= '</div></div>';
        ?>
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="javascript/index.js"></script>
        <script type="text/javascript" src="javascript/js.cookie.js"></script>
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
            <center><div class="banner-image-suit">
              
            </div>
            </center>
        </div>
    </center>
                <br><br><br><br>
                <div class="container">
                        <?php echo $ht;?>
                </div>

          
        </div>
    </div>
        
           <br>
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

</html>