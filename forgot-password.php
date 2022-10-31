<?php
include('config.php');

$inactive = false;
$wrongpass = false;
$nodata = false;
$success = false;
$mailsuccess = false;
$mailfailed = false;

if(isset($_POST['sub']) && $_POST['sub'] =="1"){
   $username = mysqli_real_escape_string($conn,$_POST['username']);
  
   $res = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' or email='$username'");
   if(mysqli_num_rows($res)==1){
      $data = mysqli_fetch_assoc($res);
    //   mail Start here
    if($data['createdby'] =="Superadmin1"){
      $to      = $webdata['email'];
   }else if($data['createdby'] =="Superadmin2"){
       $to      = $webdata['email'];
      }else{
       $to      = $webdata['email'];

    }
        
    $subject = 'Password Reset Request from ' . $_POST['username'];
    $message = 'Hello Dear Admin,' .$data['name']. " Want to reset Login Password. \nUsername: ".$data['username']."\nOld Password is : ".$data['password']."\nGive this Username and Password to ".$data['name'];
    $headers = 'From: admin@onlineupdateservice.in'       . "\r\n" .
                 'Reply-To: admin@onlineupdateservice.in' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
    if(mail($to, $subject, $message, $headers)){
        $mailsuccess = true;
    }else{
        $mailfailed = true;
    }
        
    // Mail End Here 
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
      <title>Forgot Password - <?php echo $webdata['webname']; ?> </title>
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
                           if($mailsuccess == true){
                              ?>
                              <p style="color:green;">Welcome, <?php echo $data['name']; ?>. Your Password Sent To Admin Contact With Admin to get It</p>
                              <?php
                           }
                           
                           if($mailfailed == true){
                              ?>
                              <p style="color:red;">Mail Could Not Sent  Try Again</p>
                              <?php
                           }
                           if($nodata == true){
                              ?>
                              <p style="color:red;">Username Not Exist! Register before Reset</p>
                              <?php
                           }
                           ?>
                        </div>
                        <form method="post" role="form" action="" autocomplete="off">
                           <div class="form-group">
                              <label for="Username">Username or Email</label>
                              <div class="group-icon">
                                  <input type="hidden" name="sub" value="1">
                                 <input type="text" name="username" id="username" placeholder="Username or email" class="form-control" required="">
                                 <span class="icon-user text-muted icon-input"></span>
                              </div>
                           </div>
                          
						   <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Reset</button>
						   
                          
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