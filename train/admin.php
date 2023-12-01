<?php
    include("conn.php");

?>

<center>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['submit'])){
                session_start();
                $user=$_POST['user'];
                $_SESSION['user'] = $user;
                $password=$_POST['password'];

                $sql="select * from ADMIN where USER='$user' and PASSWORD='$password'";

                $result=mysqli_query($conn,$sql);

                if(mysqli_num_rows($result) == 1){
                    while($row=mysqli_fetch_assoc($result)){
                        include("admin_dashboard.html");
                    }
                }else{
                    echo '<script>alert("Invalid username or invalid password !!!!.")</script>';
                    include("admin.html");
                }
            }
        }
    ?>
</center>

