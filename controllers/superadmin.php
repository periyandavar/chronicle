<?php
class superadmin extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
      }

      public function Staff()
    {
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
 
       $crud->set_theme('datatables');
          $crud->set_table('staff_info');
        $crud->where('Department',$Department);   
        
       $crud->columns('Staff_Name','Department','Designation','Qualification','Year_of_Experience','Area_of_Interest');
       
        $output=$crud->render();
        $this->load->view('table',$output);
	}

public function paper_publication()
    {
    	
   			
        $crud=new grocery_CRUD();
        
       // $crud->set_title('Paper Publication');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('paper_publication');
        
      // $crud->columns('Staff_ID','Title_of_Paper','Level','Name_of_Journal','Impact factor if any');
    //    $crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        $crud->display_as('Title_of_Paper','Title of Paper');
        $crud->display_as('Staff_ID','Name of Staff member');
      //  $crud->display_as('Level','Level National/International');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $crud->where('Department',$Department);
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $this->load->view('table',$output);
	}

	public function guest_lecture()
    {
    	 			
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('guest_lecture');
        $crud->where('Department',$Department);
        //$crud->where('Staff_ID',$Staff_ID);
        $crud->columns('Date','Staff_ID','Title','Place');
        $crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        //$crud->display_as('ID','S.No');
        $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Place','Forum');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('table',$output);
	}

    public function seminar()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $crud->columns('Date','Staff_ID','Title','Level','Place');
        $crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        //$crud->display_as('ID','S.No');
        $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Place','Forum');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('table',$output);
    }

     public function Awards()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('awards');
        $crud->where('Department',$Department);
        //$crud->where('Staff_ID',$Staff_ID);
        //$crud->columns('Date','Staff_ID','Nature_of_Award','Awarding_Agency');
        //$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        //$crud->display_as('ID','S.No');
        $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Nature_of_Award','Nature of Award');
        $crud->display_as('Awarding_Agency','Awarding Agency');
        $crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('table',$output);
    }

     public function Audio()
    {
                    
        $crud=new grocery_CRUD();
        $crud->set_table('audio_book');
        $crud->where('Department',$Department);
        $crud->columns('Date','Staff_ID','Title_of_Program','Organising_Agency');
        $crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        //$crud->display_as('ID','S.No');
        $crud->display_as('Title_of_Program','Title of Program');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Organising_Agency','Organising Agency');
        $crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('table',$output);
    }

    public function FDP()
    {
                    
        $crud=new grocery_CRUD();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('fdp');
        $crud->where('Department',$Department);
        $crud->columns('Date','Staff_ID','Title_of_Program','Organizing_Agency');
        $crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        //$crud->display_as('ID','S.No');
        $crud->display_as('Title_of_Program','Title of Program');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Organizing_Agency','Organising Agency');
        $crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('table',$output);
    }
  
}