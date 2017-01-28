<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	*
	*/
	class Cmedico extends CI_Controller
	{

		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mmedico')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vmedico');
			$this->load->view('administracion/includes/footer');
		}

		public function save()
		{
			if ($this->input->is_ajax_request())
			{
				$data = array(
				'med_ced' 	=> $this->input->post('med_ced'),
				'med_nom' 	=> $this->input->post('med_nom'),
				'med_ape' 	=> $this->input->post('med_ape'),
				'med_dir'	=> $this->input->post('med_dir'),
				'med_tel'	=> $this->input->post('med_tel'),
				'med_est' 	=> TRUE,
				'med_eml'	=> $this->input->post('med_eml'),
				);

				$response = $this->mmedico->save($data);
				echo json_encode($response);
			}
			else
			{
				$response = "shit answer me something !";
				echo json_encode($response);
			}
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'med_nom' 	=> $this->input->post('med_nom'),
				'med_ape' 	=> $this->input->post('med_ape'),
				'med_dir'	=> $this->input->post('med_dir'),
				'med_tel'	=> $this->input->post('med_tel'),
				'med_est' 	=> $this->input->post('med_est'),
				'med_eml'	=> $this->input->post('med_eml'),
				'med_est'	=> TRUE,
				);

				$where = array(
				'med_ced' => $this->input->post('med_ced')
					);

				$response = $this->mmedico->update($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}


		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$sql	= "SELECT * FROM medico";
				$data = $this->mmedico->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();
			}
		}

		public function delete()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'med_est' 	=> FALSE,
				);

				$where = array(
				'med_ced' 	=> $this->input->post('med_ced')
					);

				$response = $this->mmedico->update2($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}


		public function autocompletarCedMedico()
		{
			if ($this->input->is_ajax_request())
			{
				$row=array();

				$data = $this->mmedico->viewquery("Select med_ced FROM vista_medico WHERE med_est = TRUE");				
				foreach ($data as $valor)
				{
					$row["cedula"][] = $valor;
				}
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($row);
			}
		}

		public function autocompletarMedico()
		{
			if ($this->input->is_ajax_request())
			{
				$row=array();

				$data = $this->mmedico->viewquery("Select nombre FROM vista_medico WHERE med_est = TRUE");
				foreach ($data as $valor)
				{
					$row["medico"][] = $valor;
				}
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($row);
			}
		}


		public function getMedicoByCed()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT * FROM vista_medico WHERE med_ced = ?";
				$data["medico"] = $this->mmedico->customquery($sql,array($this->input->post('med_ced')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data);
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function getMedicoByNom()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT * FROM vista_medico WHERE nombre = ?";
				$data["medico"] = $this->mmedico->customquery($sql,array($this->input->post('med_nom')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data);
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function saveDme()
		{
			if($this->input->is_ajax_request())
			{
				$id = $this->input->post('med_cod');
				$dataM = array();
				$arrayEsp = $this->input->post('data2');
				$lenght = sizeof($arrayEsp);
				$response='';
				for($i=0;$i<$lenght;$i++){
				    $dataM = array('esp_cod' => $arrayEsp[$i] , 'med_cod' => $id );
				    $resp = $this->mmedico->saveDme($dataM);
				    $response = $resp;
				}
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
			else
			{
				$response = "shit answer me something !";
				echo json_encode($response);
			}
		}

		public function getAsig()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT DISTINCT med_cod, med_ced, medico from vista_med_espe";
				$data = $this->mmedico->viewquery($sql);				
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos" => $data));
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function getDme()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT dme_id, esp_cod from vista_med_espe WHERE med_cod = ?";
				$data = $this->mmedico->customQueryN($sql,array($this->input->post('med_cod')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos" => $data));
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function deleteDme()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT delete_det_med_esp(?)";
				$data = $this->mmedico->customquery($sql,array($this->input->post('dme_id')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data->delete_det_med_esp);
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function validarAsignacion()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT validar_asignacion_dme(?)";
				$data = $this->mmedico->customquery($sql,array($this->input->post('med_ced')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data->validar_asignacion_dme);
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}

		public function validarAsignacionNombre()
		{
			if ($this->input->is_ajax_request())
			{
				$sql = "SELECT validar_asignacion_dme_nombre(?)";
				$data = $this->mmedico->customquery($sql,array($this->input->post('med_nom')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data->validar_asignacion_dme_nombre);
			}
			else
			{
				$mensaje["error"] = "Error ......";
				echo json_encode($mensaje);
			}
		}		

	}

 ?>
