<html>
            <head>
                <title>Lifestyle Store</title>
                <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
               <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
                <link href="products1.css" rel="stylesheet" type="text/css"/>
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
                    <a id="navbar_brand" class="navbar-brand" href="index.php">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"> <span class="glyphicon glyphicon-user"></span> Hi Admin</li></a>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav> 
    <div class="container" style="margin-top: 150px" align="center">
        <div class="row">
            <div class="col-sm-4 itemsimage">
                <a href="#" data-toggle="modal" data-target="#modalAdd">
                    <img class="img-responsive" src="images/add.png">
                    <div class="caption">
                        <h2>Add Product</h2>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-4 itemsimage">
                <a href="#" data-toggle="modal" data-target="#modalUpdate">
                    <img class="img-responsive" src="images/refresh.png">
                    <div class="caption">
                        <h2>Update Product</h2>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-4 itemsimage">
                <a href="#" data-toggle="modal" data-target="#modalDelete">
                    <img class="img-responsive" src="images/delete.png">
                    <div class="caption">
                        <h2>Delete Product</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>    
          


            <footer style="margin-top: 10vh;">
        <div class="container">
            <center>
                <h5 style = "font-family :times-new-roman ;">This is a demo website for a project. No products are sold here. All rights reserved by respective owners.</h5>
 <h5 style= "font-family :times-new-roman ;">Created by Yash Agrawal and Yash Dhakne.</h5>
            </center>
        </div>
    </footer>
    </body>

    <div id="modalAdd" class="modal fade" style="z-index: 99999;" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
                    <form action="adminadd.php" method="post">
                    <center>
                      <h3 style="font-family: helvetica ; font-style: bold"">ADD PRODUCT</h3>
                    </center>
                    <div class="form-group">
                      <label for="cid">CID</label>
                      <input type="text" class="form-control" name="cid" value="<?php echo $cid;?>">
                      <span class="error"><?php echo $cidErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="price">PRICE</label>
                      <input type="text" class="form-control" name="price" value="<?php echo $price;?>">
                      <span class="error"><?php echo $priceErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="image">IMAGE</label>
                      <input type="text" class="form-control" name="image" value="<?php echo $image;?>">
                      <span class="error"> <?php echo $imageErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="description">DESCRIPTION</label>
                      <input type="text" class="form-control" name="description" value="<?php echo $description;?>">
                      <span class="error"> <?php echo $descriptionErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="caption">CAPTION</label>
                      <input type="text" class="form-control" name="caption" value="<?php echo $caption;?>">
                      <span class="error"> <?php echo $captionErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="brand">BRAND</label>
                      <input type="text" class="form-control" name="brand" value="<?php echo $brand;?>">
                      <span class="error"> <?php echo $brandErr;?></span>
                    </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    <br>
                  </form>
                </center> 
            </div>
    </div>
  </div>
</div>


    <div id="modalUpdate" class="modal fade" style="z-index: 99999;" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
                        <form action="adminupdate.php" method="post">
                    <center>
                      <h3 style="font-family: helvetica ; font-style: bold"">UPDATE PRODUCT</h3>
                    </center>
                    <div class="form-group">
                      <label for="cid">PID</label>
                      <input type="text" class="form-control" name="pid" value="<?php echo $pid;?>">
                      <span class="error"><?php echo $pidErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="cid">CID</label>
                      <input type="text" class="form-control" name="cid" value="<?php echo $cid;?>">
                      <span class="error"><?php echo $cidErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="price">PRICE</label>
                      <input type="text" class="form-control" name="price" value="<?php echo $price;?>">
                      <span class="error"><?php echo $priceErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="image">IMAGE</label>
                      <input type="text" class="form-control" name="image" value="<?php echo $image;?>">
                      <span class="error"> <?php echo $imageErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="description">DESCRIPTION</label>
                      <input type="text" class="form-control" name="description" value="<?php echo $description;?>">
                      <span class="error"> <?php echo $descriptionErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="caption">CAPTION</label>
                      <input type="text" class="form-control" name="caption" value="<?php echo $caption;?>">
                      <span class="error"> <?php echo $captionErr;?></span>
                    </div>
                    <div class="form-group">
                      <label for="brand">BRAND</label>
                      <input type="text" class="form-control" name="brand" value="<?php echo $brand;?>">
                      <span class="error"> <?php echo $brandErr;?></span>
                    </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    <br>
                  </form>
                </center> 
            </div>
    </div>
  </div>
</div>

<div id="modalDelete" class="modal fade" style="z-index: 99999;" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
                        <form action="admindelete.php" method="post">
                    <center>
                      <h3 style="font-family: helvetica ; font-style: bold"">DELETE PRODUCT</h3>
                    </center>
                    <div class="form-group">
                      <label for="pid">PID</label>
                      <input type="text" class="form-control" name="pid" value="<?php echo $pid;?>">
                      <span class="error"><?php echo $pidErr;?></span>
                    </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    <br>
                  </form>
                </center> 
            </div>
    </div>
  </div>
</div>
</html>