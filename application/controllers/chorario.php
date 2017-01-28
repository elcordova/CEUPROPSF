<?php 


	/**
	* 
	*/
	class Chorario extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('mhorario');
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vHorario');
			$this->load->view('administracion/includes/footer');
		}

		
		public function save()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
					'hor_des' => $this->input->post('hor_des'));
				$response = $this->mhorario->save($data);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
					'hor_des' => $this->input->post('hor_des')
					);
				$where = array(
					'hor_cod' => $this->input->post('hor_cod')
					);

				$response = $this->mhorario->update($data,$where);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
		}

		public function delete()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
					'hor_cod' => $this->input->post('hor_cod')
					);

				$response = $this->mhorario->delete($data);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
		}

		
		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT * FROM horario ORDER BY hor_des ASC";
				$data = $this->mhorario->customQuery($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}

			else
			{
				exit("error");
				show_404();
			}
			
		}

	}


 ?>