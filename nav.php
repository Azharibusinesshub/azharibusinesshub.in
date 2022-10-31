 <!-- ============================================================== -->
 <!-- 						Topbar Start 							  -->
 <!-- ============================================================== -->
 <div class="top-bar primary-top-bar">
     <div class="container-fluid">
         <div class="row">
             <div class="col">
                 <a class="admin-logo" href="dashboard.php">
                     <h1>
                         <img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10 hidden-xl">
                         <img alt="" src="assets/img/logo-small1.png" width="200px" class="toggle-none hidden-xs">
                     </h1>
                 </a>
                 <div class="left-nav-toggle">
                     <a href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
                 </div>
                 <div class="left-nav-collapsed">
                     <a href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
                 </div>
                 <ul class="list-inline top-right-nav">
                     <li class="dropdown avtar-dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                             <img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="30">
                             <?php echo $sdata['name'] ?> </a>
                         <ul class="dropdown-menu top-dropdown" style="min-width: 12rem;">
                             <li>
                                 <a class="dropdown-item" href="change-password.php"><i class="icon-settings"></i>Change
                                     Password</a>
                             </li>
                             <li class="dropdown-divider"></li>
                             <li>
                                 <a class="dropdown-item" href="logout.php"><i class="icon-logout"></i> Logout</a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- ============================================================== -->
 <!--                        Topbar End                              -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- 						Navigation Start 						-->
 <!-- ============================================================== -->
 <div class="main-sidebar-nav default-navigation">
     <div class="nano">
         <div class="nano-content sidebar-nav">
             <div class="card-body border-bottom text-center nav-profile">
                 <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                 <img alt="profile" class="margin-b-10  " src="assets/img/avtar-2.png" width="80">
                 <p class="lead margin-b-0 toggle-none"><?php echo $sdata['name'] ?> </p>
                 <p class="text-muted mv-0 toggle-none">Welcome</p>
                 <p class="text-danger mv-0 toggle-none"><i class="fa fa-wifi text-success blink_me"></i> IP Address:
                     <?php echo get_client_ip(); ?></p>
             </div>
             <ul class="metisMenu nav flex-column" id="menu">
                 <li class="nav-heading"><span>MAIN</span></li>
                 <li class="nav-item"><a class="nav-link" href="<?php 
                 if($sdata['usertype'] == "Superadmin"){
                    echo "admin.php";
                    }else if($sdata['usertype'] == "Admin"){
                        echo "main-admin.php";
                    }else{
                            echo "dashboard.php";

                        }
                        ?>"><i class="fa fa-home"></i> <span
                             class="toggle-none">Dashboard</a></li>
				<?php 
				if($sdata['usertype']=="Retailer"){
					?>
					 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>
                         <span class="toggle-none">Customer<span class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="add-customer.php">Add Customer</a></li>
                         <li class="nav-item"><a class="nav-link" href="view-customers.php">View Customers Data</a></li>
                     </ul>
                 </li>
					<?php
				}
				?>
                
				 <?php
				 if($sdata['usertype'] =="Superadmin"){
					?>
					 <li class="nav-item"><a class="nav-link" href="balance-tranfer.php"><i class="fa fa-user-plus"></i> <span
                             class="toggle-none">Balance Transfer</a></li>
					 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>
                         <span class="toggle-none">User Management<span class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="add-user.php">Add User</a></li>
                         <li class="nav-item"><a class="nav-link" href="view-users.php">View User List</a></li>
                     </ul>
                 </li>
				 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>
                         <span class="toggle-none">Customer<span class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="add-customer.php">Add Customer</a></li>
                         <li class="nav-item"><a class="nav-link" href="all-customers-data.php">View Customers Data</a></li>
                     </ul>
                 </li>
					<?php
				 }
				 ?>
                 <!-- Data for Mainadmin -->
                 <?php
				 if($sdata['usertype'] =="Admin"){
					?>
					 <li class="nav-item"><a class="nav-link" href="admin-balance-tranfer.php"><i class="fa fa-user-plus"></i> <span
                             class="toggle-none">Balance Transfer</a></li>
					 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>
                         <span class="toggle-none">User Management<span class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="admin-add-user.php">Add User</a></li>
                         <li class="nav-item"><a class="nav-link" href="admin-view-users.php">View User List</a></li>
                     </ul>
                 </li>
				 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i class="fa fa-users"></i>
                         <span class="toggle-none">Customer<span class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="add-customer.php">Add Customer</a></li>
                         <li class="nav-item"><a class="nav-link" href="admin-all-customers-data.php">View Customers Data</a></li>
                     </ul>
                 </li>
					<?php
				 }
				 ?>
                 <li class="nav-item">
                     <a class="nav-link" href="javascript: void(0);" aria-expanded="false"><i
                             class="fa fa-cloud-download"></i> <span class="toggle-none">Download Drivers<span
                                 class="fa arrow"></span></span></a>
                     <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link"
                                 href="https://download.mantratecapp.com/StaticDownload/MFS100Driver_9.2.0.0.exe"
                                 target="_blank">Mantra Driver v9.2.0.0</a></li>
                         <li class="nav-item"><a class="nav-link"
                                 href="https://download.mantratecapp.com/StaticDownload/MFS100ClientService_9.0.3.8.exe"
                                 target="_blank">Mantra Client Service v9.0.3.8</a></li>
                         <li class="nav-item"><a class="nav-link"
                                 href="https://download.mantratecapp.com/StaticDownload/MantraRDService_1.0.4.exe"
                                 target="_blank">Mantra RD Service v1.0.4</a></li>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- ============================================================== -->
 <!-- 						Navigation End	 						-->