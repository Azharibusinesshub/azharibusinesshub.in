<?php
include('config.php');

$inactive = false;
$wrongpass = false;
$nodata = false;
$success = false;


if(isset($_POST['sub']) && $_POST['sub'] =="1"){
   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $usertype = mysqli_real_escape_string($conn,$_POST['usertype']);
   $res = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND usertype='$usertype'");
   if(mysqli_num_rows($res)==1){
      $data = mysqli_fetch_assoc($res);
      if($data['status'] =="active"){
         if($_POST['password'] == $data['password'] ){
            $success = true;
            $_SESSION['username'] = $data['username'];
            if($data['usertype'] == "Retailer"){
               ?>
            <script>
               window.location.href='dashboard.php';
            </script>
            <?php
            }else if($data['usertype'] == "Superadmin"){
               ?>
            <script>
               window.location.href='admin.php';
            </script>
            <?php
            }else if($data['usertype'] == "Admin"){
               ?>
            <script>
               window.location.href='main-admin.php';
            </script>
            <?php
            }
         }else{
            $wrongpass = true;
         }
      }else{
         $inactive = true;
      }
   }else{
      $nodata = true;
   }
}
?>
<!DOCTYPE html>
<html lang="en">
   

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $webdata['webname']; ?> - Login</title>
      <!-- Common Plugins -->
      <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom Css-->
      <link href="assets/scss/style.css" rel="stylesheet">

      <style type="text/css">
         html,body{
         height: 100%;
         }
	   @media print {
            html,body {
                display: none;
            }
        }
      </style>
   </head>
   <body class="bg-light">
      <div class="misc-wrapper">
         <div class="misc-content">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-sm-6 col-xl-4 ">
                     <div class="misc-header text-center">
                        <img alt="BioThumb" src="assets/img/loginlogo.jpg" height="180px" class="logo-icon margin-r-10">
                        <!--img alt="" src="assets/img/logo-dark.png" class="toggle-none hidden-xs"-->
                     </div>
                     <div class="misc-box">
                        <div>
                           <?php
                           if($success == true){
                              ?>
                              <p style="color:green;">Welcome, <?php echo $data['name']; ?>. you Are Logged In Successfully</p>
                              <?php
                           }
                           if($inactive == true){
                              ?>
                              <p style="color:red;">Your Account In Inactive Contact With Admin</p>
                              <?php
                           }
                           if($wrongpass == true){
                              ?>
                              <p style="color:red;">Username or Password Incorrect</p>
                              <?php
                           }
                           if($nodata == true){
                              ?>
                              <p style="color:red;">Username Not Exist! Register before Login</p>
                              <?php
                           }
                           ?>
                        </div>
                        <form method="post" role="form" action="" autocomplete="off">
                           <div class="form-group">
                              <label for="Username">Username</label>
                              <div class="group-icon">
                                 <input type="text" name="username" id="username" placeholder="Username" class="form-control" required="">
                                 <span class="icon-user text-muted icon-input"></span>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="Password">Password</label>
                              <div class="group-icon">
                                 <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                 <span class="icon-lock text-muted icon-input"></span>
                              </div>
                           </div>
						   <div class="form-group">
                              <label for="Role">Role</label>
                                 <select class="form-control" name="usertype" id="role">
								 <option value="Superadmin">Superadmin</option>
								 <option value="Admin">Admin</option>
								 <option value="Retailer">Retailer</option>
                                 </select>
                           </div>
						   <div class="form-group">
						   						   </div>
                           <div class="clearfix">
                              <div class="float-left">
                                 <div class="checkbox checkbox-primary margin-r-5">
                                    <a href="forgot-password.php" >Forgot Password</a>
                                 </div>
                              </div>
                              <input type="hidden" name="sub" value="1">
                              <div class="float-right">
                                 <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Login</button>
                              </div>
                           </div>
                           <hr>
						   <p class="text-center"></p>
                        </form>
                     </div>
                     <div class="text-center misc-footer">
                        <p>Copyright &copy; 2022 <?php echo $webdata['webname']; ?>. All Rights Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Common Plugins -->
      <script src="assets/lib/jquery/dist/jquery.min.js"></script>
      <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/lib/pace/pace.min.js"></script>
      <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
      <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
      <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
      <script src="assets/js/custom.js"></script>
     
   </body>

</html>