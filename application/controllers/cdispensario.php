<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Cdispensario extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mdispensario')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vdispensario');
			$this->load->view('administracion/includes/footer');
		}
		
		public function save()
		{
			if ($this->input->is_ajax_request())
			{
				$data = array(
				'dis_nom' 	=> $this->input->post('dis_nom'),
				'dis_dir' 	=> $this->input->post('dis_dir'),
				'dis_tel' 	=> $this->input->post('dis_tel'),
				'dis_eml' 	=> $this->input->post('dis_eml'),
				'dis_est' 	=> true
				);

				$response = $this->mdispensario->save($data);
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
				'dis_nom' 	=> $this->input->post('dis_nom'),
				'dis_dir' 	=> $this->input->post('dis_dir'),
				'dis_tel' 	=> $this->input->post('dis_tel'),
				'dis_eml' 	=> $this->input->post('dis_eml')
				);

				$where = array(
				'dis_cod' => $this->input->post('dis_cod')
					);

				$response = $this->mdispensario->update($data,$where);
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
				$data = $this->mdispensario->getAll();
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
				'dis_est' 	=> $this->input->post('dis_e'),
				);

				$where = array(
				'dis_cod' 	=> $this->input->post('dis_cod')
					);

				$response = $this->mdispensario->update2($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}
	}	

 ?>