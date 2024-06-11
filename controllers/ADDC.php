<?php
class ADDC extends CI_Controller
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
        if( $_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');

    }

public  function index(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
  $this->load->view('ADDC');
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
$Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$result['title1'] ="<html><h2><center><b>Research Articles Published in Journals</b></h2></html>";
        $crud->columns('Staff_Name','Title_of_Paper','Name of the journal with Volume, issue & Page Nos.','Impact_Factor','Scopus','UGC','Organization','Mentioned','Year_Date');
        $crud->callback_column('Name of the journal with Volume, issue & Page Nos.',array($this,'dat'));
        //$crud->field_type('Mentioned','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->display_as('Mentioned','College name is mentioned in the article');
        $crud->display_as('Scopus','Indexed in Scopus,Web of Science,Pub med');
        $crud->display_as('UGC','Indexed in Indian citation Index/approved by UGC');
        $crud->display_as('Organization','Published by National/College level Organization');
        
       // $crud->set_relation('Name_of_Journal','paper_publication','{Name_of_Journal}','{Indexed}','{Year_Date}');
       $Staff_ID=$this->session->userdata('Staff_ID');
       $result['data']=$this->selection_model->disp1($Staff_ID);
       $this->load->view('sidepushsam',$result);
        $crud->display_as('Year_Date','Year & Date of Publication');
        $crud->display_as('Staff_Name','Name of Author');
      
        $crud->display_as('ISSN_ISBN','ISSN/ISBN Number');
     
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>Research Articles Published in Journal</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Year_Date');
        }
       // $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $crud->unset_add();
        $this->load->view('ADDC');
        
        
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
        $crud->set_table('project_pro');
        //$crud->set_subject('Consultancy Service');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['title1'] ="<html><h2><center><b>Student Research Projects</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
    
    $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>Details of student Research Projects</h3>';
        $crud->columns('Staff_Name','Student_Name','Title_of_Project','Agency','Amount','Period_of_Project','Date');
        $crud->display_as('Amount','Amount allocated (Rs.)');
        $crud->display_as('Staff_Name','Name_of_Guide');
        $crud->display_as('Student_Name','Name_of_Student');
      $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');}
      $output=$crud->render();
        
        

        $this->load->view('ADDC');
        
        //$this->load->view('deptsam');

        $this->load->view('showtable',$output);

    }
    public function over($r,$row)
    {
        $str='Overall Shield in "'.$row->Title_of_Event.'" organized by '.$row->Industry; 
        return $str;
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
    public function det($t,$row)
    {
        return 'Title : '.$row->Title_of_Proceeding.' Date : '.$row->From_Date.' Page No. :'.$row->Page_No;
    }
    public function mer($t,$row)
    {
        return $row->Event.' on '.$row->Title_of_Program;
    }
    public function app()
    {                
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('From_Date');}
        $crud->callback_column('Details_of_Proceedings (Title/Year/Page No.)',array($this,'det'));
        $crud->callback_column('Title_of_Program',array($this,'mer'));
        $crud->where('presented','yes');
        
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>Research Articles Published in Proceedings of Seminars/Conferences  </h3>';
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title1']="<html><h2><center><b>Research Articles Published in Proceedings of Seminars/Conferences</b></h2></html>";
    $this->load->view('sidepushsam',$result);
        $crud->set_table('seminar_or_workshop');
        
$crud->display_as('ISSN','ISSN/ISBN No.');
$crud->display_as('From_Date','Date');
$crud->display_as('Mentioned','Name of the College Mentioned Yes/No');
        $crud->columns('Staff_Name','Title_of_Paper','Details_of_Proceedings (Title/Year/Page No.)','Title_of_Program','Level','ISSN','Mentioned','From_Date');
        //$crud->set_subject('Seminar/Workshop');
        $crud->display_as('Title_of_book','Title of the Paper');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Authors');
        $crud->unset_add();
       // $crud->where('Type','book');
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();  
        $this->load->view('ADDC');
        $output=$crud->render();
        $this->load->view('showtable',$output);
    
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
        $crud->set_table('grant_applied');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Event_Name','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','Workshop'=>'Workshop','FDP'=>'FDP','Guest Lecture'=>'Guest Lecture','Inter - Collegiate Meet'=>'Inter - Collegiate Meet','others'=>'others'));
        $crud->columns('Organizing_Secretary','Event_Name','Title','Level','Fund_expected','Agency','Date');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br> Grants Received for Organizig Seminar/Conference</h3>';
        $crud->display_as('Fund_expected','Amount allocated (Rs.)');
        //$crud->where('Received','yes');
        $crud->where('(Event_Name!="Seminar" or Event_Name!="Conference") and Received="yes"');
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->required_fields('Date','Level','Event_Name','Title','Fund_expected','Agency','Evidence');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
           $crud->unset_columns('Evidence','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
$result['title1']="<html><h2><center><b> Grants Received for Organizig Seminar/Conference</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        
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
        $crud->set_table('book');
//        $crud->where('Department',$Department);
        $crud->where('Status','Approved');
        $crud->columns('Staff_Name','Co_Author','Title_of_book','Year_of_publishing','Volume','Address_ofPublishers','Issn_isbn_for_proceeding');
        $crud->display_as('Co_Author','Co-athor of our College');
        $crud->display_as('Issn_isbn_for_proceeding','ISBN');
        $crud->display_as('Staff_Name','Name of Author');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
//$crud->unset_read();
        $result['title1']="<html><h2><b><center>Publication of Books</center></b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>Publication of Books';
  $state=$crud->getState();
  $output=$crud->render();
        $this->load->view('ADDC');
        
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
//        $crud->where('Department',$Department);
        $crud->where('Event!=""');
        $crud->where('Status','Approved');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->where('presented','');
        $crud->callback_column('Details of Place and Date',array($this,'details'));
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Staff_Name','Title_of_Paper','Details of Place and Date','From_Date');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_delete();
$crud->unset_read();
        $result['title1']="<html><h2><b><center>Staff Attended Seminars/Workshops/Conferences</center></b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> Staff Attended Seminars/Symposium/Conferences/Workshops </h3>';
  $state=$crud->getState();
  if ($state == 'export' || $state == 'print') {
      $crud->unset_columns('From_Date');
  }
  $output=$crud->render();
        $this->load->view('ADDC');
        
        $this->load->view('showtable',$output);
    }

 public function book()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('book');
//        $crud->where('Department',$Department);
        //$crud->set_subject('Seminar/Workshop');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Staff Name');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
//        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $output=$crud->render();
        $this->load->view('ADDC');
        $this->load->view('showtable',$output);
    }

