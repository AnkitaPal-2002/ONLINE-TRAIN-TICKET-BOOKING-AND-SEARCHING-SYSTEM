<?php
include("conn.php");
session_start();

if(isset($_POST['submit'])){
    //var_dump($_POST);
    $train_no=$_POST['train_no'];
    $name=$_POST['name'];
    $source=$_POST['source'];
    $destination=$_POST['destination'];
    $halt=$_POST['halt_station'];
    $_SESSION['source']=$source;
    $_SESSION['destination'] = $destination;
    $_SESSION['no']=$halt;
    ?>
        <!DOCTYPE html>
                    <html>
                    <head>
                    <title>Train details add page</title>
                    <link rel="stylesheet" href="add_train_html.css">
                    </head>
                    <body>
                        <div class="main">
                            <div class="register">
                    <h2>Train Details</h2>
                    <form id="register" method="post" action="train_add.php" target="_blank">
                    <label for="train_no">Enter the train no.:</label>
                    <input type="number" name="train_no" value='<?php echo $train_no;?>'  <br><br>  
                    <label>Train Name:</label>
                    <input type="text" name="name" value='<?php echo $name;?>'  placeholder="Train name" maxlength="200" width="600px"  ><br><br>
                    <label>Enter source:</label>
                    <input type="text" name="source" value='<?php echo $source;?>' placeholder="Source station" required><br><br>
                    <label>Enter destination:</label>
                    <input type="text" name="destination" value='<?php echo $destination;?>' placeholder="Destination station" required><br><br>
                    <label for="bogi">Enter the number of the bogi : </label>
                    <input type="radio" name="bogi" value="9">
                    <label>9</label>
                    <input type="radio" name="bogi" value="12">
                    <label>12</label>
                    <br><br>
                    <label>Type of train:</label>
                    <input type="radio" value="local" name="type">
                    <label>Local</label>
                    <input type="radio" value="galloping" name="type">
                    <label>Galloping</label>
                    <br><br>

                    <label>Enter the line:</label>
                    <input type="radio" value="Main" name="line">
                    <label>Main</label>
                    <input type="radio" value="Cod" name="line">
                    <label>Cod</label>
                    <br><br>

                    <label>Choose the direction:</label>
                    <input type="radio" value="UP" name="direction">
                    <label>UP</label>
                    <input type="radio" value="DOWN" name="direction">
                    <label>DOWN</label>
                    <br><br>

                    <label>Enter depurture time:</label>&nbsp;
                    <input type="time" name="departure_time" value='<?php echo $departure_time;?>' required>
                    <br><br>

                    <label>Enter arrival time:</label>
                    <input type="time" name="arrival_time" value='<?php echo $arrival_time;?>' required><br><br>


                    <label for="route_id">Choose a route id : </label>
                    <select name="route_id" id="" required>
                    <option value=" ">Choose a route name</option>
                                                <?php
                                $sql1="select * from train_route";
                                $res1=mysqli_query($conn,$sql1);
                                if(mysqli_num_rows($res1)>0){
                                    while($row1=mysqli_fetch_assoc($res1)){
                                    $id=$row1['route_id'];
                                    $name=$row1['route_station'];
                                    ?>
                                    <option value='<?php echo $id;?>'><?php echo $name; ?></option>
                                    <?php
                                    }
                                }

                                
                                
                                ?>
                    </select>

                    <br>
                    <br>
                    <?php
                        for($i=1;$i<=$halt;$i++){
                            echo "Enter the name of the halt station ".$i;
                            ?>
                           <?php
                            echo "<select name=halt$i required>";
                            ?>
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
                            <?php
                            echo "Halting time :  ";
                            
                            echo "<input type='time' name=time$i required>";
                            ?>
                            <br><br>
                            <?php
                        }
                    ?>

                    <br><br>

                    <input type="submit" class="submit" name="submit" value="ADD TRAIN DETAILS"><br>

                    
                    </div>
                    </form>
                    </body>
                    </html>
    <?php

}

?>