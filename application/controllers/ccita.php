<?php 

	/**
	* 
	*/
	class Ccita extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('mcita');
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vcita');
			$this->load->view('administracion/includes/footer');
		}

		//Obtiene el Medico asignado a una especialidad
		public function getMedico()
		{
			if($this->input->is_ajax_request())
			{
				if($this->input->post('usu_cod') == '3') //si es medico
				{
					$sql = "SELECT med_cod , medico ,med_ced, dis_nom FROM vista_asignacion WHERE med_ced = ? GROUP BY medico , med_cod , med_ced, dis_nom";				
					$data = $this->mcita->customQueryN($sql,array($this->session->userdata('usu_ced')));
				}
				else
				{
					$sql = "SELECT med_cod , medico ,med_ced, dis_nom FROM vista_asignacion WHERE esp_cod = ? GROUP BY medico , med_cod , med_ced, dis_nom";
					$esp_cod = $this->input->post('esp_cod');
					$data = $this->mcita->customQueryN($sql,array($esp_cod));
				}

				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("Algo anda mal");
				show_404();	
			}
				
		}

		//// RETORNA SOLO LOS HORARIOS DISPONIBLES PARA EL MEDICO 
		public function getHorarioDisponible()
		{
			if($this->input->is_ajax_request())
			{
				
				$sql = "SELECT dmh_cod, hor_cod, hor_des FROM vista_asignacion WHERE med_ced = ? AND esp_cod = ? AND dmh_cod NOT IN(SELECT cit_dmh_cod FROM cita WHERE cit_fec = ?) ORDER BY hor_des ASC";
				$med_ced = $this->input->post('med_ced');
				$esp_cod = $this->input->post('esp_cod');
				$cit_fec = $this->input->post('cit_fec');
				$data = $this->mcita->customQueryN($sql,array($med_ced,$esp_cod,$cit_fec));

				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No es una llamada Ajax");
				show_404();	
			}
				
		}


		public function getDmhPorDia()
		{
			if($this->input->is_ajax_request())
			{
				
				$sql = "SELECT cit_dmh_cod FROM cita WHERE cit_fec = ?";
				$cit_fec = $this->input->post('cit_fec');
				$data = $this->mcita->customQueryN($sql,array($cit_fec));

				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
				
		}

		public function getTc()
		{
			if($this->input->is_ajax_request())
			{
				
				$sql = "SELECT MAX(cit_tur)+1 as turno FROM cita";
				$data = $this->mcita->customQuery($sql,array());

				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("Error");
				show_404();	
			}
		}

		//Obtiene todas las citas
		public function getCita()
		{
			if($this->input->is_ajax_request())
			{				
				if($this->input->post('tip_usu') == "1")//administrador
				{
					$sql = "SELECT * FROM vista_cita";
					$data = $this->mcita->statementSQL($sql);	
				}
				else
				{
					if($this->input->post('tip_usu') == "2") //usuario
					{
						$sql = "SELECT * FROM vista_cita WHERE usu_cod = ? AND cit_est = TRUE";
						$usu_cod = $this->input->post('usu_cod');
						$data = $this->mcita->customQueryN($sql,array($usu_cod));
					}
					else
					{
						$sql = "SELECT * FROM vista_cita WHERE med_ced = ? AND cit_est = TRUE";						
						$data = $this->mcita->customQueryN($sql,array($this->session->userdata('usu_ced')));
					}						
				}			
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			
			else
			{
				exit("Error");
				show_404();	
			}				
		}


		public function save()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'cit_dmh_cod' 	=> $this->input->post('cit_dmh_cod'),
				'cit_est' 		=> $this->input->post('cit_est'),
				'cit_fec'		=> $this->input->post('cit_fec'),
				'cit_usu_cod'	=> $this->input->post('usu_cod'),
				'cit_tur'		=> $this->input->post('cit_tur')
				);

				$response = $this->mcita->save($data);
				echo json_encode($response);
			}
			else
			{
				$response["mensaje"] = "Error";
				echo json_encode($response);
			}
		}

		public function saveComment()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'cit_cmt'		=> $this->input->post('cit_cmt'),
				'cit_cod' 		=> $this->input->post('cit_cod')				
				);

				$sql = "UPDATE cita SET cit_cmt = ? WHERE cit_cod = ?";
				$response = $this->mcita->delete($sql,$data);
				echo json_encode($response);
			}
			else
			{
				$response["mensaje"] = "Error";
				echo json_encode($response);
			}
		}
	}
 ?>