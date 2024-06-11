<?php
class mymodel extends CI_Model  {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

        public function get_activities_by_year($table, $date)
	{
		$this->db->select('date, Staff_Name');
		$this->db->where('Date', $Date);
               // $this->db->order_by('id desc');
		return $this->db->get($table);
	}


}
