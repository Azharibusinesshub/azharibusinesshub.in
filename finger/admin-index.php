<?php include('../config.php');
checkSession();
checkmainadmin($sdata['usertype']);

        if (isset($_GET['key'])) {
//$searchid =$_GET['searchid'];
            $searchid = mysqli_real_escape_string($conn, base64_decode($_GET['key']));

            mysqli_set_charset($conn, "utf8");
            $a = mysqli_query($conn, "SELECT * FROM customers Where id='$searchid'");
            $b = mysqli_fetch_array($a);
        }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Fingers</title>
    <script src="https://kit.fontawesome.com/40b99cb665.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->


    <!-- Custom styles for this template -->


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js.download"></script>


    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    @media (min-width: 768px) {}

    .center_text {
        text-decoration: underline;
        text-align: center;
    }

    .pro_custem {

        display: none;
    }





    @keyframes loading-1 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }

    @keyframes loading-2 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }
    }

    @keyframes loading-3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    }

    @keyframes loading-4 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg);
        }
    }

    @keyframes loading-5 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(126deg);
            transform: rotate(126deg);
        }
    }

    @media only screen and (max-width: 990px) {
        .progress {
            margin-bottom: 20px;
        }
    }
    .rounded mx-auto d-block{
        width: 96px;
        
    }

    .billing_list {
        flex: 1;
        justify-content: center;
        align-content: center;
        align-items: center;
        padding: 9px;
    }

    .check {
        background-color: #4CAF50;
        color: #e9d3d3;
    }

    .check a {
        color: white;
    }

    .ban a {
        color: white;
    }

    .ban {
        background-color: #b4372e;
    }

    .small_chip {
        font-size: 10px;
        padding-left: 4px;
        padding-right: 4px;
        border-radius: 5px;
        flex: 1;

    }
    </style>
    <style>
    .alert_g {
        position: fixed;
        top: 0px;
        z-index: 9999999999;
    }
    img{
        filter: brightness(0) invert(1);

    }
    </style>
</head>

<body id="page-top" class="sidebar-toggled" >
    <style>
    .alert_g {
        position: fixed;
        top: 0px;
        z-index: 9999999999;
    }
    </style>
    <div class=" pro_custem" id="pro_gress">
        <div class="  pr_inner">
            <p><img style="display: block; margin-left: auto; margin-right: auto;"
                    src="img/sd.gif" width="70" /></p>

        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->



        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->


                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href="../all-customers-data.php"><i class="fa fa-home"></i></a>
                    </button>

                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href="../all-customers-data.php"><i class="far fa-list-alt"></i>
                    </button>

                    <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href=""><i class="fas fa-plus"></i></a>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">

                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>


                    <!-- <form class="form-inline my-md-0">
            <div class="input-group">
                          <button class="btn btn-success text-white">Balance :50</button>
                            
            </div>
          </form> -->



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->
                       
                      

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                                                  
                                                  
                <!-- Begin Page Content -->
                
                <div class="container-fluid  " id="wark_area">
                    <br>
                    <br>
                                    
                    <div id="carouselExampleControls" class="carousel slide bg-info" data-interval="false">
                       
                        									
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img class="rnd rounded mx-auto d-block  "
                                src="<?php echo $b['finger1'] ?>"style="height: 260px;" alt="fist photo">
                                <br>
                            <img class=" rnd rounded mx-auto d-block  "
                                src="<?php echo $b['finger2'] ?>" style="height: 260px;" alt="Second photo">
                            </div>
                            <!-- rounded -->
                            <!-- <div class="carousel-item">
                                
                            </div> -->
                            <div class="carousel-item">
                                <img class="rnd rounded mx-auto d-block  "
                                src="<?php echo $b['finger3'] ?>" style="height: 260px;" alt="Third photo">
                                <br>
                              
                                <img class="rnd rounded mx-auto d-block  "
                                src="<?php echo $b['finger4'] ?>" style="height: 260px;" alt="fourth photo">
                            </div>
                            <!-- <div class="carousel-item">
                              
                            </div> -->
                            <div class="carousel-item">
                                <img class="rnd rounded mx-auto d-block  "
                                src="<?php echo $b['finger5'] ?>" style="height: 260px;" alt="fourth photo">
                            </div>
                        </div>

                       
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button "
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon " aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        
                    </div>
                    

                    <!-- <h2>
                        <span style="color: #ff6600;" onclick="addsize()">+</span>
                        &nbsp; &nbsp; &nbsp;

                        <span style="color: #ff6600;" onclick="subsize()">-</span>

                    </h2> -->
                    <h2>
                        <span style="color: #ff6600;" onclick="addheight()">+</span>
                        &nbsp; &nbsp; &nbsp;

                        <span style="color: #ff6600;" onclick="subheight()">-</span>

                    </h2>
                    <!-- <div>
                    <a href="<?php echo $b['finger1'] ?>" class="btn btn-success mt-4 mb-2" download="Thumb1">Download 1st Thumb</a>
                    <a href="<?php echo $b['finger2'] ?>" class="btn btn-info mt-4 mb-2" download="Thumb2">Download 2nd Thumb</a>
                    <a href="<?php echo $b['finger3'] ?>" class="btn btn-danger mt-4 mb-2" download="Thumb3">Download 3rd Thumb</a>
                    <a href="<?php echo $b['finger4'] ?>" class="btn btn-success mt-4 mb-2" download="Thumb4">Download 4th Thumb</a>
                    <a href="<?php echo $b['finger5'] ?>" class="btn btn-danger mt-4 mb-2" download="Thumb5">Download 5th Thumb</a>
                      
                    </div> -->
                    <span id="pix"></span>

                    <script>
                    function addsize() {

                        $('.rnd').css({
                            'width': ($('.rnd').width() + 1) + 'px'
                        })

                        $('#pix').html($('.rnd').width());

                    }

                    function subsize() {
                        $('.rnd').css({
                            'width': ($('.rnd').width() - 1) + 'px'
                        })
                        $('#pix').html($('.rnd').width());
                    }


