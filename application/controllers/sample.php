<?php
class admin_ctrl extends CI_Controller
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
     public function seminar()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $crud->set_subject('Seminar/Workshop');
        $crud->unset_print();
        $crud->unset_export();
        $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Place','Forum');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $output=$crud->render();
        $this->load->view('table',$output);
    }
  }
  ?>