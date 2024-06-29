<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Admin Panel</title>
    <style>
        body{
          background-color: grey;
        }
        table,th,td{
      border : 2px solid black;
      width : 1100px;
      background-color : lightgreen; 
    }
      </style>
</head>
<body>
    <center>
    <h2 align="center">Details</h2>
    </center>
    <center>
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
                    <th>Number</th>
                    <th>Problem Description</th>
                    <th>Status</th>
                    <th>Picture</th>
                </tr>

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
          <td align="center"> <?php echo $row['number']; ?> </td>
          <td align="center"> <?php echo $row['dprob']; ?> </td>
          <td align="center">
                <?php
                  if($row['stat']==1){
                    echo '<p> <a href="active.php?id='.$row['id'].'&stat=0" class="btn btn-danger">Active</a></p>';
                  }else{
                    echo '<p> <a href="active.php?id='.$row['id'].'&stat=1" class="btn btn-success">Completed</a></p>';
                  }
                ?>
          </td>
          <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['ufile']).'" alt="Image" style="width: 100px; height: 100px;">'; ?> </td>
        </tr>
        <?php
      }
    }
    else if(!isset($_POST['search'])){
      $view = mysqli_query($connection,"select * from problem");
      while($rows = mysqli_fetch_assoc($view)){
        $id=$rows['id'];
        $name=$rows['name'];
        $paddr=$rows['paddr'];
        $number=$rows['number'];
        $dprob=$rows['dprob'];
        $image="<img style = 'height:40px; width:40px;' src='upload/.".$rows['ufile']."'>";
        ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $paddr; ?></td>
          <td><?php echo $number; ?></td>
          <td><?php echo $dprob; ?></td>
          <td>
          <?php
                  if($rows['stat']==1){
                    echo '<p> <a href="active.php?id='.$rows['id'].'&stat=0" class="btn btn-danger">Active</a></p>';
                  }else{
                    echo '<p> <a href="active.php?id='.$rows['id'].'&stat=1" class="btn btn-success">Completed</a></p>';
                  }
                ?>
          </td>
          <td><?php echo $image; ?></td>
      </tr>
      <?php
      }
    }
    ?>
            </table>
        </div>
    </center>
</body>
</html>