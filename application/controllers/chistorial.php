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

		public function consultar_examenes(){
			if($this->input->is_ajax_request())
			{
				$id_consulta=$this->input->post('consulta_id');
				$sql="select * from somatico_general where con_id = '".$id_consulta."';";
				$somatico_general = $this->mpaciente->viewquery($sql);
				$sql="select * from signos_vitales where con_id = '".$id_consulta."';";
				$signos_vitales = $this->mpaciente->viewquery($sql);
				$sql="select aparatos_sistemas.as_descripcion as descripcion, revision_aparatos_sistemas.ras_inspeccion as inspeccion, revision_aparatos_sistemas.ras_palpacion as palpacion, revision_aparatos_sistemas.ras_percusion as percusion, revision_aparatos_sistemas.ras_auscultacion as auscultacion, revision_aparatos_sistemas.ras_tacto_rectal as tacto_rectal,revision_aparatos_sistemas.ras_sistema_nervioso as sistema_nervioso  from revision_aparatos_sistemas, aparatos_sistemas where revision_aparatos_sistemas.as_id = aparatos_sistemas.as_id  and revision_aparatos_sistemas.con_id = '".$id_consulta."';";
				$aparatos = $this->mpaciente->viewquery($sql);
				$sql="select * from examen_fisico_regional where con_id = '".$id_consulta."';";
				$fisico_regional = $this->mpaciente->viewquery($sql);
				$sql="select * from escala_glasgow where con_id = '".$id_consulta."';";
				$escala_glasgow = $this->mpaciente->viewquery($sql);
				$sql="select * from pares_craneales where con_id = '".$id_consulta."';";
				$pares_craneales = $this->mpaciente->viewquery($sql);
				$sql="select * from reflejos where con_id = '".$id_consulta."';";
				$reflejos = $this->mpaciente->viewquery($sql);
				$sql="select * from sensibilidad where con_id = '".$id_consulta."';";
				$sensibilidad = $this->mpaciente->viewquery($sql);
				$sql="select * from motilidad where con_id = '".$id_consulta."';";
				$motilidad = $this->mpaciente->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array('sensibilidad'=>$sensibilidad,'motilidad'=>$motilidad,'reflejos'=>$reflejos,"somatico_general"=>$somatico_general,'signos_vitales'=>$signos_vitales,'aparatos'=>$aparatos,'fisico'=>$fisico_regional,'escala'=>$escala_glasgow,'pares_craneales'=>$pares_craneales));
			}	
		}
	}