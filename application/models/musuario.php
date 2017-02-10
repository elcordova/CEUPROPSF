<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Musuario extends CI_Model
{
	
	function __construct(){
		parent::__construct();

	}
	
	

	public function save($data)
	{
		$this->db->insert('usuario',$data);
	}

	public function update($data,$where)
	{
		$this->db->update('usuario',$data,$where);
	}

	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}

	public function getAll()
	{
		return $this->db->get('vista_usuario')->result_array();
	}

	public function delete($data,$where)
	{
		return $this->db->update('usuario',$data,$where);
	}

	public function activar($data,$where)
	{
		return $this->db->update('usuario',$data,$where);
	}

	public function viewquery($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function customQuery($sql)
	{
		return $this->db->query($sql)->result_array();
	}
}

 ?>