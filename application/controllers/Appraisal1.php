<?php
class Appraisal1 extends CI_Controller
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
        if( $_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');

    }

public  function index(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
  $this->load->view('Appraisal1');
}
public function dat($v,$row)
{ 
 $str=$row->Name_of_Journal.', '.$row->ISSN_ISBN.', '.$row->Indexed.', '.$row->Page_No.', '.date('d-m-Y', strtotime($row->Year_Date));
 return $str; 
}

public function paper_publication()
    {
    	
   			
        $crud = new Grocery_CRUD_MultiSearch();
         $crud->set_subject('Paper Publication');
       //  $crud->set_title('Paper Publication');
       $crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('paper_publication');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();

$result['title'] ="<html><h2><center><b>Papers Published by Staff</b></h2></html>";
        $crud->columns('Department','Staff_Name','Title_of_Paper','Name of the journal with Volume, issue & Page Nos.','Level','Year_Date');
        $crud->callback_column('Name of the journal with Volume, issue & Page Nos.',array($this,'dat'));
       // $crud->set_relation('Name_of_Journal','paper_publication','{Name_of_Journal}','{Indexed}','{Year_Date}');
       $Staff_ID=$this->session->userdata('Staff_ID');
       $result['data']=$this->selection_model->disp1($Staff_ID);
       $this->load->view('admin_nav',$result);
        $crud->display_as('Year_Date','Year & Date of Publication');
        $crud->display_as('Staff_Name','Name of Author');
      
        $crud->display_as('ISSN_ISBN','ISSN/ISBN Number');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Publications by Staff Members</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Year_Date');
        }
       // $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('Appraisal1');
        
        
        $this->load->view('showtable',$output);
        	}
public function agency($r,$row)
{
return $row->Name_of_Project.' for '.$row->Agency_Address;
}
public function yr($v,$row)
{
    return date('Y', strtotime($row->Date));
}
public function consultancy_service()
{
  
        
        $crud=new Grocery_CRUD_MultiSearch();    
        //$crud->where('Status','Approved');  
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('consultancy_service');
        $crud->set_subject('Consultancy Service');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['title'] ="<html><h2><center><b>Consultancy Services</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    $crud->callback_column('Consultancy Services Offered',array($this,'agency'));
    $crud->callback_column('Year',array($this,'yr'));
    $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Consultancy Service</h3>';
        $crud->columns('Department','Year','Consultancy Services Offered','Amount_generated','Date');
        //$crud->set_relation('Consulting Agency with ContactDetails','consultancy_service','{Agency_Address}-{Agency_Contact}');
        $crud->display_as('Name_of_Project','Nature of Consultancy Service Offered');
       // $crud->display_as('Agency_Address','Agency Address');
        $crud->display_as('Amount_generated','Revenue Generated');
      //  $crud->set_field_upload('Billing Document','assets/uploads/files/consultancy');
      $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');}
      $output=$crud->render();
        
        

        $this->load->view('Appraisal1');
        
        //$this->load->view('deptsam');

        $this->load->view('showtable',$output);

    }
    public function over($r,$row)
    {
        $str='Overall Shield in "'.$row->Title_of_Event.'" organized by '.$row->Industry; 
        return $str;
    }
    public function overall_shield()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
        $crud->where('Event','Overall shield');
        $crud->columns('Date','Department','Industry');
        $crud->fields('Date','Department','Industry');
        $crud->display_as('Industry','Events / Institutions');
        $crud->callback_column('Industry',array($this,'over'));
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Overall Shields</h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Overall Shield </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        $this->load->view('table',$output);
    }
