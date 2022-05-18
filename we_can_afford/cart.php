<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
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
                  	<li class="active">
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
             </div> <!navbar header start>
             <div class="navbar-collapse collapse" id="navigation"><!--navbar collaspe start -->
              <div class="padding-nav">
                <ul class="nav navbar-nav navbar-left">
                  <li>
                    
                    <a href="index.php">Home</a>

                  </li>
                  <li>
                    <a href="services.php">Services</a>
                  </li>
                  <!-- <li>
                    <a href="customer/my_account.php">My Account</a>
                  </li> -->
                  <!-- <li >
                    <a href="about.php">About us</a>
                  </li> -->
                  <li>
                    <a href="Contactus.php">Contact us</a>
                  </li>
                  
                </ul>
                
              </div><!--padding nav end-->
              <!--a href="tiffin.php" class="btn btn-primary navbar-btn right"
                i class="fa-thin fa-fork-knife"/i
              a-->
              <div class="navbar-collapse collapse right">
      <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                <span class="sr-only"> Toggle Search</span>
                <i class="fa fa-search"></i>
      </button>

              </div><!navbar-collapse-right start>

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


<div id="content">
  <div class="container"><!--Container start-->
    <div class="col-md-12"><!--col-md-12 start-->
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>
          Cart<!--a href=""></a-->
        </li>
      </ul>
    </div><!--col-md-12 End-->
    <div class="col-md-9" id="cart">
      <div class="box">
        <form action="cart.php" method="post" enctype="multipart-form-data">
          <h1> Cart</h1>
          <?php 
            $ip_add=getUserIP();
            $select_cart="select * from cart where ip_add='$ip_add'";
            $run_cart=mysqli_query($con,$select_cart);
            $count=mysqli_num_rows($run_cart);

          ?>
          <p class="text-muted">Currently you have <?php echo $count ?> item(s) in your cart</p>
          <div calss="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">Product</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Size</th>
                  <th colspan="1">Delete</th>
                  <th colspan="1">Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $total = 0;
                  while($row=mysqli_fetch_array($run_cart)){
                    $pro_id=$row['p_id'];
                    $pro_size=$row['size'];
                    $pro_qty=$row['qty'];
                    $get_product="select * from products where product_id='$pro_id'";
                    $run_pro=mysqli_query($con,$get_product);
                    while($row=mysqli_fetch_array($run_pro)){
                      $p_title=$row['product_title'];
                      $p_img1=$row['product_img1'];
                      $p_price=$row['product_price'];
                      $sub_total=$row['product_price']*$pro_qty;
                      $total += $sub_total;
                    
                ?>
                <tr>
                  <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                  <td><?php echo $p_title ?></td>
                  <td><?php echo $pro_qty ?></td>
                  <td>INR<?php echo $p_price ?></td>
                  <td><?php echo $pro_size ?></td>
                  <td><input type="checkbox" name="remove{}"></td>
                  <td>INR <?php echo $sub_total ?></td>
                </tr>
                <?php 
                    }
                  }
                ?>
              </tfoot>
            </table>
            <div class="box-footer">
              <div class="pull-left">
                <a href="index.php" class="btn btn-defaul">
                  <i class="fa fa-chevron-left"></i>Continue 
                </a>
              </div>
              <div class="pull-right">
                <button class="btn btn-default" type="submit" name="update" value="Update cart">
                  <i class="fa fa-refresh">Update Cart</i>
                </button>
                <a href="checkout.php" class="btn btn-primary">
                  Proceed to Checkout<i class="fa fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </div>
        </form>
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
    </div><!--col md 9 end-->
    <div class="col-md-3">
      <div class="box" id="order-summary">
        <div class="box-header">
          <h3>Order Summary</h3>
        </div>
        <p class="text-muted">
          Shipping and additional costs are calculated based on the values you have entered
        </p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>Order Subtotal</td>
                <th>INR 55000</th>
              </tr>
              <tr>
                <td>Shipping and Handlingl</td>
                <th>INR 00</th>
              </tr>
              <tr>
                <td>Tex</td>
                <th>INR 0</th>
              </tr>
              <tr>
                <td class="total">Total</td>
                <th>INR <?php echo $total ?></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>




    
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