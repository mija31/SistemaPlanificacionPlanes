<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('imagenes/img.jpg', 10, 10, 20, 20);
    // Arial bold 15
    $this->SetFont('Arial','',12);
    // Move to the right
    $this->Cell(80);
    $this->SetXY(110,20);
    // Title
    $this->Cell(0, 0,'Universidad Mayor de San Simon',2,2,'L');
    // Line break
    $this->Ln(25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Instanciation of inherited class

//---------------- ENCABEZADO Y PIE DE PAGINA ------------------
/*class PDF extends FPDF
  {
     // Cabecera de página
     function Header()
         {
           $this->Image('imagenes/img.jpg', 6, 6, 20, 20);
           $this->SetFont('Arial','B',15);
           $this->SetXY(110,20);
           $this->Cell(18,5,'Plan Global',2,2,'C');
           //$this->Cell(90,10,utf8_decode('IMPRESIÓN DE REGISTRO'),0,0,'C');
           $this->Ln(25);
         }
                        
      // Pie de página
     function Footer()
         {
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           //$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}   - - - -   Impreso el ' . ' a las ' . date('H:i:s') . ' hora del servidor',0,0,'C');
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
         }
 }*/


$pdf = new PDF();
//$pdf->FechaActualCompleta();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);
$pdf->SetTopMargin(30);
$pdf->AddPage();
//$pdf->Ln();
//$justi=$_POST['justificacion'];
//	$proposito=$_POST['propositos'];
//	$objetivo=$_POST['obj_gral1'];
        
$pdf->Write(12,'Justificacion');
$pdf->Ln();
//$pdf->Write(11,$_POST['justificacion']);
$pdf->Ln();
$pdf->Write(12,'Propositos:');
$pdf->Ln();
//$pdf->Write(11,$_POST['propositos']);
$pdf->Ln();
$pdf->Write(12,'Objetivos:');
$pdf->Ln();
//$pdf->Write(11,$_POST['obj_gral1']);

$pdf->Output("/documentos/plan_global_antiguo.pdf",'F');
        //echo "<script language='javascript'>window.open('/documentos/plan_global_antiguo.pdf','_self','');</script>";//para ver el archivo pdf generado
        //exit;
        //echo "Plan Global Creado Correctamente!!";
?>


