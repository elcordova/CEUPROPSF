<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('administracion/includes/cabecera');
		$this->load->view('administracion/administra');
		$this->load->view('administracion/includes/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location:".base_url());
	}


}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */