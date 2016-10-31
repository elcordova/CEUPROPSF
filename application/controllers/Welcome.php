<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(isset($_POST['password'])){
			$this->load->model('usuario_model');
			if($this->usuario_model->login($_POST['username'],$_POST['password'])){
				$usuario = $this->usuario_model->consultar_usuario($_POST['username']);
				$sesion_usuario = array('id' => $usuario->id_usuario,
									'email' => $usuario->correo_electronico,
									'estado'=> $usuario->estado,
									'conectado'=> true,);
				$this->session->set_userdata($sesion_usuario);
				redirect('Administracion');
			}
			
		}

		$this->load->model('noticias_model');
		$data=null;
		$arrayNoticias=$data=$this->noticias_model->get();
		$dato['noticias']=$arrayNoticias;
		$dato['estado']=true;
		




		$this->load->view('index', $dato);
	}

	
}

?>