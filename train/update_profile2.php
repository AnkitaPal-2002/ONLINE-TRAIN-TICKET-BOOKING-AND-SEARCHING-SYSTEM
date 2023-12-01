<?php
include("conn.php");
session_start();
$old=$_SESSION['old'];


if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $idcard=$_POST['idcard'];
    $cardno=$_POST['cardno'];
    $address=$_POST['address'];
    $password=$_POST['password'];


    if($old==$username){
        $sql2="select * from passenger where username='$old' and password='$password'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        if(mysqli_num_rows($res2) == 1){
            $sql1="update passenger set firstname='$firstname', lastname='$lastname', gender='$gender', dob='$dob', age='$age', phone='$phone', email='$email', idcard='$idcard', cardno='$cardno', address='$address' where username='$old' and password='$password'";
            $res1=mysqli_query($conn,$sql1);
            
            if($res1 === TRUE){
                echo '<script>
                alert("your profile is updated successfully.");
                window.location.href="passenger_login.html";
                </script>';
            }
        }
        else{
            echo '<script>
            alert("Please enter correct password!!!");
            window.location.href="update_profile.php";
            </script>';
        }
       

    }else{
        $sql="select * from passenger where username='$username'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res) == 1){
            echo '<script>
            alert("Username is not available!!!");
            window.location.href="update_profile.php";
            </script>';
        }
        else{
            $sql2="select * from passenger where username='$old' and password='$password'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        if(mysqli_num_rows($res2) == 1){
            $sql1="update passenger set username='$username', firstname='$firstname', lastname='$lastname', gender='$gender', dob='$dob', age='$age', phone='$phone', email='$email', idcard='$idcard', cardno='$cardno', address='$address' where username='$old' and password='$password'";
            $res1=mysqli_query($conn,$sql1);
            
            if($res1 === TRUE){
                echo '<script>
                alert("your profile is updated successfully.");
                window.location.href="passenger_login.html";
                </script>';
            }
        }
        else{
            echo '<script>
            alert("Please enter correct password!!!");
            window.location.href="update_profile.php";
            </script>';
        }

        }
    }
}

?>