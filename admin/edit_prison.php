<?php
session_start();
$bgpic= "bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{ 

if(isset($_POST['update']))
{
$prison_name=$_POST['prison'];
$description=$_POST['description'];
$place=$_POST['place'];
$prison_id=$_GET['prisonid'];

$sql="update tbl_prison set prison_name='$prison_name',place='$place',description='$description' where prison_id=$prison_id";

if($connection->query($sql)==TRUE){
    $sql1="SELECT * From tbl_prison";
    $result=$connection->query($sql1);
    while($data=$result->fetch_assoc()){
        if($data['prison_name']==$prison_name){
            header('location:manage_prison.php');
            exit;
        }else{
    
$_SESSION['updatemsg']="Prison details updated successfully";
header('location:manage_prison.php');
}
}}else{
    $_SESSION['error']= "Data update failed".$connection->error;
    header('location:manage_prison.php');
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
    <title>Criminal Record Management System | Edit Prison  </title>
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
                <h4 class="header-line" style="color:white;">Edit Prison Information</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
    PRISON ENTRY FORM
</div>
<div class="panel-body">
<form role="form" method="post">
    <?php 
$prison_id=$_GET['prisonid'];
$sql="SELECT * from tbl_prison where prison_id=$prison_id";
$res = $connection->query($sql);
$data = $res->fetch_assoc();

if($res->num_rows > 0)
{
?> 
<div class="form-group">
<label>Prison Name</label>
<input class="form-control" type="text" name="prison" value="<?php echo htmlentities($data['prison_name']); ?>" required />
</div>
<div class="form-group">
<label>Location</label>
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
