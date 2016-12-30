

<?php

$reporte = $_REQUEST['reporte'];
$fecha = $_REQUEST['fecha'];
$autor = $_REQUEST['autor'];
$filtro = $_REQUEST['filtro'];
$sql = $_REQUEST['sql'];

require('conexion.php');
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $title;
    global $fecha;
    global $autor;

	//$this->Cell(193,270,'',1,0,'L');
	$this->Cell(280,35,'',1,0,'L');
	
	// Logo
	$this->Image('logo.png',14,12,33);
	// Arial bold 15
	$this->SetFont('Arial','B',30);
	
	//Color
	$this->SetTextColor(0,0,102);
	// Salto de línea
	$this->Ln(10);
	// Movernos a la derecha
	//$this->Cell(80);
	// Título
	$this->Cell(0,0,$title,0,0,'R');

	$this->SetFont('Arial','i',12);
	$this->SetTextColor(0,0,0);
	$this->Cell(0,20,'Fecha y hora de emisión: '.$fecha,0,0,'R');
	$this->Cell(0,30,'Autor: '.$autor,0,0,'R');
	// Salto de línea
	$this->Ln(30);
	$this->Cell(280,145,'',1,0,'L');
	$this->Ln(1);



}

function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(0,0,102);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,102);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(25, 100, 80, 38, 37);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,210,210);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
     $fill = false;
    for($i=0;$i<count($data);$i=$i+5){
        $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$data[$i+3],'LR',0,'L',$fill);
        $this->Cell($w[4],6,$data[$i+4],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
   


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
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'CEUPROPSF -- Página '.$this->PageNo().'/{nb}',0,0,'C');
}
}



// Creación del objeto de la clase heredada
$pdf = new PDF('l','mm','A4');
$title = 'REPORTE - '.$reporte;
$pdf->SetTitle($title);
//$pdf->SetMargins(30, 25 , 30); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Filtrado por: '.$sql,0,1,'R');
// Títulos de las columnas
$header = array('Cédula', 'Apellidos y Nombres', 'E-mail','Tipo','Estado');
// Carga de datos

$data = null;

    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        //$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $data = [];

        while($fila = $stmt->fetchObject()){
            array_push($data, $fila->usu_ced);
            array_push($data, $fila->usu_ape.' '.$fila->usu_nom);
            array_push($data, $fila->usu_eml);
            array_push($data, $fila->tip_des);
            if($fila->usu_est)array_push($data, 'HABILITADO');else array_push($data, 'DESHABILITADO');
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }



//$data = [{'ecuador','quito','2000','140000'},{'colombia','bogota','3000','230032'}];
//$data = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
$pdf->FancyTable($header,$data);
for($i=1;$i<=40;$i++)
	//$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>
