<?php
    include("conn.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['submit'])){
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
            $age=$_POST['age'];
            $email=$_POST['email'];
            $idcard=$_POST['idcard'];
            $cardno=$_POST['cardno'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $security_question=$_POST['security_question'];
            $security_answer=$_POST['security_answer'];

            $query="select * from passenger where username='$username'";
            $res=mysqli_query($conn,$query);

            if(mysqli_num_rows($res) == 1){
                echo '<script>alert("Username is not available now !!! Plaese enter a new username!!!")</script>';
                include("signup_passenger_form.html");
            }else{
                $sql="insert into passenger(firstname, lastname, gender, dob, age, email, idcard, cardno, address, phone, username, password, security_question, security_answer) values ('$firstname', '$lastname', '$gender', '$dob', '$age', '$email', '$idcard', '$cardno', '$address', '$phone', '$username', '$password' ,'$security_question', '$security_answer')";

                $result=mysqli_query($conn,$sql);
                if($result === TRUE){
                    echo "New records created successfully.<br>";
                }else{
                    echo mysqli_connect_error($sql);
                }
            }

            
        }
    }

    mysqli_close($conn);

?>