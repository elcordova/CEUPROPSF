<?php 

	/**
	* 
	*/
	class Mcita extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function save($data)
		{
			$this->db->insert('cita',$data);
		}

		public function update($data,$where)
		{
			$this->db->update('cita',$data,$where);
		}

		public function delete($sql,$data)
		{
			return $this->db->query($sql,$data);
		}
	
		public function statementSQL($sql)
		{
			return $this->db->query($sql)->result_array();
		}

		public function customQueryN($sql,$data)// many resuls
		{
			return $this->db->query($sql,$data)->result_array();
		}

		public function customquery($sql , $data) /// one result
		{
			return $this->db->query($sql,$data)->row();
		}

		public function getAll()
		{
			return $this->db->get('cita')->result_array();
		}

	}
 ?>