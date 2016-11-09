<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('noticias_model','comentario_model'));
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('noticias_model');
		$data=null;
		$this->load->view('administracion/noticias',$data);	
	}

	public function insert()
	{
		$post= $this->input->post();
		$config['upload_path'] = './public/img/notices/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		// $post['banner']=$nombre_archivo;
		if (!$this->upload->do_upload('file')) {
			echo "error";
        } else {
        	$datos=array("upload_data"=>$this->upload->data());
        	$file_info = $this->upload->data();
			$id_usuario=$this->session->userdata('id');
			$file_ok=$this->noticias_model->subir($post['titulo'],$post['contenido'],$datos['upload_data']['file_name'],$id_usuario);
			if ($file_ok) {
				echo "exito";
			}else{
                echo "error";
                echo $this->upload->display_errors();
			}
			
		}
	}


	public function obtener()
	{
		$id = $this->input->post('id');
		$this->load->model('noticias_model');
		$data=$this->noticias_model->get($id);
		echo json_encode($data);
	}
	
	public function consultar_noticias(){
		$where = NULL;
		if($this->input->get())
		{
			$where=$this->input->get();
		}
		$arrayNoticias=$this->noticias_model->get($where);
		foreach ($arrayNoticias as $array_noticia) {
				
		}

		echo json_encode($arrayNoticias);
	}


	public function actualizar(){
		$post= $this->input->post();
		$file_ok=0;
		if (isset($post['checkbox_edit_img'])) {
			$config['upload_path'] = './public/img/notices/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file_edit')) 
			{
				echo "error";
        	} else {
	        	$datos=array("upload_data"=>$this->upload->data());
	        	$file_info = $this->upload->data();
				$file_ok=$this->noticias_model->update(array('not_tit'=>$post['titulo_edit'],'not_con'=>$post['contenido_edit'],'not_ban'=>$datos['upload_data']['file_name']),$post['id_noticia']);	
			}
		}else{
			$file_ok=$this->noticias_model->update(array('not_tit'=>$post['titulo_edit'],'not_con'=>$post['contenido_edit']),$post['id_noticia']);
		}

		
		if ($file_ok > 0) {
			echo "exito";
		}else{
	        echo $this->upload->display_errors();
		}	

	}


}

/* End of file Noticias.php */
/* Location: ./application/controllers/Noticias.php */

