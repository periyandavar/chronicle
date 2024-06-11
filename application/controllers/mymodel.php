<?php
class mymodel extends CI_Model  {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

        public function get_activities_by_year($table, $year)
	{
		$this->db->select('id, year, description');
		$this->db->where('year', $year);
                $this->db->order_by('id desc');
		return $this->db->get($table);
	}


}
?>
