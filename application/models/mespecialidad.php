<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Mespecialidad extends CI_Model
{
	
	function __construct(){
		parent::__construct();

	}
	
	public function save($data)
	{
		$this->db->insert('especialidad',$data);
	}

	public function update($data,$where)
	{
		$this->db->update('especialidad',$data,$where);
	}

	public function statementSQL($sql , $data)
	{
		$this->db->query($sql,$data);
	}

	public function getAll()
	{
		return $this->db->get('especialidad')->result_array();
	}

	public function delete($data)
	{
		return $this->db->delete('especialidad',$data);
	}

	public function customQueryN($sql,$data)// many resuls
	{
		return $this->db->query($sql,$data)->result_array();
	}

}

 ?>