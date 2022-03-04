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
    $crime_id = $_GET['crimeid'];
    $criminal= $_POST['criminal'];
    $category = $_POST['category'];
    $prison = $_POST['prison'];
    $court = $_POST['court'];
    $date = $_POST['crime_date'];
    $place = $_POST['crime_place'];
    $description = $_POST['description'];
  $sql="update tbl_crime set crime_date='$date',crime_place='$place',crime_description='$description',criminal_id='$criminal',category_id='$category',prison_id='$prison',court_id='$court' where crime_id=$crime_id";
$connection->query($sql);
if($connection->affected_rows==1){
$_SESSION['updatemsg']="Crime details updated successfully";
header('location:manage_crime.php');
}else{
    $msg = "Data update failed:" .$connection->error;
    header('location:manage_crime.php');
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
    <title>Criminal Record Management System | Edit Crime </title>
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
        background-image: url('<?php echo $bgpic; ?>');
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
                <h4 class="header-line" style="color:white;">Edit Crime Information</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
    CRIME REGISTRATION FORM
</div>
<div class="panel-body">
<form role="form" method="post">
    <?php 
$crime_id=$_GET['crimeid'];
$sql="SELECT tbl_criminal.name,tbl_criminal.criminal_id,tbl_crime_category.category_name,tbl_crime_category.category_id,tbl_court.court_name,tbl_court.court_id,tbl_prison.prison_name,tbl_prison.prison_id,tbl_crime.crime_date,tbl_crime.crime_description,tbl_crime.crime_place,tbl_crime.crime_id from tbl_crime join tbl_criminal on tbl_criminal.criminal_id=tbl_crime.criminal_id join tbl_crime_category on tbl_crime_category.category_id=tbl_crime.category_id join tbl_court on tbl_court.court_id=tbl_crime.court_id join tbl_prison on tbl_prison.prison_id=tbl_crime.prison_id where crime_id=$crime_id";
$res = $connection->query($sql);
$data = $res->fetch_assoc();

if($res->num_rows > 0)
{
?> 
<div class="form-group">
        <label> Select Criminal<span style="color:red;">*</span></label>
        <select class="form-control" name="criminal" required="required">
        <option value="<?php echo htmlentities($data['criminal_id']) ?>"><?php echo htmlentities($criName=$data['name']) ?></option>
            <?php
                $sql1 = "select * from tbl_criminal";
                $res1 = $connection->query($sql1);
                $data1 = [];
                while($a = $res1->fetch_assoc()){
                array_push($data1,$a);
                }
                ?>
                <?php foreach ($data1 as $key=>$criminal) { 
                    if($criName==$criminal['name']){
                        continue;
                }else{
                    ?>
                     <option value="<?php echo htmlentities($criminal['criminal_id']);?>"><?php echo htmlentities($criminal['name']);?></option>
                     <?php 
                }
               
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label> Select Crime Category<span style="color:red;">*</span></label>
        <select class="form-control" name="category" required="required">
        <option value="<?php echo htmlentities($data['category_id']) ?>"> <?php echo htmlentities($catName=$data['category_name']); ?></option>
         <?php
                $sql2 = "select category_id,category_name from tbl_crime_category";
                $res2 = $connection->query($sql2);
                $data2 = [];
                while($b = $res2->fetch_assoc()){
                array_push($data2,$b);
                }
                ?>
                <?php foreach ($data2 as $key=>$category) { 
                    if($catName==$category['category_name']){
                        continue;
                    }else{
                        ?>
                        <option value="<?php echo htmlentities($category['category_id']);?>"><?php echo htmlentities($category['category_name']);?></option>
                        <?php
                    }
                
         } ?>

        </select>
    </div>
    <div class="form-group">
        <label> Select Prison<span style="color:red;">*</span></label>
        <select class="form-control" name="prison" required="required">
        <option value="<?php echo htmlentities($data['prison_id']); ?>"><?php echo htmlentities($priName=$data['prison_name']); ?> </option>
            <?php
                $sql3 = "select prison_id,prison_name from tbl_prison";
                $res3 = $connection->query($sql3);
                $data3 = [];
                while($c = $res3->fetch_assoc()){
                array_push($data3,$c);
                }
                ?>
                <?php foreach ($data3 as $key=>$prison) { 
                    if($priName=$prison['prison_name']){
                        continue;
                    }else{
                        ?>
                        <option value="<?php echo htmlentities($prison['prison_id']);?>"><?php echo htmlentities($prison['prison_name']);?></option>
                        <?php
                    }
                
             } ?>
        </select>
    </div>
    <div class="form-group">
        <label> Select Court<span style="color:red;">*</span></label>
        <select class="form-control" name="court" required="required">
        <option value="<?php echo htmlentities($data['court_id']); ?>"> <?php echo htmlentities($courtName=$data['court_name']); ?></option>
        <?php
                $sql4 = "select court_id,court_name from tbl_court";
                $res4 = $connection->query($sql4);
                $data4 = [];
                while($d= $res4->fetch_assoc()){
                array_push($data4,$d);
                }
                ?>
                <?php foreach ($data4 as $key=>$court) { 
                    if($courtName=$court['court_name']){
                        continue;
                    }else{
                        ?>
                        <option value="<?php echo htmlentities($court['court_id']);?>"><?php echo htmlentities($court['court_name']);?></option>
                        <?php
                    }
                 } ?>
        </select>
    </div>



    <div class="form-group">
        <label>Crime Date<span style="color:red;">*</span></label>
        <input class="form-control" type="Date" name="crime_date" required value="<?php echo htmlentities($data['crime_date']); ?>"/>
    </div>

     <div class="form-group">
         <label>Place<span style="color:red;">*</span></label>
         <input class="form-control" type="text" name="crime_place" autocomplete="off" value="<?php echo htmlentities($data['crime_place']); ?>"   required/>
    </div>


<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<textarea class="form-control" name="description" rows="7" value="<?php echo htmlentities($data['crime_description']); ?>"><?php echo htmlentities($data['crime_description']); ?></textarea>
<p class="help-block">Crime description would help any of the officer to know about the crime</p>
</div>

<input type="hidden" name="old_criminal_id" value="<?php echo $data['criminal_id']; ?>" />
<input type="hidden" name="old_file_name" value="<?php echo $data['photo']; ?>" />
<button type="submit" name="update" class="btn btn-info">Update </button>

</div>

<?php } ?>

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