// Height 
                    function addheight() {

                        $('.rnd').css({
                            'height': ($('.rnd').height() + 1) + 'px'
                        })

                        $('#pix').html($('.rnd').height());

                    }

                    function subheight() {
                        $('.rnd').css({
                            'height': ($('.rnd').height() - 1) + 'px'
                        })
                        $('#pix').html($('.rnd').height());
                    }
                    </script>


                    <style>
                    #wrapper #content-wrapper {
                        background-color: #000000;
                        width: 100%;
                        overflow-x: hidden;
                    }

                    .bg-white {
                        background-color: #000 !important;
                    }

                    .carousel-inner {
                        background: #000;
                    }

                    img.rounded.mx-auto.d-block {
                        background: #000;
                        filter: grayscale(-100%);
                        filter: invert(1);
                        --value: 100%;
                        /* width: 22.5%; */
                        transform: scaleX(-1);
                    }
                    </style>




                </div>
                <!-- /.container-fluid -->
            </div><!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- progress bar  -->
    <div class="container" style="    display: none;">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="progress blue">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">70%</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="progress yellow">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">65%</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end progress bar  -->

    <!-- Start progreesss passer -->




    <!-- End pagerese -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">�</span>
                    </button>
                </div>
                <!-- containt modal -->
                <div class="modal-body">Are You Sure To 'Logout'?</div>

                <!--  End containt modal  -->

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="logout.php">Yes</a>
                </div>
            </div>
        </div>
    </div>


    <!-- End Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js.download"></script>
    <script src="js/bootstrap.bundle.min.js.download"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js.download"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js.download"></script>

    <!-- Page level plugins -->
    <script src="js/Chart.min.js.download"></script>

    <!-- Page level custom scripts -->
    <script src="js/chart-area-demo.js.download"></script>
    <script src="js/chart-pie-demo.js.download"></script>




    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js.download"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js.download"></script>
    <script>
    $(document).click(function(e) {
        if (!$(e.target).is('.collapse')) {
            $('.collapse').collapse('hide');
        }
    });


    $(window).on('popstate', function(ev) {


    });




    function liveLoad(pageurl, type, parameters) {

        console.log(pageurl);
        $(".pro_custem").slideToggle();


        $('.navbar-nav').toggleClass("sidebar-toggled");

        $.ajax({
            url: pageurl,
            type: 'Post',
            data: {
                p: 'k'
            },
            success: function(data) {

                $(".pro_custem").slideToggle();

                $('#wark_area').html(data);
            },
            error: function(e) {

                console.log(e.responseText);
                // $('#content').html(e.responseText);
            }
        });
    }

    $(document).ready(function() {
        $('#exampled').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
    
</body>

</html>