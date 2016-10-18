<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('administracion/administra');
	}

	
}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */