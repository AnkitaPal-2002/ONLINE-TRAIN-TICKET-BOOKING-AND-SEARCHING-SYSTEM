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
$_SESSION['cardno']=$row['cardno'];
$_SESSION['idcard']=$row['idcard'];
$_SESSION['via']="NULL";
?>

<br><br><br>
<?php
echo "<h1 style='color:white;'><center>Welcome ".$row['firstname']." ".$row['lastname']."</h1></center><br>";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        $adult=$_POST['adult'];
        $child=$_POST['child'];
        $ticket_type=$_POST['ticket_type'];
        $source=$_POST['depart'];
        $_SESSION['source_id']=$source;
        $sql="select * from station where station_id='$source'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $source_name=$row['station_name'];
        $_SESSION['source_name']=$row['station_name'];
        
        $destination=$_POST['going_to'];
        $_SESSION['destination_id']=$destination;
        $sql1="select * from station where station_id='$destination'";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $destination_name=$row1['station_name'];
        $_SESSION['destination_name']=$row1['station_name'];

        $_SESSION['ticket_type']=$ticket_type;
        $_SESSION['source_id']=$source;
        $_SESSION['destination_id']=$destination;
        $_SESSION['adult']=$adult;
        $_SESSION['child']=$child;

        //var_dump($_SESSION);
        #echo $source;
        #echo $destination;
        if($source == $destination){
            echo "<script>
            alert('Please enter valid route!!!!');
            window.location.href='bookticket.php';
            </script>";
            
        }
        else if($source!='SDAH' && $destination!='SDAH'){
            //line finding
            $sql2="select * from station where station_id='$source'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($res2);
            $source_line=$row2['line'];

            $sql3="select * from station where station_id='$destination'";
            $res3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($res3);
            $destination_line=$row3['line'];

            //echo $source_line."<br>".$destination_line."<br>";

            if($source_line=='Junction' || $destination_line=='Junction'){
                $sql4="select * from dist_dur where station1='$source'";
                $res4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($res4);
                $dis_source=$row4['dist'];

                $sql5="select * from dist_dur where station1='$destination'";
                $res5=mysqli_query($conn,$sql5);
                $row5=mysqli_fetch_assoc($res5);
                $dis_destination=$row5['dist'];

                //echo $dis_source."<br>".$dis_destination;

                $distance=abs($dis_source-$dis_destination);
                if($distance>=1 && $distance<=20){
                    $adult_fare=5;
                    $child_fare=5;
                }
                else if($distance>=21 && $distance<=45){
                    $adult_fare=10;
                    $child_fare=5;
                }
                else if($distance>=46 && $distance<=70){
                    $adult_fare=15;
                    $child_fare=10;
                }
                else if($distance>=71 && $distance<=100){
                    $adult_fare=20;
                    $child_fare=10;
                }
                else if($distance>=101 && $distance<=135){
                    $adult_fare=25;
                    $child_fare=15;
                }
                else if($distance>=136 && $distance<=155){
                    $adult_fare=30;
                    $child_fare=15;
                }

                $fare=($adult*$adult_fare)+($child*$child_fare);

                /*$age=$row['age'];
                if($age<=4){
                    $fare=$child_fare;
                }else{
                    $fare=$adult_fare;
                }*/

                

                if($ticket_type=="return"){
                    $fare=2*$fare;
                }

                $_SESSION['fare']=$fare;
                ?>
                <center>
                <?php
                echo '<body background="print.jpeg" >';
                ?>
                <form action="pay.html" method="post">
                    <br>
                <b> <font size="5px" face="century gothic" color="white">
                    Depart from :
                    <input type="text" value="<?php echo $source." ".$source_name;?>" readonly>
                    <br><br>
                    Going to:
                    <input type="text" value="<?php echo $destination." ".$destination_name;?>" readonly>
                    <br><br>
                    No. of the adults : 
                    <input type="number" name="adult" value="<?php echo $adult;?>" readonly>
                    <br><br>
                    No. of the child:
                    <input type="number" name="child" value="<?php echo $child;?>" readonly>

                    <br><br>
                    Ticket type :
                    <input type="text" value="<?php echo $ticket_type;?>" readonly>
                    <br><br>
                
                
                    </b></font><font background-color="#fff" size="5px" > <input style="width: 100px; height: 30px;" type="submit" name="submit"  value='<?php echo "Rs. ".$fare;?>'></font>
                    </center>

                    </form>
                
                
                <?php
            }
            else if($source_line!=$destination_line){
                //distance from source to dumdum
                $sql6="select * from dist_dur where station1='DDJ'";
                $res6=mysqli_query($conn,$sql6);
                $row6=mysqli_fetch_assoc($res6);
                $dis6=$row6['dist'];

                $sql7="select * from dist_dur where station1='$source'";
                $res7=mysqli_query($conn,$sql7);
                $row7=mysqli_fetch_assoc($res7);
                $dis7=$row7['dist'];

                $dis_source=abs($dis6-$dis7);
                //echo $dis_source."<br>";

                //distance from destination to dumdum
                $sql8="select * from dist_dur where station1='DDJ'";
                $res8=mysqli_query($conn,$sql8);
                $row8=mysqli_fetch_assoc($res8);
                $dis8=$row8['dist'];

                $sql9="select * from dist_dur where station1='$destination'";
                $res9=mysqli_query($conn,$sql9);
                $row9=mysqli_fetch_assoc($res9);
                $dis9=$row9['dist'];

                $_SESSION['via']="DUMDUM DDJ";
                $dis_destination=abs($dis8-$dis9);
                //echo $dis_destination."<br>";

                $distance=$dis_source+$dis_destination;

                //echo $distance;

                if($distance>=1 && $distance<=20){
                    $adult_fare=5;
                    $child_fare=5;
                }
                else if($distance>=21 && $distance<=45){
                    $adult_fare=10;
                    $child_fare=5;
                }
                else if($distance>=46 && $distance<=70){
                    $adult_fare=15;
                    $child_fare=10;
                }
                else if($distance>=71 && $distance<=100){
                    $adult_fare=20;
                    $child_fare=10;
                }
                else if($distance>=101 && $distance<=135){
                    $adult_fare=25;
                    $child_fare=15;
                }
                else if($distance>=136 && $distance<=155){
                    $adult_fare=30;
                    $child_fare=15;
                }

                /*$age=$row['age'];
                if($age<=4){
                    $fare=$child_fare;
                }else{
                    $fare=$adult_fare;
                }*/

                $fare=($adult*$adult_fare)+($child*$child_fare);

                if($ticket_type=="return"){
                    $fare=2*$fare;
                }

                $_SESSION['fare']=$fare;
                ?>
                <center>
                <?php
                echo '<body background="print.jpeg" >';
                ?>
                <form action="pay.html" method="post">
                    <br><br>
                <b> <font size="5px" face="century gothic" color="white">
                    Depart from :
                    <input type="text" value="<?php echo $source." ".$source_name;?>" readonly>
                    <br><br>
                    Going to:
                    <input type="text" value="<?php echo $destination." ".$destination_name;?>" readonly>
                    <br><br>
                    Via :
                    <input type="text" name="via" value="DUMDUM JUNCTION DDJ" readonly>
                    <br><br>
                    No. of the adults : 
                    <input type="number" name="adult" value="<?php echo $adult;?>" readonly>
                    <br><br>
                    No. of the child:
                    <input type="number" name="child" value="<?php echo $child;?>" readonly>

                    <br><br>
                    Ticket type :
                    <input type="text" name="ticket_type" value="<?php echo $ticket_type;?>" readonly>
                    <br><br>
                    <?php

                    ?>
                
                    </b></font><font background-color="#fff" size="5px"> <input type="submit" name="submit"  value='<?php echo "Rs. ".$fare;?>'></font>
                    </center>

                    </form>
                <?php
                ?>
                </center>
                <?php
            }
            else if($source_line==$destination_line){
                $sql10="select * from dist_dur where station1='$source'";
                $res10=mysqli_query($conn,$sql10);
                $row10=mysqli_fetch_assoc($res10);
                $dis10=$row10['dist'];

                $sql11="select * from dist_dur where station1='$destination'";
                $res11=mysqli_query($conn,$sql11);
                $row11=mysqli_fetch_assoc($res11);
                $dis11=$row11['dist'];

                $distance=abs($dis11-$dis10);

                if($distance>=1 && $distance<=20){
                    $adult_fare=5;
                    $child_fare=5;
                }
                else if($distance>=21 && $distance<=45){
                    $adult_fare=10;
                    $child_fare=5;
                }
                else if($distance>=46 && $distance<=70){
                    $adult_fare=15;
                    $child_fare=10;
                }
                else if($distance>=71 && $distance<=100){
                    $adult_fare=20;
                    $child_fare=10;
                }
                else if($distance>=101 && $distance<=135){
                    $adult_fare=25;
                    $child_fare=15;
                }
                else if($distance>=136 && $distance<=155){
                    $adult_fare=30;
                    $child_fare=15;
                }
                /*
                $age=$row['age'];
                if($age<=4){
                    $fare=$child_fare;
                }else{
                    $fare=$adult_fare;
                }*/

                $fare=($adult*$adult_fare)+($child*$child_fare);

                if($ticket_type=="return"){
                    $fare=2*$fare;
                }

                $_SESSION['fare']=$fare;
                ?>
                <center>
                <?php
                echo "<body background='print.jpeg' >";
                ?>
            
                <form action="pay.html" method="post" target="_blank">
                    <br><br>
                <b> <font size="5px" face="century gothic" color="white">
                    Depart from :
                    <input type="text" value="<?php echo $source." ".$source_name;?>" readonly>
                    <br><br>
                    Going to:
                    <input type="text" value="<?php echo $destination." ".$destination_name;?>" readonly>
                    <br><br>
                    No. of the adults : 
                    <input type="number" name="adult" value="<?php echo $adult;?>">
                    <br><br>
                    No. of the child:
                    <input type="number" name="child" value="<?php echo $child;?>">

                    <br><br>
                    Ticket type :
                    <input type="text" value="<?php echo $ticket_type;?>">
                    <br><br>
                    <?php

                    ?>
                
                    </b></font><font background-color="#fff" size="5px"> <input type="submit" name="submit"  value='<?php echo "Rs. ".$fare;?>'></font>
                    </center>

                    </form>
                <?php
                ?>
                </center>
                <?php

            }

            //insert ticket information into ticket table


        }
        else{
            $sql1="select * from dist_dur where station1='$source' and station2='$destination'";
            $res=mysqli_query($conn,$sql1);
            $row_route=mysqli_fetch_assoc($res);
            #var_dump($row_route);
            //$age=$row['age'];
            $adult_fare=$row_route['adult_fare'];
            $child_fare=$row_route['child_fare'];
            /*
            if($age<=4){
                $fare=$child_fare;
            }else{
                $fare=$adult_fare;
            }*/

            $fare=($adult*$adult_fare)+($child*$child_fare);

            if($ticket_type=="return"){
                $fare=2*$fare;
            }
            $_SESSION['fare']=$fare;

            ?>
            <center>
                <?php
            echo '<body background="print.jpeg" >';
            ?>
                <center>
                <form action="pay.html" method="post">
                    <br><br>
                <b> <font size="5px" face="century gothic" color="white">
                    Depart from :
                    <input type="text" value="<?php echo $source." ".$source_name;?>" readonly>
                    <br><br>
                    Going to:
                    <input type="text" value="<?php echo $destination." ".$destination_name;?>" readonly>
                    <br><br>
                    No. of the adults : 
                    <input type="number" name="adult" value="<?php echo $adult;?>">
                    <br><br>
                    No. of the child:
                    <input type="number" name="child" value="<?php echo $child;?>">

                    <br><br>
                    Ticket type :
                    <input type="text" value="<?php echo $ticket_type;?>">
                    <br><br>
                    <?php

                    ?>
                
                    </b></font><font background-color="#fff" size="5px"> <input type="submit" name="submit"  value='<?php echo "Rs. ".$fare;?>'></font>
                    </center>

                    </form>
            
            <?php
            ?>
            </center>
            <?php
        }
    }
}

?>