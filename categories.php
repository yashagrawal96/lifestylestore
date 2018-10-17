<!DOCTYPE html>

<html>
    <head>
        <title>Lifestyle Store</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link href="categories.css" rel="stylesheet" type="text/css"/>
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
                        <li><a href="signup.php"> <span class="glyphicon glyphicon-user"></span> Sign Up</a></li>                        
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="items">
            <a href="#">
                <image class="img-responsive" src="images/camera_1.jpg">
                <div class="caption">
                    <h2>Cameras</h2>
                    <p>Choose among the best available in the world.</p>
                </div>
            </a>
        </div>
        
        <div class="items">
            <a href="#">
                <image class="img-responsive" src="images/watch_1.jpg">
                <div class="caption">
                    <h2>Watches</h2>
                    <p>Original Watches from the best brands.</p>
                </div>
            </a>
        </div>
        
        <div class="items">
            <a href="#">
                <image class="img-responsive" src="images/shirt_2.jpg">
                <div class="caption">
                    <h2>Shirts</h2>
                    <p>Our exquisite collection of shirts.</p>
                </div>
            </a>
        </div>
    </div>
    <br><br><br><br><br><br><br>
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