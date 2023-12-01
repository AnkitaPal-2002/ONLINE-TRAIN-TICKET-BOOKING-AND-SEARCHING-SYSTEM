<?php
    include("conn.php");
    session_start();
    $stylesheet_url = "style_train_add_php.css";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['submit'])){
            //var_dump($_POST);
            $train_no=$_POST['train_no'];
            $name=$_POST['name'];
            $source=$_SESSION['source'];
            $destination=$_SESSION['destination'];
            $bogi=$_POST['bogi'];
            $type=$_POST['type'];
            $departure_time=$_POST['departure_time'];
            $arrival_time=$_POST['arrival_time'];
            $line=$_POST['line'];
            $route_id=$_POST['route_id'];
            $no=$_SESSION['no'];
            $direction=$_POST['direction'];
            
            //$direction=$_POST['direction'];
            $query="select * from trains where train_id='$train_no'";
            $res=mysqli_query($conn,$query);
            if(mysqli_num_rows($res) == 1){
                #echo "Train no ".$train_no."already exists<br>";
                echo '<script>alert("Train details already exists.")
                window.location.href="train_add_form.php";
                </script>';
                
            }else{
                
                $sql="insert into trains(train_id, train_name, source_id, dest_id, bogi, train_type, departure_time, arrival_time, line, route_id, direction) values ('$train_no', '$name', '$source', '$destination', '$bogi', '$type', '$departure_time', '$arrival_time', '$line', '$route_id', '$direction')";
                $result = mysqli_query($conn,$sql);
                if($result === TRUE){
                    $url = "style_train_add_php.css";
                    echo "<link rel='stylesheet' href='{$stylesheet_url}'>";
                    ?>
                    <div class="container">
                    <h2 class="title">
                        <span class="title-word title-word-1">Train</span>
                        <span class="title-word title-word-2">details</span>
                        <span class="title-word title-word-3">added</span>
                        <span class="title-word title-word-4">successfully.</span>
                    </h2>
                    </div>
                    <?php
                    #echo "Train details added successfully";
                    for($i=1;$i<=$no;$i++){
                        $station_id=$_POST["halt$i"];
                        $time=$_POST["time$i"];
                        $sql1="insert into halting_time (train_id, station_id, time) values ('$train_no', '$station_id', '$time')";
                        $res1=mysqli_query($conn,$sql1);
                        if($res1 === TRUE){
                            //echo "haliting time inserted successfully.<br>";
                        }
                    }
                }else{
                    echo "Error: ".$sql."<br>".mysqli_error($conn);
                }
            }
            
        }
    }

    mysqli_close($conn);
?>