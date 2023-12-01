<?php
    include("conn.php");
    if(isset($_GET['source'])){
        $station1=$_GET['source'];
        $station2=$_GET['destination'];
        $sql="delete from dist_dur where station1='$station1' and station2='$station2'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>alert("distance and duration deleted successfully.")</script>';
            include("displayroutechart.php");

        }
        else{
            die(mysqli_error($conn));
        }
    }
?>