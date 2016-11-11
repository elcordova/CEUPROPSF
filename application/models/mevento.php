<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mevento extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function save($data)
	{
		$this->db->insert('evento',$data);
	}

	public function update($data,$where)
	{
		$this->db->update('evento',$data,$where);
	}
	
	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}

	public function getAll()
	{
		return $this->db->get('evento')->result_array();
	}
	
	public function update2($data,$where)
	{
		$this->db->update('evento',$data,$where);
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