public function project_received()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_received');
//        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction');
        $crud->display_as('Staff_Name','Name of the Principal Investigator');
        $crud->display_as('Duration_of_project','Duration');
        $crud->display_as('Name_of_Project','Name of Research Project');
        $crud->display_as('Amount_fund_received','Amount Received');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> Project Received</h3>';
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $crud->display_as('Name_of_fundingagency','Name of Funding Agency');
        $output=$crud->render();
        $this->load->view('ADDC');
        $this->load->view('showtable',$output);
    }

    public function Research_guides()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
//        $crud->where('Department',$Department);
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
    $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> Research Guides</h3>';    
    $crud->columns('Staff_Name','Year','Department');
        $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');
        $output=$crud->render();
        $this->load->view('ADDC');
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
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('guide');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->display_as('Mentioned','Submitted a copy of thesis to ANJAC Library (Yes,No)');
        $crud->unset_read();
        $crud->set_rules('Completing_Year','Completing_Year','callback_check_year2[Completing_Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']="<br><h3> <center>AARC <br><br>".$Department."<br>Staff Name : ".$Staff_Name."<br> </center><br><br> PhD Scholars Guided </h3>";    
        $crud->required_fields('Staff_ID','Staff_Name','University','Title','Joining_Year','Evidence');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title1']="<html><h2><center> <b>  PhD Scholars Guided </b></h2></html>";
        $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        $crud->unset_columns('Evidence','Evidence2','Evidence3','Staff_ID','Department');
        $crud->unset_fields('Status');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->display_as("Staff_Name",'Name of the Guide');
       $crud->display_as('Co_Guide','Name of the Co-Guide');
       $crud->display_as('Student_Name','Name of the Student and Reg. No.');
       $crud->display_as('Title','Title of the Thesis');
       $crud->set_field_upload('Evidence','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence2','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence3','assets/uploads/files/phd');
     //  $crud->change_field_type('Department', 'disabled');
    //  $state=$crud->getState();
    //    if ($state == 'export' || $state == 'print') {
    //     $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $output=$crud->render();
         
        $this->load->view('table',$output);  

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
    $this->load->view('sidepushsam',$result);
