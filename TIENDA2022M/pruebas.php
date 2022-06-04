<?php

    require("fpdf/fpdf.php");
    
    $objFpdf = new FPDF('p','mm','A4');
    $objFpdf -> Addpage();
    $objFpdf -> SetFont("Times","",32);
    $objFpdf -> Image("img/productos/celu.jpg",80,80,50,50,"JPG");
    $objFpdf -> SetTextColor(220,50,50);

    for ($i=0;$i<5;$i++){

        $objFpdf -> Cell(60);
        $objFpdf -> Cell(40,10,"HOLA ISTVN"); 
        $objFpdf -> Ln();   //Salto de linea
    }

    $objFpdf->Output();
    ?>
