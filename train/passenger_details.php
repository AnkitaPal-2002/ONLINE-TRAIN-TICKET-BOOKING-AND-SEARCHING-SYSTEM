<?php

include("conn.php");
session_start();

echo "<h1><center>Welcome Admin</h1></center><br>";
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


$sql3="select * from passenger";
$i=1;

$query=mysqli_query($conn,$sql3);
                            if(mysqli_num_rows($query)>0){
                                ?>
                                <div class="card-body">
                                        <div class="table responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">First name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Idcard Type</th>
                                                    <th scope="col">Card Number</th>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Email Id</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">DOB</th>
						     <th scope="col">Age</th>
						     <th scope="col">Address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                <?php
                                while($row=mysqli_fetch_assoc($query)){
                                    ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['firstname']?></td>
                                            <td><?php echo $row['lastname']?></td>
                                            <?php
                                            $_SESSION['username']=$row['username'];
                                            
                                            echo '<td><a href="ticket_history2.php?id='.$row['username'].'" target="_blank">';
                                            echo $row['username'];

                                            echo '</a></td>';
                                            //$_SESSION['username']=$row['username'];
                                            ?>
                                            
                                            <td><?php echo $row['idcard']?></td>
                                            <td><?php echo $row['cardno']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['gender']?></td>
					    <td><?php echo $row['dob']?></td>
   					    <td><?php echo $row['age']?></td>
					    <td><?php echo $row['address']?></td>
                                            <?php 
                                            
                                            $i++;
                                            
                                          ?> 
					    
                                        </tr>
                                    <?php
                                }
                            
}
else{
                                
                                ?>
                                <center>
                                <?php
                                echo "There is no passenger yet. <br>";
                                ?>
                                
                                </center>
                                <?php
                               
                            }
                        
                          
                        ?>         
                               
                </tbody>
            </table>

           
        </div>

    </div>
</body>
</html>
