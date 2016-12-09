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
	public function save($data)
	{
		$this->db->insert('brigada',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function saveDetalleBrigadaMedico($dataM)
	{
		$this->db->insert('detalle_brigada_medico',$dataM);
	}
	public function savePaciente($data)
	{
		$this->db->insert('paciente',$data);
	}
	public function saveMedico($data)
	{
		$this->db->insert('medico',$data);
	}
	public function update($data,$where)
	{
		$this->db->update('brigada',$data,$where);
	}
	public function statementSQL($sql)
	{
		return $this->db->query($sql)->result_array();
	}
	public function getAll()
	{
		return $this->db->get('brigada')->result_array();
	}
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