<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login($username, $password)
	{
		$this->db->where('correo_electronico',$username);
		$this->db->where('password',md5($password));
		$q = $this->db->get('usuario');
		if($q->num_rows()>0)
		{
			return true;
		}else{
			return false;
		}
	}

	public function consultar_usuario($username)
	{
		$this->db->where('correo_electronico',$username);
		$q = $this->db->get('usuario');
		return $q->row();
	}

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */