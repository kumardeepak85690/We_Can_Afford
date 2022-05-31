<div class="panel panel-default sidebar-menu">
    <div class="panel-heading"><!--Panel Heading Start-->
        <center>
            <img src="customer_images/Deepak1.jpg" class="img-responsive">
        </center>
        <br>
        <h3 align="center" class="panel-title">Name : Deepak Kumar</h3>
    </div><!--Panel Heading End-->
    <div class="panel-body"><!--panel body start-->
        <ul class="nav nav-pills nav-stacked"><!--nav nav-pills start-->
            <li class="<?php if(isset($_GET['my_bookings'])){echo "active";}?> ">
                <a href="my_account.php?my_bookings">
                    <i class="fa fa-list"></i> My Booking
                </a>
            </li>
           
            <li class="<?php if(isset($_GET['edit_account'])){echo "active";}?>">
                <a href="my_account.php?edit_account">
                    <i class="fa fa-pencil"></i>  Edit Account
                </a>
            </li>
            <li class="<?php if(isset($_GET['change_password'])){echo "active";}?>">
                <a href="my_account.php?change_password">
                    <i class="fa fa-key"></i>  Change Password
                </a>
            </li>
            <li class="<?php if(isset($_GET['my_wishlist'])){echo "active";}?>">
                <a href="my_account.php?my_wishlist">
                    <i class="fa fa-bookmark"></i>  Wishlist
                </a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
                <a href="my_account.php?pay_offline">
                    <i class="fa fa-money"></i>  Pay Offline
                </a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){echo "active";}?>">
                <a href="my_account.php?delete_account">
                    <i class="fa fa-trash-o"></i>  Delete Account
                </a>
            </li>
            <li class="<?php if(isset($_GET['logout'])){echo "active";}?>">
                <a href="my_account.php?logout">
                    <i class="fa fa-sign-out"></i>  Logout
                </a>
            </li>
        </ul><!--nav nav-pills End-->
    </div><!--panel body end-->
</div>