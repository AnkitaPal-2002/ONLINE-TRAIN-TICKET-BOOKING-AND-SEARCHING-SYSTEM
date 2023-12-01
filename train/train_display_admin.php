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
    <h1 align="center" style="color:red;">Welcome to the train details page</h1>
    <br>
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
                    <th scope="col">Type</th>
                    <th scope="col">Departure Time </th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Route</th>
                    <th scope="col">Line</th>
                    <th scope="col">Direction</th>
                
                    <th scope="col">Update</th>
                    
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conn.php");
                        $i=1;
                        $sql="select * from trains";
                        $query=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $row['train_id']?></td>
                                        <td><?php echo $row['train_name']?></td>
                                        <td><?php echo $row['source_id']?></td>
                                        <td><?php echo $row['dest_id']?></td>
                                        <td><?php echo $row['bogi']?></td>
                                        <td><?php echo $row['train_type']?></td>
                                        <td><?php echo $row['departure_time']?></td>
                                        <td><?php echo $row['arrival_time']?></td>
                                        <td><?php echo $row['route_id']?></td>
                                        <td><?php echo $row['line']?></td>
                                        <td><?php echo $row['direction']?></td>
                                        <?php 
                                        $id=$row['train_id'];
                                        $i++;
                                        
                                        echo '<td><a href="update_train.php?updateid='.$id.'"><img src="user_pen.jpg" alt="" height="50px" width="50px"></a></td>';
                                        echo '<td><a href="delete_train.php?deleteid='.$id.'"><img src="trash.jpg" alt="" height="50px" width="50px">
                                        </a></td>';
                                        ?>
                                    </tr>
                                    
                                <?php
                            }
                        }
                    
                    ?>
                </tbody>
            </table>

            <center>
                If you want to add more train then 
            <a  href="train_add_form.php">Click here</a>
            </center>

        </div>

    </div>
</body>
</html>
