<?php

require("fpdf/fpdf.php");
include("Admin/BDD/conexion.php");
session_start();
$subTotal = 0;
$IVA =0;
$aPagar =0;

$idCli = $_GET['id_clientes'];
$idFac = $_GET['facturas'];


$sql = "select * from productos;";
$sql = "select * from clientes where id_clientes = $idCli;";

    $result = $conn->query($sql);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Times","",20);
    $pdf->Cell(70);
    $pdf->SetTextColor(62,95,138);
    $pdf->Cell(80,10,"Factura de compra");
    $pdf->Ln();
    $pdf->SetFont("Times","",15);
    $pdf->Cell(160);
    $pdf->Cell(20,10,"N Factura: ");
    $pdf -> SetTextColor(0,0,0);  
    $pdf->Cell(5);
    $pdf->Cell(20,10,$idFac);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont("Times","",15);
    $pdf->SetTextColor(220,50,50);
    

    while($row = $result->fetch_assoc()){
        $nombre = $row['nombres'];
        $cedula = $row['cedula'];
    }

        $pdf->Cell(20,10,"Cliente: ");
        $pdf -> SetTextColor(0,0,0);  
        $pdf->Cell(0,10,$nombre);
        $pdf->Ln();
        $pdf->SetTextColor(220,50,50);
        $pdf->Cell(20,10,"Cedula: ");
        $pdf -> SetTextColor(0,0,0);  
        $pdf->Cell(0,10,$cedula);
        $pdf->Ln();
        $pdf->Ln();

//    foreach ( $_SESSION["CARRITO"] as $elemento ){
//        $pdf->Cell(60,10,$elemento['factura']);
//        $pdf->Ln();
        
//    }
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,10,"Producto",true);
    $pdf->Cell(60,10,"Detalle");
    $pdf->Cell(55,10,"Cantidad");
    $pdf->Cell(10,10,"Precio");
    $pdf->SetFont("Times","I",15);
    $pdf->Ln();

    $pdf -> SetTextColor(0,0,0);   
    
    foreach ( $_SESSION["CARRITO"] as $elemento ) {
        //print_r($elemento);
        //echo "<br><br>";

        $pdf->Cell(60,10,$elemento['nombre'],true);
        $pdf->Cell(55,10,$elemento['precio'],true);
        $pdf->Cell(45,10,$elemento['cantidad'],true);
        $pdf->Cell(30,10,$elemento['importe'],true);
        $pdf->Ln();

        $subTotal += $elemento["importe"];
        $IVA =$subTotal * 0.12;
        $aPagar = $subTotal + $IVA; 
        
    }

    $pdf->SetFont("Times","",15);
    $pdf->Cell(120);
    $pdf->Cell(40,10,"Subtotal:");
    $pdf->Cell(0,10,"$subTotal",true);
    $pdf->Ln();

    $pdf->Cell(120);
    $pdf->Cell(40,10,"Iva:");
    $pdf->Cell(0,10,"$IVA",true);
    $pdf->Ln();
    
    $pdf->Cell(120);
    $pdf->Cell(40,10,"Total:");    
    $pdf->Cell(0,10,"$aPagar",true);
    $pdf->Ln();

    $pdf->SetY(-31);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Número de página
    $pdf->Cell(0,0,'Page '.$pdf->PageNo(),0,0,'C');

    $pdf->Output();

    ?>