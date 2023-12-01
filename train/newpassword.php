<?php
include("conn.php");
    session_start();
    $fuser=$_SESSION['fuser'];
    $femail=$_SESSION['femail'];
    $security_question=$_SESSION['security_question'];
    $security_answer=$_SESSION['security_answer'];
    $sql="select * from passenger where username='$fuser' and email='$femail' and security_question='$security_question' and security_answer='$security_answer'";
    $result=mysqli_query($conn,$sql);
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
        <form action="update_password.php" method="post" target="_blank">
	<div class="input-field">
        <label for="username">Username : </label>
        <input type="text" name="username" class="input" value='<?php echo $fuser;?>' readonly>
	<i class="bx bx-user"></i></div>
        
	<div class="input-field">
        <label for="email">Email : </label>
        <input type="text" name="email" class="input" value='<?php echo $femail;?>' size="40px" readonly>
	<i class="bx bx-user"></i></div>
        
	<div class="input-field">
        <label for="security_question">Security Question : </label>
        <input type="text" name="security_question" class="input" value='<?php echo $security_question;?>' readonly>
	<i class="bx bx-user"></i></div>
        
	<div class="input-field">
        <label for="security_answer">Security answer : </label>
        <input type="text" name="security_answer" class="input" value='<?php echo $security_answer;?>' readonly>
	<i class="bx bx-user"></i></div>
        
	<div class="input-field">
        <label for="password">Enter new password : </label>
        <input type="password" name="password" class="input" placeholder="Please enter new password" required>
	<i class="bx bx-user"></i></div>
        <br>
	<div class="input-field">
        <input type="submit" name="submit" class="submit" value="UPDATE PASSWORD">
	<i class="bx bx-user"></i></div>
</form>
</body>
</html>
    <?php
           

?>