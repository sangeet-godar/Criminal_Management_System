<?php
session_start();
$bgpic="bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
$msg="";
if(isset($_POST['create']))
{
$name=$_POST['criminal_name'];
$phone=$_POST['phone'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];

$tmpname=$_FILES['photo']['tmp_name'];
$original_name=$_FILES['photo']['name'];
$newName="uploads/".date('yyyy_mm_dd_hh_ii_ss_').$original_name;
move_uploaded_file($tmpname,$newName);
$sql = "insert into tbl_criminal(name,phone,height,weight,email,date_of_birth,address,city,country,photo) values('$name','$phone','$height','$weight','$email','$dob','$address','$city','$country','$newName')";

 $connection->query($sql);
        if($connection->affected_rows == 1 && $connection->insert_id>0){
            $_SESSION['msg']="Data added successfully";
			header('location:manage_criminal.php');

        }else{
            $_SESSION['error']="Data creation failed";
            header('location:manage_criminal.php');
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
    <title>Criminal Record Management System | Add Criminal</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    body {
background-image: url('<?php echo $bgpic;?>');
background-repeat: no-repeat;
background-size: cover;
}</style>
    
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color:white;">Add Criminal</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Criminal Information
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Criminal Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="criminal_name" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Phone<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="phone" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Height(Feet)<span style="color:red;">*</span></label>
<input class="form-control" type="number" name="height" step="0.01" min="4" max="10" required />
<?php echo $msg; ?>
</div>
<div class="form-group">
<label>Weight(Kg)<span style="color:red;">*</span></label>
<input class="form-control" type="number" name="weight"  step="0.01" min="30" required />
</div>
<div class="form-group">
<label>Email<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="email" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Date of Birth<span style="color:red;">*</span></label>
<input class="form-control" type="Date" name="dob" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Address<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="address" autocomplete="off"  required />
</div>
<div class="form-group">
<label>City<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="city" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Country<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="country" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Photo</label>
<input class="form-control" type="file" name="photo"/>
</div>
<button type="submit" name="create" class="btn btn-info">Add </button>

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

