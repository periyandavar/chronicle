<?php
class studachieve extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
        $this->load->model('select_model');
        $this->load->library('Grocery_CRUD_MultiSearch');
        $Student_ID=$this->session->userdata('Student_ID');
          $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        
        if($_SESSION['User_Type']!='student')
        redirect('select_ctrl/header');
    }
    public function index(){
      $Staff_ID=$this->session->userdata('Staff_ID');
      $result['data']=$this->selection_model->student($Staff_ID);
      $this->load->view('s1',$result);
        // $this->load->view('studentachieve');
      }
     public function intercollegiate()
    
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
    $crud->field_type('Event_Type','hidden','Inter-Collegiate');
        $crud->set_field_upload('Evidence2','assets/uploads/files/intercollegiate');
        $crud->set_field_upload('Evidence3','assets/uploads/files/intercollegiate');
        $crud->required_fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Title_of_program','Event_Type','Level','Date','Certificate');
      $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Inter-Collegiate');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Inter-collegiate Meet </h3></center>";
        $this->load->view('s1',$result);
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','Title_of_Event','Title_of_program','Date','Level','Certificate','Evidence2','Evidence3');
        $crud->fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Title_of_program','Event_Type','Place_Prize','Level','Date','Certificate','Evidence2','Evidence3');
        $crud->set_read_fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Title_of_program','Event_Type','Place_Prize','Level','Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        //$crud->field_type('Event_Type','hidden','Technical Competition');
        $crud->display_as('Organizer','Organized / Sponsored by');
        $crud->display_as('Place_Prize','Prize');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/intercollegiate');
        
        $output=$crud->render();
        //$this->load->view('studentachieve');
        $this->load->view('table',$output);
    }
  
   public function workshop()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->where('Student_ID',$Student_ID);
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        //$crud->where('Title_of_Event','Seminar');
        $crud->where('Event_Type','Workshop');
        if($Department=='')
        redirect('select_ctrl/header');
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $crud->field_type('Event_Type','hidden','Workshop');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        //$crud->field_type('Title_of_Event','hidden','Technical Competition');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $result['title']="<center><h3>Workshops </h3></center>";
        $this->load->view('s1',$result);
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','Title_of_program','Level','Place_Prize','Date','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Level','Organizer','Date','Presented','Certificate');
        $crud->fields('Department','Student_ID','Student_Name','Class','Event_Type','Title_of_program','Level','Place_Prize','Organizer','Date','Presented','Title_of_Paper','Certificate','Evidence2','Evidence3');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Level','Organizer','Date','Presented','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_program','Program Title');
        $crud->display_as('Title_of_Event','Event Title');
        $crud->display_as('Level','Level');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Date','Date');
        $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $output=$crud->render();
       // $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
  
   public function conference()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Conference');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Event_Type','hidden','Conference');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/conference');
        $crud->set_field_upload('Evidence3','assets/uploads/files/conference');
        $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Conference </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Place_Prize','Title_of_program','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Event_Type','Class','Title_of_program','Place_Prize','Level','Organizer','Date','Year','Presented','Title_of_Paper','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Presented','Certificate');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Place_Prize','Title_of_program','Title_of_Paper','Level','Organizer','Date','Presented','Year','Certificate','Evidence2','Evidence3');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Conference');
        $output=$crud->render();
      //  $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
    public function others()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->where('Event_Type','others');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
    $crud->set_rules('year','year','callback_check_year[year]');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Event_Type','hidden','others');
        //$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/conference');
        $crud->set_field_upload('Evidence3','assets/uploads/files/conference');
        $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Others</h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Place_Prize','Title_of_program','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Event_Type','Class','Title_of_program','Place_Prize','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Certificate');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Place_Prize','Title_of_program','Title_of_Paper','Level','Organizer','Date','Presented','Certificate','Evidence2','Evidence3');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Conference');
        $output=$crud->render();
     //   $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
  public function seminar()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Seminar');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->field_type('Event_Type','hidden','Seminar');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Seminars </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Place_Prize','Title_of_program','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Event_Type','Class','Title_of_program','Place_Prize','Level','Organizer','Date','Presented','Title_of_Paper','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Presented','Certificate');
        
      //  $crud->display_as('Student_Name','Author(s)');
        
        $crud->display_as('Organizer','Organized by');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
      //  $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
  
  public function project_applied()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Project Applied');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('year','year','callback_check_year[year]');
        $crud->field_type('Event_Type','hidden','Project Applied');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->display_as('Titleoftheproject','Title of The Project');
        $crud->display_as('nameofguide','Name of The Guide');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Projects Applied </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','nameofguide','Titleoftheproject','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','year','Certificate','Title_of_Event','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','year','Certificate','Event_Type','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','year','Certificate','Event_Type');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','year','Certificate','Title_of_Event','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $output=$crud->render();
     //   $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
  
  public function peerlearning()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Peer Learning');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    
        $crud->field_type('Event_Type','hidden','Peer Learning');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->set_field_upload('Evidence2','assets/uploads/files/peer');
        $crud->set_field_upload('Evidence3','assets/uploads/files/peer');
        $crud->set_field_upload("Certificate",'assets/uploads/files/peer');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Peer Learning </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Date','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Date','Event_Type','Certificate');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Date','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        
        $crud->display_as('Organizer','Organized by');
         
        //$crud->set_theme('datatables');
        $output=$crud->render();
       // $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
    public function check_dates($dt)
    {
        if($dt=='')return False;
        $this->form_validation->set_message('check_dates','You are entering the invalid Date please check it,...!');

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
    public function check_year($dt)
    {
      $this->form_validation->set_message('check_year','Invalid year format, The year format should be like this 2017-2018,...!');
      if($dt=='')return False;
        if (preg_match('/[1-9]{1}[0-9]{3}[-]{1}[1-9]{1}[0-9]{3}/', $dt ) ) 
        {
          return TRUE;
        } 
        else 
        {
          return FALSE;
        }
      
      
    }
    
  public function competitive()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','competitive Exam');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $crud->field_type('Event_Type','hidden','competitive Exam');
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('year','year','callback_check_year[year]');
        $crud->set_field_upload('Evidence2','assets/uploads/files/comp');
        $crud->set_field_upload('Evidence3','assets/uploads/files/comp');
        $crud->set_field_upload('Certificate','assets/uploads/files/comp');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Competitive Exams Passed </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Competitive_Exam_Passed','year','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','year','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','year','Event_Type','Certificate');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','year','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        //$crud->set_theme('datatables');
        $output=$crud->render();
      //  $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
  
  public function sports()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->where('Event_Type','Sports and Games');
        if($Department=='')
        redirect('select_ctrl/header');
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $crud->field_type('Event_Type','hidden','Sports and Games');
        //$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/sports');
        $crud->set_field_upload('Evidence3','assets/uploads/files/sports');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Sports </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Title_of_Event','Level','Place_Prize','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Student_ID','Student_Name','Class','Place_Prize','Title_of_program','Title_of_Event','Event_Type','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Title_of_Event','Event_Type','Level','Organizer','Date','Certificate');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Place_Prize','Title_of_program','Title_of_Event','Event_Type','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Game/Event');
        $crud->display_as('Level','Level');
        $crud->display_as('Place_Prize','Prize');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/sports');
        $output=$crud->render();
       // $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
    public function change_pass()
    {
        $msg='';
        if($this->input->post('change_pass'))
        {
            $Password=$this->input->post('Password');
            $New_Password=$this->input->post('New_Password');
            $confirm_pass=$this->input->post('confirm_pass');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $que=$this->db->query("select * from login where Staff_ID='$Staff_ID'");
            $row=$que->row();
            
            if((!strcmp($Password, $Password))&& (!strcmp($New_Password, $confirm_pass))){
                $this->select_model->change_pass($Staff_ID,$New_Password);
                $msg= "Password changed successfully !";
                }
                else{
                    $msg ="Invalid request";
                }
        }
        $result['msg']="<h3><center>".$msg."</center></h3>";
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Cultural </h3></center>";
        $this->load->view('s1',$result);
        $this->load->view('change_pass2',$result);   
        //$this->load->view('studentachieve');

    }

  public function cultural()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Student_ID',$Student_ID);
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->where('Event_Type','Cultural Competition');
        if($Department=='')
        redirect('select_ctrl/header');
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $crud->field_type('Event_Type','hidden','Cultural Competition');
        //$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->set_field_upload('Evidence2','assets/uploads/files/cultural');
        $crud->set_field_upload('Evidence3','assets/uploads/files/cultural');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3>Cultural </h3></center>";
        $this->load->view('s1',$result);
        $crud->columns('Student_Name','Class','Place_Prize','Title_of_Event','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->fields('Student_Name','Department','Class','Student_ID','Event_Type','Place_Prize','Title_of_program','Title_of_Event','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Student_Name','Department','Class','Student_ID','Event_Type','Title_of_program','Title_of_Event','Level','Organizer','Date','Certificate');
        $crud->set_read_fields('Student_Name','Department','Student_ID','Event_Type','Place_Prize','Title_of_program','Title_of_Event','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Event');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Place_Prize','Prize');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/cultural');
        $output=$crud->render();
       // $this->load->view('studentachieve');
           $this->load->view('table',$output);
    }
    public function placement()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Student_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        //$crud->set_theme('datatables');
        //$crud->unset_print();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Student_ID','hidden',$Student_ID);
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        $sname=$this->selection_model->sname($Student_ID);
        if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        $dat=$sname[0];
        $Std_Name=$dat->Student_Name;
        $crud->field_type('Student_Name','hidden',$Std_Name);
    
    }
    
        //$crud->field_type('Event_Type','hidden','Cultural Competition');
        //$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->display_as('Evidance','Evidence');
        $crud->required_fields('Year','Student_Name','Placed_In','Evidance');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->student($Staff_ID);
        $result['title']="<center><h3> Placements </h3></center>";
        $this->load->view('s1',$result);
        $crud->unset_fields('Status');
          $crud->set_field_upload('Evidence2','assets/uploads/files/placement');
  //$crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/placement');
        $crud->set_table('placement');
        $crud->where('Department',$Department);
        $crud->where('Student_ID',$Student_ID);
        $crud->set_field_upload('Evidance','assets/uploads/files/placement');
        $output=$crud->render();
      //  $this->load->view('Studentachieve');
           $this->load->view('table',$output);
    }
    
  }