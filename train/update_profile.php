<?php
include("conn.php");
session_start();
$username=$_SESSION['puser'];
$oldname=$_SESSION['puser'];
$_SESSION['old']=$oldname;
$sql="select * from passenger where username='$username'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forget.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <title>Document</title>
</head>
<body class="box" style="background.image:url('5.jpg');">
<form action="update_profile2.php" method="post" target="_blank">

<div class="container">
          <div class="top-header"><br><br>
            <center>
                <header>
                Update your details
                </header>
            
        </div></div>
            
           
    <label for="username">Username : </label>
    <div class="input-field">
    <input type="text" name="username" class="input" value='<?php echo $username;?>' readonly>
    <i class="bx bx-user"></i></div>

    <div class="input-field">
    <label for="password">Enter your password : </label>
    <input type="password" name="password" class="input" size="40px">
    <i class="bx bx-user"></i></div>

    <label for="firstname">Firstname : </label>
    <div class="input-field">
    <input type="text" name="firstname" class="input" value='<?php echo $row['firstname'];?>' >
    <i class="bx bx-user"></i></div>

    <label for="lastname">Lastname : </label>
    <div class="input-field">
    <input type="text" name="lastname" class="input" value='<?php echo $row['lastname'];?>' >
    <i class="bx bx-user"></i></div>

    <label >Update your gender:</label>&nbsp;
    <input type="radio" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" name="gender" value="others">
    <label for="others">Others</label>
    <br><br>

    <div class="input-field">
    <label for="dob">Your Date of birth : </label>
    <input type="date" name="dob" class="input" value='<?php echo $row['dob'];?>' size="40px">
    <i class="bx bx-user"></i></div>

    <div class="input-field">
    <label for="dob">Your age : </label>
    <input type="number" name="age" class="input" value='<?php echo $row['age'];?>' size="40px">
    <i class="bx bx-user"></i></div>

    <label for="phone">Phone no : </label>
    <div class="input-field">
    <input type="text" name="phone" class="input" value='<?php echo $row['phone'];?>' >
    <i class="bx bx-user"></i></div>
    
    <div class="input-field">
    <label for="email">Email : </label>
    <input type="email" name="email" class="input" value='<?php echo $row['email'];?>' size="40px">
    <i class="bx bx-user"></i></div>

    <label for="idcard">Update your Govt ID card name :</label>
    <input type="radio" name="idcard" value="ADHAAR CARD">
    <label for="ADHAAR CARD">Adhar Card</label>
    <input type="radio" name="idcard" value="PAN CARD">
    <label for="PAN CARD">PAN Card</label>
    <input type="radio" name="idcard" value="VOTER CARD">
    <label for="VOTER CARD">Voter Card</label>
    &nbsp;&nbsp;&nbsp;<br><br> &nbsp;&nbsp;&nbsp;

    <div class="input-field">
    <label for="cardno">Update card no. : </label>
    <input type="text" name="cardno" class="input" value='<?php echo $row['cardno'];?>' size="40px">
    <i class="bx bx-user"></i></div>

    <div class="input-field">
    <label for="address">Address : </label>
    <input type="text" name="address" class="input" value='<?php echo $row['address'];?>' size="40px">
    <i class="bx bx-user"></i></div>



    
    <br><br>
     <div class="input-field">
    <input type="submit" name="submit" class="submit" value="Update your details"></div>

    </center>
</form>
</body>
</html>
<?php

?>