<?php
include('config.php');
checkSession();
checkmainadmin($sdata['usertype']);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Main Admin - Dashboard | <?php echo $webdata['webname']; ?></title>
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
      <!-- Custom Css-->
      <link href="assets/scss/style.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	  <style>
	   @media print {
            html,body {
                display: none;
            }
        }
		</style>
   </head>
   <body>
     <?php
     include('nav.php');
     ?>    <!-- ============================================================== -->
      <!-- 						Content Start	 						-->
      <!-- ============================================================== -->
      <div class="row page-header">
         <div class="col-lg-6 align-self-center">
            <h2>Dashboard</h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item">Dashboard</li>
               <li class="breadcrumb-item active"><?php echo $sdata['name'] ?>	</li>
            </ol>
         </div>
		          <div class="col-lg-6 align-self-center text-right">
            <a href="admin-add-user.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Create New User</a>
         </div>
		       </div>
      <section class="main-content">
                  <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header card-default">
                     <h3>Welcome to Main Admin Panel - <?php echo $sdata['name'] ?>	</h3>
                  </div>
                  <div class="card-body">
				  <div class="row">
							<div class="col">
								<div class="widget bg-info padding-15">
									<div class="row row-table">
										<div class="col-xs-8 padding-15 text-center">
											<h4 class="mv-0"><?php echo $sdata['balance']; ?></h4>
											<div class="margin-b-0 ">Wallet Amount</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
																<div class="widget bg-info padding-15">
									<div class="row row-table">
										<div class="col-xs-8 padding-15 text-center">
											<h4 class="mv-0"><?php echo $ttlmadminu; ?></h4>
											<div class="margin-b-0 ">Total Users</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
																<div class="widget bg-warning padding-15">
									<div class="row row-table">
										<div class="col-xs-8 padding-15 text-center">
											<h4 class="mv-0"><?php echo $allmacres ; ?></h4>
											<div class="margin-b-0">Total Applications</div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col">
																<div class="widget bg-success padding-15">
									<div class="row row-table">
										<div class="col-xs-8 padding-15 text-center">
											<h4 class="mv-0"><?php echo $macomall + $macomall1; ?></h4>
											<div class="margin-b-0"> Total Completed</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
																<div class="widget bg-danger padding-15">
									<div class="row row-table">
										<div class="col-xs-8 padding-15 text-center">
											<h4 class="mv-0"><?php echo $marejall + $marejall1; ?></h4>
											<div class="margin-b-0">Total Rejected</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                  </div>
               </div>
            </div>
         </div>
                  	<?php 
                        include('footer.php');
                     ?>
         
         </section>
      <!-- ============================================================== -->
      <!-- 						Content End		 						-->
      <!-- ============================================================== -->
      <!-- Common Plugins -->
      <script src="assets/lib/jquery/dist/jquery.min.js"></script>
      <script type="text/javascript" src="model/js/capture.js"></script>
      <script src="assets/lib/bootstrap/js/popper.min.js"></script>
      <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/lib/pace/pace.min.js"></script>
      <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
      <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
      <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
      <script src="assets/js/custom.js"></script>
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
      <script>
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
	  		
       function blinker() {
			$('.blink_me').fadeOut(500);
			$('.blink_me').fadeIn(500);
		}
		setInterval(blinker, 1000);
      </script>
      <script type="text/javascript" src="model/js/option.js"></script>
      <script type='text/javascript' src="model/js/validation.js"></script>
      <script type="text/javascript" src="model/js/student_register.js"></script>
      <script type="text/javascript" src="model/js/mfs100-9.0.2.6.js"></script>
   </body>
</html>