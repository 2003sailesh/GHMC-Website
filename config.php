<?php
$servername="localhost";
$username = "root";
$password = "";
$database = "ghmc";

$c=mysqli_connect($servername,$username,$password,$database);
if($c){
    /*echo " database connected succcessfully";*/
}else{
    die("connection failed:".mysqli_connect_error());
}

?>