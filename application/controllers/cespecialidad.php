<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Cespecialidad extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mespecialidad')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vespecialidad');
			$this->load->view('administracion/includes/footer');
			
			
		}
		
		public function save()
		{
			if ($this->input->is_ajax_request())
			{
				$data = array(
				'esp_des' 	=> $this->input->post('esp_des'),
				);

				$response = $this->mespecialidad->save($data);
				echo json_encode($response);
			}
			else
			{
				//exit("Hi, I'm Asael");
				$response = "shit answer me something !";
				echo json_encode($response);
				//show_404();
			}
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'esp_des' 	=> $this->input->post('esp_des'),
				);

				$where = array(
				'esp_cod' => $this->input->post('esp_cod')
					);

				$response = $this->mespecialidad->update($data,$where);
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
				$data = $this->mespecialidad->getAll();
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
					"esp_cod" => $this->input->post('id'));
				$response = $this->mespecialidad->delete($data);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
		}

		public function getForCita()
		{
			if($this->input->is_ajax_request())
			{				
				$sql = "SELECT esp_cod, esp_des FROM vista_asignacion WHERE med_ced = ?  GROUP BY esp_cod, esp_des";
				$data = $this->mespecialidad->customQueryN($sql,array($this->session->userdata('usu_ced')));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}
	}

	

 ?>