<?php
include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$_SESSION['fname']=$row['firstname'];
$_SESSION['lname']=$row['lastname'];
$_SESSION['age']=$row['age'];
$_SESSION['idcard']=$row['idcard'];
$_SESSION['cardno']=$row['cardno'];
$_SESSION['via']="NULL";

echo "<h1 style='color:white;'><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

if(isset($_POST['submit'])){
    $stn_id=$_POST['station'];
    $sql="select * from station where station_id='$stn_id'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $stn_name=$row['station_name'];
    $_SESSION['source_id']=$stn_id;
    $_SESSION['source_name']=$stn_name;
    
    $adult=$_POST['adult'];
    $_SESSION['adult']=$adult;
    $child=$_POST['child'];
    $_SESSION['child']=$child;
    $fare=($adult+$child)*10;
    $_SESSION['fare']=$fare;
    $ticket_type="NULL";

    $_SESSION['ticket_name']="Platform Ticket";
    ?>
                <center>
                <?php
                echo '<body background="print.jpeg" >';
                ?>
                <form action="pay_plat.html" method="post" target="_blank">
                    <br><br>
                <b> <font size="5px" face="century gothic" color="white">
                    Station name :
                    <input type="text" value="<?php echo $stn_name." ".$stn_id;?>" readonly>
                    <br><br>
                   
                    No. of the adults : 
                    <input type="number" name="adult" value="<?php echo $adult;?>" readonly>
                    <br><br>
                    No. of the child:
                    <input type="number" name="child" value="<?php echo $child;?>" readonly>

                    <br><br>
                    Ticket name :
                    <input type="text" value="<?php echo $_SESSION['ticket_name'];?>" readonly>
                    <br><br>
                
                
                    </b></font><font background-color="#fff" size="5px" > <input style="width: 100px; height: 30px;" type="submit" name="submit"  value='<?php echo "Rs. ".$fare;?>'></font>
                    </center>

                    </form>
                
                
                <?php
}

?>