<?php
include("conn.php");

$train_no=$_GET['updateid'];
$sql="select * from trainS where train_id='$train_no'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['train_name'];
$source=$row['source_id'];
$destination=$row['dest_id'];
$bogi=$row['bogi'];
$type=$row['train_type'];
$departure_time=$row['departure_time'];
$arrival_time=$row['arrival_time'];
$line=$row['line'];
$route=$row['route_id'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $source=$_POST['source'];
    $destination=$_POST['destination'];
    $bogi=$_POST['bogi'];
    $type=$_POST['type'];
    $departure_time=$_POST['departure_time'];
    $arrival_time=$_POST['arrival_time'];
    $line=$_POST['line'];
    $route=$_POST['route_id'];

    $query="update trains set train_id='$train_no', train_name='$name', source_id='$source',dest_id='$destination', bogi='$bogi', train_type='$type', departure_time='$departure_time', arrival_time='$arrival_time', line='$line',route_id='$route' where train_id='$train_no'";

    $res=mysqli_query($conn,$query);
    if($res){
        echo '<script>alert("Train no'.$train_no.' updated successfully.")</script>';
        header("Location: train_display_admin.php");

    }else{
        die(mysqli_error($conn));
    }
}





?>

<!DOCTYPE html>
<html>
<head>
<title>Train details add page</title>
<link rel="stylesheet" href="update_train_style.css">
</head>
<body>
    <div class="main">
        <div class="register">
<h2>Update Train Details</h2>
<form id="register" method="post" action="#"> 
<label for="train_no">Train no:</label>
<input type="number" name="train_no" value='<?php echo $train_no ;?>' readonly>  <br><br>
<label>Train Name:</label>
<input type="text" name="name"  placeholder="Train name" size="30" value='<?php echo $name ;?>' ><br><br>
<label>Enter source:</label>
<input type="text" name="source" placeholder="Source station" size="30" value='<?php echo $source ;?>'><br><br>
<label>Enter destination:</label>
<input type="text" name="destination" placeholder="Destination station" size="30" value='<?php echo $destination ;?>'><br><br>
<label for="bogi">Enter the number of the bogi : </label>
<input type="radio" name="bogi" value="9">
<label>9</label>
<input type="radio" name="bogi" value="12">
<label>12</label>
<br><br>
<label>Type of train:</label>
<input type="radio" value="local" name="type">
<label>Local</label>
<input type="radio" value="galloping" name="type">
<label>Galloping</label>
<br><br>

<label>Enter the line:</label>
<input type="radio" value="Main" name="line" value='<?php echo $line ;?>'>
<label>Main</label>
<input type="radio" value="Cod" name="line">
<label>Cod</label>
<br><br>

<label>Choose the direction:</label>
<input type="radio" value="UP" name="direction">
<label>UP</label>
<input type="radio" value="DOWN" name="direction">
<label>DOWN</label>
<br><br>

<label>Enter depurture time:</label>
<input type="time" name="departure_time" value='<?php echo $departure_time ;?>'>
<br><br>

<label>Enter arrival time:</label>
<input type="time" name="arrival_time" value='<?php echo $arrival_time ;?>'><br><br>

<label for="route">Enter the route id : </label>
<select name="route_id" id="" required>
                    <option value=" ">Choose a route name</option>
                                                <?php
                                $sql1="select * from train_route";
                                $res1=mysqli_query($conn,$sql1);
                                if(mysqli_num_rows($res1)>0){
                                    while($row1=mysqli_fetch_assoc($res1)){
                                    $id=$row1['route_id'];
                                    $name=$row1['route_station'];
                                    ?>
                                    <option value='<?php echo $id;?>'><?php echo $name; ?></option>
                                    <?php
                                    }
                                }

                                
                                
                                ?>
                    </select>
<br><br>
<center>
<input type="submit" class="submit" name="submit" value="Update"><br>
</center>
 

 
</div>
</form>
</body>
</html>