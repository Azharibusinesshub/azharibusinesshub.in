<?php
include('database.php');
include('session.php');
 $url = $_SERVER['SERVER_NAME'];
// echo $pageurl = basename($_SERVER['REQUEST_URI']);
 $dirname = dirname($_SERVER['SCRIPT_NAME']);
// get Web Settings Data 
$webdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM settings WHERE status=1"));
if(isset($_SESSION['username'])){
    $susername = $_SESSION['username'];
    $sdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE username='$susername'"));
    
    // Get All List
    $howmanycsret = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers WHERE appliedby='$susername'"));
    $howmanycompret = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers WHERE appliedby='$susername' AND status='completed'"));
    $howmanyrejpret = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers WHERE appliedby='$susername' AND status='rejected'"));
    // get All Cust data
    $cdata = mysqli_query($conn,"SELECT * FROM customers WHERE appliedby='$susername' order by id DESC");


// get data For Admin
$totalusers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$totalapplications = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers"));
$totalcompleted = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers WHERE status='Completed'"));
$totalrejected = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customers WHERE status='Rejected'"));
$adminusers = mysqli_query($conn,"SELECT * FROM users  order by id DESC");

$alldata = mysqli_query($conn,"SELECT * FROM customers  order by id DESC");

// Get Main Admin data 
$mainadmiusers = mysqli_query($conn,"SELECT * FROM users WHERE createdby='$susername'  order by id DESC");
$ttlmadminu = mysqli_num_rows($mainadmiusers);

$macres = mysqli_query($conn,"SELECT * FROM customers WHERE parent='$susername' or appliedby='$susername' order by id DESC");
$allmacres = mysqli_num_rows($macres);

$marejres = mysqli_query($conn,"SELECT * FROM customers WHERE   parent='$susername'  AND status='Rejected'");
$marejall = mysqli_num_rows($marejres);
$marejres1 = mysqli_query($conn,"SELECT * FROM customers WHERE   appliedby='$susername'  AND status='Rejected'");
$marejall1 = mysqli_num_rows($marejres1);

$macomares = mysqli_query($conn,"SELECT * FROM customers WHERE parent='$susername'  AND status='Completed'");
$macomall = mysqli_num_rows($macomares);
$macomares1 = mysqli_query($conn,"SELECT * FROM customers WHERE appliedby='$susername'  AND status='Completed'");
$macomall1 = mysqli_num_rows($macomares1);


$macalldata = mysqli_query($conn,"SELECT * FROM customers WHERE parent='$susername' or appliedby='$susername' order by id DESC");
}
// / Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
// Check Session
function checkSession() {
    if(!isset($_SESSION['username'])){
        ?>
        <script>
            window.location.href='login.php';
        </script>
        <?php
    }
    return false;
}
// Check is Admin 
function checkadmin($usertype) {
    if($usertype !="Superadmin"){
        ?>
        <script>
           window.location.href='dashboard.php';
        </script>
        <?php
        die();
    }
}
// Check MainAdmin
function checkmainadmin($usertype) {
    if($usertype !="Admin"){
        ?>
        <script>
           window.location.href='dashboard.php';
        </script>
        <?php
        die();
    }
}

?>
