<?php
include("conn.php");
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['submit'])){
            $answer=$_POST['security_answer'];
            $fuser=$_SESSION['fuser'];
            $femail=$_SESSION['femail'];
            $security_question=$_SESSION['security_question'];
            $sql="select * from passenger where username='$fuser' and email='$femail' and security_question='$security_question' and security_answer='$answer'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1){
                $_SESSION['security_answer']=$answer;
                header("Location:newpassword.php");
            }else{
                echo "<script>
                alert('Please enter the right answer of the security question!!!');
                </script>";
                //echo "Please enter the right answer of the security question!!!";
                header("Location:reset.php");
                
            }
        }
    }



?>