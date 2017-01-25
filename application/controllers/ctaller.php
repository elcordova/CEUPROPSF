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
			$post=$this->input->post();	
			if ($this->input->is_ajax_request()){
				$data = array(
					'tal_tem' 	=> $post['tal_tem'],
					'tal_fec' 	=> $post['tal_fec'],
					'tal_des' 	=> $post['tal_des'],
					'eve_id'	=> $post['evento'],
				);
				$id = $this->mtaller->save($data);
				
				$this->load->library("upload");
				$config = array(
					'upload_path' => './public/recursos/', 
					'allowed_types' => '*', 
				);
				$variablefile = $_FILES;
				$info = array();
				$filesCount = count($_FILES['archivo']['name']);
				for ($i=0; $i < $filesCount; $i++) { 
					$_FILES['archivo']['name'] = $variablefile['archivo']['name'][$i];
					$_FILES['archivo']['type'] = $variablefile['archivo']['type'][$i];
					$_FILES['archivo']['tmp_name'] = $variablefile['archivo']['tmp_name'][$i];
					$_FILES['archivo']['error'] = $variablefile['archivo']['error'][$i];
					$_FILES['archivo']['size'] = $variablefile['archivo']['size'][$i];
					$this->upload->initialize($config);
					if($this->upload->do_upload('archivo'))
					{
						echo "paso do_upload";
						$nomb = array('upload_data' => $this->upload->data() );
						$datos = array(
							'evi_nom_arc' 	=> $nomb['upload_data']['file_name'],
							'evi_pre' 		=> true,
							'tal_id' 		=> $id,
						);
						if($this->mtaller->saveEvidendia($datos)){
							echo "exito";	
						}
						else{
							echo "error";
							echo $this->upload->display_errors();
						}
					}else
					{
						echo "error";
					}
				}
			}
			else{
				echo "error";
			}	
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'tal_tem' 		=> $this->input->post('mtal_tit'),
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
