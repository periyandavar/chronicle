<?php
class stud_ctrl extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
        $this->load->library('Grocery_CRUD_MultiSearch');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        if( $_SESSION['User_Type']!='Co-Admin')
        redirect('select_ctrl/header');
              
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
     public function intercollegiate()
    {
                    
      $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Inter-Collegiate Meets Attended by Students</h3>';     
        $crud->set_table('student_info');

        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type("Status",'hidden',"");
       // $crud->unset_print();
       $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');

        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Inter-Collegiate');
        $crud->field_type('Event_Type','hidden','Inter-Collegiate');
        $result['title']="<html><h2><center><b> Inter-Collegiate Meets </b></h2></html>";
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $this->load->view('adminsam1',$result);
$crud->fields('Event_Type','Student_ID','Student_Name','Status','Class','Date','Department','Level','Title_of_Event','Title_of_program','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
$crud->required_fields('Event_Type','Student_ID','Student_Name','Class','Department','Title_of_program','Title_of_Event','Date','Level','Certificate','Organizer');
$crud->columns('Student_ID','Student_Name','Class','Date','Level','Title_of_Event','Title_of_program','Organizer','Place_Prize','Certificate','Evidence2','Evidence3','Status');
//$crud->set_read_fields('Event_Type','Student_ID','Student_Name','Class','Department','Title_of_program','Title_of_Event','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
//$crud->read('Student_Id','Student_Name','Class','Department','Title_of_Program','Organizer','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
$crud->set_field_upload('Evidence2','assets/uploads/files/Intercollegiate');
$crud->set_field_upload('Evidence3','assets/uploads/files/intercollegiate');
       // $crud->where('Department',$Department);
        //$crud->where('Event_Type','Inter-Collegiate');
       // $crud->unset_print();
        //$crud->unset_export();
        //$crud->columns('Student_Name','Class','Title_of_program','Title_of_Event','Date','Certificate');
       // $crud->fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Event_Type','Date','Certificate');
        $crud->display_as('Student_Name','Name of the Student');
        
        $crud->display_as('Organizer','Organized / Sponsored by');
        $crud->display_as('Place_Prize','Prizes Won');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/intercollegiate');
        $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
        $this->load->view('table',$output);
    }
  
   public function workshop()
    {
                    
      $crud=new Grocery_CRUD_MultiSearch();
      $crud->set_rules('Date','Date','callback_check_dates[Date]');
      //$crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->field_type("Status",'hidden',"");
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
      ///  $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $result['title']="<html><h2><center><b> Workshops </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
  $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
  //$crud->set_read_fields('Department','Stdent_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Place_Prize','Certificate','Evidence2','Evidence2','Presented');
  $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
  $crud->where('Department',$Department);
        $crud->where('Event_Type',"Workshop");
        //$crud->where('Title_of_Event','Workshop');
        $crud->field_type('Event_Type','hidden','Workshop');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        //$crud->unset_print();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br> Workshops Attended by Students</h3>';     
        //$crud->unset_export();
        $crud->columns('Student_ID','Student_Name','Class',"Date",'To_Date','Level','Title_of_program','Organizer','Place_Prize');
        $crud->fields('Department','Student_ID','Student_Name','Status','Class',"Date",'To_Date','Level','Title_of_program','Organizer','Place_Prize','Certificate','Evidence2','Evidence3','Event_Type');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Certificate');
   //      $crud->unset_read_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Title_of_Event','Level','Organizer','Date','Year','Certificate','Evidence2','Evidence2');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        
        $crud->display_as('Title_of_program','Program Title');
        $crud->display_as('Title_of_Event','Event Title');
        $crud->display_as('Level','Level');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  
   public function conference()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
        //$crud->where('Department',$Department);
        $crud->field_type("Status",'hidden',"");
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type("Event_Type",'dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference'));
             $result['title']="<html><h2><center> <b> Seminars/Conferences  </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Seminars/Conferences Attended by Students</h3>';     
  $crud->set_field_upload('Evidence2','assets/uploads/files/Conference');
  $crud->set_field_upload('Evidence3','assets/uploads/files/Conference');
  //$crud->set_read_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Place_Prize','Title_of_Paper','Level','Organizer','Date','Year','Certificate','Evidence2','Evidence3');
  $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->where('(Event_Type="Conference" or Event_Type="Seminar") and Department="'.$Department.'"');
       // $crud->unset_print();
       $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        //$crud->unset_export();
        $crud->field_type('Award','dropdown',array('Best Paper Award'=>'yes',' '=>'no'));
        $crud->display_as('Award','Best Paper Award Secured..?');
        $crud->display_as('Venue','Place');
        $crud->columns('Student_ID','Student_Name','Class','Date','To_Date','Level','Event_Type','Title_of_program','Organizer','Place_Prize','Presented','Title_of_Paper','Page_No','ISSN','Award','Certificate','Evidence2','Evidence3');
        $crud->display_as('ISSN','ISSN/ISBN');
        $crud->fields('Department','Student_ID','Status','Student_Name','Class','Date','To_Date','Level','Event_Type','Title_of_program','Organizer','Place_Prize','Presented','Title_of_Paper','Page_No','ISSN','Award','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Presented','Award','Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Certificate');
      $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)') ;
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Conference');
        $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  
  public function seminar()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       $crud->where('Status','Approved');
       $crud->field_type("Status",'hidden',"Approved");
        //$crud->field_type('Event_Type','Seminar');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Seminar');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Presented','dropdown',array("yes"=>'yes',"no"=>"no"));//"Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        //  $crud->unset_print();
        //$crud->unset_export();
        $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)') ;
        $crud->fields('Department','Student_ID','Student_Name','Status','Class','Title_of_program','Place_Prize','Presented','Title_of_Paper','Level','Organizer','Date','Certificate','Evidence2','Evidence3','Event_Type');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Certificate');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Event_Type",'dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference'));
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center>Student Achievements - <b> Seminars Attend by Students </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
  $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
  //$crud->unset_read_fields('Titleoftheproject','nameofguide','designation','beneficiary','venue','time','year','Competitive_Exam_Passed','traininsitiut','To_Date');
        
        $crud->columns('Student_Name','Class','Title_of_Paper','Title_of_program','Level','Organizer','Date','Certificate','Evidence1','Evidence3');
        //$crud->fields('Department','Student_ID','Student_Name','Class','Title_of_program','Place_Prize','Title_of_Paper','Level','Organizer','Date','Year','Event_Type','Evidence2','Evidence3','Certificate');
      //  $crud->display_as('Student_Name','Author(s)');
        
        $crud->display_as('Organizer','Organized by');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  
  public function project_applied()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Project Applied');
        $crud->where('Status','Approved');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->field_type('Event_Type','hidden','Project Applied');
        $crud->field_type("Status",'hidden',"Approved");
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department." </center><br><br>Student's Final Year Projects</h3>";     
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Final Year Projects </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/project');
  $crud->set_field_upload('Evidence3','assets/uploads/files/project');
  //$crud->set_read_fields('Titleoftheproject','nameofguide','designation','beneficiary','venue','time','year','Competitive_Exam_Passed','traininsitiut','To_Date');
        
       // $crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','nameofguide','Titleoftheproject','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Status','Class','Titleoftheproject','nameofguide','year','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','year','Event_Type','Certificate');
        $crud->display_as('Titleoftheproject','Title of the Project');
        $crud->display_as('nameofguide','Name of the Guide');
       // $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','Year','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence1','Status','Department');}
        
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  
  public function peerlearning()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
      //  $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type("Status",'hidden',"Approved");
       $crud->where('Status','Approved');
        $result['title']="<html><h2><center><b> Peer Learning </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/peer');
  $crud->set_field_upload('Certificate','assets/uploads/files/peer');
  $crud->set_field_upload('Evidence3','assets/uploads/files/peer');
        $crud->where('Event_Type','Peer Learning');
        $crud->field_type('Event_Type','hidden','Peer Learning');
       // $crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','Date','Title_of_Event','beneficiary','venue','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Status','Student_Name','Class','Title_of_Event','beneficiary','venue','Date','Certificate','Evidence2','Evidence3','Event_Type');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date','Certificate','Event_Type');
        //$crud->set_read_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        
        $crud->display_as('Organizer','Organized by');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Peer Learning</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence1','Status','Department');}
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('depart');
           $this->load->view('table',$output);
    }
  
  public function competitive()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->field_type('Status','hidden','Approved');
        $crud->where('Status','Approved');
        $crud->set_table('student_info');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        //$crud->set_read_fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate','Evidence2','Evidence3');
        $result['title']="<html><h2><center> <b> Competitive Exams Passed </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/comp');
  $crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/comp');
        $crud->field_type('Event_Type','hidden','competitive Exam');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','competitive Exam');
     //   $crud->unset_print();
       // $crud->unset_export();
        $crud->columns('Student_ID','Student_Name','Class','Competitive_Exam_Passed','year');
        $crud->fields('Department','Event_Type','Status','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Event_Type','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate');
        $crud->display_as('Student_Name','Name of the Student');
        //$crud->set_theme('datatables');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Cultural Meet Attended by Students</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  
  public function sports()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        //$crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->field_type('Status','hidden','');
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Sports Achievement by Students</h3>';     
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
      //  $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $result['title']="<html><h2><center>Student Achievements - <b> Sports </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/sports');
  //$crud->set_field_upload('Certificate','assets/uploads/files/c');
  $crud->set_field_upload('Evidence3','assets/uploads/files/sports');
        $crud->where('Department',$Department);
        $crud->field_type('Event_Type','hidden','Sports and Games');
        $crud->where('Event_Type','Sports and Games');
       // $crud->unset_print();
     //   $crud->unset_export();
     $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
     $crud->required_fields('Department','Student_ID','Student_Name','Title_of_program','Event_Type','Title_of_Event','Level','Organizer','Date','Year','Certificate');
        $crud->columns('Student_ID','Student_Name','Class','Date','Level','Title_of_program','Title_of_Event','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Status','Student_ID','Student_Name','Class','Date','Level','Title_of_program','Event_Type','Title_of_Event','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
        //$crud->set_read_fields('Department','Student_ID','Title_of_program','Event_Type','Title_of_Event','Level','Place_Prize','Organizer','Date','Year','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Game/Event');
        $crud->display_as('Level','Level');
        $crud->display_as('Place_Prize','Prize');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/sports');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
    public function check_year($dt)
    {
      
      $dt1=explode('-',$dt);
      $this->form_validation->set_message('check_year','Invalid year format, The year format should be like this 2017-2018,...!');
      if($dt=='')return False;
        if (preg_match('/[1-9]{1}[0-9]{3}[-]{1}[1-9]{1}[0-9]{3}/', $dt ) ) 
        {
         $v1=(int)$dt1[0];
         $v2=(int)$dt1[1];
         $dat=date('Y');
        $dat=(int)$dat;
         if($v2-$v1==1 && $v1<=$dat)   
          return TRUE;
          else
          return FALSE;
        } 
        else 
        {
          return FALSE;
        }
      
      
    }
  public function cultural()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        //$crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->field_type('Status','hidden','');
        $crud->where('Department',$Department);
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->where('Event_Type','Cultural Competition');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
    //    $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Cultural Meets </b></h2></html>";
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/cultural');
  //$crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/cultural');
  $crud->field_type('Event_Type','hidden','Cultural Competition');
    //    $crud->unset_print();
      //  $crud->unset_export();
        $crud->columns('Student_ID','Student_Name','Class','Date','Level','Title_of_program','Title_of_Event','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Status','Event_Type','Student_ID','Student_Name','Class','Date','Level','Title_of_program','Title_of_Event','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Class','Student_Name','Student_ID','Event_Type','Title_of_program','Title_of_Event','Level','Organizer','Date','Year','Certificate');
        //$crud->set_read_fields('Department','Student_ID','Event_Type','Title_of_program','Title_of_Event','Place_Prize','Level','Organizer','Date','Year','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Event');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Place_Prize','Prize');
        $crud->display_as('Date','Date');
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br> Competitive Exams Passed</h3>';     

        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/cultural');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Cultural Meets Attended by Students</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
    public function placement()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        //$crud->set_theme('datatables');
        //$crud->unset_print();
         $crud->where('Status','Approved')    ;
            $crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->field_type('Status','hidden','Approved');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $crud->field_type('Campus','dropdown',array('On Campus'=>'On Campus','Off Campus'=>'Off Campus'));
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Student_ID','Student_Name','Placed_In','Campus','Evidance','Year');
        $crud->display_as('Evidance','Evidence');
        $result['title']="<html><h2><center><b> Placements </b></h2></html>";
        $crud->unset_columns('Status');
  $this->load->view('adminsam1',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/placement');
  //$crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/placement');
        $crud->set_table('placement');
        $crud->where('Department',$Department);
        $crud->set_field_upload('Evidance','assets/uploads/files/placement');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Placement</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidance','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
        $this->load->view('Students');
           $this->load->view('table',$output);
    }
  }

  ?>