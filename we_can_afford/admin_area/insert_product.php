<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insert Product</title>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
<body>
    <div class="row"><!--Breadcrumb Row start-->
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <l class="fa fa-dashboard"></l>
                    Dashboard / Insert Product
                </li>
            </div>
        </div>
    </div><!--Breadcrumb Row End-->
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><!--panel heading start-->
                    <h3 class="title">
                        <i class="fa fa-money fa-w"></i> Insert Product
                    </h3>
                </div><!--panel heading end-->
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title</label>
                            <input type="text" name="product_title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>
                            <select name="product_cat" class="form-control">
                                <option>Select a Flat Category</option>
                                <?php
                                    $get_p_cats="select * from product_categories";
                                    $run_p_cats=mysqli_query($con,$get_p_cats);
                                    while ($row=mysqli_fetch_array($run_p_cats)) {
                                        $id=$row['p_cat_id'];
                                        $cat_title=$row['p_cat_title'];
                                        echo "<option value='$id' > $cat_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categories</label>
                            <select name="cat" class="form-control">
                                <option>Select Categories</option>
                                <?php
                                    $get_cats="select * from categories";
                                    $run_cats=mysqli_query($con,$get_cats);
                                    while ($row=mysqli_fetch_array($run_cats)) {
                                        $id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "<option value='$id' > $cat_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 1</label>
                            <input type="file" name="product_img1" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2</label>
                            <input type="file" name="product_img2" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3</label>
                            <input type="file" name="product_img3" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <input type="text" name="product_price" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keyword</label>
                            <input type="text" name="product_keyword" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <textarea name="product_desc" class="form_control" rows="6" cols="19"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">

        </div>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>


<?php
if (isset($_POST['submit'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keyword'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"uploads/$product_img1");
    move_uploaded_file($temp_name2,"uploads/$product_img2");
    move_uploaded_file($temp_name3,"uploads/$product_img3");

    $inset_product="INSERT INTO products(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) VALUES('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword')";

    $run_product=mysqli_query($con,$inset_product);

    if($run_product){
        echo "<script>alert('Product Insert Successfully')</script>";
        echo "<script>window.open('insert_product.php')</script>";
    }
}
?>
