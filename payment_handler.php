<?php 
include('../includes/config.php');
if(isset($_GET['client_txn_id'] )!=null && $_GET['txn_id']){
    $client_txn_id = $_GET['client_txn_id'];
    $res = mysqli_query($conn,"SELECT * FROM qrtxn WHERE txnid='$client_txn_id' AND status='pending'");
    $dbdata = mysqli_fetch_assoc($res);
    $dbtxn_id = $dbdata['txnid'];
    
    $date = $dbdata['txn_date'];
    $key = "20db159e-dc24-4b68-9a90-c94cda95ec19";    // you can get your key from https://merchant.upigateway.com/user/api_credentials
	
     $content = json_encode(array(
	 	"key"=> $key,
	 	"client_txn_id"=> "$dbtxn_id",
        "txn_date"=> "$date", 
	 ));
	 $url = "https://merchant.upigateway.com/api/check_order_status";
	 $curl = curl_init($url);
	 curl_setopt($curl, CURLOPT_HEADER, false);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($curl, CURLOPT_HTTPHEADER,
	 		array("Content-type: application/json"));
	 curl_setopt($curl, CURLOPT_POST, true);
	 curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
	 $json_response = curl_exec($curl);
	 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	 if ( $status != 200 ) {
	 	// You can handle Error yourself.
	 	die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	 }
	 curl_close($curl);
	 $response = json_decode($json_response, true);
	 if($response["status"] == true){
        // print_r($response["data"]);
        // echo "<br>";
        // echo $response["data"]['status'];
	    if($response["data"]['status'] == "success"){
	            $pgtxn_id = $_GET['txn_id'];
	            
    	        $sl= "SELECT * FROM qrtxn WHERE txnid='$dbtxn_id' AND status='pending'";
                $pres = mysqli_query($conn,$sl);
                $pdata = mysqli_fetch_assoc($pres);
                $puser = $pdata['emailid'];
                // Select User 
                $ud = mysqli_query($conn,"SELECT * FROM usertable WHERE emailid='$puser' ");
                $udata = mysqli_fetch_assoc($ud);
                // Update Balance if pending
                if($dbdata['status'] =="pending"){
                        $sql = "UPDATE `qrtxn` SET `txn_id`='$pgtxn_id',`status`='success' WHERE txnid='$dbtxn_id'";
                		$q = mysqli_query($conn,$sql);
                		$addbal = $response["data"]['amount'];
                		$nbalance = $udata['walletamount'] + $addbal;
                		$updatewallet = mysqli_query($conn,"UPDATE `usertable` SET `walletamount`='$nbalance' WHERE `emailid`='$puser'");
                		if($updatewallet){
                		    ?>
                		    <form method="post" action="wallet.php" name="f1">
                    			<input type="hidden" name="success" value="true">
                    			
                    		<script type="text/javascript">
                    			document.f1.submit();
                    		</script>
                		    <?php
                		}
                }else{
                    ?>
                    	<form method="post" action="wallet.php" name="f2">
            			<input type="hidden" name="success" value="true">
            			
                		<script type="text/javascript">
                			document.f2.submit();
                		</script>
                    <?php
                }
               
        		
        		if(!isset($_SESSION)){
        			session_start();
        		 $_SESSION['username'] = $udata['userid'];
                 $_SESSION['email'] = $udata['emailid'];
                 $_SESSION['mobile'] = $udata['phone'];
                 $_SESSION['status'] = $udata['status'];
                 $_SESSION['usertype'] = $udata['usertype'];
		}
	    }else{
	        ?>
	        <form method="post" action="wallet.php" name="f3">
            			<input type="hidden" name="failed" value="true">
            			
            		<script type="text/javascript">
            			document.f3.submit();
            		</script>
	        <?php
	    }
	 }else{
	 	echo $response['msg'];
	 }

    
}
?>