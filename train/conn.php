<?php
$server="localhost";
$user="root";
$pass="";
$dbname="my_db";

$conn=mysqli_connect($server,$user,$pass,$dbname);

if(!$conn){
    echo mysqli_connect_error();
}
/*else{
    ?>
    <script>
        alert('Connection successful');
    </script>
    <?php
}
*/
?>