<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

$conn = mysqli_connect("localhost","root","","ghmc");

if(isset($_POST['submit'])){
$id = rand();
$name = $_POST['name'];
$paddr = $_POST['paddr'];
$anumber = $_POST['anumber'];
$number = $_POST['number'];
$email = $_POST['email'];
$dprob = $_POST['dprob'];
$ufile = $_FILES['ufile']['name'];
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'problems.ghmc@gmail.com';                     //SMTP username
    $mail->Password   = 'qhmkpubvkwpgndkh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('problems.ghmc@gmail.com', 'GHMC');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reported Problem ID Number';
    $mail->Body    = "Name: $name <br> Number: $number <br> Id: $id <br> You can track your complaint in the portal using ID <br> THANK YOU!!";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$query  = "INSERT INTO problem (id,name,paddr,anumber,number,email,dprob,ufile) VALUES ('$id','$name','$paddr','$anumber','$number','$email','$dprob','$ufile')";
$query_run = mysqli_query($conn , $query);
if($query_run){
    move_uploaded_file($_FILES["ufile"]["tmp_name"], "upload/.".$_FILES["ufile"]["name"]);
    $_SESSION['status'] = "Image stored successfully";
    header('Location: report.php');
}else{
    $_SESSION['status'] = "Image not stored";
    header('Location: report.php');
}
}
?>