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
             </div> <!navbar header start>
             <div class="navbar-collapse collapse" id="navigation"><!--navbar collaspe start-->
              <div class="padding-nav">
                <ul class="nav navbar-nav navbar-left">
                  <li class="active">
                    
                    <a href="index.php">Home</a>

                  </li>
                  <li >
                    <a href="Services.php">Services</a>
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
                
              </div><!--padding nav end>
              <!a href="tiffin.php" class="btn btn-primary navbar-btn right"
                i class="fa-thin fa-fork-knife"/i
              a -->
              <div class="navbar-collapse collapse right " ><!--toggle search start-->
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
                    
               </div><!--toggle search start-->
                </form>
                 
               </div>
               
             </div> 
               
             </div>
		</div>
		
	</div>
	
</div><!--navbar-default end-->
<div class="container" id="slider">
  <div class="col-md-12">
    <div class="carousel slide" id="myCarousel" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="myCarousel" data-slide-to="1"></li>
         <li data-target="myCarousel" data-slide-to="2"></li>
         <li data-target="myCarousel" data-slide-to="3"></li>
         </ol>
      <div class="carousel-inner"><!--carousel-inner start --><!--php block start-->
        <?php
          $get_slider="select * from slider LIMIT 0,1";
          $run_slider=mysqli_query($con,$get_slider);
          while ($row=mysqli_fetch_array($run_slider)){
            $slider_name=$row['slider_name'];
            $slider_image=$row['slider_image'];
            echo "<div class='item active'>
                    <img src='admin_area/slider_images/$slider_image'>
                  </div>
                  ";
          }
        ?>
        <?php
          $get_slider="select * from slider LIMIT 1,3";
          $run_slider=mysqli_query($con,$get_slider);
          while ($row=mysqli_fetch_array($run_slider)){
            $slider_name=$row['slider_name'];
            $slider_image=$row['slider_image'];
            echo "<div class='item'>
                    <img src='admin_area/slider_images/$slider_image'>
                  </div>
                  ";
          }
        ?>
      </div><!--carousel-inner end --><!--php block end-->
         
         <a href="#myCarousel" class="left carousel-control" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left" ></span>
           <span class="sr-only">Previous</span>
         </a>
 
 <a href="#myCarousel" class="right carousel-control" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right" ></span>
           <span class="sr-only">Next</span>
         </a>


      </div><!--carousel-slide end -->

    </div><!-- -->
    
  </div><!-- end -->
  
</div><!--container close-->

<div id="">
  
    <div class="container">
      <div class="same-height-row">
        <div class="col-sm-4">
          <div class="box same-height">
            <div class="icon">
            <i class="fa fa-heart"></i>
            </div>
            <h3><a href="#"> BEST PRICES</h3>
              <p>You can check on all other sites about the prices and than compare with us. </p>

          </div>
        </div>
 <div class="col-sm-4">
          <div class="box same-height">
            <div class="icon">
            <i class="fa fa-heart"></i>
            </div>
            <h3><a href="#"> 100% COUSTOMER STATISFACTION.</h3>
         <P> We give our 100% effort.</P>

          </div>
        </div>
         <div class="col-sm-4">
          <div class="box same-height">
            <div class="icon">
            <i class="fa fa-heart"></i>
            </div>

            <h3><a href="#">WE LOVE OUR COUSTOMER</h3>
              <P> We are known to provide best posssible services ever.</P>

          </div>
        </div>

        
      </div>
    </div>
  
  <div>
    
  </div>
</div>
<div id="hot">
  <div class="box">
  <div class="container">
    <div class="col-md-12">
      <h2> LATEST OFFER</h2>
    </div>
    </div>
  </div>
  
</div>
<!hot end>
<div id="content" class="container">
  <div class="row">
    <?php
      getPro();
    ?>
  </div>
  
</div>

<!--Footer Start-->
<?php
include("includes/footer.php")
?>
<!--Footer End-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>



