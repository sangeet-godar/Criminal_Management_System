<?php
$bgpic = "bg1.jpg";
session_start();
// include('includes/config.php');
if(isset($_POST['login'])){
    $err = [];
if(isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username']) != '')
{
    $username = trim($_POST['username']);

}
else
{
    $err['Username'] = "Enter username";
}
if(isset($_POST['password']) && !empty($_POST['password']))
{
    $password = $_POST['password']; 

}
else
{
    $err['Password'] = "Enter password";
}

if(count($err) == 0)
{

    $login = false;

    //connect to mysql database
    require_once "includes/config.php";
    
    $sql = "select * from tbl_admin where username='$username' and password='$password'";

    $result = $connection ->query($sql);

    if($result ->num_rows>0)
    {
        $login = true;
    }

    if($login == true)
     {

        //start session
        session_start();

        //store data into session
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;


        //redirect  and while displaying redirect echo or html tag are not to be used
        header("location:dashboard.php");
     }
     else
     {
        echo "<script>alert('Invalid Details')</script>";
     }

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
    <title>Criminal Record Management System</title>
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
body {
background-image: url('<?php echo $bgpic;?>');
}

</style>
</head>
<body>
    <!------MENU SECTION START-->
    <div class="navbar navbar-inverse set-radius-zero " >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >

                    <img src="assets/img/logo1.png" />
                </a>

            </div>

        </div>
    </div>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
                            <p style="color:#f7f7f7">Hello</p>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line" style="color:white;">ADMIN LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-12" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post" >

<div class="form-group">
<label>Username</label>
<input class="form-control" type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"  />
<?php if(isset($err['Username'])){?>
    <span style="color:red"> <?php 
                              echo $err['Username']; ?></span>
                              <?php
   
                                } 

 ?>
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password"/>
<?php if(isset($err['Password'])){
                             ?>
    <span style="color:red" class="error"> <?php 
                              echo $err['Password']; ?></span>
                              <?php
                                } 

 ?>
</div>
 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->  
<div class="col-md-12">
<h4 class="header-line" style="color:white;">CRIMINAL LISTING</h4>
</div>          
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           CRIMINAL INFORMATION
                           <div class="searchcriminal">
                           
                            <form action="search.php" method="post">
                           <input type="text" name="valueToSearch" placeholder="Search........">
                           <input type="submit" class="btn btn-primary" name="search" value="Search">
                       </form>
                           </div>
                        </div>
                        <?php 
                        require_once 'includes/config.php';
$sql = "SELECT * from  tbl_criminal";
$res = $connection->query($sql);
                $data = [];
                while($a = $res->fetch_assoc()){
                array_push($data,$a);
                }
                ?>
                                <?php foreach ($data as $key=>$criminal) { ?> 
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
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
