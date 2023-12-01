<?php
    include("conn.php");
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $sql="delete from trains where train_id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>alert("Train no'.$id.' deleted successfully.")</script>';
            include("train_display_admin.php");

        }
        else{
            die(mysqli_error($conn));
        }
    }
?>