//        $crud->where('Department',$Department);
        $crud->columns('Institute_Company','Purpose','Date');
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> MoU Signed</h3>';
       /* $crud->display_as('Staff_Name','Name of Teachers');
        $crud->display_as('Year','Year of Recognisation');
        $crud->display_as('Department','Discipline');*/
        
        $output=$crud->render();
        $this->load->view('ADDC');
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
    $this->load->view('sidepushsam',$result);
//        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Extension Activities</h3>';
        $crud->columns('Name_of_Activity','Name_of_scheme','Date','No_of_Faculty','No_of_Students');
        $output=$crud->render();
        $this->load->view('ADDC');
        $this->load->view('showtable',$output);
    }

public function linkage_for_ojt()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('linkage_for_ojt');
//        $crud->where('Department',$Department);
        $output=$crud->render();
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
    $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Linkage for OJT</h3>';
        $this->load->view('ADDC');
        echo "<html><h2><center><b>Linkage for OJT</b></h2></html>";
        $this->load->view('showtable',$output);
    }
    public function AnnexureXI()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_received');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->set_rules('Year_of_sanction','Year_of_sanction','callback_check_year1["Year_of_sanction"]');
if($Department=='')            
redirect('select_ctrl/header');

        $result['title1']="<html><h2><center><b> Grants Received Major/Minor/Research Projects </b> </h2></html>";
  $this->load->view('sidepushsam',$result);
  $crud->unset_add();
  
$crud->unset_edit();
//$crud->unset_read();
$crud->unset_delete();
$crud->field_type('Received','dropdown',array('Yes'=>'Yes','No'=>'No'));
$crud->set_field_upload('Certificate','assets/uploads/files/project');
$crud->set_field_upload('Evidence3','assets/uploads/files/project');
$crud->set_field_upload('Evidence2','assets/uploads/files/project');
$crud->display_as('Name_of_fundingagency','Name of the funding Agency');
$crud->required_fields('Staff_ID','Staff_Name','Nature_of_Project','Date_of_Implementation','Co_Investigator','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction','Certificate');
    if($Department=='')
    redirect('select_ctrl/header');
         $crud->set_subject('Research Project Received');
        $crud->where('Received','yes');
        $crud->display_as('Staff_Name','Name of Principal Investigator');
$crud->display_as('Nature_of_Project','Nature_of_the_Research_Project (Minor/Major)');
        $crud->columns('Staff_Name','Co_Investigator','Name_of_Project','Nature_of_Project','Name_of_fundingagency','Amount_fund_received','Date_of_Implementation','Duration_of_project','Year_of_sanction');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>Grants Received Major/Minor/Research Projects</h3>';     
         $state=$crud->getState();
         if ($state == 'export' || $state == 'print') {
          $crud->unset_columns('Year_of_sanction');}
       
        $output=$crud->render();
        $this->load->view('ADDC');
         
        $this->load->view('showtable',$output);
    }
   public function awards()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
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
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Awards Received by Staff</h3>';
$result['title1']= "<html><h2><center><b>Awards Received by Staff</b></h2></html>";
//        $crud->where('Department',$Department);
        $crud->where('Nature_of_Award','Best Paper Award');
        $crud->columns('Staff_Name','Nature_of_Award','Level','Place','From_Date');
        $crud->display_as('Staff_Name','Name of Awardee');
        $crud->display_as('Level','Issued by Central/State Government / Central/State level University / Registered Private Organization');
        $crud->display_as('From_Date','Date');
        $crud->display_as('Awarding_Agency','Name of Awardee Agency with Contact Detail');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);

        $output=$crud->render();
        $this->load->view('ADDC');
        
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
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Guest Lectures Delivered by staff</h3>';
$result['title1']= "<html><h2><center><b>Guest Lectures Delivered By Staff</b></h2></html>";
$crud->unset_columns('Staff_ID','Evidence2','Evidence3','Certificate','Status');
//        $crud->where('Department',$Department);
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
$this->load->view('ADDC');

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
        $crud->set_table('grant_applied');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Event_Name','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','Workshop'=>'Workshop','FDP'=>'FDP','Guest Lecture'=>'Guest Lecture','Inter - Collegiate Meet'=>'Inter - Collegiate Meet','others'=>'others'));
        $crud->columns('Organizing_Secretary','Event_Name','Title','Level','Fund_expected','Agency','Date');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Staff_ID',$Staff_ID);
        $Department=$this->session->userdata('Department');
