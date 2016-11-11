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
			$this->load->view('menu');
			$this->load->view('vespecialidad');
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
	}

	

 ?>