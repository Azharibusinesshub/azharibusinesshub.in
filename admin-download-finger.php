<?php 
include('config.php');
checkSession();
checkmainadmin($sdata['usertype']);

if(isset($_GET['key']) && $_GET['key'] !=NULL){
	$id = mysqli_real_escape_string($conn,base64_decode($_GET['key']));
	$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customers WHERE id='$id'"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retailer - Edit Customer | <?php echo $webdata['webname']; ?></title>
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

    .watermark img {
        width: 100%;
    }

    .watermark {
        position: relative;
    }

    .watermark::after {
        /* content: "AHKWEB"; */
        position: absolute;
        bottom: 42%;
        right: 10%;
        font-size: 2.4em;
        color: #f8c200;
        font-weight: 700;
        transform: rotate(-42deg);
        letter-spacing: 5px;
    }
    </style>
</head>

<body>
    <?php 
   include('nav.php');
   ?>
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- 						Content Start	 						-->
    <!-- ============================================================== -->
    <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Edit Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Customer </li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="view-customers.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i
                    class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Edit Customer </div>
                    <div class="card-body">
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal"
                            autocomplete="off" onsubmit="myButton.disabled = true; return true;">
                            <div>
                                <a href="<?php echo $data['poi'] ?>" class="btn btn-success mt-4 mb-2"
                                    download="POI">Download POI</a>
                                <a href="<?php echo $data['poa'] ?>" class="btn btn-info mt-4 mb-2"
                                    download="POA">Download POA</a>
                                <a href="<?php echo $data['pob'] ?>" class="btn btn-danger mt-4 mb-2"
                                    download="POB">Download POB</a>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" readonly placeholder="Full Name" id="fullname"
                                            name="fullname" class="form-control" value="<?php echo $data['name']; ?>"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fname">father Name</label>
                                        <input type="text" readonly placeholder="Father Name" id="fname" name="fname"
                                            class="form-control" value="<?php echo $data['fname']; ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date-input1">Date of Birth</label>
                                        <div class="form-group">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                <input readonly type="text" name="birthdate"
                                                    value="<?php echo $data['dob']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input readonly type="text" class="form-control"
                                            placeholder="<?php echo $data['aadhaar_no']; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" readonly name="mobile" type="text" class="form-control"
                                            value="<?php echo $data['mobile_no']; ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email">Email ID</label>
                                        <input type="email" readonly name="email" value="<?php echo $data['email']; ?>"
                                            class="form-control" value="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Purpose">Purpose</label>
                                        <input type="text" readonly id="purpose" name="purpose" class="form-control"
                                            value="<?php echo $data['purpose']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <img src="<?php if($data['finger1']!=NULL){echo $data['finger1'];}else{echo "assets/img/sd.jpg";} ?>"
                                                        id="im1" class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic1" name="photo1">
                                                <div style="width:100px;height:auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim1" alt="">
                                                </div>

                                                <!-- <a class="btn btn-outline-info px-4 mt-1 btn-sm w-100"
                                                    href="<?php echo $data['finger1'] ?>"
                                                    class="btn btn-success mt-4 mb-2" download="Thumb1">Download</a> -->

                                                <h5 id="q1" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <img src="<?php if($data['finger2']!=NULL){echo $data['finger2'];}else{echo "assets/img/sd.jpg";} ?>"
                                                        id="im2" class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic2" name="photo2">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim2" alt="">
                                                </div>
                                                <!-- <a class="btn btn-outline-info px-4 mt-1 btn-sm w-100"
                                                    href="<?php echo $data['finger2'] ?>"
                                                    class="btn btn-success mt-4 mb-2" download="Thumb2">Download</a> -->
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <img src="<?php if($data['finger3']!=NULL){echo $data['finger3'];}else{echo "assets/img/sd.jpg";} ?>"
                                                        id="im3" class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim3" alt="">
                                                </div>
                                                <!-- <a class="btn btn-outline-info px-4 mt-1 btn-sm w-100"
                                                    href="<?php echo $data['finger3'] ?>"
                                                    class="btn btn-success mt-4 mb-2" download="Thumb3">Download</a> -->
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <img src="<?php if($data['finger4']!=NULL){echo $data['finger4'];}else{echo "assets/img/sd.jpg";} ?>"
                                                        id="im4" class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic4" name="photo4">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim4" alt="">
                                                </div>
                                                <!-- <a class="btn btn-outline-info px-4 mt-1 btn-sm w-100"
                                                    href="<?php echo $data['finger4'] ?>"
                                                    class="btn btn-success mt-4 mb-2" download="Thumb4">Download</a> -->
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <img src="<?php if($data['finger5']!=NULL){echo $data['finger5'];}else{echo "assets/img/sd.jpg";} ?>"
                                                        id="im5" class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;"
                                                        id="cim5" alt="">
                                                </div>
                                                <!-- <a class="btn btn-outline-info px-4 mt-1 btn-sm w-100"
                                                    href="<?php echo $data['finger5'] ?>"
                                                    class="btn btn-success mt-4 mb-2" download="Thumb5">Download</a> -->
                                                <h5 id="q5" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
									<button type="submit" name="myButton" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
							</div> -->
                        </form>
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