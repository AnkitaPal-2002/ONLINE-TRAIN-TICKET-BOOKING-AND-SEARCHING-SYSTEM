<?php

include("conn.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        session_start();
        $user = $_POST['pusername'];
        $password = $_POST['password'];
        $sql="select * from passenger where username='$user'and password='$password'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res) == 1){
            #echo $user;
            $_SESSION['puser'] = $user;
            $_SESSION['p_password'] = $password;
            include("passenger_panel.php");

        }else{
            echo '<script>
            alert("Invalid username or password!!!");
            window.location.href="passenger_login.html";
            </script>';
        }
    }
}


?>