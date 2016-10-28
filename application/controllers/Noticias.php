<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('noticias_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('noticias_model');
		$data=null;
		$arrayNoticias=$data=$this->noticias_model->get();
		if($arrayNoticias==false){
			$dato['estado']=false;
			$this->load->view('administracion/noticias',$dato);
		}else{
			$data['noticias']=$arrayNoticias;
			$data['estado']=true;
			$this->load->view('administracion/noticias',$data);	
		}
	}

	public function insert()
	{
		$status="";		
		$msg="";
		$file_element=$_FILES;

        $post= $this->input->post();
		$config['upload_path'] = './public/img/notices/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		// $post['banner']=$nombre_archivo;
		if (!$this->upload->do_upload($file_element)) {
			$status="error";
           	$msg= $this->upload->display_errors('','');
        } else {
        	$file_info = $this->upload->data();
			$id_usuario=$this->session->userdata('id');
			$file_ok=$this->noticias_model->subir($post['titulo'],$post['contenido'],$file_info['file_name'],$id_usuario);
			if ($file_ok) {
				$status = "ok";
                $msg = "Noticia Cargada Correctamente";	
			}else{
				unlink($file_info['full_path']);
                $status = "error";
                $msg = "ha ocurrido un error mientrar intentabamos cargar la imagen, por favor intente otra vez";
			}
		}
		@unlink($_FILES[$file_element]);
		echo json_encode(array('status' => $status, 'msg' => $msg));	
	}
}

/* End of file Noticias.php */
/* Location: ./application/controllers/Noticias.php */

