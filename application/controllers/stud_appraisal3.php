<?php
class stud_appraisal3 extends CI_Controller
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
        if($_SESSION['User_Type']!='Subadmin' )
        redirect('select_ctrl/header');
              
    }
    public function dat($v,$row)
    {
      if($row->Event_Type=='Inter-Collegiate')
      return $row->Title_of_program;
      if($row->Event_Type=='Seminar' or $row->Event_Type=='Conference' or $row->Event_Type=='Workshop')
      return $row->Event_Type;
      if($row->Event_Type=='others')
      return $row->Title_of_program;
      return $row->Title_of_Event;
    }
    public function data($v,$row)
    {
      
      return $row->Organizer.' on '.date('d-m-Y', strtotime($row->Date));
    }
    public function name($r,$row)
    {
      return $row->Student_Name.' ('.$row->Class.')';
    }
     public function AnnexureVIII()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
       $crud->where('Place_Prize!=""');
       $crud->where('Status','Approved');
       //$crud->where('Title_of_Event','Quiz'or 'conference');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->columns('Student_Name','Title_of_Event','Organizer','Place_Prize','Date');
        $crud->callback_column('Title_of_Event',array($this,'dat'));
        $crud->callback_column('Organizer',array($this,'data'));
        $crud->callback_column('Student_Name',array($this,'name'));
        //$crud->fields('Department','Student ID','Student Name','Class','Event Type','Prize','Title of Event','Organized by','Date','Year','Certificate');
        $crud->display_as('Student_Name','Name of the Students');
        $crud->display_as('Title_of_Event','Nature of the Activities');
        $crud->display_as('Organizer','Organized/Sponsored by');
        $crud->display_as('Place_Prize','Prize won');
        $_SESSION['CustomTitle']='<br><h3> <center>Appraisal <br>'.$Department.' </center><br><br>Student Performance</h3>';
       // $crud->set_theme('datatables');
        //$crud->set_field_upload('Certificate','assets/uploads/files/intercollegiate');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Student Performance </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Appraisal2');
        $this->load->view('table',$output);
    }
    public function check_dates($dt)
    {
      $this->form_validation->set_message('check_dates','You are entering the invalid Date please check it,...!');
      if($dt=='')return False;

        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        $time1 = strtotime($dt2);
        $time2 = strtotime($dat2);
        if($time1<=$time2)
        return True;
        // $diff=date_diff($dt2,$dat2);

      return false;
    }
     public function AnnexureIX()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->callback_column('Student_Name',array($this,'name'));
        //$crud->where('Status','Approved');
        $crud->where('Event_Type','Journals');
        $crud->field_type('Event_Type','hidden','Journals');
        $crud->field_type('Department','hidden',$Department);
        //$crud->where('Title_of_Event','Web master');
        //$crud->unset_add();
        //$crud->unset_edit();
        $crud->columns('Student_ID','Student_Name','Class','Title_of_program','Organizer','Date','Indexed');
        $crud->fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate');
        $crud->set_read_fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate','Evidence2','Evidence3');
        //$crud->fields('Department','Student ID','Student Name','Class','Title of program','Title of Event','Level','Organized by','Date','Year','Certificate');
        $crud->display_as('ISSN','ISSN/ISBN No. with Pg No.');
        $crud->display_as('Title_of_program','Title of the Paper');
        $crud->display_as('Organizer','Journal Name');
        $crud->display_as('Title_of_program','Title of the Program');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->display_as('Organizer','Occasion in which presented/published');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $_SESSION['CustomTitle']='<br><h3> <center>Appraisal <br>'.$Department.' </center><br><br>Student Publications </h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Student Publications </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Appraisal2');
           $this->load->view('table',$output);
    }
  public function present($r,$row)
  {
    $str=$row->Level.' level '.$row->Event_Type.' on "'.$row->Title_of_program.'" held at '.$row->Organizer.' on '.date('d-m-Y', strtotime($row->Date));
    if($row->To_Date!='' and $row->To_Date!='0000-00-00')
        $str=$str." to ".date('d-m-Y', strtotime($row->To_Date));
        return $str;
  }

   public function AnnexureX()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Status','Approved');
        $crud->where('Department',$Department);
        $crud->where('presented','yes');
        $crud->callback_column('Student_Name',array($this,'name'));
        //$crud->where('Title_of_Event','Conference');
        //$crud->where('Title_of_Event','Seminar');
        $crud->unset_add();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->columns('Student_Name','Title_of_Paper','Occasion in which Presented/Published','Date');
        $crud->callback_column('Occasion in which Presented/Published',array($this,'present'));
        $crud->display_as('Student_Name','Author(s)');
        $crud->display_as('Title_of_Paper','Title of the Paper');
        $crud->display_as('Title_of_Event','Title of the Event');
        $crud->display_as('Title_of_program','Title of the Program');
        $crud->display_as('Organizer','Occasion in which presented/published');
        //$crud->fields('Department','Student ID','Student Name','Class','Title of Event','Title of Program','Title of Paper','Level','Organized by','Date','Year','Certificate');
        //$crud->set_theme('datatables');
        //$crud->set_field_upload('Certificate','assets/uploads/files/Conference');
        $_SESSION['CustomTitle']='<br><h3> <center>Appraisal <br>'.$Department.' </center><br><br>Students Presented </h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Students Presented </b></h2></html>";
 $this->load->view('adminsam2',$result);
