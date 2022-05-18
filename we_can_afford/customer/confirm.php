<?php
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
        				
        			We Can Afford
        			</a>
      
        		</div>
        		<div class="col-md-6">


                  <ul class="menu">
                  	<li>
                  		<a href="../customer_registration.php"> Register
                  		</a>
                  	</li>
                  	<li class="active">
                  		<a href="my_account.php"> My Account
                  		</a>
                  	</li>
                     <li>
                  		<a href="../booking.php"> Booking
                  		</a>
                  	</li>
                  	<li>
                  		<a href="../login.php"> Login
                  		</a>
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
                    
                    <a href="../index.php">Home</a>

                  </li>
                  <li >
                    <a href="../services.php">Services</a>
                  </li>
                  <!-- <li class="active">
                    <a href="my_account.php">My Account</a>
                  </li> -->
                  <li >
                    <a href="../about.php">About us</a>
                  </li>
                  <li >
                    <a href="../Contactus.php">Contact us</a>
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

               <div class="collaspe clearfix" id="search">

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
        <li><a href="home.php">home</a></li>
        <li>
          My Account<!--a href=""></a-->
        </li>
      </ul>
    </div><!--col-md-12 End-->
    <div class="col-md-3"><!--col-md-3 Start-->
      <?php
        include("includes/sidebar.php")
      ?>
    </div><!--col-md-3 End-->      
<div class="col-md-9">
  
  <div class="box">
    <h1 align="center">Please confirm your payment</h1>
    <form action="confirm.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Invoice Number
          
        </label>
        <input type="text" class="form-control" name="invoice_number" required="">
      </div>
       <div class="form-group">
        <label>Amount
          
        </label>
        <input type="text" class="form-control" name="amount" required="">
      </div>
       <div class="form-group">
        <label>Select Payment Mode
        </label>
        <select>
          <option>Bank Transfer</option>
          <option>GooglePay</option>
          <option>PhonePay</option>
          <option>PayTm</option>
        </select>
        <input type="date" class="form-control" name="date" required="">
      </div>
      <div class="form-group">
        <label>Tranction Number
          
        </label>
        <input type="text" class="form-control" name="trfr_number" required="">
      </div>
       <div class="form-group">
        <label>Payment Date
          
        </label>
        <input type="text" class="form-control" name="invoice_number" required="">
      </div>
       <div class="text-center">
        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
          Confirm Payment
        </button>
         
       </div>
      </div>
      
    </form>
    
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