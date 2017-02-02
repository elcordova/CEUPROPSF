<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cconsultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model(array('mconsulta','msensibilidad','mmotilidad','msignos_vitales','mpares_craneales','msomatigo_general','mexamen_fisico_regional','mrevision_aparatos','maparatos_sistemas','mescala_glasgow','mreflejos')); //get the model to work with
		
	}

	// List all your items
	public function start( $offset = 0 )
	{
		$this->load->view('administracion/includes/cabecera');
		$this->load->view('menu');
		$this->load->view('vconsulta');
		$this->load->view('modal_signos_vitales');
		$this->load->view('modal_somatico_general');
		$this->load->view('modal_pares_craneales');
		$this->load->view('modal_fisico_regional');
		$this->load->view('modal_revision_aparatos');	
		$this->load->view('modal_escala_glasgow');
		$this->load->view('modal_reflejos');
		$this->load->view('modal_motilidad');
		$this->load->view('modal_sensibilidad');
		$this->load->view('administracion/includes/footer');
	}

	// Add a new item
	public function add()
	{
			$now = new DateTime();
			$timestring = $now->format('Y-m-d h:i:s');
			$data = array(
			'dbm_id' 		=> $this->input->post('dbm_id'),
			'pac_id' 		=> $this->input->post('pac_id'),
			'con_observcion'	=> $this->input->post('con_observacion'),
			'fecha' 	=> $timestring
			);
			$id = $this->mconsulta->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}




