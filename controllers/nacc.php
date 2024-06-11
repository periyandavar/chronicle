<?php
class Naac extends CI_Controller
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
  $this->load->view('nacc');
}

public function paper_publication()
    {
    	
   			
        $crud=new grocery_CRUD();
         $crud->set_subject('Paper Publication');
       //  $crud->set_title('Paper Publication');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('paper_publication');
        
        $crud->columns('Staff_Name','Year_Date','ISSN_ISBN','Name_of_Journal','Indexed');
        $crud->fields('Staff_Name','Year_Date','ISSN_ISBN','Name_of_Journal','Indexed');
        $crud->display_as('Year_Date','Year&Date of Publication');
        $crud->display_as('Staff_Name','Name of Staff');
      
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3>Publication of the memnbers of Staff</h3>';
       // $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
	}

public function consultancy_service()
{
  
        
        $crud=new grocery_CRUD();      
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('consultancy_service');
        $crud->set_subject('Consultancy Service');
        //$_SESSION['CustomTitle']='<br><h3>Consultancy Service</h3>';
        $crud->columns('Staff_Name','Name_of_Project','Agency_Address','Agency_Contact','Amount_generated');
        //$crud->set_relation('Consulting Agency with ContactDetails','consultancy_service','{Agency_Address}-{Agency_Contact}');
        $crud->where('Department',$Department);
        $crud->display_as('Name_of_Project','Nature of Consultancy Service Offered');
       // $crud->display_as('Agency_Address','Agency Address');
        $crud->display_as('Amount_generated','Revenue Generated');
      //  $crud->set_field_upload('Billing Document','assets/uploads/files/consultancy');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

public function extension_activity()
    {
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('extension_activity');
        $crud->where('Department',$Department);
        $crud->columns('Name_of_Activity','Name_of_scheme','Date','No_of_Faculty','No_of_Students','Amount_spent');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
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
        $crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

 public function book()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('book');
        $crud->where('Department',$Department);
        //$crud->set_subject('Seminar/Workshop');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Staff Name');
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

public function project_received()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('book');
        $crud->where('Department',$Department);
        $output=$crud->render();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }
  }