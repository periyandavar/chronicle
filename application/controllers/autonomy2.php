<?php
class autonomy2 extends CI_Controller
{
    public $i=0,$j=0;
  public $back;//
    
    public function increment($value,$row)
    {
        $this->i=$this->i+1;
        return $this->i;
    }  
    
     public function __construct()
     {
        parent::__construct();
        //$this->$i=0;
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->library('Grocery_CRUD_MultiSearch');
        $this->load->model('selection_model');
        $Staff_ID=$this->session->Staff_ID;
         $result=$this->selection_model->disp1($Staff_ID);
         if($_SESSION['User_Type']!='Subadmin' )
         redirect('select_ctrl/header');
    }

public  function index(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('adminsam2',$result);
  $this->load->view('autonomy2');
}
public function confirm($back)
        {
         $result['back']=$back;
         redirect('select_ctrl/header');
         //$this->$back=$result;
          //$this->load->view('confirm',$result)   ;
        //redirect('autonomy/confirm2($result)',$result);
        }
        public function confirm2()
        {
         //$result['back']=$back;
         //$back=$this->$back;
     //$this->load->view('confirm',$back)   ;
        //redirect('autonomy/confirm2',$this->$back);
        }
        
public function detail($value, $row)
        {
            $str=$row->Name_of_Journal.', '.$row->Page_No.', '.$row->ISSN_ISBN.', '.$row->Indexed.', '.date_format($date=new DateTime($row->Year_Date),'d/m/Y');
            return $str;
        }

        
     public function pp1($value, $row)
     {
         $str=$row->Level.' level '.$row->Event.' on "'.$row->Title_of_Program.'" held at '.$row->Place.' on '.date_format($date=new DateTime($row->From_Date),'d/m/Y');
         if($row->To_Date!='0000-00-00' and $row->To_Date!='')
          if($row->To_Date!=' ')
            $str=$str.'and '.$row->To_Date;
         return $str;
     }
     public function e1($value, $row)
     {
         $str='"'.$row->Nature_of_Activity.'" held at '.$row->Venue;
        return $str;
      }   
     public function pp2($value, $row)
     {
         $str='<b>'.$row->Staff_Name.'</b>, '.$this->session->Department.' has attended '.$row->Level.' level '.$row->Event.' on "'.$row->Title_of_Program.'" held at '.$row->Place;
         return $str;
     }      
     public function pp3($value, $row)
     {
         $str=date_format($date=new DateTime($row->From_Date),'d/m/Y');
         if($row->To_Date!='0000-00-00' and $row->To_Date!='')
         $str=$str.' to '.date_format($date=new DateTime($row->To_Date),'d/m/Y');
         return $str;
     }      
     public function jp()
    {
        $crud = new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
         $crud->set_subject('Paper Publication');
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
    if($this->session->Department=='')
        {$back=current_url();;   $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Papers in Journals</b></h2></html>";
    $this->load->view('adminsam2',$result);
           $crud->set_table('paper_publication');
        $crud->columns('Staff_Name','Title_of_Paper','Name_of_Journal','Year_Date','Indexed','Journals','ISSN_ISBN','Page_No');
        $crud->unset_columns('Indexed','Name_of_Journal','ISSN_ISBN','Page_No');
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $crud->callback_column('Journals',array($this,'detail'));
        $crud->display_as('Year_Date','Year & Date of Publication');
        $crud->display_as('Staff_Name','Author(s)');
        $crud->display_as('Title_of_Paper','Title of the Paper');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Publication of Research Articles in Journals by Staff</h3>';     
        $crud->unset_add();
        $crud->callback_column('S.No',array($this,'increment'));
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Year_Date','Indexed','Name_of_Journal');
        }
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);    	}
     public function pp()
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
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Papers Presented by Staff</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $crud->where('Presented','yes');
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Staff_Name','To_Date','Title_of_Paper','Occasion in which Presented/Published','Event','Title_of_Program','Place','From_Date','Level');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->unset_columns('To_Date','Event','Title_of_Program','Place','Level');
        $crud->display_as('Staff_Name','Author(s)');
        $crud->display_as('Title_of_Paper','Title of the Paper');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->display_as('From_Date','Date');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $crud->callback_column('Occasion in which Presented/Published',array($this,'pp1'));
        $state = $crud->getState();

