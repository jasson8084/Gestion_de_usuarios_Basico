<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Registro de Pasantes', 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(180, 180, 180);
        $this->SetTextColor(0);
        $this->Cell(25, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(50, 10, 'NOMBRES', 1, 0, 'C', true);
        $this->Cell(50, 10, 'EMAIL', 1, 0, 'C', true);
        $this->Cell(60, 10, 'FECHA DE REGISTRO', 1, 1, 'C', true); // Agrega un salto de línea
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Reporte de Pasantes', 0, 0, 'C');
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

include('conexionDB.php');
$consulta = "SELECT * FROM datos";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0);
$pdf->SetFillColor(255);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(25, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['nombre'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['email'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['fecha_reg'], 1, 1, 'C'); // Agrega un salto de línea
}
$pdf->Output();
?>
