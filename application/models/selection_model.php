<?php
class selection_model extends CI_Model
{
function profile($Staff_ID)
	{
		$sql=$this->db->query("select * from staff_info where Staff_ID='$Staff_ID'");
		//if(mysql_num_rows($result)){
		return $sql->result();
		/*
		else{
			echo "Staff ID not exist";
		}*/
	}
	
	function disp($Staff_ID)
	{
		$sql=$this->db->query("select Staff_ID,Staff_Name from staff_info where Staff_ID='$Staff_ID'");
		return $sql->result();
	}
	function dept()
	{
		$sql=$this->db->query("select Dept_Name from department");
		return $sql->result();

	}
	function abtus()
	{
		$sql=$this->db->query("select detail from about");
		return $sql->result();
		
	}
	function depts($dept)
	{
		$sql=$this->db->query("select Name from staffs where Department='$dept'");
		return $sql->result();
		
	}
	function display($Staff_ID)
	{
		$sql=$this->db->query("select * from staff_info where Staff_ID='$Staff_ID'");
		return $sql->result();
	}
	function student($Staff_ID)
	{
		$sql=$this->db->query("select * from student_details where Reg_No='$Staff_ID'");
		return $sql->result();
	}
	function sname($Staff_ID)
	{
		$sql=$this->db->query("select Student_Name from student_details where Reg_No='$Staff_ID'");
		return $sql->result();
	}
	function depts12()
	{
		$sql=$this->db->query("select Department from login where User_Type='Subadmin'");
		return $sql->result();
	}
	function change_pass1($fix,$count,$val3)
	{
		for($i=1;$i<=$count;$i++)
		{
			if($i<10)
			 $v1=$fix.'0'.$i;
			else
			$v1=$fix.$i;
			//$sql=$this->db->query("Insert into  login(Staff_ID,Password,User_Type,Department) values(".'"'.$v1.'","'.$v1.'","student","'.$val3.'")');
			$sql=("Insert into  login(Staff_ID,Password,User_Type,Department) values(".'"'.$v1.'","'.$v1.'","student","'.$val3.'")');
	//print_r($sql);
			$this->db->query($sql);
		}
	}
function select()
{
	$this->db->order_by('id','DESC');
	$query=$this->db->get('staff_info');
	return $query;
}

function insert($data)
{
	$this->db->insert_batch('staff_info',$data);
}
function awar($Department)
{
	$sql=$this->db->query("select count(*) from awards where Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function bk($Department)
{
	$sql=$this->db->query("select count(*) from book where type='book' and Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function fdp($Department)
{
	$sql=$this->db->query("select count(*) from fdp where Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function gst($Department)
{
	$sql=$this->db->query("select count(*) from guest_lecture where Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function sor($Department)
{
	$sql=$this->db->query("select count(*) from seminar_or_workshop where Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function wk($Department)
{
	$sql=$this->db->query('select count(*) from student_info where (Event_Type="Workshop" or Event_Type="Seminar" or Event_Type="Conference") and Department="'.$Department.'" and Status!="Approved"');
	return $sql->result();
}
function meet($Department)
{
	$sql=$this->db->query('select count(*) from student_info where (Event_Type="Inter-Collegiate" or Event_Type="Sports and Games" or Event_Type="Cultural Competition")and Department="'.$Department.'" and Status!="Approved"');
	return $sql->result();
}

function jnl($Department)
{
	$sql=$this->db->query("select count(*) from paper_publication where Department='".$Department."' and Status!='Approved'");
	return $sql->result();
}
function add_dept($val1,$val2)
{
	$sql=$this->db->query("Insert into  department_code values(".$val1.','.$val2.')');
	$this->db->query($sql);
}
function apr($val1,$val2)
{
	$sql=$this->db->query("update ".$val1." set Status='Approved' where ID='".$val2."'");
	// echo$sql;
	// $this->db->query($sql);
}

function disp1($Staff_ID)
	{
		$sql=$this->db->query("select Department from department_code where Department_Code='$Staff_ID'");
		$res= $sql->result();
		
		if(count($res)==0)
		 {$sql=$this->db->query("select Department from login where Staff_ID='$Staff_ID'"); 
			$res= $sql->result();
		}
		return $res;
		/*$this->db->select('Department');
        $this->db->from('department_code');
        $this->db->where('Department_Code', $Staff_ID);
        $query = $this->db->get();
        
        return $query->result_array('Department');*/
    
	}

}
?>