if ($state == 'export' || $state == 'print') {
    $crud->unset_columns('To_Date','Event','Title_of_Program','Place','From_Date','Level');
} else {
   // $crud->columns('first_name','last_name','email','phone','city','country');
}
  //      $crud->display_as('Name_of_Journal','Name of  the Journal');
  $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Paper Presentation in Seminars,Symposia and Conferences by Staff </h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function extension()
    { 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Extension Activity</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('extension_activity');
        $crud->callback_column('Nature of Extension activity carried out',array($this,'e1'));
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->where('Department',$Department);
        $crud->columns('Date','Nature of Extension activity carried out','Objective','Impact','No_of_Participants');
        
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Details of Extension Activities Carried out</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function lecture()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Conducted Guest Lectures</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('department_activity');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->where('Department',$Department);
        $crud->where('Event','Guest Lecture');
        $crud->columns('Date','Name_of_Speaker','Nature_of_program');
        $crud->display_as('Name_of_Speaker','Name & Address of Guest Speaker');
        $crud->display_as('Nature_of_program','Topic');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Details of Guest Lectures conducted</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function workshop()
    { 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b> Organized Workshop/Seminars</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('department_activity');
        $crud->callback_column('Date1',array($this,'pps3'));
        $crud->where('Department',$Department);
        $crud->where('(Event="Seminar" or Event="Workshop" or Event="Conference")');
        $crud->columns('Date1','Department','Nature_of_program','Source_of_Funding','Date');
        $crud->display_as('Date1','Date');
        $crud->display_as('Source_of_Funding','Source of Fund');
        $crud->display_as('Nature_of_program','Title of Workshop/ Seminar');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->callback_column('menu_title',array($this,'_callback_webpage_url'));
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Seminars / Symposia /Workshop Organized</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        //$crud->unset_add();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function awardsst()
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
        $crud->columns('Student_Name','Student_ID','Class','Title_of_Paper','Level','Event_Type','Organizer','Date');
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
$this->load->view('autonomy2');
           $this->load->view('table',$output);
    }
    public function awardss()
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
$_SESSION['CustomTitle']='<br><h3> <center>Department Appraisal <br>'.$Department.' </center><br><br>Best Paper Awards by Staffs</h3>';
$result['title']= "<html><h2><center><b>Best Paper Awards by Staffs</b></h2></html>";
        $crud->where('Department',$Department);
        $crud->where('Nature_of_Award','Best Paper Award');
        $crud->columns('Staff_Name','Title_of_Paper','Level','Event','Place','From_Date');
        $crud->display_as('Staff_Name','Name of Awardee');
        $crud->display_as('Awarding_Agency','Name of Awardee Agency with Contact Detail');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('adminsam2',$result);

        $output=$crud->render();
        $this->load->view('autonomy2');
        
        $this->load->view('showtable',$output);
    }
    public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
        $crud->where('Event!=""');
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Staff Participated Seminars/Conferences (No Paper Presentation)</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        //$crud->where('Presented','no');
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Staff_Name','Date',"Details",'From_Date','To_Date','Event','Title','Place');
        $crud->callback_column('S.No',array($this,'increment'));
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Name of Staff member');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->unset_columns('To_Date','Event','Title','Place','Staff_Name');
        $crud->callback_column('Details',array($this,'pp2'));
        $crud->callback_column('Date',array($this,'pp3'));
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('To_Date','Event','Title','Place','Staff_Name','From_Date');
        }
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Participated in Seminars, Symposia and Conferences (No Paper Presentation) by the staffs</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        
        $this->load->view('showtable',$output);
    }
    public function factory()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Factory Visits</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('field_visit');
        $crud->where('Department',$Department);
        //$crud->where('Presented','no');
        $crud->set_subject('Factory Visit');
        $crud->columns('Class','Date1',"Institude_Address",'Knowledge_gained','Date');
        $crud->callback_column('S.No',array($this,'increment'));
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Date1','Date');
        $crud->display_as('Knowledge_gained','Knowledge Gained');
        $crud->display_as('Institude_Address',"Details of Place /Insititute/Factory Visit");
        $crud->display_as('Date1','Date Of Visit');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        //$crud->unset_columns('From_Date','To_Date','Event','Title','Place','Staff_Name');
        //$crud->callback_column('Details',array($this,'pp2'));
        $crud->callback_column('Date1',array($this,'pps3'));
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Details of Study tour/ Factory visit Organized</h3>';
        $state = $crud->getState();
