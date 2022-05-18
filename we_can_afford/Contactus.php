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
                  <li class="active">
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
          Contact Us<!--a href=""></a-->
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
              <h2>Contact Us</h2>
<p class="text-muted">If you have any question please feel free to contact us, our customer service center is working for you 24/7. </p>
            </center>
            
          </div><!--box-header End-->
          <form action="Contactus.php>" method="post">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required="">

            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" required=""> 
            </div>  
            <div class="form-group">
              <label>Subject</label>
              <input type="text" name="submit" class="form-control" required=""> 
            </div>  
 <div class="form-group">
              <label>Message</label>
             <textarea class="form-control" name="message" ></textarea> 
            </div>  
<div class="text-center">
  <button type="submit" name="submit" class="btn btn-primary" >
  <i class="fa fa-user-md"></i>Send Message
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
  $senderName=$_POST['name'];
  $senderEmail=$_POST['email'];
  $senderSubject=$_POST['subject'];
  $senderMessage=$_POST['message'];
  $receiverEmail="dk705437@gmail.com";
  mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);

/*Customer mail */
  $email=$_POST['email'];
  $subject="Welecome to our Website";
  $msg="I shall get you soon, Thanks for sending email";
  $from="dk705437@gmail.com";
  mail($email,$subject,$msg,$from);
  echo "<h2 align='center'>Your mail sent</h2>";
}

?>