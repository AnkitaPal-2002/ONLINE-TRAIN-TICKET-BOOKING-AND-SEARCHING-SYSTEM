<?php
include("conn.php");
$station_id=$_GET['id'];
$oldsid=$station_id;
$sql="select * from station where station_id='$station_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

if(isset($_POST['submit'])){
    var_dump($_POST);
    $new_stn_id=$_POST['new_station_id'];
    $station_name=$_POST['station_name'];
    $line=$_POST['line'];
    $sql1="update station set station_id='$new_stn_id', station_name='$station_name' , line='$line' where station_id='$oldsid'";
    $res1=mysqli_query($conn,$sql1);
    if($res1 === TRUE){
        echo "<script>
        alert('Records updated successfully');
        window.location.href='managestation.php';
        </script>";
        
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_dist_dur.css">
    <title>Document</title>
</head>
<body>
<div class="container">
            
            <center>
                
                    <h2><font color="white"> Add details of two stations about distance and duration :  </h2>
                  <br>  </font>
                       
    <form action=" " method="post" target="_blank">
    <h2><font color="white"> Update station details :  </h2>
                  <br>  </font>
        <label for="new_station_id">Station ID : </label>
        <input type="text" name="new_station_id" value='<?php echo $station_id; ?>'>
        <br>
        <label for="station_name">Station name : </label>
        <input type="text" name="station_name" value='<?php echo $row['station_name']; ?>'>
        <br>
        <label for="line">Choose the type of the line : </label>
        <select name="line" id="">
            <option value="">Choose the type of the line</option>
            <option value="Main">Main</option>
            <option value="Cod">Cod</option>
            <option value="Junction">Junction</option>
        </select>
        <br>
        <input type="submit" name="submit" value="UPDATE">
    </form>
    </center></div></body>

</html>