<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cconsultas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model(array('mconsulta','msignos_vitales','msomatigo_general')); //get the model to work with
		
	}

	// List all your items
	public function start( $offset = 0 )
	{
		$this->load->view('administracion/includes/cabecera');
		$this->load->view('menu');
		$this->load->view('vconsulta');
		$this->load->view('modal_signos_vitales');
		$this->load->view('modal_somatico_general');
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


}

/* End of file cconsultas.php */
/* Location: ./application/controllers/cconsultas.php */
