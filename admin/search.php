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
    <title>Criminal Record Management System | Search Results</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="criminals.css">
    <style>
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
.recordinfo{
	position:absolute;
	/*border:1px solid black;*/
	top:-58px;
	color:white;
	font-size:17px;
	left:180px;
	font-family: sans-serif;
	background-color: none;
	/*display:block;*/
}
hr.new4 {
  border: 1px solid red;
}
body {
background-image: url('<?php echo $bgpic;?>');
}    

</style>
</head>
<body>
	<?php include 'includes/header.php' ?>
    

<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="col-md-12">
<h4 class="header-line" style="color:white;">SEARCH RESULTS</h4>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
 <?php
 	require_once('includes/config.php');
                            if(isset($_POST['search']))
                            {
                                $valueToSearch = $_POST['valueToSearch'];
                                // search in all table columns
                                // using concat mysql function
                                if(!empty($valueToSearch)){
                                $sql = "SELECT * FROM tbl_criminal WHERE CONCAT(`name`, `phone`, `height`, `weight`, `email`, `date_of_birth`, `address`, `city`, `country`) LIKE '%".$valueToSearch."%'";
                                
                               $result=mysqli_query($connection,$sql);
                               $GLOBALS['cnt']=0;
                               if($row=mysqli_num_rows($result)>0){?>
                              
						<?php 
                               while($criminal= mysqli_fetch_assoc($result)){ ?>

                               	 <table>
                                <tbody>
                                <tr>
                                  <td rowspan="5" class="noborder"><img src="<?php echo $criminal['photo'];?>" alt="<?php echo $criminal['photo']; ?>" title="<?php echo $criminal['photo']; ?>" height="250px" width="250px"/>
                                </td>
                            </tr>
                                  <tr>
                                 <th class="tbl">Criminal Name:</th>
                                    <td class="tbldata"><?php echo htmlentities($criminal['name']); ?></td>
                                  </tr>
                                  <tr>
                                    <th class="tbl">Phone:</th>
                                    <td class="tbldata"><?php echo htmlentities($criminal['phone']); ?></td>
                                  </tr>
                                  <tr>
                                    <th class="tbl">Height:</th>
                                    <td class="tbldata"><?php echo htmlentities($criminal['height'])." feet"; ?></td>
                                  </tr>
                                  <tr>
                                    <th class="tbl">Weight:</th>
                                    <td class="tbldata"><?php echo htmlentities($criminal['weight']); ?></td>
                                   
                                  </tr>
                                  
                                   
                                  
                                   
                                </tbody>
                                <!-- <tr class="break"><td colspan="2"></td></tr> -->
                                </table>
                                 <div class="viewmore">
                                            <a href="view_details.php?criminalid=<?php echo htmlentities($criminal['criminal_id']);?>"><button class="btn btn-info"><i class="fa fa-info"></i> View More</button> </a></td>
                                </div>
                           
                                <hr class="new4">
                                <?php 
                               $GLOBALS['cnt']=$GLOBALS['cnt']+1;}?>
       							<div class="recordinfo "><b><?php echo "( ". $cnt ." RECORDS  FOUND )";?></b></div><?php
                                } 
                                else{
                                	?>
                                	<tr><h4 class="header-line" style="color:red;">Records Not Found!</h4></tr>
                                	<?php  
                                }?>
                            </div>
                        </div>
                           <?php }
                        }?>
                    </div>
                </div>
            </div>
            </body>
            </html>