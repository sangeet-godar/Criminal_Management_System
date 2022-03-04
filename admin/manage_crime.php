<?php
session_start();
$bgpic = "bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{
if(isset($_GET['del']))
{
$crime_id=$_GET['del'];
$sql = "delete from tbl_crime WHERE crime_id=$crime_id";
$result=mysqli_query($connection,$sql);
if($result==TRUE){
$_SESSION['msg']="Crime record deleted";
header('location:manage_crime.php');
}else{
    $_SESSION['msg2']="Cant be deleted";
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
    <title>Criminal Record Management System | Manage Crime</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h4 class="header-line" style="color:white;">Crime Reports</h4>
    </div>
     <div class="row">
    <?php if(isset($_SESSION['error']))
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php }
unset($_SESSION['error']);
 ?>

<?php if(isset($_SESSION['msg']))
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php }
unset($_SESSION['msg']);
 ?>
<?php if(isset($_SESSION['updatemsg']))
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php }
unset($_SESSION['updatemsg']);
 ?>


   <?php if(isset($_SESSION['delmsg']))
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } 
unset($_SESSION['delmsg']);
?>


</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Crime Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Image</th>
                                            <th>Criminal Name</th>
                                            <th>Crime Date</th>
                                            <th>Place</th>
                                            <th>Prison</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
 $sql = "SELECT * from tbl_crime";
$res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }?>
<?php foreach ($data as $key=>$crime){?>                                   
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($crime['crime_id']);?></td>
                                             <td> <?php 
                                                $criminalID=$crime['criminal_id'];
                                                $sql1="SELECT * from tbl_criminal where criminal_id=$criminalID";
                                                $res1 = mysqli_query($connection,$sql1);
                                                $data1 = mysqli_fetch_assoc($res1);    
                                                ?>                                        
                                                <img src="<?php echo $data1['photo'];?>" alt="<?php echo $data1['photo']; ?>" title="<?php echo $data1['photo']; ?>" height="70px" width="70px"/>
                                                </td>
                                            <td class="center">
                                                <?php 
                                                $criminalID=$crime['criminal_id'];
                                                $sql2="SELECT * from tbl_criminal where criminal_id=$criminalID";
                                                $res2 = mysqli_query($connection,$sql2);
                                                $data2 = mysqli_fetch_assoc($res2);                                            
                                            echo htmlentities($data2['name']);
                                                ?>

                                            </td>
                                            <td class="center"><?php echo htmlentities($crime['crime_date']);?></td>
                                            <td class="center"><?php echo htmlentities($crime['crime_place']);?></td>
                                            <td class="center">
                                                <?php 
                                                $prison_id =$crime['prison_id'];
                                                $sql3="SELECT * from tbl_prison where prison_id=$prison_id";
                                                $res3 = mysqli_query($connection,$sql3);
                                                $data3 = mysqli_fetch_assoc($res3);                                            
                                            echo htmlentities($data3['prison_name']);
                                                ?>
                                            </td>
                                            <td class="center">
                                                 <?php 
                                                $category_id =$crime['category_id'];
                                                $sql4="SELECT * from tbl_crime_category where category_id=$category_id";
                                                $res4 = mysqli_query($connection,$sql4);
                                                $data4 = mysqli_fetch_assoc($res4);                                            
                                            echo htmlentities($data4['category_name']);
                                                ?>
                                            </td>
                                            <td class="center"><?php echo htmlentities($crime['crime_description']);?></td>
                                            <td class="center">
                                            <a href="edit_crime.php?crimeid=<?php echo htmlentities($crime['crime_id']);?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button> 
                                          <a href="manage_crime.php?del=<?php echo htmlentities($crime['crime_id']);?>" onclick="return confirm('Are you sure you want to delete record of crime id <?php echo htmlentities($crime['crime_id']
                                          )  ?>?');" >  <button class="btn btn-danger" ><i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>