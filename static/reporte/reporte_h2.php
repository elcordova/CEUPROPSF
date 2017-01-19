

<?php
error_reporting(0);
$reporte = $_REQUEST['reporte'];
$fecha = $_REQUEST['fecha'];
$autor = $_REQUEST['autor'];
$filtro = $_REQUEST['filtro'];
$sql = $_REQUEST['sql'];

//$reporte= 'HISTORIA CLÍNICA';

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
    $w = array(25, 118, 20, 30, 20, 30, 37);
   
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,210,210);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
     $fill = false;


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





$data = null;
$data_consultas = null;
try {
    $db = getConnection();
    $stmt = $db->query($sql);
    //$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;

    $data = [];
    $data_consultas = [];

    while($fila = $stmt->fetchObject()){
        array_push($data_consultas, $fila->con_id);
        array_push($data, $fila->pac_ced);
        array_push($data, $fila->pac_ape.' '.$fila->pac_nom);
        array_push($data, $fila->pac_sex);
        array_push($data, $fila->pac_est_civ);
        array_push($data, $fila->pac_tip_san);
        array_push($data, $fila->pac_fec_nac);
        array_push($data, $fila->pac_dir);
        array_push($data, $fila->pac_cor);
        if($fila->pac_est)array_push($data, 'ACTIVO');else array_push($data, 'PASIVO');
        
        
    }


    
} catch(PDOException $e) {
    $e->getMessage();
}

if(!count($data)>0){echo 'SIN DATOS';}






 // Colores, ancho de línea y fuente en negrita
