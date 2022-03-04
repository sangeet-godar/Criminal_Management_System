<?php
session_start();
$bgpic="bg1.jpg";
require_once 'includes/config.php';
 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Criminal Record Management System | View Details</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    .card {
    padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: left;
}

.titlebib {
  color: grey;
  font-size: 18px;
}
body {
background-image: url('<?php echo $bgpic;?>');
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
                <h4 class="header-line" style="color:white;">Details</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
    <?php 
$criminal_id=$_GET['criminalid'];
$sql="SELECT * from tbl_criminal where criminal_id=$criminal_id";
$res = $connection->query($sql);
$data = $res->fetch_assoc();?>
<?php echo $data['name'] ?>
</div>
 
<div class="panel-body">

<?php
if($res->num_rows > 0)
{
?> 
<div class="card">
  <img src="<?php echo $data['photo']; ?>" alt="<?php echo $data['name']; ?>" style="width:100%">
  <div class="form-group">
    <div class="form-group">
<label>ID No :</label>
<?php echo htmlentities($data['criminal_id']);?>
</div>
<label>Criminal Name :</label>
<?php echo htmlentities($data['name']);?>
</div>

<div class="form-group">
<label>Phone :</label>
<?php echo htmlentities($data['phone']);?>
</div>


<div class="form-group">
<label>Email :</label>
<?php echo htmlentities($data['email']);?>
</div>

<div class="form-group">
<label>Height :</label>
<?php echo htmlentities($data['height']);?>
</div>
<div class="form-group">
<label>Weight :</label>
<?php echo htmlentities($data['weight']);?>
</div>
<div class="form-group">
<label>Address :</label>
<?php echo htmlentities($data['address']);?>
</div>
<div class="form-group">
<label>City :</label>
<?php echo htmlentities($data['city']);?>
</div>
<div class="form-group">
<label>Country :</label>
<?php echo htmlentities($data['country']);?>
</div>
</div>
<?php } ?>
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

