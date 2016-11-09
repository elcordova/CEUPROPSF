<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentario extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('comentario_model');
	}

	public function index()
	{
		
	}

	public function insert()
	{
		$now = new DateTime();
		$timestring = $now->format('Y-m-d h:i:s');
		
		$com_con = $this->input->post('com_con');
		$com_nom = $this->input->post('com_nom');
		$com_eml = $this->input->post('com_eml');
		$not_id = $this->input->post('not_id');

		$data = array(
            'com_con' => $com_con,
            'com_fec' => $timestring,
            'com_nom' => $com_nom,
            'com_eml' => $com_eml,
            'not_id' => $not_id
        );

		$nuevoComentario=$this->comentario_model->insert($data);
		if ($nuevoComentario) {
			echo '0';
		}else{
			echo "Ups! Error al insertar comentario";
		}
			
		
	}

	public function obtener()
	{
		$idNoticia = $this->input->post('id');
		$bus = array(
			'not_id' => $idNoticia
		);
		$this->load->model('comentario_model');
		$data=$this->comentario_model->get($bus);
		echo json_encode($data);
	}

}

/* End of file Comentario.php */
/* Location: ./application/controllers/Noticias.php */

