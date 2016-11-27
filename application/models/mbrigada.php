<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mbrigada extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	/*public function save($data)
	{
		$this->db->insert('brigada',$data);
	}
	public function update($data,$where)
	{
		$this->db->update('brigada',$data,$where);
	}
	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}*/

	public function getAllPacientes()
	{
		return $this->db->get('paciente')->result_array();
	}
	public function getAllMedicos()
	{
		return $this->db->get('medico')->result_array();
	}
	/*public function getActivos($sql)
	{
		return $this->db->query($sql)->result_array();
	}
	public function delete($data,$where)
	{
		return $this->db->update('brigada',$data,$where);
	}

	public function activar($data,$where)
	{
		return $this->db->update('brigada',$data,$where);
	}

	public function viewquery($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function customquery($sql , $data)
	{
		return $this->db->query($sql,$data)->row();
	}*/
		
}

 ?>