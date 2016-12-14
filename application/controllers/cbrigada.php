<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Cbrigada extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model(array('mbrigada')); //get the model to work with
	}

	public function start()
	{
		$this->load->view('administracion/includes/cabecera');
		$this->load->view('menu');
		$this->load->view('vbrigada');
		$this->load->view('administracion/includes/footer');
	}
	
	public function get()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->mbrigada->getAll();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		}
		else
		{
			exit("No direct scrip");
			show_404();	
		}
	}

	public function getPacientes()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->mbrigada->getAllPacientes();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		}
		else
		{
			exit("No direct scrip");
			show_404();	
		}
	}

	public function getMedicos()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->mbrigada->getAllMedicos();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		}
		else
		{
			exit("No direct scrip");
			show_404();	
		}
	}

	//Obtiene data para llenar la tabla de asignacion .......
	public function getMedicos2()
	{
		if($this->input->is_ajax_request())
		{
			$id_bri = $this->input->post('id');
			$sql = "SELECT * from view_brigada_medico where bri_id=".$id_bri;
			$data = $this->mbrigada->statementSQL($sql);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		}
		else
		{
			exit("zeta");
			show_404();	
		}
	}

	public function save()
	{
		if($this->input->is_ajax_request())
		{
			$data = array(
			'bri_des' 		=> $this->input->post('bri_des'),
			'bri_res' 		=> $this->input->post('bri_res'),
			'bri_fec_ini'	=> $this->input->post('bri_fec_ini'),
			'bri_fec_fin' 	=> $this->input->post('bri_fec_fin'),
			'bri_dir' 		=> $this->input->post('bri_dir'),
			);
			$id = $this->mbrigada->save($data);

			$dataM = array();
			$arrayMedic = $this->input->post('data2');
			$lenght = sizeof($arrayMedic);
			$response='';
			for($i=0;$i<$lenght;$i++){
			    $dataM = array('med_cod' => $arrayMedic[$i] , 'bri_id' => $id );
			    $resp = $this->mbrigada->saveDetalleBrigadaMedico($dataM);
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

	public function saveDetalleBriMed()
		{
			if($this->input->is_ajax_request())
			{
				$dataM = array(
				'bri_id' 	=> $this->input->post('bri_id'),
				'med_cod' 	=> $this->input->post('med_cod'),
				);
				$response = $this->mbrigada->saveDetalleBrigadaMedico($dataM);
				echo json_encode($response);
			}
			else
			{
				$response["mensaje"] = "Error";
				echo json_encode($response);
			}
			
		}

	public function savePaciente()
	{
		if ($this->input->is_ajax_request())
		{
			$data = array(
			'pac_ced' 		=> $this->input->post('pac_ced'),
			'pac_nom' 		=> $this->input->post('pac_nom'),
			'pac_ape' 		=> $this->input->post('pac_ape'),
			'pac_sex'		=> $this->input->post('pac_sex'),
			'pac_fec_nac'	=> $this->input->post('pac_fec_nac'),
			'pac_dir' 		=> $this->input->post('pac_dir'),
			'pac_cor'		=> $this->input->post('pac_cor'),
			'pac_tip_san'	=> $this->input->post('pac_tip_san'),
			'pac_est_civ'	=> $this->input->post('pac_est_civ'),
			'pac_est'		=> true,
			);

			$response = $this->mbrigada->savePaciente($data);
			echo json_encode($response);
		}
		else
		{
			$response = "shit answer me something !";
			echo json_encode($response);
		}
	}

	public function saveMedico()
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
			$response = $this->mbrigada->saveMedico($data);
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
			'bri_des' 	=> $this->input->post('bri_des'),
			'bri_res' 	=> $this->input->post('bri_res'),
			'bri_fec_ini'	=> $this->input->post('bri_fec_ini'),
			'bri_fec_fin'	=> $this->input->post('bri_fec_fin'),
			'bri_dir' 	=> $this->input->post('bri_dir'),
			);

			$where = array(
			'bri_id' => $this->input->post('bri_id')
				);

			$response = $this->mbrigada->update($data,$where);
			echo json_encode($response);
		}
		else
		{
			echo json_encode($response);
		}
	}

	//Delete toda la brigada ju ----------no a sido ejecutado
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
	
	//Delete un medico especifico de detalle brigada medico ... al momento de unchecked 
	public function deleteCustom()
	{
		if($this->input->is_ajax_request())
		{
			$med_cod 	= $this->input->post('med_cod');
			$bri_id		= $this->input->post('bri_id');
			$sql 		= "DELETE FROM detalle_brigada_medico WHERE med_cod = ".$med_cod."AND bri_id = ".$bri_id;
			$response 	= $this->mbrigada->delete($sql);

			header('Content-type: application/json; charset=utf-8');
			echo json_encode($response);
		}
		else
		{
			exit("No direct scrip");
			show_404();	
		}
	}
	/**public function get()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->mevento->getAll();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		}
		else
		{
			exit("No direct script");
			show_404();	
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
	}*/


}

	

 ?>