if ($state == 'export' || $state == 'print') {
    $crud->unset_columns('Date');
}
        $output=$crud->render();
        $this->load->view('autonomy2');
        
        
        $this->load->view('showtable',$output);
    }
    public function project()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Summer Training</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('student_info');
        $crud->where('(Event_Type="Internship Training Program" or Event_Type="Training Program")');
        $crud->where('Department',$Department);
        //$crud->where('Presented','no');
        $crud->set_subject('Summer Training/Study Tour');
        $crud->columns('Student_ID','Class','Student_Name','Date','Period',"Organizer",'year');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->callback_column('Period',array($this,'pps3'));
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Student_ID','Roll No.');
        //$crud->display_as('date','Period');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Organizer',"Company Name /Insititutions");
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>The Students who have undergoes Summer training and Project Work in the reputed Organizations/Insitutions/Universities</h3>';
        $state = $crud->getState();
if ($state == 'export' || $state == 'print') {
    $crud->unset_columns('Date');
} else {
   // $crud->columns('first_name','last_name','email','phone','city','country');
}
$output=$crud->render();
        $this->load->view('autonomy2');
        
        $this->load->view('showtable',$output);
    }
 public function books()
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
        //$_SESSION['CustomTitle']='<h3>Summer Training/Project work</h3>';
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Books Published by Staff</h3>';
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Books Published by Staff</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('book');
        //$_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>10) Books Published</h3>';
        $crud->where('Department',$Department);
        $crud->columns('Staff_ID','Staff_Name','Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing');
        //$crud->set_subject('Seminar/Workshop');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Staff Name');
        $crud->unset_add();
        $crud->where('Type','book');
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
       
        $this->load->view('autonomy2');
        $output=$crud->render();
        $this->load->view('showtable',$output);
    }
    public function book()
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
        
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Proceedings</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $crud->where('(Event="Seminar" or Event="Conference") and presented="yes"');
        //$crud->set_subject('Seminar/Workshop');
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->display_as('Staff_Name','Staff Name');
        $crud->unset_add();
        $crud->columns('Title_of_Paper','Title_of_Program','ISSN','Date','From_Date');
        $crud->callback_column('Date',array($this,'pp3'));
        $crud->display_as('Title_of_Paper','Title_of_book');
        $crud->display_as('Title_of_Program','Proceeding Conference');
        $crud->display_as('ISSN','ISSN/ISBN No.');
$crud->display_as('From_Date','Date');

        //$crud->unset_column();
        //$crud->where('Type','Proceeding');
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Proceedings</h3>';
        $this->load->view('autonomy2');
        $state = $crud->getState();
