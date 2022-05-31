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
          Services<!--a href=""></a-->
        </li>
      </ul>
    </div><!--col-md-12 End-->
    <div class="col-md-3"><!--col-md-3 Start-->
      <?php
        include("includes/sidebar.php")
      ?>
    </div><!--col-md-3 End-->
    <div class="col-md-9"><!--col-md-9 Start-->
      <?php
        if(!isset($_GET['p_cat'])){
          if(!isset($_GET['cat_id'])){
            echo "<div class='box'>
            <h1>Services</h1>
            <p>This theme is created by Er. Deepak Kumar and Er. Ashwani Sharma</p>
          </div>";
          }
        }
      ?>
      <div class="row"><!--Row start-->
        <?php
          if(!isset($_GET['p_cat'])){
            if(!isset($_GET['cat_id'])){
              $per_page=6;
              if(isset($_GET['page'])){
                $page=$_GET['page'];
              }
              else{
                  $page=1;
              }
              $start_from=($page-1)* $per_page;
              $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
              $run_pro=mysqli_query($con,$get_product);
              while ($row=mysqli_fetch_array($run_pro)){
                $pro_id=$row['product_id'];
                $pro_title=$row['product_title'];
                $pro_price=$row['product_price'];
                $pro_img1=$row['product_img1'];
                echo "
                  <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                      <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/uploads/$pro_img1' class='img-responsive'>
                      </a>
                      <div class='text'>
                        <h3>
                          <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                        </h3>
                        <p class='price'> INR $pro_price</p>
                        <p class='buttons'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                        </p>
                      </div>
                    </div>
                  </div>
                
                ";
              }
            
        ?>
      </div><!--Row End-->
      <center>
        <ul class="pagination">
          <?php

            $query="select * from products";
            $result=mysqli_query($con,$query);
            $total_record=mysqli_num_rows($result);
            $total_page=ceil($total_record / $per_page);
            echo "
              <li>
                <a href='services.php?page=1'>".'First Page'."</a>
              </li>";
              for($i=1; $i<=$total_page;$i++){
                echo "
                <li>
                  <a href='services.php?page=".$i."'>".$i."</a>
                </li>";
              };

              echo "
              <li>
                <a href='services.php?page=total_page'>".'Last Page'."</a>
              </li>";

              
            }
          }
        ?>
        </ul>
      </center>
      
        <?php
         getPcatpro();
         getCatpro();
        ?>
      
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