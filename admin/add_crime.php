<?php
session_start();
$bgpic = "bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}  
if (isset($_POST['btnSave'])) {
    $criminal= $_POST['criminal'];
    $category = $_POST['category'];
    $prison = $_POST['prison'];
    $court = $_POST['court'];
    $date = $_POST['crime_date'];
    $place = $_POST['crime_place'];
    $description = $_POST['description'];
    $sql = "insert into tbl_crime(crime_date,crime_place,crime_description,criminal_id,category_id,prison_id,court_id) values('$date','$place','$description','$criminal','$category','$prison','$court')";

        $connection->query($sql);
        if($connection->affected_rows == 1 && $connection->insert_id>0){
            $_SESSION['msg']="Data added successfully";
            // $msg = "Data creation successfully"; 

            header('location:manage_crime.php');
        }else{
            $_SESSION['error']="Data creation failed";
            $msg = "Data creation failed:" .$connection->error;
             header('location:manage_crime.php');
        }
    }
    # code...
  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Criminal Record Management System | Add Crime</title>
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
                <h4 class="header-line" style="color:white;">Crime Registration Form</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Crime Information
</div>
<div class="panel-body">
<form role="form" method="post">
    <div class="form-group">
        <label> Select Criminal<span style="color:red;">*</span></label>
        <select class="form-control" name="criminal" required="required">
        <option value=""> Select Criminal</option>
            <?php
                $sql = "select criminal_id,name from tbl_criminal";
                $res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }
                ?>
                <?php foreach ($data as $key=>$criminal) { ?>
                <option value="<?php echo htmlentities($criminal['criminal_id']);?>"><?php echo htmlentities($criminal['name']);?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label> Select Crime Category<span style="color:red;">*</span></label>
        <select class="form-control" name="category" required="required">
        <option value=""> Select Category</option>
         <?php
                $sql = "select category_id,category_name from tbl_crime_category";
                $res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }
                ?>
                <?php foreach ($data as $key=>$category) { ?>
                <option value="<?php echo htmlentities($category['category_id']);?>"><?php echo htmlentities($category['category_name']);?></option>
            <?php } ?>

        </select>
    </div>
    <div class="form-group">
        <label> Select Prison<span style="color:red;">*</span></label>
        <select class="form-control" name="prison" required="required">
        <option value=""> Select Prison</option>
            <?php
                $sql = "select prison_id,prison_name from tbl_prison";
                $res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }
                ?>
                <?php foreach ($data as $key=>$prison) { ?>
                <option value="<?php echo htmlentities($prison['prison_id']);?>"><?php echo htmlentities($prison['prison_name']);?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label> Select Court<span style="color:red;">*</span></label>
        <select class="form-control" name="court" required="required">
        <option value=""> Select Court</option>
        <?php
                $sql1 = "select court_id,court_name from tbl_court";
                $res1 = $connection->query($sql1);
                $data1 = [];
                while($b = $res1->fetch_assoc()){
                array_push($data1,$b);
                }
                ?>
                <?php foreach ($data1 as $key=>$court) { ?>
                <option value="<?php echo htmlentities($court['court_id']);?>"><?php echo htmlentities($court['court_name']);?></option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label>Crime Date<span style="color:red;">*</span></label>
        <input class="form-control" type="Date" name="crime_date" required />
    </div>

     <div class="form-group">
         <label>Place<span style="color:red;">*</span></label>
         <input class="form-control" type="text" name="crime_place" autocomplete="off"   required="required" />
    </div>


<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<textarea class="form-control" name="description" rows="7"></textarea>
<p class="help-block">Crime description would help any of the officer to know about the crime</p>
</div>


<button type="submit" name="btnSave" class="btn btn-info">Add </button>

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

