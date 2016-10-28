<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('noticias_model');
	}

	public function index()
	{
		$this->load->model('noticias_model');
		$data=null;
		$arrayNoticias=$data=$this->noticias_model->get();
		$dato['noticias']=$arrayNoticias;
		$dato['estado']=true;
		$this->load->view('index',$dato);
	}

	
}

/* End of file Principal.php */
/* Location: ./application/controllers/Noticias.php */