public function add($value, $row)
{
    $str=$row->UG_Gain-$row->UG_Loss;
    return $str;
}
public function add1($value, $row)
{
    $str=$row->PG_Gain-$row->PG_Loss;
    return $str;
}
    public function work()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('work');
         $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
        //$crud->where('Event','Overall shield');
        $crud->columns('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','[UG] (+) or (-) ','PG_Gain','PG_Loss','[PG] (+) or (-) ','Year');
        $crud->fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
        $crud->set_read_fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
        $crud->required_fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
       // $crud->display_as('POMU','[UG] (+) or (-) ');
        //$crud->display_as('POMP','[PG] (+) or (-) ');
        $crud->field_type('Department','hidden',$Department);
        $crud->callback_column('[UG] (+) or (-) ',array($this,'add'));
        $crud->callback_column('[PG] (+) or (-) ',array($this,'add1'));
        //$crud->unset_add();
        //$crud->unset_edit();
        //$crud->unset_delete();
        //$crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Work Adjustment</h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Work Adjustment </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        $this->load->view('table',$output);
    }
    public function app()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('audio_book');
        $crud->where('Type','Mobile App');
        $crud->columns('Department','Staff_Name','Title_of_Program','Date');
        //$crud->where('Status','Approved');
        //$crud->fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
        //$crud->required_fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
        $crud->display_as('Title_of_Program','App Name ');
        //$crud->display_as('POMP','[PG] (+) or (-) ');
        $crud->field_type('Department','hidden',$Department);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Mobile App Development</h3>';
        //$_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Assosiation Meetings</h3>';     
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence1','Evidence2','Evidence3','Status','Date');}
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center>Mobile App Development </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        $this->load->view('table',$output);
    }
    public function act($v,$row)
    {
        return $row->Nature_of_Activity.' for '.$row->Target_Group.' of '.$row->Venue.', '.$row->No_of_Participants.' '.$row->Target_Group.' benefited.';
    }

public function extension_activity()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('extension_activity');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title'] ="<html><h2><center><b>Extension Activity</b></h2></html>";
    $this->load->view('admin_nav',$result);
    $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
$_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Extension Activity';
$crud->callback_column('Nature of Extension activity carried out',array($this,'act'));
        $crud->columns('Department','Date','Nature of Extension activity carried out','Impact');
        $crud->display_as('Impact','Outcome');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function check_dates($dt)
    {
        $this->form_validation->set_message('check_dates','You are entering the invalid Date please check it,...!');
        if($dt=='')
      return FALSE;
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
    public function seminar1()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Status','Approved');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->where('Presented','yes');
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Department','Staff_Name','Title_of_Paper','Details','From_Date');
        $crud->callback_column('Details',array($this,'detail'));

        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
        $result['title']="<html><h2><b><center>Papers Presented in Seminar/Conference</center></b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Papers Presented by Staff Members in Seminar/Symposium/Conference </h3>';
  $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('From_Date');
        }      
  $output=$crud->render();
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function details($val,$row)
    {
        $str=$row->Level." Level ".$row->Event." on ".$row->Title_of_Program." held at ".$row->Place." on ".date('d-m-Y', strtotime($row->From_Date));
        if($row->To_Date!='' and $row->To_Date!='0000-00-00')
        $str=$str." to ".date('d-m-Y', strtotime($row->To_Date));
        return $str;
    }
    public function detail($val,$row)
    {
        $str=$row->Level." Level ".$row->Event." on ".$row->Title_of_Program." held at ".$row->Place." on ".date('d-m-Y', strtotime($row->From_Date));
        if($row->To_Date!='' and $row->To_Date!='0000-00-00')
        $str=$str." to ".date('d-m-Y', strtotime($row->To_Date));
        $str=$str.", ISSN: ".$row->ISSN.", ".$row->Page_No;
        return $str;
    }

      public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Status','Approved');
        $crud->where('Event!=""');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->where('presented','');
        $crud->callback_column('Details of Place and Date',array($this,'details'));
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Department','Staff_Name','Title_of_Paper','Details of Place and Date','From_Date');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
        $result['title']="<html><h2><b><center>Staff Attended Seminars/Workshops/Conferences</center></b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Staff Attended Seminar/Symposium/Conference/Workshop </h3>';
  $state=$crud->getState();
  if ($state == 'export' || $state == 'print') {
      $crud->unset_columns('From_Date');
  }
  $output=$crud->render();
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }

 public function book()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('book');
        //$crud->set_subject('Seminar/Workshop');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Staff Name');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('Appraisal1');
        $this->load->view('showtable',$output);
    }

