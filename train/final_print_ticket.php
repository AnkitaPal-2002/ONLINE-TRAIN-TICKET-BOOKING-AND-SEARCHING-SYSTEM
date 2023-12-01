<?php
include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        $username=$_SESSION['puser'];
        $firstname=$_SESSION['fname'];
        $lastname=$_SESSION['lname'];
        $age=$_SESSION['age'];
        $ticket_type=$_SESSION['ticket_type'];
        $ticket_name="Normal train ticket";
        $fare=$_SESSION['fare'];
        $via=$_SESSION['via'];
        $date=date("Y-m-d");
        date_default_timezone_set('Asia/Kolkata');
        $time = date('H:i:s');
        $adult=$_SESSION['adult'];
        $child=$_SESSION['child'];
        $source_name=$_SESSION['source_name'];
        $destination_name=$_SESSION['destination_name'];
        $source_id=$_SESSION['source_id'];
        $destination_id=$_SESSION['destination_id'];

        $sql="insert into ticket (username, firstname, lastname, age, ticket_type, ticket_name, fare, date, time, adult, child, source_id, source_name, destination_id, destination_name, via) values ('$username', '$firstname', '$lastname', '$age', '$ticket_type', '$ticket_name', '$fare', '$date', '$time', '$adult', '$child', '$source_id', '$source_name', '$destination_id', '$destination_name', '$via')";

        $result=mysqli_query($conn,$sql);
        if($result===TRUE){
            echo '<script>
            alert("Ticket data saved successfully.");
            window.location.href="pdf.php";
            </script>';


        }else{
            echo mysqli_error($conn);
        }
        

    }
}


?>