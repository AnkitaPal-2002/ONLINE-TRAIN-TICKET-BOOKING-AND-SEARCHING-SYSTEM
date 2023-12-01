<?php
include("conn.php");
if(isset($_POST['submit'])){
    $station_id=$_POST['station_id'];
    $station=$_POST['station'];
    $line=$_POST['line'];
    $sql="insert into station (station_id, station_name, line) values ('$station_id', '$station', '$line')";
    $result=mysqli_query($conn,$sql);
    if($result===TRUE){
        echo "New records are created successfully.<br>";
    }
    else{
        echo mysqli_error($conn);
    }
}


?>