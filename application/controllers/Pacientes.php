<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pacientes extends CI_Controller {


	function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('pacientes_model')); //get the model to work with
		}

		public function index()
		{
			$data=null;
			/*$sql = "SELECT * FROM paciente WHERE pac_est = true";          codigo para listar pacientes activos
			$arrayPacientes=$data=$this->pacientes_model->getActivos($sql);*/
			$arrayPacientes=$data=$this->pacientes_model->getAll();
			$data['pacientes']=$arrayPacientes;
			$this->load->view('administracion/pacientes',$data);//carga html de paciente
		}
		
		public function save()
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
				$response = $this->pacientes_model->save($data);
				echo json_encode($response);
			}
			else
			{
				$response = "shit answer me something !";
				echo json_encode($response);
			}
		}

		/*public function update()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'pac_nom' 		=> $this->input->post('pac_nom'),
				'pac_ape' 		=> $this->input->post('pac_ape'),
				'pac_sex'		=> $this->input->post('pac_sex'),
				'pac_fec_nac'	=> $this->input->post('pac_fec_nac'),
				'pac_dir' 		=> $this->input->post('pac_dir'),
				'pac_cor'		=> $this->input->post('pac_cor'),
				'pac_tip_san'	=> $this->input->post('pac_tip_san'),
				'pac_est_civ'	=> $this->input->post('pac_est_civ'),
				'pac_est'		=> $this->input->post('pac_est'),
				);

				$where = array(
				'pac_ced' => $this->input->post('pac_ced')
					);

				$response = $this->mpaciente->update($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}*/

		
		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$data = $this->pacientes_model->getAll();
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}

		/*public function delete()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'pac_est' 	=> $this->input->post('pac_est'),
				);

				$where = array(
				'pac_ced' 	=> $this->input->post('pac_ced')
					);

				$response = $this->mpaciente->update2($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}*/
}

/* End of file Noticias.php */
/* Location: ./application/controllers/Noticias.php */

