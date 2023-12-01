<?php
session_start();
    //$bg_color = '#E6E6FA'; // Red background color 
    //echo "<body style='background-color: $bg_color;'>"; 
    $username=$_SESSION['puser'];
    $firstname=$_SESSION['fname'];
    $lastname=$_SESSION['lname'];
    $age=$_SESSION['age'];
    //$ticket_type=$_SESSION['ticket_type'];
    $ticket_name="Platform Ticket";
    $fare=$_SESSION['fare'];
    $date=date("Y-m-d");
    date_default_timezone_set('Asia/Kolkata');
    $time = date('H:i:s');
    
    $adult=$_SESSION['adult'];
    $child=$_SESSION['child'];
    $source_id=$_SESSION['source_id'];
    $source=$_SESSION['source_name'];
    $idcard=$_SESSION['idcard'];
    
    $cardno=$_SESSION['cardno'];
    $via=$_SESSION['via'];
    require('fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFillColor(255, 192, 203);
    $pdf->SetFont("Times","B","18");
    
    $pdf->Cell(0,20,"Ticket Details",0,1,'C');
    $pdf->SetFont("Times","","16");
    $pdf->Cell(0,10,"Ticket booking date : ".$date,0,0,'L');
    $pdf->Cell(0,10,"Ticket booking time : ".$time,0,1,'R');
    $pdf->Cell(0,10,"Source : ".$source." ( ".$source_id." )",0,1,'L');
   
    if($via!="NULL"){
        $pdf->Cell(20,20,"Via :".$via,0,1,'');
    }
    $pdf->Cell(20,20,"ID Card name :".$idcard,0,1,'');
    $pdf->Cell(20,20,"ID Card No :".$cardno,0,1,'');
    $pdf->Cell(20,20,"Name :",0,0,'');
    $pdf->Cell(0,20,$firstname." ".$lastname,0,1,'');
    $pdf->Cell(0,20,"Age : ".$age,0,1,'');
    
    $pdf->Cell(0,20,"Ticket Name : ".$ticket_name,0,1,'');
    $pdf->Cell(0,20,"Amount : Rs.".$fare." /-",0,1,'');
    $pdf->Cell(0,20,"No. of persons travel by this ticket -> Adult : ".$adult." Child : ".$child,0,1,'');
    $pdf->SetFont("Times","BI","18");
    $pdf->Cell(0,20,"***Ticket is valid for 1 day***",0,1,'C');
    $pdf->output();


?>