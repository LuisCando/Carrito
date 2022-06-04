<?php

require("fpdf/fpdf.php");
include("Admin/BDD/conexion.php");

$sql = "select * from productos";

    $result = $conn->query($sql);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Times","",20);
    $pdf->Cell(60);
    $pdf->SetTextColor(62,95,138);
    $pdf->Cell(80,10,"Reportes de Productos");
    $pdf->Ln();
    $pdf->SetFont("Times","",15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(15,10,"Id");
    $pdf->Cell(40,10,"Nombres");
    $pdf->Cell(100,10,"Detalle");
    $pdf->Cell(30,10,"Precio");
    $pdf->SetFont("Times","I",15);
    $pdf->Ln();

    $pdf -> SetTextColor(0,0,0);

    while($row = $result->fetch_assoc()){
        $pdf->Cell(15,10,$row['id_productos'],true);
        $pdf->Cell(40,10,$row['nombre'],true);
        $pdf->Cell(100,10,$row['detalle'],true);
        $pdf->Cell(30,10,$row['precio'],true);
        $pdf->Ln();
    }

    $pdf->Output();

    ?>