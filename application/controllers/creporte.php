<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creporte extends CI_Controller {


	function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model(array('mreporte')); //get the model to work with
		}

		public function start()
		{
			$this->load->view('administracion/includes/cabecera');
			$this->load->view('menu');
			$this->load->view('vreporte');
			$this->load->view('administracion/includes/footer');
		}
		
		
		

		
		
}


/* End of file Noticias.php */
/* Location: ./application/controllers/Noticias.php */

