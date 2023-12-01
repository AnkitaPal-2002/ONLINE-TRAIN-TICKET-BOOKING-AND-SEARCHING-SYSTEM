<?php

include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<h1><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";
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


<body>
    
    <br>
    
                    <?php
                        include("conn.php");
                        if(isset($_POST['submit'])){
                            $i=1;
                            $source=$_POST['source'];
                            $des=$_POST['destination'];
                            ?>
                            <center>
                            <?php
                            echo "Your source station name is : ".$source."<br>";
                            echo "Your destination station name is : ".$des."<br>";
                            ?>
                            </center>
                            <?php
                           
$sql3="select * from trains t, train_route tr where t.route_id = tr.route_id and tr.route_station LIKE '%{$source}%{$des}%' order by departure_time";

$query=mysqli_query($conn,$sql3);
                            if(mysqli_num_rows($query)>0){
                                ?>
                                <div class="card-body">
                                        <div class="table responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">Train No</th>
                                                    <th scope="col">Train Name</th>
                                                    <th scope="col">Source Station </th>
                                                    <th scope="col">Destination Station </th>
                                                    <th scope="col">Bogi</th>
                                                    <th scope="col">Departure Time </th>
                                                    <th scope="col">Arrival Time</th>
                                                    <th scope="col">Train route</th>
                                                    <th scope="col">Halting time at user's journey's source station</th>
						                            <th scope="col">Halting time at user's journey's destination station</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                <?php
                                while($row=mysqli_fetch_assoc($query)){
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <?php
                                            echo '<td><a href="searchtrain3.php?id='.$row['train_id'].'" target="_blank">';
                                            echo $row['train_id'];

                                            echo '</a></td>';
                                            ?>
                                            <td><?php echo $row['train_name'];?></td>
                                            <td><?php echo $row['source_id'];?></td>
                                            <td><?php echo $row['dest_id'];?></td>
                                            <td><?php echo $row['bogi'];?></td>
                                            <td><?php echo $row['departure_time'];?></td>
                                            <td><?php echo $row['arrival_time'];?></td>
                                            <?php
                                            
                                            ?>

                                            <td><?php echo $row['route_station'];?></td>
                                            <?php 
                                            $id=$row['train_id'];
                                            $i++;
                                            $sql1="select time from halting_time where train_id='$id' and station_id='$source'";
					                         $query1=mysqli_query($conn,$sql1);
					                        $row1=mysqli_fetch_assoc($query1);
                                          ?> 
					                        <td><?php echo $row1['time'];?></td> 
                                            <?php
                                            $sql2="select time from halting_time where train_id='$id' and station_id='$des'";
                                            $query2=mysqli_query($conn,$sql2);
					                        $row2=mysqli_fetch_assoc($query2);
                                          ?> 
					                        <td><?php echo $row2['time'];?></td> 
                                            <?php
                                            ?>
                                        </tr>
                                    <?php
                                }
                            }else{
                                /*echo "<script>
                                    alert('There is such no route , Please search train for the valid route ');
                                    </script>";
                                    echo "<script>
                                    window.location.href='searchtrain.php';
                                    </script>";
                                */
                                ?>
                                <center>
                                <?php
                                echo "There is such no valid route. <br>";
                                ?>
                                If you want to search the trains again then 
                                <a href="searchtrain.php" target="_blank">Click here</a>
                                </center>
                                <?php
                               
                            }
                        
                        }  
                        ?>         
                                <?php
                            
                        
                    
                    ?>
                </tbody>
            </table>

           
        </div>

    </div>
</body>
</html>
