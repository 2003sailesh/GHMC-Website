<?php include("config.php");
$id=$_GET['id'];
$stat=$_GET['stat'];
$updatequery1 = "UPDATE problem SET stat=$stat WHERE id=$id";
mysqli_query($c,$updatequery1);
echo "successfully changed";

?>