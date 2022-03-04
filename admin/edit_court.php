<?php
session_start();
$bgpic = "bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{ 

if(isset($_POST['update']))
{
$court_name=$_POST['courtName'];
$court_type=$_POST['type'];
$description=$_POST['description'];
$place=$_POST['place'];
$court_id=$_GET['courtid'];

$sql="update tbl_court set court_type='$court_type',court_name='$court_name',place='$place',description='$description' where court_id=$court_id";
$connection->query($sql);
if($connection->affected_rows==1){
$_SESSION['updatemsg']="Court details updated successfully";
header('location:manage_court.php');
}else{
    $_SESSION['error'] = "Data update failed:" .$connection->error;
    header('location:manage_court.php');
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
    <title>Criminal Record Management System | Edit Court </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style type="text/css">
    body{
        background-image: url('<?php echo $bgpic; ?>');
        background-size: cover;
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
                <h4 class="header-line" style="color:white;">Edit Court Information</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
    COURT ENTRY FORM
</div>
<div class="panel-body">
<form role="form" method="post">
    <?php 
$court_id=$_GET['courtid'];
$sql="SELECT * from tbl_court where court_id=$court_id";
$res = $connection->query($sql);
$data = $res->fetch_assoc();

if($res->num_rows > 0)
{
?> 
<div class="form-group">
<label>Court Name</label>
<input class="form-control" type="text" name="courtName" value="<?php echo htmlentities($data['court_name']); ?>" required />
</div>
<div class="form-group">
<label>Court Type</label>
<input class="form-control" type="text" name="type" value="<?php echo htmlentities($data['court_type']); ?>" required />
</div>
<div class="form-group">
<label>Place</label>
<input class="form-control" type="text" name="place" value="<?php echo htmlentities($data['place']); ?>" required />
</div>
<div class="form-group">
<label>Description</label>
<textarea class="form-control" type="text" name="description"  required><?php echo htmlentities($data['description']); ?></textarea> 
</div>

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