if ($state == 'export' || $state == 'print') {
    $crud->unset_columns('From_Date');
}$output=$crud->render();
        
        $this->load->view('showtable',$output);
    }
 
    public function pps1($value, $row)
     {
         
        $str=$row->Level.' level '.$row->Event_Type.' on "'.$row->Title_of_program.'" held at '.$row->Organizer.' on '.date_format($date=new DateTime($row->Date),'d/m/Y');
         return $str;
     } 
     public function Industry1($value, $row)
     {
         
        $str="Over all Shield in ".$row->Title_of_Event.' '.$row->Industry;
         return $str;
     } 
     public function join($value, $row)
     {
         $str=$row->Date.' To '.$row->To_Date;
         return $str;
     } 
     public function pps2($value, $row)
     {
         $str='<b>'.$row->Student_Name.'</b>, '.$row->Class.' '.$row->Department.' has attended '.$row->Level.' level '.$row->Event_Type.' "'.$row->Title_of_program.'" held at '.$row->Organizer;
         return $str;
     }      
    
        public function pps3($value, $row)
        {
            $str=date_format($date=new DateTime($row->Date),'d/m/Y');
            if($row->To_Date!='0000-00-00' and $row->To_Date!='')
            $str=$str.' to '.date_format($date=new DateTime($row->To_Date),'d/m/Y');
            return $str;
            //return $row->Date;
        }      
     
    public function pps()
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
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Papers Presented by Students</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> Paper Presentation in Seminars, Symposia and Conferences by Students </h3>';
        //$crud->where('Event_Type','Technical Competition');
        $crud->where('presented','yes');
        $crud->set_subject("Paper presented by Students");
        $crud->columns('Student_Name','Title_of_Paper','Occasion in which Presented/Published','Event_Type','Level','Title_of_Event','Title_of_program','Organizer','Date');
        $crud->display_as('Student_Name','Author(s)');
        $crud->display_as('Title_of_Paper','Title of the Paper');
        $crud->unset_columns('Level','Title_of_Event','Title_of_program','Organizer','Event_Type');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->callback_column('Occasion in which Presented/Published',array($this,'pps1'));
        $crud->display_as('Organizer','Occasion in which presented/published');
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Level','Title_of_Event','Title_of_program','Organizer','Date','Event_Type');
        } 
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Paper Presetation in Seminars, Symposia Conference by students</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        
           $this->load->view('table',$output);
    }
    public function seminars()
    {

        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $crud->where('Status','Approved');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Seminars/Conferences Participated by Students (No Presentation)</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $state = $crud->getState();
        if($state == 'print')
    {

        //Do your cool stuff here . You don't need any State info you are in add
    }
        //$crud->where('Event_Type','Technical Competition');
        $crud->where('presented','no');
        $crud->set_subject("Seminar/Conference");
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        //$crud->where('Title_of_Event','Seminar');
        //$crud->unset_print();
        //$crud->unset_export();
        
        $crud->columns('Student_Name','Title_of_Paper','From_Date','To_Date','Details','Level','Title_of_Event','Title_of_program','Organizer','Date');
        //$crud->display_as('Student_Name','Author(s)');
$crud->display_as('From_Date','Date');
        $crud->display_as('Title_of_Paper','Title of the Paper');
        $crud->unset_columns('Level','To_Date','Title_of_Event','Title_of_Paper','Title_of_program','Organizer');
        //$crud->display_as('Title_of_Event','Title of the Event');
        //$crud->display_as('Title_of_program','Title of the Program');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->callback_column('Details',array($this,'pps2'));
        $crud->callback_column('From_Date',array($this,'pps3'));
        //$crud->callback_column('Date',array($this,'pps4'));
        $crud->display_as('Organizer','Occasion in which presented/published');
        //$crud->unset_read();
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Level','Title_of_Event','Title_of_Paper','Title_of_program','Organizer','Date','To_Date');        }
            $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br> Participated in Seminars, Symposia and Conferences (No Paper Presentation) by the student</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
           $this->load->view('table',$output);
    }
    public function p2($value, $row)
    {
        if($row->Organizer!='' and $row->Title_of_Event!='')
        $str='<center><b>'.$row->Title_of_Event.',</b><br> '.$row->Organizer.'<center>';
        if($row->Title_of_program!='')
        $str='<center><b>'.$row->Title_of_Event.',</b><br> '.$row->Title_of_program.'<center>';
        if($row->Organizer!='' and $row->Title_of_Event=='')
        $str='<center><b>'.$row->Level.' level '.$row->Event_Type.' on '.$row->Title_of_program.',</b><br> '.$row->Organizer.'<center>';
        return $str;
    }      
    public function p3($value, $row)
    {
        $str=$row->Student_Name.'<br>'.$row->Class;
        return $str;
    }      
    public function prizes()
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
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Prizes Won by Students</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        //$crud->where('Event_Type','Intercollegiate');

        $crud->where('Place_Prize!=""');
        $crud->set_subject("Seminar/Conference");
        //$crud->where('Title_of_Event','Seminar');
        //$crud->unset_print();
        
        //$crud->unset_export();
        $crud->columns('Date','Name of the Event & Venue','Particulars of the Participant(s)','Place_Prize');
        //$crud->display_as('Student_Name','Author(s)');
        //$crud->display_as('Title_of_Paper','Title of the Paper');
        //$crud->unset_columns('Level','Title_of_Event','Title_of_Paper','Title_of_program','Organizer',);
        //$crud->display_as('Title_of_Event','Title of the Event');
        $crud->display_as('Place_Prize','Prize(s)');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->callback_column('Name of the Event & Venue',array($this,'p2'));
        $crud->callback_column('Particulars of the Participant(s)',array($this,'p3'));
        $crud->display_as('Organizer','Occasion in which presented/published');
        //$crud->fields('Department','Student ID','Student Name','Class','Title of Event','Title of Program','Title of Paper','Level','Organized by','Date','Year','Certificate');
        //$crud->set_theme('datatables');        $crud->unset_add();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Details of Prizes won by Students in various Competition</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
           $this->load->view('table',$output);
    }


    public function mou()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>MoU Signed</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('mou_signed');
        $crud->where('Department',$Department);
        $crud->columns('Date','Institute_Company','Duration','Purpose');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>MoU Signed</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }

   public function awards()
    {
                 
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Paper Published by Staffs</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('awards');
        $crud->where('Department',$Department);
        $crud->where('Nature_of_Award','Best Paper Award');
        $crud->columns('Staff_Name','Awarding_Agency','Department','Date');
        $crud->display_as('Staff_Name','Name of Awardee');
        $crud->display_as('Awarding_Agency','Name of Awardee Agency with Contact Detail');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Best Paper Presentation Award won by Student/Staff</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }

  public function alumni()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Alumni Interaction</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('alumni_interaction');
        $crud->where('Department',$Department);
        $crud->columns('Detail_of_Alumni','Date','Type_of_Program');
        $crud->display_as('Detail_of_Alumni','Name and Address of Alumni');
        $crud->display_as('Date','Date of visit');
        $crud->display_as('Type_of_Program','Topic');
        $crud->callback_column('S.No',array($this,'increment'));
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Details of the interaction with Alumni</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function inter()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->Staff_ID;
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->Department;
        if($this->session->Department=='')
        {
            $back=current_url();;
            $this->confirm($back);
        }
        $state = $crud->getState();

    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Inter-Collegiate Achievements</b></h2></html>";
    $this->load->view('adminsam2',$result);
        $crud->set_table('department_activity');
        $crud->where('Event','Overall shield');
        $crud->where('Department',$Department);
        $crud->columns('Date','Department','Industry1');
        //$crud->fields('S.No','Date','Department','Industry');
        $crud->display_as('Industry1','Name of the Event & Venue');
        $crud->callback_column('Industry1',array($this,'Industry1'));
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy Grant<br>'.$Department.' </center><br><br>Achievements in Inter-Collegiate Competitions</h3>';
        $output=$crud->render();
        $this->load->view('autonomy2');
        $this->load->view('showtable',$output);
    }
    public function sample($val)
    {
        $data_id = $this->uri->segment(3);
        print_r ($data_id);
    }
    public function _callback_webpage_url($value, $row)
{
    $this->$j=$this->$j+1;
  return 0;
}
 
}