<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chistorial extends CI_Controller {


	function __construct()
		{
			# code...
			parent::__construct(); //get the model to work with
			$this->load->model(array('mpaciente')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vhistorial');
			$this->load->view('administracion/includes/footer');
		}
		public function consultar_pacientes()
		{
			if($this->input->is_ajax_request())
			{
				$palabra_like=$this->input->post('user_txt');
				$sql="select * from paciente where pac_nom like '%".$palabra_like."%' or pac_ced like '%".$palabra_like."%' or pac_ape like '%".$palabra_like."%';";
				$data = $this->mpaciente->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
		}

		public function cosnsulta_consultas(){
			if($this->input->is_ajax_request())
			{
				$cedula=$this->input->post('cedula');
				$sql="select consulta.con_id,consulta.fecha,consulta.con_observcion, medico.med_nom, medico.med_ape from consulta, detalle_brigada_medico,paciente, medico where detalle_brigada_medico.dbm_id=consulta.dbm_id and detalle_brigada_medico.med_cod=medico.med_cod and consulta.pac_id=paciente.pac_id and paciente.pac_ced='".$cedula."' order by fecha;";
				$data = $this->mpaciente->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}	
		}
		
		
		

		
		
}