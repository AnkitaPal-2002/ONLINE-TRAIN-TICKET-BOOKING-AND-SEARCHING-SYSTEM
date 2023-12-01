<?php
    include("conn.php");
    if(isset($_POST['submit'])){
        $route_id=$_POST['route_id'];
        $route_station=$_POST['route_station'];
        $sql="insert into train_route (route_id, route_station) values ('$route_id' , '$route_station')";
        $res=mysqli_query($conn,$sql);
        if($res === TRUE){
            echo "New records are created successfully.<br>";
        }else{
            echo mysqli_error($conn);
        }
    }

?>