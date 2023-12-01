<?php
include("conn.php");
session_start();
$user=$_SESSION['puser'];
$sql="select * from passenger where username='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<h1><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searchtrain</title>
    <link rel="stylesheet" href="searchtrain.css">
    <body><section><div class="box"
        ><center>
<form action="searchtrain2.php" method="post" target="_blank">
Choose the name of the source station :
        <select name="source" id="source" required>
        <option value=" ">Choose a station</option>
	<?php
              $sql1="select * from station";
              $res1=mysqli_query($conn,$sql1);
              if(mysqli_num_rows($res1)>0){
                while($row1=mysqli_fetch_assoc($res1)){
                  $id=$row1['station_id'];
                  $name=$row1['station_name'];
                  ?>
                  <option value='<?php echo $id;?>'><?php echo $name."  "; ?></option>
                  <?php
                }
              }

              
              
              ?>
    </select>
<br><br>
&nbsp;  &nbsp;  &nbsp;  
Enter the name of the destination :  
<select name="destination" id="destination" required>
<option value=" ">Choose a station</option>
    <?php
              $sql1="select * from station";
              $res1=mysqli_query($conn,$sql1);
              if(mysqli_num_rows($res1)>0){
                while($row1=mysqli_fetch_assoc($res1)){
                  $id=$row1['station_id'];
                  $name=$row1['station_name'];
                  ?>
                  <option value='<?php echo $id;?>'><?php echo $name."  "; ?></option>
                  <?php
                }
              }

              
              
              ?>
    </select>          
                 
<br><br><div class="inputbox">
    <input type="submit" name="submit" value="Search Trains">
    <br></center> 
    <br> 
</form>
       </div>  </div>    </section>   
    </body>
</html>