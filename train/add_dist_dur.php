<?php
include("conn.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add_dist_dur.css">
    </head>
    <body >
        <div class="container">
            
        <center>
            <form action="distance_duration.php" method="post" target="_blank">
                <h2><font color="white"> Add details of two stations with distance and duration :  </h2>
              <br>  </font>
                   
        Choose the name of the 1st staion : 
        <select name="station1"  required>
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
&nbsp;  &nbsp;  &nbsp; 
Choose the name of the 2nd station :   
                            <select name="station2" required>
                              <option value=" ">Choose a station</option>
                              <?php
              $sql2="select * from station";
              $res2=mysqli_query($conn,$sql2);
              if(mysqli_num_rows($res2)>0){
                while($row2=mysqli_fetch_assoc($res2)){
                  $id=$row2['station_id'];
                  $name=$row2['station_name'];
                  ?>
                  <option value='<?php echo $id;?>'><?php echo $name." ".$id; ?></option>
                  <?php
                }
              }

              
              
              ?>
       
                            </select> 
                            
            <br>
            <br>
            Enter the distance between two stations:
            <input type="number" name="dist" required>
            <br> <br> 
            Enter the duration between two stations:
            <input type="number" name="dur" required>
<br><br>

<label for="line">Choose the type of the line : </label>
        <select name="line" id="">
            <option value="">Choose the type of the line</option>
            <option value="Main">Main</option>
            <option value="Cod">Cod</option>
            <option value="Junction">Junction</option>
        </select>
        <br>

<button type="submit" class="submit"  value="submit" name="submit" size="60px">submit</button><br>
             </form>   
        </center></div></body>
</html>

