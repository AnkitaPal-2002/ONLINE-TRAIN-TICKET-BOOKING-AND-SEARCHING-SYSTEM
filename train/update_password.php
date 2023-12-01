<?php
include("conn.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        //var_dump($_POST);
    $fuser=$_SESSION['fuser'];
    $femail=$_SESSION['femail'];
    $security_question=$_SESSION['security_question'];
    $security_answer=$_SESSION['security_answer'];
    $password=$_POST['password'];
    $sql="UPDATE passenger SET password='$password' where username='$fuser' and email='$femail' and security_question='$security_question' and security_answer='$security_answer'";

    $result=mysqli_query($conn,$sql);
    if($result===TRUE){
        echo "<script>
                alert('Thank you for updating password successfully');
                </script>";
                echo "<script>
                window.location.href='passenger_login.html';
                </script>";
                
                
    }
    else{
        echo mysqli_error($conn);
    }
    }
}



?>