$res=$this->selection_model->profile($Staff_ID);$dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
$_SESSION['CustomTitle']='<br><h3> <center>AARC <br><br>'.$Department.'<br>Staff Name : '.$Staff_Name.'<br> </center><br><br>  Grants Received for Organizig Programme (other than Seminar/Conference)</h3>';
        $crud->display_as('Fund_expected','Amount allocated (Rs.)');
        $crud->where('Received','yes');
        $crud->where('Event_Name="Seminar" or Event_Name="Conference"');
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->required_fields('Date','Level','Event_Name','Title','Fund_expected','Agency','Evidence');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
           $crud->unset_columns('Evidence','Evidence2','Evidence3','Status','Department');}
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
$result['title1']="<html><h2><center><b>  Grants Received for Organizig Programme (other than Seminar/Conference)</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        
        $this->load->view('showtable',$output);
    }
    public function mou()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('mou_signed');
//        $crud->where('Department',$Department);
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Mou Signed </h3>';
        
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $result['title1']= "<html><h2><center><b>MoU signed</b></h2></html>";
        $crud->columns('Institute_Company','Purpose','Date');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $crud->display_as('Institute_Company','Name of the  Institution/ Industry');
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        
        $this->load->view('showtable',$output);
    }
    public function remed()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('remedial');
//        $crud->where('Department',$Department);
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Remedial Class </h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       $crud->required_fields('Staff_ID','Staff_Name','Department','Class','Title','Category');
         $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
        $result['title1']= "<html><h2><center><b>Remedial Class</b></h2></html>";
        $crud->columns('Date','Staff_Name','Class','Title','Category');
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        
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
//        $crud->where('Department',$Department);
        $crud->columns('Event_Name','Title','Fund_expected','Agency','Date');
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br> Project Proposals Applied (Grant Applied)</h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->required_fields('Date','Event_Name','Title','Fund_expected','Agency','Evidence');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
$result['title1']="<html><h2><center><b>Project Proposals Applied - Grant Applied</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
        $this->load->view('ADDC');
        
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
    $this->load->view('sidepushsam',$result);
    if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Project Applied (student project) </h3>';
//        $crud->where('Department',$Department);
        $crud->columns('Event_Name','Title','Fund_expected','Agency','Date');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        $this->load->view('ADDC');
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
    $result['title1']= "<html><h2><center><b>Project Proposals Applied - Student Project </b></h2></html>";
    $this->load->view('sidepushsam',$result);
    if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Project Proposals Applied (student project) </h3>';
//        $crud->where('Department',$Department);
        $crud->columns('Title_of_Project','Staff_Name','Student_Name','Agency','Amount','Date');
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
    $crud->set_field_upload('Evidence2','assets/uploads/files/project');
    $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    $crud->required_fields('Title_of_Project','Staff_Name','Student_Name','Agency','Amount','Evidence');
    $state=$crud->getState();
    if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Date');
    }
    $output=$crud->render();
        $this->load->view('ADDC');
        
        $this->load->view('showtable',$output);
    }
    public function refresher_orientation()
    {
        $result['title1']= "<html><h2><center><b> Refresh/Orientation Courses</b></h2></html>";
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('refresh_orientation_course');
//        $crud->where('Department',$Department);
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->unset_add();
        $crud->unset_read();
        $crud->unset_edit();
        $crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>AARC <br>admin_nav </center><br><br>Refresh Orientation Programs </h3>';
        $result['title1']= "<html><h2><center><b>Refresh/Orientation Courses</center></b></h2></html>";
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('sidepushsam',$result);
    $crud->display_as('Duration_From','Duration');
    //$crud->display_as('Duration')
    $crud->required_fields('Staff_ID','Staff_Name','Name_of_Course','Place','Duration_From','Date','Evidence')    ;
    $crud->set_field_upload('Evidence','assets/uploads/files/project');
    $crud->set_field_upload('Evidence2','assets/uploads/files/project');
    $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    $crud->columns('Staff_Name','Name_of_Course','Place','Duration_From','Date');
    $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
$output=$crud->render();
        $this->load->view('ADDC');
    
        $this->load->view('showtable',$output);
    }
}