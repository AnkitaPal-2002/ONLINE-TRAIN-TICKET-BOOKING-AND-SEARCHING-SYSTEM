<?php
    include("conn.php");
    if(isset($_GET['id'])){
        $route_id=$_GET['id'];
       // $station2=$_GET['destination'];
        $sql="delete from train_route where route_id='$route_id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>alert("Route deleted successfully.")</script>';
            include("manage_route.php");

        }
        else{
            die(mysqli_error($conn));
        }
    }
?>