public function project_received()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_received');
        $crud->columns('Department','Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction');
        $crud->display_as('Staff_Name','Name of the Principal Investigator');
        $crud->display_as('Duration_of_project','Duration');
        $crud->display_as('Name_of_Project','Name of Research Project');
        $crud->display_as('Amount_fund_received','Amount Received');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Project Received</h3>';
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $crud->display_as('Name_of_fundingagency','Name of Funding Agency');
        $output=$crud->render();
        $this->load->view('Appraisal1');
        $this->load->view('showtable',$output);
    }

    public function Research_guides()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Research Guides</h3>';    
    $crud->columns('Staff_Name','Year','Department');
        $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');
        $output=$crud->render();
        $this->load->view('Appraisal1');
        $this->load->view('showtable',$output);
    }
public function tit($v,$row)
{
    if($row->Event!='others' and $row->Event!='Inter - Collegiate Meet')
    return $row->Event.' on '.$row->Nature_of_program;
    if ($row->Event=='others')
    return $row->Nature_of_program;
    return $row->Event.' - '.$row->Nature_of_program;
}
public function fund($C,$row)
{
    $str=$row->Source_of_Funding.' Rs.'.$row->Amount;
    return $str; 
}
    public function dept_org_seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
     $crud->unset_add();
     $crud->unset_edit();
     $crud->unset_delete();
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('department_activity');
        $crud->where('Event!="Overall shield"');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']= "<html><h2><center><b>Department Organized </b></h2></html>";
    $this->load->view('admin_nav',$result);
       # $crud->or_where('Event','Seminar');
       # $crud->or_where('Event','Workshop');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Department Organized Events';
        //$crud->where('Event','Seminar'AND'Workshop');
        #$crud->where('Event',['Seminar'],['Workshop']);
        #$crud->where('Event','Workshop');
        $crud->columns('Department','Date','Title of the Seminar/Symposia/Conference','Name_of_Speaker','Source_of_Fund');
        $crud->display_as('Name_of_Speaker','Name & Address of Guest Speaker');
        $crud->callback_column('Title of the Seminar/Symposia/Conference',array($this,'tit'));
        $crud->callback_column('Source_of_Fund',array($this,'fund'));
        $crud->fields('Department','Nature_of_program','Event','Date','Name_of_Speaker','Source_of_Funding');
        $crud->set_field_upload('Certificate','assets/uploads/files/Department');
        #$crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Name_of_Speaker','Details of Speaker');
        $crud->display_as('Nature_of_Program','Name of program');
        $output=$crud->render();
        
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }

    public function mou_signed()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('mou_signed');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $crud->columns('Department','Institute_Company','Purpose','Date');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> MoU Signed</h3>';
       /* $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');*/
        
        $output=$crud->render();
        $this->load->view('Appraisal1');
        echo "<html><h2><center><b>MoU </b></h2></html>";
        $this->load->view('showtable',$output);
    }

    public function stud_exact()
    {
         $_SESSION['CustomTitle']='<h3>Student Participated Extension Activtiy </h3>';            
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('extension_activity');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Extension Activities</h3>';
        $crud->columns('Department','Name_of_Activity','Name_of_scheme','Date','No_of_Faculty','No_of_Students');
        $output=$crud->render();
        $this->load->view('Appraisal1');
        $this->load->view('showtable',$output);
    }

public function linkage_for_ojt()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('linkage_for_ojt');
        $output=$crud->render();
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Linkage for OJT</h3>';
        $this->load->view('Appraisal1');
        echo "<html><h2><center><b>Linkage for OJT</b></h2></html>";
        $this->load->view('showtable',$output);
    }

    public function awards()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
    //     $crud->where('Nature_of_Award!=""');
    //   $crud->where('Nature_of_Award!="no"');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
