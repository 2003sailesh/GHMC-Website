<?php
session_start();
$conn = mysqli_connect('localhost','root');
if($conn){
    echo "connection successful";
}else{
    echo "no connection";
}
$dbb = mysqli_select_db($conn,'ghmc');
if(isset($_POST['submit'])){
    $username = $_POST['adminname'];
    $password = $_POST['adminpassword'];
    $sqll = "select * from admin where adminname='$username' and adminpassword='$password'";
    $quu=mysqli_query($conn,$sqll);
    $roww = mysqli_num_rows($quu);
        if($roww == 1){
            echo "login successfull";
            $_SESSION['adminname']=$username;
            header('location: adminpanel.php');
        }else{
            echo "Login failed";
            header('location: member.php');
        }
  }
  

?>