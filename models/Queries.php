<?php
class Queries extends CI_Model{
			
		public function insertImage($data)
		{
			return $this->db->insert('image',$data);
		}
	public function getImages(){
		$query=$this->db->get('image');
		if($query->num_rows()>0){
			return $query->result();
		}
	}
}
?>