<?php 
	
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	*/
	class Mhorario extends CI_Model
	{
		
		function __construct(){
			parent::__construct();

		}
		
		public function save($data)
		{
			$this->db->insert('horario',$data);
		}

		public function update($data,$where)
		{
			$this->db->update('horario',$data,$where);
		}

		public function delete($data)
		{
			return $this->db->delete('horario',$data);
		}

		public function getAll()
		{
			return $this->db->get('horario')->result_array();
		}

		public function statementSQL($sql , $data)
		{
			$this->db->query($sql,$data);
		}

		public function customQuery($sql)
		{
			return $this->db->query($sql)->result_array();
		}

		

		

	}

 ?>