

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

    global $reporte;
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(0,0,102);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,102);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    if($reporte=='USUARIO')$w = array(25, 100, 80, 38, 37);
    if($reporte=='PACIENTE')$w = array(25, 118, 20, 30, 20, 30, 37);
    if($reporte=='MEDICO')$w = array(25, 100, 80, 38, 37);
    if($reporte=='EVENTO')$w = array(110, 30, 30, 110);
    if($reporte=='TALLER')$w = array(130, 30, 120);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,210,210);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
     $fill = false;

    if($reporte=='USUARIO'){
        for($i=0;$i<count($data);$i=$i+5){
            $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$data[$i+3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$data[$i+4],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

    if($reporte=='PACIENTE'){
        for($i=0;$i<count($data);$i=$i+7){
            $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$data[$i+3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$data[$i+4],'LR',0,'L',$fill);
            $this->Cell($w[5],6,$data[$i+5],'LR',0,'L',$fill);
            $this->Cell($w[6],6,$data[$i+6],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

    if($reporte=='MEDICO'){
        for($i=0;$i<count($data);$i=$i+5){
            $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$data[$i+3],'LR',0,'L',$fill);
            $this->Cell($w[4],6,$data[$i+4],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

    if($reporte=='EVENTO'){
        for($i=0;$i<count($data);$i=$i+4){
            $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
            $this->Cell($w[3],6,$data[$i+3],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

    if($reporte=='TALLER'){
        for($i=0;$i<count($data);$i=$i+3){
            $this->Cell($w[0],6,$data[$i],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$data[$i+1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$data[$i+2],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
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
$pdf->Cell(0,10,'Filtrado por: '.$filtro,0,1,'R');
// Títulos de las columnas
if($reporte=='USUARIO')$header = array('Cédula', 'Apellidos y Nombres', 'E-mail','Tipo','Estado');
if($reporte=='PACIENTE')$header = array('Cédula', 'Apellidos y Nombres', 'Sexo','E. Civil','T. Sangre','F. Nacimiento','Estado');
if($reporte=='MEDICO')$header = array('Cédula', 'Apellidos y Nombres', 'E-mail','Teléfono','Estado');
if($reporte=='EVENTO')$header = array('Título', 'Fecha Inicio', 'Fecha Fin','Dirección');
if($reporte=='TALLER')$header = array('Tema', 'Fecha', 'Evento');
// Carga de datos

$data = null;

    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        //$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $data = [];

        while($fila = $stmt->fetchObject()){
            if($reporte=='USUARIO'){
                array_push($data, $fila->usu_ced);
                array_push($data, $fila->usu_ape.' '.$fila->usu_nom);
                array_push($data, $fila->usu_eml);
                //array_push($data, $fila->tip_des);
                array_push($data, 'USUARIO');
                if($fila->usu_est)array_push($data, 'HABILITADO');else array_push($data, 'DESHABILITADO');
            }
            if($reporte=='PACIENTE'){
                array_push($data, $fila->pac_ced);
                array_push($data, $fila->pac_ape.' '.$fila->pac_nom);
                array_push($data, $fila->pac_sex);
                array_push($data, $fila->pac_est_civ);
                array_push($data, $fila->pac_tip_san);
                array_push($data, $fila->pac_fec_nac);
                if($fila->pac_est)array_push($data, 'HABILITADO');else array_push($data, 'DESHABILITADO');
            }
            if($reporte=='MEDICO'){
                array_push($data, $fila->med_ced);
                array_push($data, $fila->med_ape.' '.$fila->med_nom);
                array_push($data, $fila->med_eml);
                array_push($data, $fila->med_tel);
                if($fila->med_est)array_push($data, 'HABILITADO');else array_push($data, 'DESHABILITADO');
            }
            if($reporte=='EVENTO'){
                array_push($data, $fila->eve_tit);
                array_push($data, $fila->eve_fec_ini);
                array_push($data, $fila->eve_fec_fin);
                array_push($data, $fila->eve_dir);
            }
            if($reporte=='TALLER'){
                array_push($data, $fila->tal_tem);
                array_push($data, $fila->tal_fec);
                array_push($data, $fila->eve_tit);
            }
            
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
