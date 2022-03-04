<?php
session_start();
$bgpic = "bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
}
else{
?>
<?php 
$sql = "SELECT * from  tbl_criminal";
$res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }
                ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Criminal Record Management System | All Criminals</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <!-- <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> -->
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
     .searchcriminal{
        float:right;
    }
        td .abc{
            display: block;
      border-width: 1px;
      border-radius: 20px;
      border-color:black;  
      padding: 10px;
      cursor:pointer;
      font-size: 16px;
      background-color: #9fc5e8;
    }
    tr.break td {
  height: 30px;
}
hr.new4 {
  border: 1px solid red;
}
 body{
        background-image: url('<?php echo $bgpic; ?>');
        background-repeat: no-repeat;
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
                <h4 class="header-line" style="color:white;">Criminal Reports</h4>
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
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           CRIMINAL LISTING
                             <div class="searchcriminal">
                            <form action="search.php" method="post">
                           <input type="text" name="valueToSearch" placeholder="Search........" required="please insert values to ">
                           <input type="submit" class="btn btn-primary" name="search" value="Search">
                       </form>
                           </div>
                        </div>
                        
                        
                                <?php foreach ($data as $key=>$criminal) { ?> 
                                <table width="100%" border="0">

                                <tbody>
                                <tr style="height: 82px;">
                                <td  class="center">
                                <img src="<?php echo $criminal['photo'];?>" alt="<?php echo $criminal['photo']; ?>" title="<?php echo $criminal['photo']; ?>" height="300px" width="300px"/>
                                &nbsp;</td>
                                <td style="padding-bottom:100px">
                                <table  class="center">
                                <tbody>
                                 <tr>   
                                <div class="form-group">
                                <label><th>Criminal Name:</th></label>
                                <td><?php echo htmlentities($criminal['name']);?></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                <label><th>Phone:</th></label>
                                <td><?php echo htmlentities($criminal['phone']);?></td>
                                </div>
                                </tr>
                                <tr>
                                <div class="form-group">
                                <label><th>Height:</th></label>
                                <td><?php echo htmlentities($criminal['height']);?></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                <label><th>Weight :</th></label>
                                <td><?php echo htmlentities($criminal['weight']);?></td>
                                </div>
                            </tr>
                            <tr>
                                <td class="center">
                                            <a href="view_details.php?criminalid=<?php echo htmlentities($criminal['criminal_id']);?>"><button class="btn btn-info"><i class="fa fa-info"></i> View More</button> </a></td>
                                </tr>
                                <tr class="break"><td colspan="2"></td></tr>
                                </tbody>
                                </table>
                                </td>
                                
                                </tr>

                                </tbody>

                                </table>
                                <hr class="new4">
                            <?php }?> 
                            
                        </div>

                    </div>
                    <!--End Advanced Tables -->
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