$this->load->view('Appraisal2');
           $this->load->view('table',$output);
    }
    public function AnnexureXI()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        //$crud->where('Status','Approved');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->where('Award','Best Paper Award');
        $crud->field_type('Award','hidden','Best Paper Award');
        $crud->field_type('Department','hidden',$Department);
        //$crud->unset_add();
        //$crud->unset_edit();
        $crud->columns('Student_Name','Student_ID','Class','Award','Organizer','Date');
        $crud->fields('Department','Award','Student_Name','Student_ID','Class','Award','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Student_Name','Student_ID','Class','Award','Organizer','Date','Certificate');
        $crud->display_as('Student_Name','Name of the Student');
       // $crud->display_as('Place_Prize','Awards Won');
       $crud->set_field_upload('Certificate','assets/uploads/files/project');
       $crud->set_field_upload('Evidence2','assets/uploads/files/project');
       $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->display_as('Title_of_program','Title of the Program');
        $crud->display_as('Title_of_Event','Title of the Event');
                $crud->display_as('Organizer','Organized/Sponsored by');
        //$crud->fields('Department','Student ID','Student Name','Class','Title of Event','Title of program','Title of Paper','Level','Organized by','Date','Year','Certificate');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $_SESSION['CustomTitle']='<br><h3> <center>Appraisal <br>'.$Department.' </center><br><br>Best Paper Awards by Students</h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Best Paper Awards by Students</b></h2></html>";
 $this->load->view('adminsam2',$result);
$this->load->view('Appraisal2');
           $this->load->view('table',$output);
    }

  public function AnnexureXVII()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->unset_print();
        $crud->unset_export();
        $crud->columns('Student_Name','Title_of_Event','Organizer','beneficiary','venue');
        $crud->display_as('Student_Name','Name of the Students');
        $crud->display_as('Title_of_Event','Title of the Event');
        $crud->display_as('Organizer','Conducted by');
        $crud->display_as('beneficiary','Beneficiary');
        $crud->display_as('venue','Venue');
        
                
       // $crud->fields('Department','Student ID','Student Name','Class','Title of Event','Organized by','beneficiary','venue','Year');
        $crud->set_theme('datatables');
        $output=$crud->render();
$this->load->view('Appraisal2');
           $this->load->view('table',$output);
    }
  
  public function Student_Project_Applied()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->unset_print();
        $crud->unset_export();
        $crud->columns('Student_Name','Class','nameofguide','Titleoftheproject');
        $crud->display_as('Student_Name','Name of the Students');
         $crud->display_as('nameofguide','Staff');
        $crud->display_as('Titleoftheproject','Title of the Project');
        //$crud->fields('Department','Student ID','Student Name','Class','Name of the Exam Passed','Year');
        $crud->set_theme('datatables');
        $output=$crud->render();
$this->load->view('Appraisal2');
           $this->load->view('table',$output);
    }
  
  }

  ?>