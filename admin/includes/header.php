<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">

                    <img src="assets/img/logo1.png" />
                </a>

            </div>
<?php if(isset($_SESSION['username']))
{
?> 
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
            </div>
        <?php }?>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <?php if(isset($_SESSION['username']))
{
?> 
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                           
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Administration  <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_crime.php">Add Crime</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="add_criminal.php">Add Criminal</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_court.php">Add Court</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_prison.php">Add Prison</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add_crime_category.php">Add Crime Category</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Reports <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_crime.php">Crime Report</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_criminal.php">Criminal Report</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_court.php">Court Report</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_prison.php">Prison Report</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage_category.php">Crime Category Report</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="all_criminals.php".php">All Criminals</a></li>

                                </ul>
                            </li>
                            
                             <li><a href="about.php">About Us</a></li>
                    
  <li><a href="change-password.php">Change Password</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php }else{ ?>
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
<?php } ?>