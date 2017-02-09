<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpaciente extends CI_Controller {


	function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mpaciente')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vpaciente');
			$this->load->view('administracion/includes/footer');
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
				'pac_ali'		=> $this->input->post('pac_ali'),
				'pac_act_fis'	=> $this->input->post('pac_act_fis'),
				'pac_sue'		=> $this->input->post('pac_sue'),
				'pac_hig'		=> $this->input->post('pac_hig'),
				'pac_mic'		=> $this->input->post('pac_mic'),
				'pac_dep'		=> $this->input->post('pac_dep'),
				'pac_alc'		=> $this->input->post('pac_alc'),
				'pac_tab'		=> $this->input->post('pac_tab'),
				'pac_dro'		=> $this->input->post('pac_dro'),
				'pac_otr'		=> $this->input->post('pac_otr'),
				'pac_g'			=> $this->input->post('pac_g'),
				'pac_p'			=> $this->input->post('pac_p'),
				'pac_c'			=> $this->input->post('pac_c'),
				'pac_a'			=> $this->input->post('pac_a'),
				'pac_hv'		=> $this->input->post('pac_hv'),
				'pac_hm'		=> $this->input->post('pac_hm'),
				'pac_fup'		=> $this->input->post('pac_fup'),
				'pac_fuc'		=> $this->input->post('pac_fuc'),
				'pac_menar'		=> $this->input->post('pac_menar'),
				'pac_cic_men'	=> $this->input->post('pac_cic_men'),
				'pac_fum'		=> $this->input->post('pac_fum'),
				'pac_menos'		=> $this->input->post('pac_menos'),
				'pac_pap'		=> $this->input->post('pac_pap'),
				'pac_mam'		=> $this->input->post('pac_mam'),
				'pac_ant'		=> $this->input->post('pac_ant'),
				'pac_met_ant'	=> $this->input->post('pac_met_ant'),
				'pac_ivs'		=> $this->input->post('pac_ivs'),
				'pac_par_sex'	=> $this->input->post('pac_par_sex'),
				);
				
				$response = $this->mpaciente->save($data);
				echo json_encode($response);
			}
			else
			{
				$response = "shit answer me something !";
				echo json_encode($response);
			}
		}

		public function update()
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
				'pac_g'			=> $this->input->post('pac_g'),
				'pac_p'			=> $this->input->post('pac_p'),
				'pac_c'			=> $this->input->post('pac_c'),
				'pac_a'			=> $this->input->post('pac_a'),
				'pac_hv'		=> $this->input->post('pac_hv'),
				'pac_hm'		=> $this->input->post('pac_hm'),
				'pac_fup'		=> $this->input->post('pac_fup'),
				'pac_fuc'		=> $this->input->post('pac_fuc'),
				'pac_menar'		=> $this->input->post('pac_menar'),
				'pac_cic_men'	=> $this->input->post('pac_cic_men'),
				'pac_fum'		=> $this->input->post('pac_fum'),
				'pac_menos'		=> $this->input->post('pac_menos'),
				'pac_pap'		=> $this->input->post('pac_pap'),
				'pac_mam'		=> $this->input->post('pac_mam'),
				'pac_ant'		=> $this->input->post('pac_ant'),
				'pac_met_ant'	=> $this->input->post('pac_met_ant'),
				'pac_ivs'		=> $this->input->post('pac_ivs'),
				'pac_par_sex'	=> $this->input->post('pac_par_sex'),
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
		}

		public function update2()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
				'pac_ali'		=> $this->input->post('pac_ali'),
				'pac_act_fis'	=> $this->input->post('pac_act_fis'),
				'pac_sue'		=> $this->input->post('pac_sue'),
				'pac_hig'		=> $this->input->post('pac_hig'),
				'pac_mic'		=> $this->input->post('pac_mic'),
				'pac_dep'		=> $this->input->post('pac_dep'),
				'pac_alc'		=> $this->input->post('pac_alc'),
				'pac_tab'		=> $this->input->post('pac_tab'),
				'pac_dro'		=> $this->input->post('pac_dro'),
				'pac_otr'		=> $this->input->post('pac_otr'),
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
		}
		
		public function get()
		{
			if($this->input->is_ajax_request())
			{
				$data = $this->mpaciente->getAll();
				header('Content-type: application/json; charset=utf-8');
				echo json_encode(array("datos"=>$data));
			}
			else
			{
				exit("No direct scrip");
				show_404();	
			}
		}

		public function get2()
		{
			if($this->input->is_ajax_request())
			{
				$sql	= "SELECT pac_ced FROM paciente";
				$data = $this->mpaciente->viewquery($sql);
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
						'pac_est' 	=> FALSE,
				);

				$where = array(
						'pac_ced' 	=> $this->input->post('id')
						);

				$response = $this->mpaciente->delete($data,$where);
				echo json_encode($response);
			}
			else
			{
				echo json_encode($response);
			}
		}

		public function activar()
		{
			if($this->input->is_ajax_request())
			{
				$data = array(
						'pac_est' 	=> TRUE,
				);
				$where = array(
								'pac_ced' => $this->input->post('id')
								);
				$response = $this->mpaciente->activar($data,$where);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($response);
			}else
			{
				echo json_encode($response);
			}
		}


		public function get_one()
	{
		
			$ced_pac = $this->input->get('ced_pac');
			$sql = "SELECT * from paciente where pac_ced= '".$ced_pac."'";
			$data = $this->mpaciente->stSQL($sql);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode(array("datos"=>$data));
		
	}
}


/* End of file Noticias.php */
/* Location: ./application/controllers/Noticias.php */

