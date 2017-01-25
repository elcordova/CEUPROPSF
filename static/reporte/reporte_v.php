<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	global $title;

	//$this->Cell(193,270,'',1,0,'L');
	$this->Cell(193,35,'',1,0,'L');
	
	// Logo
	$this->Image('images/CUPROSF.png',14,12,33);
	// Arial bold 15
	$this->SetFont('Arial','B',30);
	
	//Color
	$this->SetTextColor(0,0,102);
	// Salto de l�nea
	$this->Ln(10);
	// Movernos a la derecha
	//$this->Cell(80);
	// T�tulo
	$this->Cell(0,0,$title,0,0,'R');

	$this->SetFont('Arial','i',12);
	$this->SetTextColor(0,0,0);
	$this->Cell(0,20,'Fecha y hora de emisi�n: 24-04-2017 16:30',0,0,'R');
	$this->Cell(0,30,'Autor: Cristhian Delgado',0,0,'R');
	// Salto de l�nea
	$this->Ln(30);
	$this->Cell(193,225,'',1,0,'L');
	$this->Ln(1);



}

function FancyTable($header, $data)
{
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(0,0,102);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,102);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(40, 35, 45, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    $this->Cell($w[0],6,'ECUADORECUADOR','LR',0,'L',$fill);
    $this->Cell($w[1],6,'ECUADOR','LR',0,'L',$fill);
    $this->Cell($w[2],6,'ECUADOR','LR',0,'R',$fill);
    $this->Cell($w[3],6,'ECUADOR','LR',0,'R',$fill);
    $this->Ln();
    $this->Cell($w[0],6,'ECUADOR','LR',0,'L',$fill);
    $this->Cell($w[1],6,'ECUADOR','LR',0,'L',$fill);
    $this->Cell($w[2],6,'ECUADOR','LR',0,'R',$fill);
    $this->Cell($w[3],6,'ECUADOR','LR',0,'R',$fill);
    $this->Ln();

    /*
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    */
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'CEUPROPSF -- P�gina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Tabla coloreada



// Creaci�n del objeto de la clase heredada
$pdf = new PDF('P','mm','A4');
$title = 'REPORTE - USUARIO';
$pdf->SetTitle($title);
//$pdf->SetMargins(30, 25 , 30); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$filtro = 'Todos';
$pdf->Cell(0,10,'Filtrado por: '.$filtro,0,1,'R');
// T�tulos de las columnas
$header = array('Pa�s', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
// Carga de datos
//$data = [{'ecuador','quito','2000','140000'},{'colombia','bogota','3000','230032'}];
$data = array('Pa�s', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
$pdf->FancyTable($header,$data);
for($i=1;$i<=40;$i++)
	//$pdf->Cell(0,10,'Imprimiendo l�nea n�mero '.$i,0,1);
$pdf->Output();
?>
