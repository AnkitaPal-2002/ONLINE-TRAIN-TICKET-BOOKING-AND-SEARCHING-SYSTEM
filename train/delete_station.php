<?php
include("conn.php");

$id=$_GET['id'];

$sql="delete from station where station_id='$id'";
$res=mysqli_query($conn,$sql);

if($res === TRUE){
    echo "<script>
        alert('Records deleted successfully');
        window.location.href='managestation.php';
        </script>";
        
}

?>