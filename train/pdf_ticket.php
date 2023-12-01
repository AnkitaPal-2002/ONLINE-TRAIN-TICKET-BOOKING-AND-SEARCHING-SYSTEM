<?php
include("conn.php");

$ticket_id=$_GET['ticket'];


$sql="select * from ticket where ticket_id='$ticket_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$username=$row['username'];

$sql1="select * from passenger where username='$username'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);


require('fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFillColor(255, 192, 203);
    $pdf->SetFont("Times","B","18");
    
    $pdf->Cell(0,20,"Ticket Details",0,1,'C');
    $pdf->SetFont("Times","","16");
    $pdf->Cell(0,10,"Ticket booking date : ".$row['date'],0,0,'L');
    $pdf->Cell(0,10,"Ticket booking time : ".$row['time'],0,1,'R');
    
    if($row['source_id'] != $row['destination_id']){
        $pdf->Cell(0,10,"Source : ".$row['source_name']." ( ".$row['source_id']." )",0,0,'L');
        $pdf->Cell(0,10,"Destination : ".$row['destination_name']." (" .$row['destination_id']." )",0,1,'R');
    }
    else{
        $pdf->Cell(0,10,"Station name : ".$row['source_name']." ( ".$row['source_id']." )",0,1,'L');
    }
    
    if($row['via']!="NULL"){
        $pdf->Cell(20,20,"Via :".$row['via'],0,1,'L');
    }

    $pdf->Cell(0,10,"ID Card name :".$row1['idcard'],0,0,'L');
    $pdf->Cell(0,10,"ID Card No :".$row1['cardno'],0,1,'R');

    $pdf->Cell(20,20,"Name :",0,0,'');
    $pdf->Cell(0,20,$row['firstname']." ".$row['lastname'],0,1,'');
    $pdf->Cell(0,20,"Age : ".$row['age'],0,1,'');

    $pdf->Cell(0,20,"Ticket Name : ".$row['ticket_name'],0,1,'');

    if($row['ticket_type']!="NULL"){
        $pdf->Cell(0,20,"Ticket type : ".$row['ticket_type'],0,1,'');
    }

    $pdf->Cell(0,20,"Amount : Rs.".$row['fare']." /-",0,1,'');
    $pdf->Cell(0,20,"No. of persons travel by this ticket -> Adult : ".$row['adult']." Child : ".$row['child'],0,1,'');

    $pdf->SetFont("Times","BI","18");

    if($row['ticket_type']!="NULL"){
        $pdf->Cell(0,20,"***Journey should commence between 1 hour***",0,1,'C');
    }
    else{
        $pdf->Cell(0,20,"***This ticket is valid for 1 day***",0,1,'C');
    }



    $pdf->output();


?>