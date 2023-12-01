<?php
include("conn.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        //var_dump($_POST);
        $station1=$_POST['station1'];
        $station4=$_POST['station1'];
        $station2=$_POST['station2'];
        $station3=$_POST['station2'];
        $distance=$_POST['dist'];
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
        $duration=$_POST['dur'];
        $line=$_POST['line'];
        $sql="insert into dist_dur(station1, station2, dist, duration, adult_fare, child_fare, line) values ('$station1', '$station2', '$distance', '$duration', '$adult_fare', '$child_fare', '$line');";
        $sql.="insert into dist_dur(station1, station2, dist, duration, adult_fare, child_fare, line) values ('$station3', '$station4', '$distance', '$duration', '$adult_fare', '$child_fare', '$line');";

        if(mysqli_multi_query($conn,$sql)){
            echo "New routes are added successfully.<br>";
        }else{
            echo mysqli_error($conn);
        }

    }
}

?>