$pdf->SetFillColor(0,0,102);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,102);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');

   
$pdf->Cell(280,7,'DATOS DE PACIENTE',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(20,7,'CEDULA',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(50,7,$data[0],1,0,'',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(70,7,'APELLIDOS Y NOMBRES',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(140,7,$data[1],1,0,'',true);

$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(20,7,'SEXO',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(20,7,$data[3],1,0,'',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(50,7,'FECHA NAC.',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(50,7,$data[6],1,0,'',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'EST. CIVIL',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(35,7,$data[4],1,0,'',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'T. SANGRE',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(35,7,$data[5],1,0,'',true);

$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'DOMICILIO',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(105,7,$data[7],1,0,'',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'E-MAIL',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(105,7,$data[7],1,0,'',true);

$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'ESTADO',1,0,'C',true);

$pdf->SetFillColor(210,190,210);
$pdf->SetTextColor(0);
$pdf->Cell(50,7,$data[7],1,0,'',true);

$pdf->Ln();

$pdf->SetFillColor(0,0,102);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'HISTORIA CLINICA',1,0,'C',true);
$pdf->Ln();

$pdf->SetFont('','',10);

//////////////////////////////SIGNOS VITALES

$data_signos_vitales = null;
$data_signos_vitales = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from signos_vitales as s, consulta as c where s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_signos_vitales, $fila->fecha);
            array_push($data_signos_vitales, $fila->fc);
            array_push($data_signos_vitales, $fila->ta);
            array_push($data_signos_vitales, $fila->t);
            array_push($data_signos_vitales, $fila->fr);
            array_push($data_signos_vitales, $fila->peso);
            array_push($data_signos_vitales, $fila->talla);
            array_push($data_signos_vitales, $fila->imc);
            array_push($data_signos_vitales, $fila->cintura);
            array_push($data_signos_vitales, $fila->cadera);
            array_push($data_signos_vitales, $fila->icc);
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}




$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'SIGNOS VITALES',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(22,7,'F',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(22,7,'T',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(22,7,'F',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(22,7,'T',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(28,7,'PESO',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(28,7,'TALLA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(25,7,'IMC',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(26,7,'CINTURA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(25,7,'CADERA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(25,7,'ICC',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_signos_vitales);$i=$i+11){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,7,$data_signos_vitales[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(22,7,$data_signos_vitales[$i+1],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(22,7,$data_signos_vitales[$i+2],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(22,7,$data_signos_vitales[$i+3],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(22,7,$data_signos_vitales[$i+4],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(28,7,$data_signos_vitales[$i+5],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(28,7,$data_signos_vitales[$i+6],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(25,7,$data_signos_vitales[$i+7],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(26,7,$data_signos_vitales[$i+8],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(25,7,$data_signos_vitales[$i+9],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(25,7,$data_signos_vitales[$i+10],1,0,'',false);

    $pdf->Ln();

}






///////////////////////EXAMEN SOMATICO GENERAL


$data_examen_somatico = null;
$data_examen_somatico = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from somatico_general as s, consulta as c where s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_examen_somatico, $fila->fecha);
            array_push($data_examen_somatico, $fila->sg_apariencia);
            array_push($data_examen_somatico, $fila->sg_facie);
            array_push($data_examen_somatico, $fila->sg_biotipo);
            array_push($data_examen_somatico, $fila->sg_en);
            array_push($data_examen_somatico, $fila->sg_actitud);
            array_push($data_examen_somatico, $fila->sg_deambula);
            array_push($data_examen_somatico, $fila->sg_ap);
            array_push($data_examen_somatico, $fila->sg_piel);
            array_push($data_examen_somatico, $fila->sg_unias);
            array_push($data_examen_somatico, $fila->sg_pelo);
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}



$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'EXAMEN SOMATICO GENERAL',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_examen_somatico);$i=$i+11){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,70,$data_examen_somatico[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'APARIENCIA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'FASCIE',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'BIOTIPO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(55,7,'ESTADO NUTRICIONAL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(190,7,$data_examen_somatico[$i+4],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'ACTITUD',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+5],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'DEAMBULA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+6],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(60,7,'ACTIVIDAD PSICOMOTRIZ',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(185,7,$data_examen_somatico[$i+7],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PIEL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+8],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'UÑAS',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+9],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PELO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_somatico[$i+10],1,0,'',false);

    $pdf->Ln();
}

///////////////EXAMEN FISICO REGIONAL

$data_examen_fisico = null;
$data_examen_fisico = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from examen_fisico_regional as s, consulta as c where s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_examen_fisico, $fila->fecha);
            array_push($data_examen_fisico, $fila->efr_cabeza);
            array_push($data_examen_fisico, $fila->efr_oidos);
            array_push($data_examen_fisico, $fila->efr_ojos);
            array_push($data_examen_fisico, $fila->efr_nariz);
            array_push($data_examen_fisico, $fila->efr_boca);
            array_push($data_examen_fisico, $fila->efr_cuello);
     
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'EXAMEN FISICO REGIONAL',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_examen_fisico);$i=$i+7){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,42,$data_examen_fisico[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'CABEZA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'OIDO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'OJOS',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'NARIZ',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+4],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'BOCA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+5],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'CUELLO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_examen_fisico[$i+6],1,0,'',false);

    $pdf->Ln();

}



////////////////////////////////////////////REVISION

$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'REVISION POR APARATOS Y SISTEMA',1,0,'R',true);
$pdf->Ln();


////////RESPIRATORIO

$data_revision_respiratorio = null;
$data_revision_respiratorio = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from revision_aparatos_sistemas as s, consulta as c where s.as_id=1 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_revision_respiratorio, $fila->fecha);
            array_push($data_revision_respiratorio, $fila->ras_inspeccion);
            array_push($data_revision_respiratorio, $fila->ras_palpacion);
            array_push($data_revision_respiratorio, $fila->ras_percusion);
            array_push($data_revision_respiratorio, $fila->ras_auscultacion);
     
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}


$pdf->SetFillColor(123,188,123);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'RESPIRATORIO',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_revision_respiratorio);$i=$i+5){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,28,$data_revision_respiratorio[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'INSPECCION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_respiratorio[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALPITACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_respiratorio[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PERCUSION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_respiratorio[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'AUSCULTACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_respiratorio[$i+4],1,0,'',false);

    $pdf->Ln();
}




//CARDIACO

$data_revision_cardiaco = null;
$data_revision_cardiaco = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from revision_aparatos_sistemas as s, consulta as c where s.as_id=2 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_revision_cardiaco, $fila->fecha);
            array_push($data_revision_cardiaco, $fila->ras_inspeccion);
            array_push($data_revision_cardiaco, $fila->ras_palpacion);
            array_push($data_revision_cardiaco, $fila->ras_percusion);
            array_push($data_revision_cardiaco, $fila->ras_auscultacion);
     
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(123,188,123);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'CARDIACO',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_revision_cardiaco);$i=$i+5){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,28,$data_revision_cardiaco[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'INSPECCION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_cardiaco[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALPITACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_cardiaco[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PERCUSION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_cardiaco[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'AUSCULTACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_cardiaco[$i+4],1,0,'',false);

    $pdf->Ln();
}

//DIGESTIVO

