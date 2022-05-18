<div id="footer"><!--Footer Section Start-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <h4>Page</h4>
                <ul>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="account.php">Login</a></li>
                    <li><a href="account.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!--col-md-3 col-sm-6 End-->

            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <h4>Top</h4>
                <ul>
                <?php
                        $get_p_cats="select * from product_categories";
                        $run_p_cats=mysqli_query($con,$get_p_cats);
                        while($row_p_cat=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id=$row_p_cat['p_cat_id'];
                            $p_cat_title=$row_p_cat['p_cat_title'];
                            echo "<li><a href='services.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
                        }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!--col-md-3 col-sm-6 End-->
            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <h4>Where to Find Us</h4>
                <p>
                    <strong>Wecanafford.com</strong>
                    <br>Kharar
                    <br>Mohali
                    <br>Punjab
                    <br>wecanafford07@gmail.com
                    <br>+91 8569057029  
                </p>
                <a href="contact.php">Go to Contact Us Page</a>
                <hr class="hidden-md hidden-lg">
            </div><!--col-md-3 col-sm-6 End-->
            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <h4>Get the New offers</h4>
                <p class="text-muted">
                    subscribe here for getting new offers
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="user_query" placeholder="E-mail id" class="form-control" required="">
                            <span class="input-group-btn">           
                                <button type="submit" value="subscribe" name="subscribe" class="btn btn-primary">
                                    <i class="fa fa-bell" style="font-size:14px"></i>
                                </button>
                            </span>
                     </div>    
                </form>
                <hr>
                <h4>Stay in Touch</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>
            </div><!--col-md-3 col-sm-6 End-->
        </div>
    </div>
</div><!--Footer Section End-->

<div id="copyright"><!--Copyright Section start-->
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2022 Er. Ashwani Sharma
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Tamplete By: Er. Deepak Kumar 
                <!--a href="wecanafford.com"></a-->
            </p>
        </div>
    </div>
</div><!--Copyright Section End-->