// signos vitales
	
	public function get_sv(){
		$where =array('con_id'	=>	$this->input->post('con_id'));
		$result=$this->msignos_vitales->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function add_sv()
	{
			$data = array(
			'con_id' 		=> ''.$this->input->post('con_id'),
			'fc' 		=> ''.$this->input->post('fc'),
			'ta' 		=> ''.$this->input->post('ta'),
			't' 		=> ''.$this->input->post('t'),
			'fr' 		=> ''.$this->input->post('fr'),
			'peso' 		=> ''.$this->input->post('peso'),
			'talla' 		=> ''.$this->input->post('talla'),
			'imc' 		=> ''.$this->input->post('imc'),
			'cintura' 		=> ''.$this->input->post('cintura'),
			'cadera' 		=> ''.$this->input->post('cadera'),
			'icc' 		=> ''.$this->input->post('icc')
			);
			$id = $this->msignos_vitales->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	public function editar_sv()
	{
			$where =array('con_id'	=>	$this->input->post('con_id'));
			$data = array(
			'ta' 		=> ''.$this->input->post('ta'),
			'fc' 		=> ''.$this->input->post('fc'),
			't' 		=> ''.$this->input->post('t'),
			'fr' 		=> ''.$this->input->post('fr'),
			'peso' 		=> ''.$this->input->post('peso'),
			'talla' 		=> ''.$this->input->post('talla'),
			'imc' 		=> ''.$this->input->post('imc'),
			'cintura' 		=> ''.$this->input->post('cintura'),
			'cadera' 		=> ''.$this->input->post('cadera'),
			'icc' 		=> ''.$this->input->post('icc')
			);
			$id = $this->msignos_vitales->update($data,$where);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	

//somatico general


	public function get_sg(){
		$where =array('con_id'	=>	$this->input->post('con_id'));
		$result=$this->msomatigo_general->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function add_sg()
	{
			$data = array(
			'con_id' 		=> ''.$this->input->post('con_id'),
			'sg_apariencia' 		=> ''.$this->input->post('sg_apariencia'),
			'sg_facie' 		=> ''.$this->input->post('sg_facie'),
			'sg_biotipo' 		=> ''.$this->input->post('sg_biotipo'),
			'sg_en' 		=> ''.$this->input->post('sg_en'),
			'sg_actitud' 		=> ''.$this->input->post('sg_actitud'),
			'sg_deambula' 		=> ''.$this->input->post('sg_deambula'),
			'sg_ap' 		=> ''.$this->input->post('sg_ap'),
			'sg_piel' 		=> ''.$this->input->post('sg_piel'),
			'sg_unias' 		=> ''.$this->input->post('sg_unias'),
			'sg_pelo' 		=> ''.$this->input->post('sg_pelo')
			);
			$id = $this->msomatigo_general->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	public function editar_sg()
	{
			$where =array('con_id'	=>	$this->input->post('con_id'));
			$data = array(
			'sg_apariencia' 		=> ''.$this->input->post('sg_apariencia'),
			'sg_facie' 		=> ''.$this->input->post('sg_facie'),
			'sg_biotipo' 		=> ''.$this->input->post('sg_biotipo'),
			'sg_en' 		=> ''.$this->input->post('sg_en'),
			'sg_actitud' 		=> ''.$this->input->post('sg_actitud'),
			'sg_deambula' 		=> ''.$this->input->post('sg_deambula'),
			'sg_ap' 		=> ''.$this->input->post('sg_ap'),
			'sg_piel' 		=> ''.$this->input->post('sg_piel'),
			'sg_unias' 		=> ''.$this->input->post('sg_unias'),
			'sg_pelo' 		=> ''.$this->input->post('sg_pelo')
			);
			$id = $this->msomatigo_general->update($data,$where);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}




//examen fisico regional



	public function get_efr(){
		$where =array('con_id'	=>	$this->input->post('con_id'));
		$result=$this->mexamen_fisico_regional->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function add_efr()
	{
			$data = array(
			'con_id' 		=> ''.$this->input->post('con_id'),
			'efr_cabeza' 		=> ''.$this->input->post('efr_cabeza'),
			'efr_oidos' 		=> ''.$this->input->post('efr_oidos'),
			'efr_ojos' 		=> ''.$this->input->post('efr_ojos'),
			'efr_nariz' 		=> ''.$this->input->post('efr_nariz'),
			'efr_boca' 		=> ''.$this->input->post('efr_boca'),
			'efr_cuello' 		=> ''.$this->input->post('efr_cuello'));
			$id = $this->mexamen_fisico_regional->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	public function editar_efr()
	{
			$where =array('con_id'	=>	$this->input->post('con_id'));
			$data = array(
			'efr_cabeza' 		=> ''.$this->input->post('efr_cabeza'),
			'efr_oidos' 		=> ''.$this->input->post('efr_oidos'),
			'efr_ojos' 		=> ''.$this->input->post('efr_ojos'),
			'efr_nariz' 		=> ''.$this->input->post('efr_nariz'),
			'efr_boca' 		=> ''.$this->input->post('efr_boca'),
			'efr_cuello' 		=> ''.$this->input->post('efr_cuello'));
			$id = $this->mexamen_fisico_regional->update($data,$where);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}


//revision por aparatos  sistemas


	public function get_ras(){
		$where =array('con_id'	=>	$this->input->post('con_id'),'as_id'=> $this->input->post('as_id'));
		$result=$this->mrevision_aparatos->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function add_ras()
	{
			$data = array(
			'con_id' 		=> ''.$this->input->post('con_id'),
			'efr_cabeza' 		=> ''.$this->input->post('efr_cabeza'),
			'efr_oidos' 		=> ''.$this->input->post('efr_oidos'),
			'efr_ojos' 		=> ''.$this->input->post('efr_ojos'),
			'efr_nariz' 		=> ''.$this->input->post('efr_nariz'),
			'efr_boca' 		=> ''.$this->input->post('efr_boca'),
			'efr_cuello' 		=> ''.$this->input->post('efr_cuello'));
			$id = $this->mrevision_aparatos->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	public function editar_ras()
	{
			$where =array('con_id'	=>	$this->input->get('con_id'),'as_id'=> $this->input->get('as_id'));
			$result=$this->mrevision_aparatos->get($where);
			
			if($result){
				$data = array(
				'ras_inspeccion' 		=> ''.$this->input->get('ras_inspeccion'),
				'ras_palpacion' 		=> ''.$this->input->get('ras_palpacion'),
				'ras_percusion' 		=> ''.$this->input->get('ras_percusion'),
				'ras_auscultacion' 		=> ''.$this->input->get('ras_auscultacion'),
				'ras_tacto_rectal' 		=> ''.$this->input->get('ras_tacto_rectal'),
				'ras_sistema_nervioso' 		=> ''.$this->input->get('ras_sistema_nervioso'));
				$id = $this->mrevision_aparatos->update($data,$where);
			
			}else{
				$data = array(
				'as_id'					=>		$this->input->get('as_id'),
				'con_id'				=> 		$this->input->get('con_id'),
				'ras_inspeccion' 		=> ''.$this->input->get('ras_inspeccion'),
				'ras_palpacion' 		=> ''.$this->input->get('ras_palpacion'),
				'ras_percusion' 		=> ''.$this->input->get('ras_percusion'),
				'ras_auscultacion' 		=> ''.$this->input->get('ras_auscultacion'),
				'ras_tacto_rectal' 		=> ''.$this->input->get('ras_tacto_rectal'),
				'ras_sistema_nervioso' 		=> ''.$this->input->get('ras_sistema_nervioso'));
				$id = $this->mrevision_aparatos->insert($data);
			}
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}


	public function get_eg(){
		$where=array('con_id'	=>	$this->input->post('con_id'));
		$result=$this->mescala_glasgow->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function edit_eg(){
		$where=array('con_id'	=>	$this->input->post('con_id'));
		$data = array(
			'eg_o' 		=> ''.$this->input->post('eg_o'),
			'eg_m' 		=> ''.$this->input->post('eg_m'),
			'eg_v' 		=> ''.$this->input->post('eg_v'),
			'eg_total' 		=> ''.$this->input->post('eg_total'));
			$id = $this->mescala_glasgow->update($data,$where);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);

	}

	public function add_eg(){
		$data = array(
			'con_id'	=>	$this->input->post('con_id'),
			'eg_o' 		=> ''.$this->input->post('eg_o'),
			'eg_m' 		=> ''.$this->input->post('eg_m'),
			'eg_v' 		=> ''.$this->input->post('eg_v'),
			'eg_total' 		=> ''.$this->input->post('eg_total'));
			$id = $this->mescala_glasgow->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);

	}



// funciones para PARES CRANEALES


	public function add_pc(){
		$data = array(
			'con_id'	=>	$this->input->post('con_id'),
			'pc_olfatorio' 		=> ''.$this->input->post('pc_olfatorio'),
			'pc_optico' 		=> ''.$this->input->post('pc_optico'),
			'pc_moc' 			=> ''.$this->input->post('pc_moc'),
			'pc_patetico' 		=> ''.$this->input->post('pc_patetico'),
			'pc_trigemino'		=> ''.$this->input->post('pc_trigemino'),
			'pc_moe'			=> ''.$this->input->post('pc_trigemino'),
			'pc_fascial'		=> ''.$this->input->post('pc_trigemino'),
			'pc_vestibulococlear'=> ''.$this->input->post('pc_trigemino'),
			'pc_glosofaringeo'	=> ''.$this->input->post('pc_trigemino'),
			'pc_neumogastrico'	=> ''.$this->input->post('pc_trigemino'),
			'pc_espinal'		=> ''.$this->input->post('pc_trigemino'),
			'pc_hipogloso'		=> ''.$this->input->post('pc_trigemino'));
			$id = $this->mpares_craneales->insert($data);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}


	public function edit_pc(){
		$where=array('con_id'	=>	$this->input->post('con_id'));
		$data = array(
			'pc_olfatorio' 		=> ''.$this->input->post('eg_o'),
			'pc_optico' 		=> ''.$this->input->post('eg_m'),
			'pc_moc' 			=> ''.$this->input->post('eg_v'),
			'pc_patetico' 		=> ''.$this->input->post('eg_total'),
			'pc_trigemino'		=> ''.$this->input->post('pc_trigemino'),
			'pc_moe'			=> ''.$this->input->post('pc_trigemino'),
			'pc_fascial'		=> ''.$this->input->post('pc_trigemino'),
			'pc_vestibulococlear'=> ''.$this->input->post('pc_trigemino'),
			'pc_glosofaringeo'	=> ''.$this->input->post('pc_trigemino'),
			'pc_neumogastrico'	=> ''.$this->input->post('pc_trigemino'),
			'pc_espinal'		=> ''.$this->input->post('pc_trigemino'),
			'pc_hipogloso'		=> ''.$this->input->post('pc_trigemino'));
			$id = $this->mpares_craneales->update($data,$where);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($id);
	}

	public function get_pc(){
		$where=array('con_id'	=>	$this->input->post('con_id'));
		$result=$this->mpares_craneales->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}


//funciones para REFLEJOS

	public function get_reflejos(){
		$where=array('con_id'=>$this->input->post('con_id'));
		$result=$this->mreflejos->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function edit_reflejos(){
		$where=array('con_id'=>$this->input->post('con_id'));
		$data=array(
				'ref_bicipital' => ''.$this->input->post('ref_bicipital'),
				'ref_tricipital' => ''.$this->input->post('ref_tricipital'),
				'ref_rotuliano' => ''.$this->input->post('ref_rotuliano')
			);
		$result=$this->mreflejos->update($data,$where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	public function add_reflejos(){
		
		$data=array(
				'con_id'		=>	$this->input->post('con_id'),
				'ref_bicipital' => ''.$this->input->post('ref_bicipital'),
				'ref_tricipital' => ''.$this->input->post('ref_tricipital'),
				'ref_rotuliano' => ''.$this->input->post('ref_rotuliano')
			);
		$result=$this->mreflejos->insert($data);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}	



// funciones de Motilidad

	function add_motilidad(){
		$data=array('con_id' => $this->input->post('con_id'),
				'mod_activa_pasiva' => $this->input->post('mod_activa_pasiva'),
				'mot_fuerza_muscular' => $this->input->post('mot_fuerza_muscular')
			);
		$result=$this->mmotilidad->insert($data);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	function edit_motilidad(){
		$where=array('con_id' => $this->input->post('con_id'));
		$data=array(
				'mod_activa_pasiva' => $this->input->post('mod_activa_pasiva'),
				'mot_fuerza_muscular' => $this->input->post('mot_fuerza_muscular')
			);
		$result=$this->mmotilidad->update($data,$where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	function get_motilidad(){
		$where=array('con_id' => $this->input->post('con_id'));
		$result=$this->mmotilidad->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);	
	}



	//funsiones de Sensibilidad 

	function add_sensibilidad(){
		$data=array(
			'con_id' => $this->input->post('con_id'),
			'sen_tactil'=> $this->input->post('sen_tactil'),
			'sen_termica'=> $this->input->post('sen_termica'),
			'sen_dolorosa'=> $this->input->post('sen_dolorosa'),
			'sen_palestesia'=> $this->input->post('sen_palestesia'),
			'sen_batiestesia'=> $this->input->post('sen_batiestesia'),
			'sen_barognosia'=> $this->input->post('sen_barognosia'),
			'sen_taxia'=> $this->input->post('sen_taxia'),
			'sen_praxia'=> $this->input->post('sen_praxia')
			);
		$result=$this->msensibilidad->insert($data);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);

	}



	function edit_sensibilidad(){
		$where=array('con_id' => $this->input->post('con_id'));
		$data=array(
			'sen_tactil'=> $this->input->post('sen_tactil'),
			'sen_termica'=> $this->input->post('sen_termica'),
			'sen_dolorosa'=> $this->input->post('sen_dolorosa'),
			'sen_palestesia'=> $this->input->post('sen_palestesia'),
			'sen_batiestesia'=> $this->input->post('sen_batiestesia'),
			'sen_barognosia'=> $this->input->post('sen_barognosia'),
			'sen_taxia'=> $this->input->post('sen_taxia'),
			'sen_praxia'=> $this->input->post('sen_praxia')
			);
		$result=$this->msensibilidad->update($data,$where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	function get_sensibilidad(){
		$where=array('con_id' => $this->input->post('con_id'));
		$result=$this->msensibilidad->get($where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}



	public function get_especialidad()
	{
		
			$id_bri = $this->input->get('id');
			$sql = "select * from especialidad where especialidad.esp_cod in
					(
					SELECT 
					   especialidad.esp_cod
					FROM 
					  public.brigada, 
					  public.detalle_brigada_medico, 
					  public.medico, 
					  public.especialidad, 
					  public.detalle_medico_especialidad
					WHERE 
					  brigada.bri_id = ".$id_bri." and
					  brigada.bri_id = detalle_brigada_medico.bri_id AND
					  detalle_brigada_medico.med_cod = medico.med_cod AND
					  medico.med_cod = detalle_medico_especialidad.med_cod AND
					  especialidad.esp_cod = detalle_medico_especialidad.esp_cod
					)";
			$data = $this->mconsulta->statementSQL($sql);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
	}

	public function get_dbm()
	{
		
			$id_bri = $this->input->get('bri_id');
			$id_med = $this->input->get('med_id');
			$sql = "select * from detalle_brigada_medico where bri_id= ".$id_bri." AND med_cod= ".$id_med;
			$data = $this->mconsulta->statementSQL($sql);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
	}


	public function get_aparatos(){
		$result=$this->maparatos_sistemas->get();
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}


	public function	get_medico(){
		$id_bri =$this->input->get('id');
		$id_esp =$this->input->get('id_es');
		$sql="select * from medico where med_cod in(
				SELECT 
				  medico.med_cod
				FROM 
				  public.brigada, 
				  public.detalle_brigada_medico, 
				  public.medico, 
				  public.especialidad, 
				  public.detalle_medico_especialidad
				WHERE 
				  brigada.bri_id = ".$id_bri." and
				  especialidad.esp_cod=".$id_esp." and
				  brigada.bri_id = detalle_brigada_medico.bri_id AND
				  detalle_brigada_medico.med_cod = medico.med_cod AND
				  medico.med_cod = detalle_medico_especialidad.med_cod AND
				  especialidad.esp_cod = detalle_medico_especialidad.esp_cod
		)";
		$data = $this->mconsulta->statementSQL($sql);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode(array("datos"=>$data));
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

	public function get_consultas()
	{
		$result=$this->mconsulta->statementSQL('select * from view_consultas');
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
	}

	function save_observacion(){
		$data = array('con_observcion'=> $this->input->post('observacion'));
		$where=array('con_id' 		=> $this->input->post('id_consulta'));
		$afected=$this->mconsulta->update($data,$where);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($afected);
	}


}

/* End of file cconsultas.php */
/* Location: ./application/controllers/cconsultas.php */
