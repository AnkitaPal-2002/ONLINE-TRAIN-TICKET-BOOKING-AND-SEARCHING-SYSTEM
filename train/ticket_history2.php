<?php
session_start();
include("conn.php");

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
    
    <div class="card-body">
        <div class="table responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Ticket ID</th>
                    
                    <th scope="col">Ticket Name</th>
                    <th scope="col">Type of the ticket</th>
                    <th scope="col">Source Station </th>
                    <th scope="col">Destination Station </th>
                    <th scope="col">Via</th>
                    <th scope="col">Total amount of fare</th>
                    <th scope="col">Date of ticket booking</th>
                    <th scope="col">Time of ticket booking</th>
                    <th scope="col">No of adult travel</th>
                    <th scope="col">No of child travel</th>
                    <th scope="col">Download PDF</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conn.php");
                        $i=1;
                        //$user=$_SESSION['username'];
                        $user=$_GET['id'];
                        $sql1="select * from ticket where username='$user'";
                        
                        $query=mysqli_query($conn,$sql1);
                        if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['ticket_id']?></td>
                                        <td><?php echo $row['ticket_name']?></td>
                                        <td><?php echo $row['ticket_type']?></td>
                                        <td><?php echo $row['source_name']."(".$row['source_id'].")";?></td>
                                        <td><?php echo $row['destination_name']."(".$row['destination_id'].")";?></td>
                                        <td><?php echo $row['via']?></td>
                                        <td><?php echo $row['fare']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['time']?></td>
                                        <td><?php echo $row['adult']?></td>
                                        <td><?php echo $row['child']?></td>
                                       
                                        <?php 
                                        $id=$row['ticket_id'];
                                        
                                        
                                        echo '<td><a href="pdf_ticket.php?ticket='.$id.'" target="_blank"><img src="download.jpg" alt="" height="50px" width="50px"></a></td>';
                                        
                                       
                                        ?>
                                    </tr>
                                    
                                <?php
                            }
                        }
                    
                    ?>
                </tbody>
            </table>

           

        </div>

    </div>
</body>
</html>