$data_revision_digestivo = null;
$data_revision_digestivo = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from revision_aparatos_sistemas as s, consulta as c where s.as_id=3 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_revision_digestivo, $fila->fecha);
            array_push($data_revision_digestivo, $fila->ras_inspeccion);
            array_push($data_revision_digestivo, $fila->ras_palpacion);
            array_push($data_revision_digestivo, $fila->ras_percusion);
            array_push($data_revision_digestivo, $fila->ras_auscultacion);
     
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(123,188,123);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'DIGESTIVO',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_revision_digestivo);$i=$i+5){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,28,$data_revision_digestivo[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'INSPECCION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_digestivo[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALPITACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_digestivo[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PERCUSION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_digestivo[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'AUSCULTACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_digestivo[$i+4],1,0,'',false);

    $pdf->Ln();
}


//GENITO URINARIO

$data_revision_genito = null;
$data_revision_genito = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from revision_aparatos_sistemas as s, consulta as c where s.as_id=4 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_revision_genito, $fila->fecha);
            array_push($data_revision_genito, $fila->ras_inspeccion);
            array_push($data_revision_genito, $fila->ras_palpacion);
            array_push($data_revision_genito, $fila->ras_percusion);
            array_push($data_revision_genito, $fila->ras_auscultacion);
            array_push($data_revision_genito, $fila->ras_tacto_rectal);
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(123,188,123);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'GENITO URINARIO',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_revision_genito);$i=$i+6){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,35,$data_revision_genito[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'INSPECCION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_genito[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALPITACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_genito[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PERCUSION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_genito[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'AUSCULTACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_genito[$i+4],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'TACTO RECTAL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_genito[$i+5],1,0,'',false);

    $pdf->Ln();

}



//SOMA


$data_revision_soma = null;
$data_revision_soma = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from revision_aparatos_sistemas as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_revision_soma, $fila->fecha);
            array_push($data_revision_soma, $fila->ras_inspeccion);
            array_push($data_revision_soma, $fila->ras_palpacion);
            array_push($data_revision_soma, $fila->ras_sistema_nervioso);
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}


$pdf->SetFillColor(123,188,123);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'SOMA',1,0,'C',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_revision_soma);$i=$i+4){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,21,$data_revision_soma[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'INSPECCION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_soma[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALPITACION',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_soma[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'SIST. NERVIOSO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_revision_soma[$i+3],1,0,'',false);

    $pdf->Ln();
}




//////////////ESCALA DE GLASGOW


$data_glasgow = null;
$data_glasgow = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from escala_glasgow as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_glasgow, $fila->fecha);
            array_push($data_glasgow, $fila->eg_o);
            array_push($data_glasgow, $fila->eg_m);
            array_push($data_glasgow, $fila->eg_v);
            array_push($data_glasgow, $fila->eg_total);
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'ESCALA DE GLASGOW',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(61,7,'O',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(61,7,'M',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(61,7,'V',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(62,7,'TOTAL',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_glasgow);$i=$i+5){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,$data_glasgow[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(61,7,$data_glasgow[$i+1],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(61,7,$data_glasgow[$i+2],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(61,7,$data_glasgow[$i+3],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(62,7,$data_glasgow[$i+4],1,0,'',false);

    $pdf->Ln();

}


/////PARES CRANEALES

$data_pares_craneales = null;
$data_pares_craneales = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from pares_craneales as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_pares_craneales, $fila->fecha);
            array_push($data_pares_craneales, $fila->pc_olfatorio);
            array_push($data_pares_craneales, $fila->pc_optico);
            array_push($data_pares_craneales, $fila->pc_moc);
            array_push($data_pares_craneales, $fila->pc_patetico);
            array_push($data_pares_craneales, $fila->pc_trigemino);
            array_push($data_pares_craneales, $fila->pc_moe);
            array_push($data_pares_craneales, $fila->pc_fascial);
            array_push($data_pares_craneales, $fila->pc_vestibulococlear);
            array_push($data_pares_craneales, $fila->pc_glosofaringeo);
            array_push($data_pares_craneales, $fila->pc_neumogastrico);
            array_push($data_pares_craneales, $fila->pc_espinal);
            array_push($data_pares_craneales, $fila->pc_hipogloso);
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'PARES CRANEALES',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_pares_craneales);$i=$i+13){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,84,$data_pares_craneales[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'OLFATORIO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'OPTICO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'MOC',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PATETICO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+4],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'TRIGEMINO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+5],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'MOE',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+6],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'FASCIAL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+7],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'VESTIBULOCOCLEAR',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+8],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'GLOSOFARINGEO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+9],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'NEUMOGASTRICO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+10],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'ESPINAL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+11],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'HIPOGLOSO',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_pares_craneales[$i+12],1,0,'',false);

    $pdf->Ln();
}





//////////////////////REFFLEJOS

$data_reflejos = null;
$data_reflejos = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from reflejos as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_reflejos, $fila->fecha);
            array_push($data_reflejos, $fila->ref_bicipital);
            array_push($data_reflejos, $fila->ref_tricipital);
            array_push($data_reflejos, $fila->ref_rotuliano);
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}


