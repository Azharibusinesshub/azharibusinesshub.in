<?php
//  database Details 
$hostname = "localhost";
$username = "u126496415_onlineupdate";
$password = "^4vKYSr0Pcsad@sdgfghfhg";
$database = "u126496415_onlineupdate";
$conn = mysqli_connect($hostname,$username,$password,$database);

if(!$conn){
    echo "database Not Connected";
}


