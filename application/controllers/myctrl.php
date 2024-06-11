<?php
class myctrl extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        
    }
    public function samp($t)
    {
    	 			
        $crud=new grocery_CRUD();
        $this->load->model('mymodel');
$activities = $this->mymodel->get_activities_by_year("activities","2016");
foreach ($activities->result() as $row)
{
 $myarray[$row->id] .= $row->description;
}
$this->grocery_crud->field_type('interest_for','multiselect',$myarray);
$output=$crud->render();
         $this->load->view('Faculty');
         //echo "<html><h2><center><b>Guest Lecture Delivered by Staff </b></h2></html>";
        $this->load->view('showtable',$output);
}
function sam()
{
	$this->load->view('import/index');
}
}
?>