$_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal <br> </center><br><br>Best Paper Awards by staff</h3>';
$result['title']= "<html><h2><center><b>Best Paper Awards by staff</b></h2></html>";
        //$crud->where('Department',$Department);
        $crud->where('Nature_of_Award','Best Paper Award');
        $crud->columns('Department','Staff_Name','Place','From_Date');
        $crud->display_as('Staff_Name','Name of Awardee');
        $crud->display_as('Awarding_Agency','Name of Awardee Agency with Contact Detail');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);

        $output=$crud->render();
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function guest_lecture()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('guest_lecture');
        
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
$_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Guest Lectures Delivered by staff</h3>';
$result['title']= "<html><h2><center><b>Guest Lectures Delivered By Staff</b></h2></html>";
$crud->unset_columns('Staff_ID','Evidence2','Evidence3','Certificate','Status');
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
$this->load->view('Appraisal1');

        $this->load->view('showtable',$output);
  }
  public function pps3($value, $row)
        {
            $str=date('d-m-Y', strtotime($row->From_Date));
            if($row->To_Date!='0000-00-00' and $row->To_Date!='')
            $str=$str.' to '.date('d-m-Y', strtotime($row->To_Date));
            return $str;
            //return $row->Date;
        }

  public function FDP()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('fdp');
        $crud->where('Status','Approved');
        $crud->callback_column('Date',array($this,'pps3'));
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Faculty Development Programs </h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->unset_add();
        $result['title']= "<html><h2><center><b>FDP</b></h2></html>";
        $crud->columns('Department','Date','Speaker','Organizing_Agency','From_Date');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('From_Date');        }
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function mou()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('mou_signed');
        
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Mou Signed </h3>';
        
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $result['title']= "<html><h2><center><b>MoU signed</b></h2></html>";
        $crud->columns('Department','Institute_Company','Purpose','Date');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $crud->display_as('Institute_Company','Name of the  Institution/ Industry');
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function remed()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('remedial');
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Remedial Class </h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       $crud->required_fields('Staff_ID','Staff_Name','Department','Class','Title','Category');
         $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
        $result['title']= "<html><h2><center><b>Remedial Class</b></h2></html>";
        $crud->columns('Department','Date','Staff_Name','Class','Title','Category');
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function grant_applied()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('grant_applied');
        $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->columns('Department','Event_Name','Title','Fund_expected','Agency','Received','Date');
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br> Project Proposlas Applied (Grant Applied)</h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->required_fields('Date','Event_Name','Title','Fund_expected','Agency','Evidence');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date','Received');
        }
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
$result['title']="<html><h2><center><b>Project Proposals Applied - Grant Applied</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }

     public function Project_pro()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('grant_applied');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Project Applied (student project) </h3>';
        $crud->columns('Department','Event_Name','Title','Fund_expected','Agency','Date');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        $this->load->view('Appraisal1');
        echo "<html><h2><center><b>Project Pro Applied - Student Project </b></h2></html>";
        $this->load->view('showtable',$output);
    }
    public function student_project()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_pro');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']= "<html><h2><center><b>Project Proposals Applied - Students Project </b></h2></html>";
    $this->load->view('admin_nav',$result);
    if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Project Proposals Applied (Students Project) </h3>';
        $crud->columns('Department','Title_of_Project','Staff_Name','Student_Name','Agency','Amount','Date');
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
    $crud->set_field_upload('Evidence2','assets/uploads/files/project');
    $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    $crud->required_fields('Title_of_Project','Staff_Name','Student_Name','Agency','Amount','Evidence');
    $state=$crud->getState();
    if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Date');
    }
    $output=$crud->render();
        $this->load->view('Appraisal1');
        
        $this->load->view('showtable',$output);
    }
    public function refresher_orientation()
    {
        $result['title']= "<html><h2><center><b> Refresh/Orientation Courses</b></h2></html>";
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('refresh_orientation_course');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal<br> </center><br><br>Refresh Orientation Programs </h3>';
        $result['title']= "<html><h2><center><b>Refresh/Orientation Courses</center></b></h2></html>";
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    $crud->display_as('Duration_From','Duration');
    //$crud->display_as('Duration')
    $crud->required_fields('Staff_ID','Staff_Name','Name_of_Course','Place','Duration_From','Date','Evidence')    ;
    $crud->set_field_upload('Evidence','assets/uploads/files/project');
    $crud->set_field_upload('Evidence2','assets/uploads/files/project');
    $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    $crud->columns('Department','Staff_Name','Name_of_Course','Place','Duration_From','Date');
    $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
$output=$crud->render();
        $this->load->view('Appraisal1');
    
        $this->load->view('showtable',$output);
    }
}