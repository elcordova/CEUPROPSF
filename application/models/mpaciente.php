<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mpaciente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function save($data)
	{
		$this->db->insert('paciente',$data);
	}

	public function update($data,$where)
	{
		$this->db->update('paciente',$data,$where);
	}
	
	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}
	public function stSQL($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function getAll()
	{
		return $this->db->get('paciente')->result_array();
	}
	public function getActivos($sql)
	{
		return $this->db->query($sql)->result_array();
	}
	public function delete($data,$where)
	{
		return $this->db->update('paciente',$data,$where);
	}

	public function activar($data,$where)
	{
		return $this->db->update('paciente',$data,$where);
	}

	public function viewquery($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function customquery($sql , $data)
	{
		return $this->db->query($sql,$data)->row();
	}
		
}

 ?>