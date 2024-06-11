<?php
class Format extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
        
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
              

    }
    public  function index(){
  
  $crud=new grocery_CRUD();
$crud->set_table('paper_publication');
$crud->set_table('consultancy_service');
$crud->set_table('extension_activity');
$crud->set_table('mou_signed');
$crud->set_table('special_program');
$output=$crud->render();
$this->load->view('showtable',$output);
}

}