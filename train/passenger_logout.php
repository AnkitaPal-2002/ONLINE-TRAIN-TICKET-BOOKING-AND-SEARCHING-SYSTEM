<?php
include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $msg=$fname." ".$lname." has been successfully logged out !!!";
    echo "<script>
    alert('$msg');
    
    </script>";
    session_unset();
    echo "<script>
    window.location.href='passenger_login.html';
    </script>";
   
}




?>