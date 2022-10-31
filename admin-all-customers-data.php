<?php
include('config.php');
checkSession();
checkmainadmin($sdata['usertype']);
$success = false;

// if(isset($_GET['key']) && $_GET['key']!=NULL){
//     $id = base64_decode($_GET['key']);
//     $res = mysqli_query($conn,"DELETE FROM customers WHERE id='$id'");
//     if($res){
//         $success = true;
        
//     }
// }

?>
  <!-- <script>
            setTimeout(() => {
                window.location.href='all-customers-data.php';
            }, 1200);
        </script> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Admin - View Customers Data | <?php echo $webdata['webname']; ?></title>
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
    <link href="assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
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
    <!-- ============================================================== -->
    <!-- 						Content Start	 						-->
    <!-- ============================================================== -->
    <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>View Customers Data</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Customers Data</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="add-customer.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i
                    class="fa fa-plus"></i> Create New</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-default">
                     <?php if($success ==true){
                        ?>
                        <p style="color:green;font-size:16px;font-weight:bold;">Customer Data Deleted Success!</p>
                        <?php
                     } ?>   View Customers Data - <?php echo $sdata['name']; ?> </div>
                    <div class="card-body">
                        <table id="datatable1" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="width:50px">SNo.</th>
                                    <th >Applied By</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Age</th>
                                    <th>Aadhaar No.</th>
                                    <th>Mobile No.</th>
                                    <th>Email ID</th>
                                    <th>Note</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $x =0;
                                if(mysqli_num_rows($macalldata)>0){
                                    $x =0;
                                    while($data = mysqli_fetch_assoc($macalldata)){
                                          $x ++;
                                          ?>
                                            <tr>
                                    <td align="center"><?php echo $x;?></td>
                                    <td><?php echo $data['appliedby']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['fname']; ?></td>
                                    <td><?php echo $data['dob']; ?></td>
                                    <td><?php echo $data['aadhaar_no']; ?></td>
                                    <td><?php echo $data['mobile_no']; ?></td>
                                    <td><?php echo $data['email']; ?></td>

                                    <td><?php echo $data['remark']; ?></td>
                                    <?php
                                    $timestamp = strtotime($data['date']);
                                    $new_date_format = date('Y-m-d H:i:s', $timestamp);
                                    ?>
                                    <td><?php echo $data['date']; ?></td>
                                    <td class="text-center">
                                        <span class="label <?php if($data['status'] == 'In-Progress' || $data['status'] == 'Pending-POI' || $data['status'] == 'Pending-POA' || $data['status'] == 'Pending-POB' ){echo "label-warning";}else if($data['status'] == 'Completed'){echo "label-success";}else if($data['status'] == 'Rejected'){echo "label-danger";} ?> label-danger"><?php echo $data['status']; ?></span>
                                    </td>

                                    <td class="text-center">
                                    <a href="main-admin-edit-c.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                        </a>
                                    <a href="finger/admin-index.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-success">
                                    <img src="assets/img/icon.png" height="20px" alt="H">
                                                        </a>
                                    <a href="finger/admin-fingerNew.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-success">
                                    <img src="assets/img/icon.png" height="20px" alt="H">
                                                        </a>
                                    <a href="admin-download-finger.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-eye"></i>
                                                        </a>
                                    <a href="admin-all-customers-data.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                        </a>
                                        


                                    </td>
                                </tr>
                                            <?php
                                    }

                                }
                                
                                   ?>
                                
                                


                            </tbody>

                        </table>
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
    <script src="assets/lib/bootstrap/js/popper.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/pace/pace.min.js"></script>
    <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
    <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
    <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- Datatables-->
    <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/lib/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/lib/datatables/jszip.min.js"></script>
    <script src="assets/lib/datatables/pdfmake.min.js"></script>
    <script src="assets/lib/datatables/vfs_fonts.js"></script>
    <script src="assets/lib/datatables/buttons.html5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable1').DataTable({
            dom: 'Bfrtip',
            pageLength: 100,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
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
</body>

</html>