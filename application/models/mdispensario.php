<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mdispensario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}	

	public function save($data)
	{
		$this->db->insert('dispensario',$data);
	}

	public function update($data,$where)
	{
		$this->db->update('dispensario',$data,$where);
	}

	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}

	public function getAll()
	{
		return $this->db->get('dispensario')->result_array();
	}

	public function delete($data,$where)
	{
		return $this->db->update('dispensario',$data,$where);
	}

	public function activar($data,$where)
	{
		return $this->db->update('dispensario',$data,$where);
	}

	public function customQuery($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function update2($data,$where)
	{
		$this->db->update('dispensario',$data,$where);
	}

}

 ?>