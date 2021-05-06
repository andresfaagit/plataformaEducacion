<?php
require('fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(90);
        // Título
        $this->Cell(10,10,'',10,10,'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,' '.$this->PageNo().'/{nb}',0,0,'C');
    }
}


?>

