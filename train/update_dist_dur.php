<?php
include("conn.php");
$station1=$_GET['source'];
$station2=$_GET['destination'];

$sql="select * from dist_dur where station1='$station1' and station2='$station2'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$station1=$row['station1'];
$station2=$row['station2'];
$distance=$row['dist'];
$duration=$row['duration'];

if(isset($_POST['submit'])){
    $source=$_POST['station1'];
    $destination=$_POST['station2'];
    $distance=$_POST['dist'];
    $duration=$_POST['duration'];
    $line=$_POST['line'];
    if($distance>=1 && $distance<=20){
        $adult_fare=5;
        $child_fare=5;
    }
    else if($distance>=21 && $distance<=45){
        $adult_fare=10;
        $child_fare=5;
    }
    else if($distance>=46 && $distance<=70){
        $adult_fare=15;
        $child_fare=10;
    }
    else if($distance>=71 && $distance<=100){
        $adult_fare=20;
        $child_fare=10;
    }
    else if($distance>=101 && $distance<=135){
        $adult_fare=25;
        $child_fare=15;
    }
    else if($distance>=136 && $distance<=155){
        $adult_fare=30;
        $child_fare=15;
    }

    $query="update dist_dur set duration='$duration', dist='$distance', station1='$source', station2='$destination', line='$line', adult_fare='$adult_fare', child_fare='$child_fare' where station1='$station1' and station2='$station2'";

    $res=mysqli_query($conn,$query);
    if($res){
        echo '<script>alert("Duration and distance chart details updated successfully.")</script>';
        header("Location: displayroutechart.php");

    }else{
        die(mysqli_error($conn));
    }

}

?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="add_dist_dur.css">
<head>

</head>
<body>

    <div class="container">
            
        <center>
    <form action="#" method="post">
    <h2><font color="white"> Update details of two stations about distance and duration :  </h2>
              <br>  </font>
        <label for="station1">Update the name of source station : </label>
        <input type="text" name="station1" id="" value='<?php echo $station1;?>'>
        <br><br>

        <label for="station2">Update the name of destaination station : </label>
        <input type="text" name="station2" id="" value='<?php echo $station2;?>'>
        <br><br>
        <label for="distance">Update the distance between two stations (in kms) :</label>
        <input type="number" name="dist" value='<?php echo $distance;?>'>
        <br><br>
        <label for="duration">How much time (in min) is required to cover this distance ? </label>
        <input type="number" name="duration" value='<?php echo $duration;?>'>
        
        <br><br>
    
        <label for="line">Choose the type of the line : </label>
        <input type="radio" name="line" value="Main">Main
        <input type="radio" name="line" value="Cod">Cod
        <input type="radio" name="line" value="Junction">Junction
        <br><br>

        <input type="submit" name="submit" value="submit">

    </form>
    </center></div>
</body>

</html>
