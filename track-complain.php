<!DOCTYPE html>
<html>
<head>
	<title>Track Complaint</title>
	<link rel="stylesheet" type="text/css" href="track-complain.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    table,th,td{
      border : 2px solid black;
      width : 1100px;
      background-color : lightgreen; 
    }
  </style>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<div class="dropdwn">
<nav>
<img class="logo" src="https://cdn.siasat.com/wp-content/uploads/2021/03/GHMCm-390x220.jpg">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="report.php">Report problem</a></li>
<li>Problem Reports</a>
<ul>
<li><a href="track-complain.php">Track Complaint</a></li>
</ul>
</li>
</li>
<a href="member.php" class="member"><i style="letter-spacing: 10px;" class='fas fa-user'></i>Admin</a>
</ul>
</nav>
</div>
<body bgcolor="powderblue">
<div class="container" align="center">
  <form action="" method="POST">
    <input type="text" name="id" placeholder="enter the id number" required/>
    <input type="submit" name="search" value="search">
  </form>
  <table>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Problem Address</th>
      <th>Description of Problem</th>
      <th>Status</th>
      <th>Picture</th>
    </tr><br>
    <?php 
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'ghmc');
    if(isset($_POST['search'])){
      $ide = $_POST['id'];
      $que = "SELECT * FROM problem where id=$ide";
      $que_run = mysqli_query($connection,$que);
      while($row = mysqli_fetch_array($que_run)){
        ?>
        <tr>
          <td align="center"> <?php echo $row['id']; ?> </td>
          <td align="center"> <?php echo $row['name']; ?> </td>
          <td align="center"> <?php echo $row['paddr']; ?> </td>
          <td align="center"> <?php echo $row['dprob']; ?> </td>
          <td align="center">
                <?php
                  if($row['stat']==1){
                    echo "Active";
                  }else{
                    echo "Completed";
                  }
                ?>
          </td>
          <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['ufile']).'" alt="Image" style="width: 100px; height: 100px;">'; ?> </td>
        </tr>
        <?php
      }
    }
    ?>
  </table>
</div>
</br></br></br></br></br>
<!-- Footer Table Menu -->
<div class="col-3 col-s-12">
    <div class="aside2">
<div class="row">
  <div class="column">
    <h3><b>Popular Malware</b></h3>
    <hr class="rounded">
    <a href="webdiscover-browser.html">WebDiscover Browser</a></br>
    <a href="google-redirect-virus.html">Google Redirect Virus</a></br>
    <a href="v9-redirect-virus.html">V9 Redirect Virus</a></br>
    <a href="#">Other</a>
  </div>
  <div class="column">
    <h3><b>Popular Ransomware</b></h3>
    <hr class="rounded">
    <a href="decoder.html">Decoder Ransomware</a></br>
    <a href="devos.html">Devos Ransomware</a></br>
    <a href="cerber.html">Cerber Ransomware</a></br>
    <a href="Eight.html">Eight Ransomware</a></br>
    <a href="coronavirus.html">CoronaVirus Ransomware</a></br>
    <a href="conficker.html">Conficker Ransomware</a></br>
    <a href="dewar.html">Dewar Ransomware</a>
  </div>
  <div class="column">
    <h3><b>Popular Trojans</b></h3>
    <hr class="rounded">
    <a href="win32.html">Win32 malware.gen</a></br>
    <a href="zeus.html">Zeus Trojan</a></br>
    <a href="dns.html">DNS Changer</a></br>
    <a href="hacktool.html">HackTool:Win32/Keygen</a>
  </div>
  <div class="column">
    <h3><b>SOCIAL MEDIA</b></h3>
     <hr style="margin-right: 70%;" class="rounded">
    <a href="https://facebook.com"> <img src="images/facebook.png" alt="Facebook" width="45" height="45"></a>
    <a href="https://twitter.com"> <img src="images/twitter.png" alt="Twitter" width="45" height="45"></a>
    <a href="https://reddit.com"> <img src="images/reddit.png" alt="Reddit" width="45" height="45"></a>
    <a href="https://instagram.com"> <img src="images/instagram.png" alt="Instagram" width="45" height="45"></a>
  </div>
  </div>
  <hr>
 </div>
 </div>   	

<div class="col-3 col-s-12">
    <div class="legal">
<a href="privacy.html" style="color: white;">Privacy Policy |</a>
<a href="term.html" style="color: white;">Terms & Condition |</a>
<a href="disclaimer.html" style="color: white;">Disclaimer |</a>
<a href="cookies.html" style="color: white;">Cookies</a>
</div>
    </div>      
</body>
</html>
