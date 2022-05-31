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
          Register<!--a href=""></a-->
        </li>
      </ul>
    </div><!--col-md-12 End-->
    <div class="col-md-3"><!--col-md-3 Start-->
      <?php
        include("includes/sidebar.php")
      ?>
    </div><!--col-md-3 End-->

    <div class="col-md-9"><!--col-mid-9 Start-->

        <div class="box"><!--box Start -->
          <div class="box-header"><!--box-header Start-->
            <center>
              <h2>Customer Registration</h2>

            </center>
            
          </div><!--box-header End-->
          <form action="customer_registration.php" method="post" enctype="multipart-form-data">
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" name="c_name" class="form-control" required="">

            </div>
            <div class="form-group">
              <label>Customer Email</label>
              <input type="text" name="c_email" class="form-control" required=""> 
            </div> 
            <div class="form-group">
              <label>Customer Password</label>
              <input type="password" name="c_password" class="form-control" required=""> 
            </div>  
            <div class="form-group">
              <label>Country</label>
              <input type="text" name="c_country" class="form-control" required=""> 
            </div>   
                        <div class="form-group">
              <label>City</label>
              <input type="text" name="c_city" class="form-control" required=""> 
            </div> 
                        <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="c_contact" class="form-control" required=""> 
            </div> 
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="c_address" class="form-control" required=""> 
            </div>  
 <div class="form-group">
              <label>Image</label>
              <input type="file" name="c_image" class="btn btn-primary">
            </div>  
<div class="text-center">
  <button type="submit" name="submit" class="btn btn-primary" >
  <i class="fa fa-user-md"></i>Register
  </button>
  
</div>

          </form>
      
    </div><!--box End -->
      
    </div><!--col-mid-9 End-->













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

<?php
  if(isset($_POST['submit'])){
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_ip=GetUserIP();

    

    $inset_customer="INSERT INTO customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_ip) VALUES ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_ip')";
    $run_customer=mysqli_query($con,$inset_customer);
    $sel_cust="select * from customers where ip_add='$c_ip'";
    $run_cust=mysqli_query($con,$sel_cust);


    if($run_cust){
      $_SESSION['customer_email']=$c_email;
      echo "<script>alert('Product Insert Successfully')</script>";
      echo "<script>window.open('customer_registration.php')</script>";
    }
  }
  
?>


