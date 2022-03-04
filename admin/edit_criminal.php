<?php
session_start();
$bgpic="bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{ 

if(isset($_POST['update']))
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
$criminal_id=$_GET['criminalid'];
$erroPhoto=$_FILES['photo']['error'];
if($erroPhoto==0){
$old_file_name=$_POST['old_file_name'];
$tmpname = $_FILES['photo']['tmp_name'];
$original_name=$_FILES['photo']['name'];
$newName="uploads/".date('yyyy-mm-dd-hh-ii-ss').$original_name;
move_uploaded_file($tmpname,$newName);
//deleting
unlink($old_file_name);

$sql="update tbl_criminal set name='$name',phone='$phone',height=$height,weight=$weight,email='$email',date_of_birth='$dob',address='$address',city='$city',country='$country',photo='$newName' where criminal_id=$criminal_id";
}else{
    $sql="update tbl_criminal set name='$name',phone='$phone',height=$height,weight=$weight,email='$email',date_of_birth='$dob',address='$address',city='$city',country='$country' where criminal_id=$criminal_id";
}
$connection->query($sql);
if($connection->query($sql)==TRUE){
$_SESSION['updatemsg']="Criminal details updated successfully";
header('location:manage_criminal.php');
}else{
    $_SESSION['error'] = "Data update failed:" .$connection->error;
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
    <title>Criminal Record Management System | Edit Criminal </title>
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
                <h4 class="header-line" style="color:white;">Edit Criminal Information</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
    CRIMINAL REGISTRATION FORM
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
    <?php 
$criminal_id=$_GET['criminalid'];
$sql="SELECT * from tbl_criminal where criminal_id=$criminal_id";
$res = $connection->query($sql);
$data = $res->fetch_assoc();

if($res->num_rows > 0)
{
?> 
<div class="form-group">
<div class="form-group">
<label>Criminal Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="criminal_name" value="<?php echo htmlentities($data['name']); ?>"  required />
</div>
<div class="form-group">
<label>Phone<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="phone" value="<?php echo htmlentities($data['phone']); ?>"  required />
</div>
<div class="form-group">
<label>Height(Feet)<span style="color:red;">*</span></label>
<input class="form-control" type="text" min="3" name="height" value="<?php echo htmlentities($data['height']); ?>"  required />
</div>
<div class="form-group">
<label>Weight(Kg)<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="weight" value="<?php echo htmlentities($data['weight']); ?>"  required />
</div>
<div class="form-group">
<label>Email<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="email" value="<?php echo htmlentities($data['email']); ?>"  required />
</div>
<div class="form-group">
<label>Date of Birth<span style="color:red;">*</span></label>
<input class="form-control" type="Date" name="dob" value="<?php echo htmlentities($data['date_of_birth']); ?>"  required />
</div>
<div class="form-group">
<label>Address<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="address" value="<?php echo htmlentities($data['address']); ?>"  required />
</div>
<div class="form-group">
<label>City<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="city" value="<?php echo htmlentities($data['city']); ?>"  required />
</div>
<div class="form-group">
<label>Country<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="country" value="<?php echo htmlentities($data['country']); ?>"  required />
</div>
<div class="form-group">
<label>Photo</label>
<p> <img src="<?php echo $data['photo']; ?>" width="75" height="75" /></p>
<input class="form-control" type="file" name="photo">
</div>
<input type="hidden" name="old_criminal_id" value="<?php echo $data['criminal_id']; ?>" />
<input type="hidden" name="old_file_name" value="<?php echo $data['photo']; ?>" />
</div>

<?php } ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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
