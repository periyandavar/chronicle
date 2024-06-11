<?php
class Naac extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->library('Grocery_CRUD_MultiSearch');
        $this->load->model('selection_model');
        
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
              

    }

public  function index(){
  $this->load->view('criteria');
}
public  function two(){
     $this->load->view('criteria');
  $this->load->view('nacc2');
}

public  function three(){
     $this->load->view('criteria');
  $this->load->view('nacc');
}
public  function five(){
    $this->load->view('criteria');
  $this->load->view('nacc5');
}

public  function four(){
     $this->load->view('criteria');
  $this->load->view('nacc4');
}
public  function six(){
     $this->load->view('criteria');

  $this->load->view('nacc6');
}
public  function seven(){
     $this->load->view('criteria');
  $this->load->view('nacc7');
}

public function paper_publication()
    {
    	
   			
        $crud=new Grocery_CRUD_MultiSearch();
         $crud->set_subject('Paper Publication');
       //  $crud->set_title('Paper Publication');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('paper_publication');
        
        $crud->columns('Staff_Name','Year_Date','Name_of_Journal','ISSN_ISBN');
        $crud->fields('Staff_Name','Year_Date','ISSN_ISBN','Name_of_Journal','Indexed');
        $crud->display_as('Year_Date','Year & Date of Publication');
        $crud->display_as('Staff_Name','Name of Author');
      
        $crud->display_as('ISSN_ISBN','ISSN/ISBN Number');
        $crud->where('Department',$Department);
        $this->load->view('criteria');
        echo"<html><h3><b><center>Publication of the memnbers of Staff</b></h3>";
        $_SESSION['CustomTitle']='<br><h3>Publication of the memnbers of Staff</h3>';
       // $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
        	}

public function consultancy_service()
{
  
        
        $crud=new Grocery_CRUD_MultiSearch();      
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
        $this->load->view('criteria');
        echo"<html><h3><b><center>Consultancy Service</b></h3>";
        $crud->unset_add();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

public function extension_activity()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('extension_activity');
        $crud->where('Department',$Department);
        $crud->columns('Name_of_Activity','Name_of_scheme','Date','No_of_Faculty','No_of_Students','Amount_spent');
        $output=$crud->render();
        $crud->unset_add();
$this->load->view('criteria');
        $this->load->view('nacc');
        echo"<html><h3><b><center>Extension Activity</b></h3>";
        $this->load->view('showtable',$output);
    }
      
      public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Staff_Name','From_Date','To_Date','Event','Title','Place');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
        $this->load->view('criteria');
        echo"<html><h3><b><center>Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </b></h3>";
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

 public function book()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
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
        $this->load->view('criteria');
        $crud->columns('Staff_Name','Department','Title_of_book','Year_of_publishing');
        echo"<html><h3><b><center>Book Published </b></h3>";
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

public function project_received()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_received');
        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction');
        $crud->display_as('Staff_Name','Name of the Principal Investigator');
        $crud->display_as('Duration_of_project','Duration');
        $crud->display_as('Name_of_Project','Name of Research Project');
        $crud->display_as('Amount_fund_received','Amount Received');
        $crud->display_as('Name_of_fundingagency','Name of Funding Agency');
        $output=$crud->render();
        $this->load->view('criteria');
        echo"<html><h3><b><center>Project Received by Staff </b></h3>";
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

    public function Research_guides()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Year','Department');
        $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');
        $output=$crud->render();
        $this->load->view('criteria');
        echo"<html><h3><b><center>Research Guidance by Staff </b></h3>";
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

    public function dept_org_seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('department_activity');
       # $crud->or_where('Event','Seminar');
       # $crud->or_where('Event','Workshop');
        $crud->where('Department',$Department);
      //  $crud->where('Event','Seminar'AND'Workshop');
        #$crud->where('Event',['Seminar'],['Workshop']);
        #$crud->where('Event','Workshop');
        /*$crud->columns('Staff_Name','Year','Department');
        $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');*/
        $output=$crud->render();
        $this->load->view('criteria');
        echo"<html><h3><b><center>Department Organized Programmes</b></h3>";
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

    public function mou_signed()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('mou_signed');
        $crud->where('Department',$Department);
        $crud->columns('Date','Institute_Company','Duration','Purpose','No_of_Students');
       /* $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');*/
        $output=$crud->render();
        $this->load->view('criteria');
        echo"<html><h3><b><center>MoU Signed </b></h3>";
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }

    public function stud_exact()
    {
         $_SESSION['CustomTitle']='<h3>Student Participated Extension Activitiy </h3>';            
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('extension_activity');
        $crud->where('Department',$Department);
        $crud->columns('Name_of_Activity','Name_of_scheme','Date','No_of_Faculty','No_of_Students');
        $output=$crud->render();
         $this->load->view('criteria');
         $this->load->view('nacc');
        echo"<html><h3><b><center>Student Participated Extension Activitiy </b></h3>";
        
        $this->load->view('showtable',$output);
    }

public function linkage_for_ojt()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('linkage_for_ojt');
        $crud->where('Department',$Department);
        $output=$crud->render();
        $this->load->view('criteria');
        $this->load->view('nacc');
        echo"<html><h3><b><center>Linkage for OJT </b></h3>";
        $this->load->view('showtable',$output);
    }

   public function awards()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('awards');
        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Awarding_Agency','Date');
        $crud->display_as('Staff_Name','Name of Awardee');
        $crud->display_as('Awarding_Agency','Name of Awardee Agency with Contact Detail');
       $output=$crud->render();
       $this->load->view('criteria');
        echo"<html><h3><b><center>Awards Received by staff </b></h3>";
        $this->load->view('nacc');
        $this->load->view('showtable',$output);
    }
  }