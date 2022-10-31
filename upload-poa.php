<?php 
include('config.php');
checkSession();
$success = false;
$uploaderror = false;
$id = mysqli_real_escape_string($conn,$_GET['id']);
if(isset($_POST['sub']) && $_POST['sub'] ==1){
    $targetfolder = "uploads/";
    $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['file']['name']) ;
   $file_type=$_FILES['file']['type'];
   if ($file_type=="application/pdf" ) {
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
    {
        $link = "https://".$url.$dirname."/".$targetfolder;
        $res = mysqli_query($conn,"UPDATE customers SET poa='$link', status='Pending-POB' WHERE id='$id'");
        if($res){
       $success = true;
       ?>
       <script>
        setTimeout(() => {
            window.location.href='view-customers.php';
        }, 1500);
       </script>
       <?php
        }
    }else {
    echo "Problem uploading file";
    }
   }else {
    $uploaderror = true;
   
   }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Upload Proof Of Address  - <?php echo $webdata['webname'] ?></title>
      <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">
      <!-- Common Plugins -->
      <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Vector Map Css-->
      <link href="assets/lib/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
      <!-- Chart C3 -->
      <link href="assets/lib/chart-c3/c3.min.css" rel="stylesheet">
      <link href="assets/lib/chartjs/chartjs-sass-default.css" rel="stylesheet">
      <!-- Sweet Alerts -->
      <link href="assets/lib/sweet-alerts2/sweetalert2.min.css" rel="stylesheet">
      <!-- DataTables -->
      <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
      <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
      <!-- DataTimePicker -->
      <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- Custom Css-->
      <link href="assets/scss/style.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <?php 
   include('nav.php');
   ?>
      <!-- ============================================================== -->      <!-- ============================================================== -->
      <!-- 						Content Start	 						-->
      <!-- ============================================================== -->
      <div class="row page-header">
         <div class="col-lg-6 align-self-center ">
            <h2>Upload Proof of Address</h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item">Upload POA</li>
               <li class="breadcrumb-item active"><?php  echo $sdata['name'];?></li>
            </ol>
         </div>
      </div>
      <section class="main-content">
         <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header card-default">Upload POA 
                  <br>
                  <?php
                  if($success == true){
                     ?>
                     <p style="color:green;font-weight:bold;font-size:16px;">Uploaded Successfully.</p>
                     <?php
                  }else if($uploaderror == true){
                     ?>
                     <p style="color:red;font-weight:bold;font-size:16px;">Only PDF Allowed ! Try Again.</p>
                     <?php
                  }
                  ?>

               </div>
               <div class="card-body">
                  <form method="POST" name="updatepwd" autocomplete="off" onsubmit="return CheckPassword();" enctype="multipart/form-data">
                     <div class="form-group row">
                        <label for="currentpwd" class="col-sm-2 col-form-label">Upload Proof Of Document</label>
                        <div class="col-sm-3">
                           <input type="file" name="file" id="currentpwd" class="form-control"  required>
                        </div>
                     </div>
                   
                           <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ;?>">
                        
                     <input type="hidden" name="sub" value='1'>
					 <div class="form-group row">
                    
					 <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                           <div style="color:red;font-weight:700;"></div>
                        </div>
                     </div>					 
                     <button type="submit" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
                  </form>
               </div>
            </div>
         </div>
         <?php 
   include('footer.php');
   ?>   </section>
      <!-- ============================================================== -->
      <!-- 						Content End		 						-->
      <!-- ============================================================== -->
      <!-- Common Plugins -->
      <script src="assets/lib/jquery/dist/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <script type="text/javascript" src="model/js/capture.js"></script>
      <script src="assets/lib/formatter/jquery.formatter.min.js"></script>
      <script src="assets/lib/bootstrap/js/popper.min.js"></script>
      <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/lib/pace/pace.min.js"></script>
      <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
      <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
      <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
      <script src="assets/js/custom.js"></script>
	  <script type="text/javascript">
		
			       document.addEventListener('contextmenu', event => event.preventDefault());
                document.onkeydown = function(e) {
                  if (e.keyCode == 123) {
                    return false;
                  }
                  if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                  }
                  if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                  }
                  if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                  }
                  if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                  }
                }
				document.addEventListener("keyup", function (e) {
					var keyCode = e.keyCode ? e.keyCode : e.which;
							if (keyCode == 44) {
								stopPrntScr();
							}
						});
				function stopPrntScr() {

							var inpFld = document.createElement("input");
							inpFld.setAttribute("value", ".");
							inpFld.setAttribute("width", "0");
							inpFld.style.height = "0px";
							inpFld.style.width = "0px";
							inpFld.style.border = "0px";
							document.body.appendChild(inpFld);
							inpFld.select();
							document.execCommand("copy");
							inpFld.remove(inpFld);
						}
					   function AccessClipboardData() {
							try {
								window.clipboardData.setData('text', "Access   Restricted");
							} catch (err) {
							}
						}
						setInterval("AccessClipboardData()", 300);
	  	
		</script>
      <!--Chart Script-->
      <script src="assets/lib/chartjs/chart.min.js"></script>
      <script src="assets/lib/chartjs/chartjs-sass.js"></script>
      <!--Vetor Map Script-->
      <script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
      <!-- Chart C3 -->
      <script src="assets/lib/chart-c3/d3.min.js"></script>
      <script src="assets/lib/chart-c3/c3.min.js"></script>
      <!-- Datatables-->
      <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
      <script src="assets/lib/toast/jquery.toast.min.js"></script>
      <script src="assets/js/dashboard.js"></script>
      <!--Sweet Alerts-->
      <script src="assets/lib/sweet-alerts2/sweetalert2.min.js"></script>
   </body>
</html>