$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'REFFLEJOS',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(81,7,'BICIPITAL',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(81,7,'TRICIPITAL',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(83,7,'ROTULIANO',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_reflejos);$i=$i+4){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,$data_reflejos[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(81,7,$data_reflejos[$i+1],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(81,7,$data_reflejos[$i+2],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(83,7,$data_reflejos[$i+3],1,0,'',false);

    $pdf->Ln();

}



//////////////////////MOTILIDAD

$data_motilidad = null;
$data_motilidad = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from motilidad as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_motilidad, $fila->fecha);
            array_push($data_motilidad, $fila->mod_activa_pasiva);
            array_push($data_motilidad, $fila->mot_fuerza_muscular);
 
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}



$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'MOTILIDAD',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(123,7,'ACTIVA Y PASIVA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(122,7,'FUERZA MUSCULAR',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_motilidad);$i=$i+3){

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,$data_motilidad[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(123,7,$data_motilidad[$i+1],1,0,'',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(122,7,$data_motilidad[$i+2],1,0,'',false);

    $pdf->Ln();
}


/////////////////SENSIBILIDAD

$data_sensibilidad = null;
$data_sensibilidad = [];

for($i=0;$i<count($data_consultas);$i++){
    try {
        $db = getConnection();
        $stmt = $db->query("select * from sensibilidad as s, consulta as c where s.as_id=5 s.con_id='".$data_consultas[$i]."' and s.con_id=c.con_id");
        $db = null;

        while($fila = $stmt->fetchObject()){
            array_push($data_sensibilidad, $fila->fecha);
            array_push($data_sensibilidad, $fila->sen_tactil);
            array_push($data_sensibilidad, $fila->sen_termica);
            array_push($data_sensibilidad, $fila->sen_dolorosa);
            array_push($data_sensibilidad, $fila->sen_palestesia);
            array_push($data_sensibilidad, $fila->sen_batiestesia);
            array_push($data_sensibilidad, $fila->sen_barognosia);
            array_push($data_sensibilidad, $fila->sen_taxia);
            array_push($data_sensibilidad, $fila->sen_praxia);
 
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }
}

$pdf->SetFillColor(60,188,82);
$pdf->SetTextColor(255);
$pdf->Cell(280,7,'SENSIBILIDAD',1,0,'R',true);
$pdf->Ln();

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'CONSULTA',1,0,'C',true);

$pdf->SetFillColor(180,100,180);
$pdf->SetTextColor(255);
$pdf->Cell(245,7,'DATOS',1,0,'C',true);

$pdf->Ln();

for($i=0;$i<count($data_sensibilidad);$i=$i+9){
    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(35,56,$data_sensibilidad[$i],1,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'TACTIL',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+1],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'TERMICA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+2],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'DOLOROSA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+3],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PALESTESIA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+4],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'BATIESTESIA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+5],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'BAROGNOSI',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+6],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'TAXIA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+7],1,0,'',false);

    $pdf->Ln();

    $pdf->Cell(35,7,'',0,0,'C',false);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(255);
    $pdf->Cell(35,7,'PRAXIA',1,0,'C',true);

    $pdf->SetFillColor(180,100,180);
    $pdf->SetTextColor(0);
    $pdf->Cell(210,7,$data_sensibilidad[$i+8],1,0,'',false);

    $pdf->Ln();
}














/*
// Títulos de las columnas
$header = array('Cédula', 'Apellidos y Nombres', 'Sexo','E. Civil','T. Sangre','F. Nacimiento','Estado');
// Carga de datos

$data = null;

    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        //$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $data = [];

        while($fila = $stmt->fetchObject()){
            
            array_push($data, $fila->pac_ced);
            array_push($data, $fila->pac_ape.' '.$fila->pac_nom);
            array_push($data, $fila->pac_sex);
            array_push($data, $fila->pac_est_civ);
            array_push($data, $fila->pac_tip_san);
            array_push($data, $fila->pac_fec_nac);
            if($fila->pac_est)array_push($data, 'ACTIVO');else array_push($data, 'PASIVO');
            
            
        }


        
    } catch(PDOException $e) {
        $e->getMessage();
    }



//$data = [{'ecuador','quito','2000','140000'},{'colombia','bogota','3000','230032'}];
//$data = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
$pdf->FancyTable($header,$data);

*/
for($i=1;$i<=40;$i++)
	//$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>
