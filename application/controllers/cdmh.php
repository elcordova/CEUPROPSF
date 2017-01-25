<?php 

	/**
	* 
	*/
	class Cdmh extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("mdmh");
		}

		public function start()
		{
			$this->load->view('menu');
			$this->load->view('vAsignarHorario');
		}

		public function save()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'dmh_med_cod' 	=> $this->input->post('dmh_med_cod'),
				'dmh_hor_cod' 	=> $this->input->post('dmh_hor_cod'),
				'dmh_esp_cod'	=> $this->input->post('dmh_esp_cod'),
				'dmh_dis_cod'	=> $this->input->post('dmh_dis_cod')
				);

				$response = $this->mdmh->save($data);
				echo json_encode($response);
			}
			else
			{
				$response["mensaje"] = "Error";
				echo json_encode($response);
			}
			
		}

		public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'dmh_med_cod' 	=> $this->input->post('dmh_med_cod'),
				'dmh_hor_cod' 	=> $this->input->post('dmh_hor_cod'),
				'dmh_esp_cod'	=> $this->input->post('dmh_esp_cod'),
				'dmh_dis_cod'	=> $this->input->post('dmh_dis_cod'),
				);

				$where = $this->input->post('dmh_cod');

				$response = $this->mdmh->update($data,$where);
				echo json_encode($response);
			}
			else
			{
				$response["mensaje"] = "Error";
				echo json_encode($response);
			}
			
		}

		//Obtiene data para llenar la tabla de asignacion .......
		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT med_cod , medico ,med_ced, esp_des , esp_cod, dis_cod, dis_nom from vista_asignacion group by medico, esp_des, med_cod , esp_cod, med_ced, dis_cod, dis_nom";
				$data = $this->mdmh->statementSQL($sql);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("zeta");
				show_404();	
			}
		}

		//Buscar los horarios por de cada medico por especialidad y los carga... para check en editar Asignacion
		public function searchHorario()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "SELECT dmh_cod ,hor_cod , hor_des from vista_asignacion WHERE med_cod = ? and esp_cod = ? and dis_cod = ?";
				$med_cod = $this->input->post('med_cod');
				$esp_cod = $this->input->post('esp_cod');
				$dis_cod = $this->input->post('dis_cod');
				$data = $this->mdmh->customQueryN($sql,array($med_cod,$esp_cod,$dis_cod));

				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}

		//Delete todos los horarios del medico y especialidad
		public function delete()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "DELETE FROM detalle_medico_horario WHERE dmh_med_cod = ? AND dmh_esp_cod = ?";
				$med_cod 	= $this->input->post('med_cod');
				$esp_cod 	= $this->input->post('esp_cod');
				$response 	= $this->mdmh->delete($sql,array($med_cod,$esp_cod));

				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}

		//Delete un horario especifico de tal medico y especialidad ... al momento de unchecked 
		public function deleteCustom()
		{
			if($this->input->is_ajax_request())
			{
				$sql = "DELETE FROM detalle_medico_horario WHERE dmh_cod = ?";
				$dmh_cod 	= $this->input->post('dmh_cod');
				$response 	= $this->mdmh->delete($sql,array($dmh_cod));

				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}


	}



 ?>