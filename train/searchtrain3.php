<?php
include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<h1><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

$train_id=$_GET['id'];
$sql3="select * from trains where train_id='$train_id'";
$res3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($res3);
echo "<h2><center>Train ID : ".$train_id." Train name : ".$row3['train_name']."</h2></center><br>";

$sql2="select * from halting_time where train_id='$train_id' ORDER BY time";
$res2=mysqli_query($conn,$sql2);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>


<body>
                                    <div class="card-body">
                                        <div class="table responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">Station</th>
                                                    <th scope="col">Time</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        while($row2=mysqli_fetch_assoc($res2)){
                                                            ?>
                                                            <tr>
                                                            <td><?php echo $i;?></td>
                                                            <?php
                                                            $id=$row2['station_id'];
                                                            $sql4="select * from station where station_id='$id' ";
                                                            $res4=mysqli_query($conn,$sql4);
                                                            $row4=mysqli_fetch_assoc($res4);
                                                            ?>
                                                            <td><?php echo $row4['station_name'];?></td>
                                                            <td><?php echo $row2['time'];?></td>
                                                        </tr>
                                                            <?php
                                                            $i++;
                                                        }
                                                    ?>
</tbody>
</body>
</html>

