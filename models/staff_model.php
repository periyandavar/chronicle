<?php
class staff_model extends CI_Model
{
	function savedata($sname,$dept,$qual,$design,$dob,$interest,$pub,$nrp,$nrc,$nro,$phd,$phl,$gender,$address,$mobile,$email)
	{
	$sql="insert into staff(sname,dept,qual,design,dob,interest,pub,nrp,nrc,nro,phd,phl,gender,address,mobile,email) values('$sname','$dept','$qual','$design','$dob','$interest','$pub','$nrp','$nrc','$nro','$phd','$phl','$gender','$address','$mobile','$email')";
	$this->db->query($sql);
	}
	function getdata($category){
		
     $sql=$this->db->query("select * from stf where Staff_Name like"."'$category'");
		return $sql->result();
  }
  function showdata($category){
		
     $sql=$this->db->query("select * from staff_info where Staff_Name like"."'$category'");
		return $sql->result();
	}
}
?>