<?php
include('config.php');
checkSession();
$wallererror = false;
$success = false;

if(isset($_POST['sub']) && $_POST['sub'] =="1"){
    $link = null;
    $link2 = null;
    $link3 = null;
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$dob = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$aadhaar_no = mysqli_real_escape_string($conn,$_POST['aadhaar_no']);
	$mobile_no = mysqli_real_escape_string($conn,$_POST['mobile_no']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
	$status = "In-Progress";
	// fingers 
	$photo1 = mysqli_real_escape_string($conn,$_POST['photo1']);
	$photo2 = mysqli_real_escape_string($conn,$_POST['photo2']);
	$photo3 = mysqli_real_escape_string($conn,$_POST['photo3']);
	$photo4 = mysqli_real_escape_string($conn,$_POST['photo4']);
	$photo5 = mysqli_real_escape_string($conn,$_POST['photo5']);

	
	$fee = 10;
	if($sdata['balance']>=$fee){
        // File Upload 
        if(isset($_FILES['poi']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['poi']['name']) ;
           $file_type=$_FILES['poi']['type'];
           if ($file_type=="application/pdf" ) {
            if(move_uploaded_file($_FILES['poi']['tmp_name'], $targetfolder))
            {
                $link = "https://".$url.$dirname."/".$targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        // Upload POA 
        if(isset($_FILES['poa']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['poa']['name']) ;
           $file_type=$_FILES['poa']['type'];
           if ($file_type=="application/pdf" ) {
            if(move_uploaded_file($_FILES['poa']['tmp_name'], $targetfolder))
            {
                $link2 = "https://".$url.$dirname."/".$targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        // Upload POB 
        if(isset($_FILES['pob']) ){
            $targetfolder = "uploads/";
            $targetfolder = $targetfolder .rand(00000,99999) . basename( $_FILES['pob']['name']) ;
           $file_type=$_FILES['pob']['type'];
           if ($file_type=="application/pdf" ) {
            if(move_uploaded_file($_FILES['pob']['tmp_name'], $targetfolder))
            {
                $link3 = "https://".$url.$dirname."/".$targetfolder;
                
            }else {
            echo "Problem uploading file";
            }
           }else {
            $uploaderror = true;
           
           }
        }
        // ?End File Upload 
		$wres = mysqli_query($conn,"UPDATE users SET balance=balance-$fee WHERE username='$susername'");
		$res = mysqli_query($conn,"INSERT INTO `customers`(`parent`, `appliedby`, `name`, `fname`, `dob`, `aadhaar_no`, `mobile_no`, `email`, `purpose`, `finger1`, `finger2`, `finger3`, `finger4`, `finger5`, `status`,`poi`,`poa`,`pob`) VALUES ('".$sdata['createdby']."','$susername','$name','$fname','$dob','$aadhaar_no','$mobile_no','$email','$purpose','$photo1','$photo2','$photo3','$photo4','$photo5','$status','$link','$link2','$link3')");
		if($res){
			$success =true;
		}
	}else{
		$wallererror = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retailer - Add Customer | <?php echo $webdata['webname']; ?></title>
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
    <style>
    @media print {

        html,
        body {
            display: none;
        }
    }
    </style>
</head>

<body>
    <?php
		 include('nav.php');
		 ?>
    <!-- ============================================================== -->
    <!-- 						Content Start	 						-->
    <!-- ============================================================== -->
    <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Add Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="<?php if($sdata['usertype'] =="Superadmin"){echo "all-customers-data.php";}else{echo "view-customers.php";} ?>"
                class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Add Customer <br>
                        <?php
							if($success == true){
								?>
                        <p style="color:green;font-weight:bold;font-size:16px;">Customer data Submitted Successfully.
                        </p>
                        <?php
							}
							if($wallererror == true){
								?>
                        <p style="color:red;font-weight:bold;font-size:16px;">Wallet Balance Insufficient! Recharge Now.
                        </p>
                        <?php
							}
							?>
                    </div>
                    <div class="card-body">
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal"
                            autocomplete="off" onsubmit="myButton.disabled = true; return true;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" placeholder="Full Name" id="fullname" name="name"
                                            class="form-control" required>
                                    </div>
                                    <input type="hidden" name="sub" value="1">
                                    <div class="col-md-4">
                                        <label for="fathername">Father Name</label>
                                        <input type="text" placeholder="Father Name" id="fathername" name="fname"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date-input1">Date of Birth</label>
                                        <div class="form-group">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                <input type="text" name="birthdate" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input id="aadhaar-no" name="aadhaar_no" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poi">POI</label>
                                        <input type="file" id="poi" name="poi"  class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poa">POA</label>
                                        <input type="file" id="poa" name="poa" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pob">POB</label>
                                        <input type="file" id="pob" name="pob"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" name="mobile_no" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email">Email ID</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Purpose">Purpose</label>
                                        <input type="text" id="purpose" name="purpose" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im1"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic1" name="photo1">
                                                <div style="width:100px;height:auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim1" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="1">Click</button>
                                                <h5 id="q1" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im2"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic2" name="photo2">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim2" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="2">Click</button>
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im3"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim3" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="3">Click</button>
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im4"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic4" name="photo4">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim4" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="4">Click</button>
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="assets/img/sd.jpg" id="im5"
                                                    class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim5" alt="">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-info px-4 mt-1 capture btn-sm w-100"
                                                    data-id="5">Click</button>
                                                <h5 id="q5" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="myButton" class="btn btn-success btn-icon"><i
                                        class="fa fa-floppy-o"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </section>
    <!-- ============================================================== -->
    <!-- 						Content End		 						-->
    <!-- ============================================================== -->
    <!-- Common Plugins -->

    <script src="assets/lib/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="model/js/mfs100-9.0.2.6.js"></script>
    <script type="text/javascript" src="model/js/capture.js"></script>
    <script src="assets/lib/formatter/jquery.formatter.min.js"></script>
    <script>
    $(function() {
        /* BirthDate */
        $('input[name="birthdate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: "DD/MM/YYYY",
            }
        });
    });
    $('#mobileno').formatter({
        'pattern': '+91 {{99}}-{{99}}-{{999999}}',
        'persistent': true
    });
    $('#aadhaar-no').formatter({
        'pattern': '{{9999}} {{9999}} {{9999}}',
        'persistent': true
    });
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
    document.addEventListener("keyup", function(e) {
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
        } catch (err) {}
    }
    setInterval("AccessClipboardData()", 300);
    </script>


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

</body>

</html>