<?php
include("conn.php");
$route_id=$_GET['id'];

$sql="select * from train_route where route_id='$route_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

if(isset($_POST['submit'])){
    var_dump($_POST);
    
    $route_name=$_POST['route_name'];
    
    $sql1="update train_route set  route_station='$route_name'  where route_id='$route_id'";
    $res1=mysqli_query($conn,$sql1);
    if($res1 === TRUE){
        echo "<script>
        alert('Records updated successfully');
        window.location.href='manage_route.php';
        </script>";
        
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_dist_dur.css">
    <title>Document</title>
</head>
<body>
<div class="container">
            
            <center>
                
                    <h2><font color="white"> Add details of two stations about distance and duration :  </h2>
                  <br>  </font>
                       
    <form action=" " method="post" target="_blank">
    <h2><font color="white"> Update Route Details :  </h2>
                  <br>  </font>
        <label for="new_station_id">Route Id : </label>
        <input type="text" name="route_id" value='<?php echo $row['route_id']; ?>'>
        <br>
        <label for="station_name">Route Name : </label>
        <input type="text" name="route_name" value='<?php echo $row['route_station']; ?>'>
        <br>
        
        <input type="submit" name="submit" value="UPDATE">
    </form>
    </center></div></body>

</html>