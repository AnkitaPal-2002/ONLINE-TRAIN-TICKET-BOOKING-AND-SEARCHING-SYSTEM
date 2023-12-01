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
    <h1 align="center" style="color:red;">Welcome to the route details page</h1>
    <br>
    <div class="card-body">
        <div class="table responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Source Station </th>
                    <th scope="col">Destination Station </th>
                    <th scope="col">Distance</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Adult fare</th>
                    <th scope="col">Child Fare</th>
                    <th scope="col">Line</th>
                
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conn.php");
                        $i=1;
                        $sql="select * from dist_dur order by dist";
                        $query=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $row['station1']?></td>
                                        <td><?php echo $row['station2']?></td>
                                        <td><?php echo $row['dist']?></td>
                                        <td><?php echo $row['duration']?></td>
                                        <td><?php echo $row['adult_fare']?></td>
                                        <td><?php echo $row['child_fare']?></td>
                                        <td><?php echo $row['line']?></td>
                                        
                                        <?php 
                                        
                                        $i++;
                                        
                                       
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
