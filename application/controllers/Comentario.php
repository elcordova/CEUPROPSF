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
		
		$post= $this->input->post();

		$data = array(
            'contenido' => $post['contenido'],
            'fecha_comentario' => $timestring,
            'nombre' => $post['nombre'],
            'correo' => $post['correo'],
            'id_noticia' => $post['id_noticia']
        );

		$nuevoComentario=$this->comentario_model->insert($data);
		if ($nuevoComentario) {
			echo 'true';
		}else{
			echo "Ups! Error al insertar comentario";
		}
			
		
	}

}

/* End of file Comentario.php */
/* Location: ./application/controllers/Noticias.php */

