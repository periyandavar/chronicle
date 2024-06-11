<?php
class paper_model extends CI_Model
{
	function savedata($ID,$Conference_Name,$Level,$Title,$Issn_Isbn,$Name_of_journal,$Page_No,$Date_Year,$Place,$Certificate)
	{
		//return $this->db->insert('papers',$data);
	$sql = "insert into papers(ID,Conference_Name,Level,Title,Issn_Isbn,Name_of_journal,Page_No,Date_Year,Place,Certificate) values('$ID','$Conference_Name','$Level','$Title','$Issn_Isbn','$Name_of_journal','$Page_No','$Date_Year','$Place','$Certificate')";
	$this->db->query($sql);

	}
	function yrwisedata($Date_Year)
	{
	 $this->db->select("staffs.ID,staffs.Name,staffs.Department,papers.Conference_Name,papers.Title,papers.Issn_Isbn,papers.Name_of_journal,papers.Page_No,papers.Date_Year,papers.Place");
	 $this->db->from('staffs');
	 $this->db->join('papers ','staffs.ID=papers.ID');
	 $this->db->where("Date_Year='$Date_Year'");
	 $query=$this->db->get();
	 return $query->result();
	}
	function dept($Department){
		$sql = "SELECT s.Name,t.* FROM staffs s,papers t where s.Department=$Department";
		return $sql->result();
	}
}
?>