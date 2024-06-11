<?php
class select_model extends CI_Model
{
	function select()
	{
		$sql=$this->db->query("select Department from department_code");
		return $sql->result();
	}
	function insert(){
		//return $sql->insert
	}
	 function validate($Staff_ID,$Password)
{	
	$this->db->where('Staff_ID', $Staff_ID);
	$this->db->where('Password', $Password);
	//$this->db->where('Department',$Department);
	$query = $this->db->get('login',1);
	return $query;
}
function get_user(){
	//$result = $this->db->SELECT ('Staff_ID' ) ->get('login')->result_array();
	//$this->db->where('User_Type','Subadmin');
	$this->db->select("Staff_ID,Department");
$this->db->from("login");
$this->db->where('User_Type','Subadmin');
//$this->db->where('User_Type','admin');
$result = $this->db->get()->result_array();

	foreach ($result as $r ){
		# code...
		$Staff_ID[$r['Staff_ID']]=$r['Staff_ID'];
		//$Department[$r['Department']]=$r['Department'];
	}
	$Staff_ID['']='Select ID..';
	//$Department['']='Department';
	return $Staff_ID;
	return $Department;
}
	
function change_pass($Staff_ID,$New_Password)
	{
	$update_pass=$this->db->query("UPDATE login set Password='$New_Password'  where Staff_ID='$Staff_ID'");
	//$alter_pass=$this->db->query("ALTER login set Password='$New_Password'  where Staff_ID='$Staff_ID'");

	}
}
?>

