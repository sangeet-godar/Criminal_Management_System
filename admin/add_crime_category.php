<?php
session_start();
$bgpic="bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{ 

if(isset($_POST['create']))
{
$category=$_POST['category'];
$description=$_POST['description'];
$sql="INSERT INTO  tbl_crime_category(category_name,description) VALUES('$category','$description')";
$connection->query($sql);
        if($connection->affected_rows == 1 && $connection->insert_id>0){
            $_SESSION['msg']="Data added successfully";
            header('location:manage_category.php');
        }else{
            $_SESSION['error']="Data creation failed";
            header('location:manage_category.php');
            
        }

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Criminal Record Management System | Add Crime Categories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
    body{
        background-image: url(<?php echo $bgpic; ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color:white;">Add Crime category</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
CRIME CATEGORY ENTRY FORM
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Category Name</label>
<input class="form-control" type="text" name="category" autocomplete="off" required />
</div>
<div class="form-group">
<label>Description</label>
<textarea class="form-control" type="text" name="description" autocomplete="off" required></textarea> 
</div>
<button type="submit" name="create" class="btn btn-info">Create </button>

</div>

</form>
</div>
</div>
</div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
