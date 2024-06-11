<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_grocery_crud_model extends Grocery_crud_model {

    private $query_str = '';
    private $like_arr = array();
    private $or_like_arr = array();
    private $order_by_str = '';
    private $limit_str = '';
    private $group_by_str = '';

    public function __construct(){
	parent::__construct();
    }
public function date($Department)
{
	#$sql=$this->db->query("SELECT  s.From_Date,s.To_Date,s.Staff_Name,s.Title,s.Level,s.Place,p.Title_of_Paper,p.Level,p.Place,p.Year_Date from seminar_or_workshop s,paper_publication p where 'Department=$Department'");
	#return $sql->result() ;
	$this->query_str=$Department;
}
}
?>