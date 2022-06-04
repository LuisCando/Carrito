<?php

require("fpdf/fpdf.php");

$pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont("Times","",20);
    $pdf->Cell(70);
    $pdf->SetTextColor(62,95,138);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,5,"Oficina",);
    $pdf->Cell(80,5,"Codigo");
    $pdf->Cell(40,5,"Tipo de servicios");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,10,"",true);
    $pdf->Cell(80,10,"",true);
    $pdf->Cell(40,10,"",true);
    $pdf->Ln();
    $pdf->Cell(80);
    $pdf->Cell(45,5,"Tipo de servicios");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->Cell(160,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,5,"Cedula",);
    $pdf->Cell(60,5,"Provincia");
    $pdf->Cell(40,5,"Ciudad");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(40,10,"",true);
    $pdf->Ln();
    
    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,5,"Direccion",);
    $pdf->Cell(60,5,"Telefono");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,5,"Total matricula",);
    $pdf->Cell(100,5,"Sello");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,20,"",true);
    $pdf->Cell(100,20,"",true);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();



    
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,5,"Factura",);
    $pdf->Cell(80,5,"Anio");
    $pdf->Cell(40,5,"Fecha matricula");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,10,"",true);
    $pdf->Cell(80,10,"2022",true);
    $pdf->Cell(40,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,5,"Marca",);
    $pdf->Cell(60,5,"Clase");
    $pdf->Cell(40,5,"Tipo");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(40,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,5,"Anio modelo",);
    $pdf->Cell(80,5,"Modelo");
    $pdf->Cell(40,5,"Pais origen");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,10,"",true);
    $pdf->Cell(80,10,"",true);
    $pdf->Cell(40,10,"",true);
    $pdf->Ln();
    
    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,5,"Direccion",);
    $pdf->Cell(60,5,"Telefono");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,5,"No motor",);
    $pdf->Cell(60,5,"Color P");
    $pdf->Cell(30,5,"Color S");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(70,10,"",true);
    $pdf->Cell(30,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,5,"No chasis",);
    $pdf->Cell(60,5,"Peso");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(100,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,5,"No motor",);
    $pdf->Cell(60,5,"Fecha Caducidad");
    $pdf->Cell(60,5,"Cilindraje");
    $pdf->Ln();
    $pdf->Cell(15);
    $pdf->SetFont("Times","",11);
    $pdf->SetTextColor(220,50,50);
    $pdf->Cell(40,10,"",true);
    $pdf->Cell(60,10,"",true);
    $pdf->Cell(60,10,"",true);
    




    $pdf->Output();
?>