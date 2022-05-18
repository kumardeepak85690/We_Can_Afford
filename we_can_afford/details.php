<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['pro_id'])){
  $pro_id=$_GET['pro_id'];
  $get_product="select * from products where product_id='$pro_id'";
  $run_product=mysqli_query($con,$get_product);
  $row_product=mysqli_fetch_array($run_product);
  $p_cat_id=$row_product['p_cat_id'];
  $p_title=$row_product['product_title'];
  $p_price=$row_product['product_price'];
  $p_desc=$row_product['product_desc'];
  $p_img1=$row_product['product_img1'];
  $p_img2=$row_product['product_img2'];
  $p_img3=$row_product['product_img3'];
  $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
  $run_p_cat=mysqli_query($con,$get_p_cat);
  $row_p_cat=mysqli_fetch_array($run_p_cat);
  $p_cat_id=$row_p_cat['p_cat_id'];
  $p_cat_title=$row_p_cat['p_cat_title'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WE CAN AFFORD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
        <div id="top"> <!--top bar start-->
        	<div class="container"> <!--container bar start-->
        		<div class="col-md-6 offer">
        			<a href="#" class="btn btn-success btn-sm">
              <?php
              if(!isset($_SESSION['customer_email'])){
                echo "Welcome Guest";
              }
              else{
                echo "Welcome: " .$_SESSION['customer_email'] ."";
              }
              ?>
        			</a>
      
        		</div>
        		<div class="col-md-6">


                  <ul class="menu">
                  	<li>
                  		<a href="customer_registration.php"> Register
                  		</a>
                  	</li>
                  	<li>
                  		<?php
                        if(!isset($_SESSION['customer_email'])){
                          echo "<a href='checkout.php'>My Account</a>";
                        }
                        else{
                          echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                        }
                      ?>
                  	</li>
                     <li>
                  		<a href="cart.php"> Go To Cart
                  		</a>
                  	</li>
                  	<li>
                    <?php
                      if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'>Login</a>";
                      }
                      else{
                        echo "<a href='logout.php'>Logout</a>";
                      }
                      ?>
                  	</li>

                 </ul>

        			
        		</div>

        	</div> <!--container bar end-->
        	
 </div> <!--top bar end-->


<div class="navbar navbar-default" id="navbar"><!--navbar-defaault start-->
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand home" href="index.php">
				
        <img src="images/l2.jpg" alt="we can afford" class="hidden-xs"><!--logo-->
               
			</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
				<span class="sr-only">Toggle Navigation
					

				</span>
				<i class="fa fa-align-justify"><!--3dot by using fontawsome-->
					
				</i>
			</button>

             <button type="button" class="navbar-toggle" data-toggle="collapse" data target="#search">
             	<span class="sr-only"></span>
             	<i class="fa fa-search"></i>
             	
             </button>
             </div> <!--navbar header start-->
             <div class="navbar-collapse collapse" id="navigation"><!--navbar collaspe start-->
              <div class="padding-nav"><!--padding nav start-->
                <ul class="nav navbar-nav navbar-left">
                  <li>
                    
                    <a href="index.php">Home</a>

                  </li>
                  <li class="active">
                    <a href="services.php">Services</a>
                  </li>
                  <!-- <li>
                    <a href="customer/my_account.php">My Account</a>
                  </li> -->
                  <!-- <li >
                    <a href="about.php">About us</a>
                  </li> -->
                  <li >
                    <a href="Contactus.php">Contact us</a>
                  </li>
                  
                </ul>
                
              </div><!--padding nav end-->
              <!--a href="tiffin.php" class="btn btn-primary navbar-btn right"
                i class="fa-thin fa-fork-knife"/i
              a-->
              <div class="navbar-collapse collapse right"><!--navbar collapse right start-->
      <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                <span class="sr-only"> Toggle Search</span>
                <i class="fa fa-search"></i>
      </button>

              </div><!--navbar-collapse-right end-->

               <div class="collapse clearfix" id="search">

                <form class="navbar-form" method="get" action="result.php">
                  <div class="input-group">
                    <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
        <span class="input-group-btn">           
     <button type="submit" value="Search" name="search" class="btn btn-primary">
                      <i class="fa fa-search"></i>
                      
    </button>
  </span>
                    
               </div>
                </form>
                 
               </div>
               
             </div> 
               
             </div>
		</div>
		
	</div>
	
</div><!--navbar-default end-->


<div id="content"><!--Content Start-->
  <div class="container"><!--Container start-->
    <div class="col-md-12"><!--col-md-12 start-->
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>
          <a href="services.php">Services</a>
        </li>
        <li>
          Details
        </li>
        <li>
          <a href="services.php?p_cat_id='<?php echo $p_cat_id;?>'">
            <?php echo $p_cat_title; ?>
          </a>
        </li>
        <li>
          <?php echo $p_title; ?>
        </li>
      </ul>
    </div><!--col-md-12 End-->
    <div class="col-md-3"><!--col-md-3 Start-->
      <?php
        include("includes/sidebar.php")
      ?>
    </div><!--col-md-3 End-->
    <div class="col-md-9"><!--col-md-9 start-->
        <div class="row" id="productmain"><!--Row start-->
            <div class="col-sm-6"><!--col-sm-6 start-->
                <div id="mainimage"><!--mainimage start-->
                    <div id="mycarousel" class="carousel slide" data-ride="carousel"><!--mycarousel start-->
                        <ol class="carousel-indicators">
                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mycarousel" data-slide-to="1" ></li>
                            <li data-target="#mycarousel" data-slide-to="2" ></li>
                        </ol>
                        <div class="carousel-inner"><!--carousel-inner start-->
                            <div class="item active">
                                <center>
                                    <img src="admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive">
                                </center>
                            </div>
                            <div class="item">
                                <center>
                                    <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                </center>
                            </div>
                            <div class="item">
                                <center>
                                    <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                </center>
                            </div>
                        </div><!--carousel-inner End-->
                        <a href="#mycarousel" class="left carousel-control" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a href="#mycarousel" class="right carousel-control" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!--mycarousel End-->
                </div><!--maineimage End-->
            </div><!--col-sm-6 End-->
            <div class="col-sm-6"><!--col-sm-6 Start-->
                <div class="box"><!--box start-->
                    <h1 class="text-center"><?php echo $p_title; ?></h1>
                    <?php
                      addCart();
                    ?>
                    <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal"><!--Form start-->
                    <div class="form-group"><!--form group1 start-->
                            <label class="col-md-5 control-label">Flat</label>
                            <div class="col-md-7">
                                <select name="product_qty" class="form-control">
                                    <option>Select Product Quantity</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div><!--form group1 end-->
                        <div class="form-group"><!--form group2 start-->
                            <label class="col-md-5 control-label">Flat Size</label>
                            <div class="col-md-7">
                                <select name="product_size" class="form-control">
                                    <option>Select a Flat Size</option>
                                    <option>1BHK</option>
                                    <option>2BHK</option>
                                    <option>3BHK</option>
                                </select>
                            </div>
                        </div><!--form group2 end-->
                        <p class="price">INR <?php echo $p_price; ?></p>
                        <p class="text-center buttons">
                          <button class="btn btn-primary" type="Submit">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                          </button>
                        </p>
                    </form><!--form end--> 
                </div><!--box End-->
                <div class="col-xs-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?php echo $p_img2; ?>" class="img-responsive">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?php echo $p_img3; ?>" class="img-responsive">
                  </a>
                </div>
            </div><!--col-sm-6 End-->
        </div><!--Row End-->
          <div class="box" id="details">
            <h4>Product Details</h4>
            <p>
              <?php echo $p_desc; ?>
            </p>
            <h4>Size</h4>
            <ul>
              <li>Small</li>
              <li>Meduim</li>
              <li>Large</li>
              <li>Extra Large</li>
            </ul>
          </div>
          <div id="row same-height-row"><!--Row same height start-->
            <div class="col-md-3 col-sm-6"><!--col md 3 start-->
              <div class="box same-height headline"><!--box same height headline start-->
                <h3 class="text-center">You Also Like These Flat</h3>
              </div><!--box same height headline end-->
            </div><!--col md 3 sm 6 end-->
            <?php
              $get_product="select * from products order by 1 LIMIT 0,3";
              $run_product=mysqli_query($con,$get_product);
              while ($row=mysqli_fetch_array($run_product)){
                $p_title=$row['product_title'];
                $p_price=$row['product_price'];
                $p_img1=$row['product_img1'];
                echo "<div class='center-responsive col-md-3 col-sm-6'>
                      <div class='product same-height'>
                        <a href='details.php?pro_id=$pro_id'>
                          <img src='admin_area/uploads/$p_img1' class='img-responsive'>
                        </a>
                        <div class='text'>
                          <h3>
                            <a href='details.php?pro_id=$pro_id'>$p_title</a>
                          </h3>
                          
                          <p class='price'>INR $p_price</p>
                          
                        </div>
                      </div>
                </div>";
              }
            ?>
          </div><!--Row same height end-->
    </div><!--col-md-9 End-->
  </div><!--Container End-->
</div><!--Content-->










<!--Footer Start-->
<?php
include("includes/footer.php")
?>
<!--Footer End-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>