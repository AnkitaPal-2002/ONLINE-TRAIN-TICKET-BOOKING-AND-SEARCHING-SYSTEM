<?php
include("conn.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];

    $sql="select * from passenger where username='$username' and email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
      $_SESSION['fuser']=$username;
      $_SESSION['femail']=$email;
      header("Location:reset.php");

    }else{
      echo "<script>
      alert('Please enter the valid username or email!!!');
      
      window.location.href='forget_password_form.html';
      </script>";
    }
  }
}




?>