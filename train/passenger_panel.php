<?php
include("conn.php");
//session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<h1><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>flexbox</title>
        <link rel="stylesheet" href="passenger_panel_style.css">
        </head><br>
       
        <body class="box" style="background-image: url('t.jpeg');" vlink="white" link="white">
            <div class="flex-container">
            <div class="flex-box">
                <a href="bookticket.php" target="_blank">Book Normal Ticket</a>
            
            </div>
            <div class="flex-box">
                <a href="passenger_station_display.php" target="_blank"> Show Station and Fare Chart</a>
           
    
            </div>
            
            <div class="flex-box">
                <a href="searchtrain.php" target="_blank">Search Trains</a>
            
        
            </div>
            <div class="flex-box"><a href="platform.php" target="_blank">Platform Ticket Booking</a>
            
           
           </div>
           <div class="flex-box">
            <a href="ticket_history.php" target="_blank">Ticket Booking history</a>
           
           
           </div>
           <div class="flex-box">
           <a href="update_profile.php" target="_blank">Update Profile</a>
            
           
           </div>

            </div>

            <div class="navigation">
                <center>
                <a class="button" href="passenger_logout.php">
                <button class="logout">Logout</button>
                </a>
                </center>
            
            </div>

        </body>
</html>
