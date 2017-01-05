	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	*
	*/
	class Ctaller extends CI_Controller
	{

		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mtaller')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vevento');
			$this->load->view('administracion/includes/footer');
		}

		public function save()
		{
			if ($this->input->is_ajax_request())
			{
				$data = array(
				'tal_tem' 	=> $this->input->post('tal_tem'),
				'tal_fec' 	=> $this->input->post('tal_fec'),
				'tal_des' 	=> $this->input->post('tal_des'),
				'eve_id'	=> $this->input->post('evento')
				);
				$response = $this->mtaller->save($data);
				echo json_encode($response);
			}
			else
			{
				$response = "Error contactese con el Administrador!";
				echo json_encode($response);
			}
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'tal_tem' 		=> $this->input->post('mtal_tem'),
				'tal_fec' 		=> $this->input->post('mtal_fec'),
				'tal_des'		=> $this->input->post('mtal_des'),
				'eve_id' 		=> $this->input->post('mevento'),
				);

				$where = array(
				'tal_id' => $this->input->post('mtal_id')
					);

				$response = $this->mtaller->update($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}

		public function delete()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT delete_evento(?);";
				$response = $this->mtaller->customquery($sql,$this->input->post('eve_id'));
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
		}

		public function activar()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'usu_est' 	=> TRUE,
				);
				$where = array(
								'usu_ced' => $this->input->post('id')
								);
				$response = $this->mtaller->activar($data,$where);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}else
			{
				echo json_encode($response);
			}
		}

		public function getEvento()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT eve_id as id, eve_tit as text FROM evento ORDER BY eve_fec_ini DESC";
				$data = $this->mtaller->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($data);
			}
			else
			{
				show_404();
			}
		}

		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT * FROM taller_evento_view";
				$data = $this->mtaller->viewquery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct script");
				show_404();
			}
		}

	}
 ?>
