	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	*
	*/
	class Cevento extends CI_Controller
	{

		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mevento')); //get the model to work with
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
				'eve_tit' 			=> $this->input->post('eve_tit'),
				'eve_fec_ini' 	=> $this->input->post('eve_fec_ini'),
				'eve_fec_fin' 	=> $this->input->post('eve_fec_fin'),
				'eve_res'				=> $this->input->post('eve_res'),
				'eve_dir'				=> $this->input->post('eve_dir'),
				'not_id' 				=> $this->input->post('noticia'),
				);
				$response = $this->mevento->save($data);
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
				'eve_tit' 		=> $this->input->post('eve_tit_edt'),
				'eve_fec_ini' => $this->input->post('eve_fec_ini_edt'),
				'eve_fec_fin'	=> $this->input->post('eve_fec_fin_edt'),
				'eve_res'			=> $this->input->post('eve_res_edt'),
				'eve_dir' 		=> $this->input->post('eve_dir_edt'),
				'not_id' 			=> $this->input->post('noticia_edt'),
				);

				$where = array(
				'eve_id' => $this->input->post('')
					);

				$response = $this->mevento->update($data,$where);
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
				$data = array(
						'usu_est' 	=> FALSE,
						);
				$where = array(
						'usu_ced' => $this->input->post('id')
						);
				$response = $this->mevento->delete($data,$where);
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
				$response = $this->mevento->activar($data,$where);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}else
			{
				echo json_encode($response);
			}
		}

		public function get_noticias()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT not_id as id, not_tit as text FROM noticia ORDER BY not_fec_pub DESC";
				$data = $this->mevento->viewquery($sql);
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
				$sql = "SELECT eve_id, eve_fec_ini, eve_fec_fin, eve_fec_ini ||' | '||eve_fec_fin as fecha, eve_tit, eve_res, eve_dir, not_id, not_tit FROM evento_noticia_view";
				$data = $this->mevento->viewquery($sql);
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
