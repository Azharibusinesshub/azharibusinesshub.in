<?php
include('config.php');
checkSession();
checkmainadmin($sdata['usertype']);
$success = false;
$resetsuccess = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Admin - View users Data | <?php echo $webdata['webname']; ?></title>
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
            <h2>View User Data</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View user Data</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="admin-add-user.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i
                    class="fa fa-plus"></i> Create New</a>
        </div>
    </div>
    <section class="main-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-default">
                        View users Data - <?php echo $sdata['name']; ?> <br> 
                       </div>
                    <div class="card-body">
                        <table id="datatable1" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="width:50px">SNo.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    
                                   
                                  
                                    <th>Created By</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $x =0;
                                if(mysqli_num_rows($mainadmiusers)>0){
                                    $x =0;
                                    while($data = mysqli_fetch_assoc($mainadmiusers)){
                                          $x ++;
                                          if($data['id'] == 1){
                                              continue;
                                          }
                                          ?>
                                            <tr>
                                    <td align="center"><?php echo $x;?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['mobile']; ?></td>
                                    
                                    

                                    <td><?php echo $data['createdby']; ?></td>
                                    <?php
                                    
                                    ?>
                                   
                                    <td class="text-center">
                                        <span class="label  label-success"><?php echo $data['balance']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="label  label-success"><?php echo $data['status']; ?></span>
                                    </td>

                                    <!-- <td class="text-center">
                                   <a href="view-users.php?reset=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-success">
                                                        <i title="Reset Password" class="fa fa-refresh"></i>
                                                        </a> 
                                                        <a href="view-users.php?key=<?php echo base64_encode($data['id']); ?>" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                        </a>
                                        


                                    </td> -->
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