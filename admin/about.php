<?php
session_start();
$bgpic="bg1.jpg";
require_once 'includes/config.php';
if(!isset($_SESSION['username'])) { //if not yet logged in
   header('location: index.php');// send to login page
   exit;
} 
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Criminal Record Management System | Admin Dash Board</title>
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
                <h4 class="header-line" style="color:white;">ABOUT US</h4>
                
                            </div>

        </div>
             
             <div class="row">
              <!-- <img src="./assets/img/logo1.png" alt="Smiley face" width="900" height="100px"> -->
              <div class="panel panel-info">
                <h4 class="header-line">About system</h4>
              The Federal Bureau of Investigation (FBI) is the domestic intelligence and security service of the United States and its principal federal law enforcement agency. Operating under the jurisdiction of the United States Department of Justice, the FBI is also a member of the U.S. Intelligence Community and reports to both the Attorney General and the Director of National Intelligence.[3] A leading U.S. counter-terrorism, counterintelligence, and criminal investigative organization, the FBI has jurisdiction over violations of more than 200 categories of federal crimes.[4][5]

Although many of the FBI's functions are unique, its activities in support of national security are comparable to those of the British MI5 and the Russian FSB. Unlike the Central Intelligence Agency (CIA), which has no law enforcement authority and is focused on intelligence collection abroad, the FBI is primarily a domestic agency, maintaining 56 field offices in major cities throughout the United States, and more than 400 resident agencies in smaller cities and areas across the nation. At an FBI field office, a senior-level FBI officer concurrently serves as the representative of the Director of National Intelligence.[6][7]

Despite its domestic focus, the FBI also maintains a significant international footprint, operating 60 Legal Attache (LEGAT) offices and 15 sub-offices in U.S. embassies and consulates across the globe. These foreign offices exist primarily for the purpose of coordination with foreign security services and do not usually conduct unilateral operations in the host countries.[8] The FBI can and does at times carry out secret activities overseas,[9] just as the CIA has a limited domestic function; these activities generally require coordination across government agencies.

The FBI was established in 1908 as the Bureau of Investigation, the BOI or BI for short. Its name was changed to the Federal Bureau of Investigation (FBI) in 1935.[10] The FBI headquarters is the J. Edgar Hoover Building, located in Washington, D.C.
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
