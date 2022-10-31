<?php
include('config.php');
checkSession();
checkadmin($sdata['usertype']);
$error= false;

$success = false;

if(isset($_POST['sub']) && $_POST['sub'] =="1"){
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$amount = mysqli_real_escape_string($conn,$_POST['amount']);
	$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE username='$username'"));
    $nbalance = $data['balance']+ $amount;
		$res = mysqli_query($conn,"UPDATE users SET balance='$nbalance' WHERE username='$username'");
		if($res){
			$success =true;
            ?>
            <script>
                setTimeout(() => {
                    window.location.href='';
                }, 1500);
            </script>
            <?php
		}else{
            $error= true;
        }
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin - Balance Transfer | <?php echo $webdata['webname']; ?></title>
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
            <h2>Balance Transfer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Balance Transfer</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="view-users.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i>
                View Customers</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                    Balance Transfer <br>
                        <?php
							if($success == true){
								?>
                        <p style="color:green;font-weight:bold;font-size:16px;">Balance Added Successfully.</p>
                        <?php
							}
							if($error == true){
								?>
                        <p style="color:red;font-weight:bold;font-size:16px;">User Not Create Try Again.
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
                                        <label for="FullName">Amount</label>
                                        <input class="form-control" list="browsers" name="username" id="browser">

                                        <datalist id="browsers">
                                            <?php
                                            $qr = mysqli_query($conn,"SELECT * FROM users order by id DESC");
                                            if(mysqli_num_rows($qr)>0){
                                                while($data = mysqli_fetch_assoc($qr)){
                                                    ?>

                                            <option value="<?php echo $data['username'] ?>">
                                                    <?php
                                                }
                                            }
                                            ?>
                                       
                                        </datalist>

                                    </div>
                                    <input type="hidden" name="sub" value="1">
                                    <div class="col-md-4">
                                        <label for="username">Amount</label>
                                        <input type="text" placeholder="Amount" id="username" name="amount"
                                            class="form-control" required>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>

        </div>
        </div>

        <div class="form-group">

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