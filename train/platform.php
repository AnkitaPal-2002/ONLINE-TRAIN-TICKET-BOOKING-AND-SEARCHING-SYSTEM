<?php
include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
//echo "<h1><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ticket booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="platform.css">
    </head>
    <body>
        <section class="banner">
         <font face="Arial MT" size="6px" color="white">   <h2>ONLINE TICKET</h2></font>
            <div class="card-container">
           
                <div class="card-img"></div>
                <div class="card-content">
                    <font face="Arial MT" size="4px">   
                    <form action="print_plat_ticket.php" method="post" target="_blank">
                    <h3><?php echo "Welcome ".$row['firstname']." ".$row['lastname'];?></h3>
                         <div class="form-row">
                            
               <center> 
                <br>      

Choose station name :
        <select name="station" id="depart" required>
	            <option value=" ">Choose a station</option>
              <?php
              $sql1="select * from station";
              $res1=mysqli_query($conn,$sql1);
              if(mysqli_num_rows($res1)>0){
                while($row1=mysqli_fetch_assoc($res1)){
                  $id=$row1['station_id'];
                  $name=$row1['station_name'];
                  ?>
                  <option value='<?php echo $id;?>'><?php echo $name." ".$id; ?></option>
                  <?php
                }
              }

              
              
              ?>
       
	
              </select>
<br><br>
                          
                         </div>   <br>    
                         <div class="form-now">
                        <center> &nbsp;  &nbsp;  &nbsp; 
                            &nbsp;  &nbsp;  &nbsp;  &nbsp; Adult(s):
    <input type="number" name="adult" class="input"  required><br><br>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   Child(ren):
    <input type="number" name="child" class="input"  required><br>
  &nbsp;  &nbsp;  &nbsp;  <br>

  <center>  <input type="submit" name="submit" value="Book Platform Ticket"><br>
                <br>    </form>
                </div></div>
        </section>
    </center>
    </body>
</html>