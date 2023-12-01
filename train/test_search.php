<?php
include("conn.php");
$source="KHARDAH";
$des="NAIHATI";

$sql="select station_id from station where station_name='$source'";
$sql1= "select station_id from station where station_name='$des'";
$res1=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql1);

$row1=mysqli_fetch_assoc($res1);
$row2=mysqli_fetch_assoc($res2);

$source_id=$row1['station_id'];
$des_id=$row2['station_id'];

echo $source_id."<br>".$des_id."<br>";

//$sql3="select * from trains, train_route where route_id in ( select route_id from train_route where route_station LIKE '%{$source_id}%{$des_id}%')";

$sql3="select * from trains t, train_route tr where t.route_id = tr.route_id and tr.route_station LIKE '%{$source_id}%{$des_id}%' ";


$res3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($res3)>0){
    while($row3=mysqli_fetch_assoc($res3)){
        echo $row3['train_id']." ".$row3['train_name']." ".$row3['train_type']." ".$row3['bogi']." ".$row3['route_id']." ".$row3['route_station']."<br>"; 
    }
}else{
    echo "There is no valid route ";
}



?>