<?php
class report1 extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
       // $this->load->model('Custom_grocery_crud_model');
        $this->load->library('Grocery_CRUD_MultiSearch');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
              if($Department=='')
              redirect('select_ctrl/header');
              if($_SESSION['User_Type']!='Subadmin' )
              redirect('select_ctrl/header');

    }
    public function exp($va,$row)
    {
        return date_format($date=new DateTime(),'Y')-date_format($date=new DateTime($row->Date_of_Join),'Y');
    }
public function Staff()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_subject('Staff Info');
        $Staff_ID=$this->session->userdata('Staff_ID');

        $result['data']=$this->selection_model->disp1($Staff_ID);
            
            $result['title']="<html><h2><center>Audit (Faculty Data) -<b>Profile </b> </h2></html>";
      $this->load->view('adminsam2',$result);
      $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');

        //$crud->set_theme('datatables');
		$crud->unset_add();
        $crud->set_table('staff_info');
        $crud->columns('Staff_Name','Designation','Qualification','Year_of_Experience','Area_of_Interest');
        $crud->callback_column('Year_of_Experience',array($this,'exp'));

        $crud->where('Department',$Department);   
//        $_SESSION['CustomTittle']='<br><h2><center><b>INTERNAL QUALITY ASSURANCE CELL<br>EXTERNAL ACADEMIC AUDIT PROFORMA</h2><br>';
$_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Faculty Profile</h3>';
        $crud->display_as('Staff_Name','Staff Name');
        $crud->display_as('Area_of_Interest','Area of Specialization');
        $crud->display_as('Year_of_Experience','Experience');
        $output=$crud->render();
        $this->load->view('Faculty1');
        $this->load->view('showtable',$output);
        
        
	}

	public function paper_publication()
    {
    	
   			
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
        $crud->set_subject('Paper Publication');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('paper_publication');
        $crud->unset_add();
        $result['data']=$this->selection_model->disp1($Staff_ID);
            
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Journals </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
        $crud->columns('Staff_Name','Title_of_Paper','Level','Name_of_Journal','Impact_Factor','Indexed','Year_Date');
        $crud->fields('Staff_Name','Title_of_Paper','Level','Name_of_Journal','Year_Date','Impact factor if any','Citation index if any');
        $crud->display_as('Staff_Name','Name of Staff');
        $crud->display_as('Year_Date','Date');
        $crud->display_as('Level','Level National/International');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Paper Publication</h3>';
        //$crud->where('Event_Name','Paper Published');
        //$_SESSION['CustomTitle']='<br><h3>Publication of the memnbers of Staff</h3>';
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Year_Date');
        }
        $output=$crud->render();
        $this->load->view('Faculty1');
        
        $this->load->view('showtable',$output);
	}

	public function guest_lecture()
    {
    	 			
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('guest_lecture');
        $crud->columns('Date','Staff_Name','Title','Place');
        $crud->display_as('Name of Staff','Staff_Name');
        $crud->display_as('Venue','Forum');
        $crud->unset_add();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Guest Lecture Deleivered</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Guest Lecture</b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->set_subject('Guest Lecture');
        //$crud->where('Event_Name','Guest Lecture Delivered');
        //$_SESSION['CustomTitle']='<br><h3>Guest Lecture Delivered by Staff Members</h3>';
        $output=$crud->render();
         $this->load->view('Faculty1');
         
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
    public function pps31($value, $row)
    {
        $str=date('d-m-Y', strtotime($row->Date));
        if($row->To_Date!='0000-00-00' and $row->To_Date!='')
        $str=$str.' to '.date('d-m-Y', strtotime($row->To_Date));
        return $str;
        //return $row->Date;
    }      
    public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_add();
        //$crud->where('Status','Approved');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        //$this->output->enable_profiler(TRUE);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit  <br>'.$Department.' </center><br><br>Papers Presented by Staff</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Papers Presented in Seminar/Conference </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->where('Presented','yes');
  $crud->callback_column('Date',array($this,'pps3'));
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        //$crud->where('Event_Name','Paper Presented');
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Date','Staff_Name','Title_of_Paper','Level','Place','From_Date');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
       //$result['data']=$this->Custom_grocery_crud_model->date($Department);
       /* $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_Name','Name of Staff member');
        $crud->display_as('Place','Forum');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $crud->set_theme('flexigrid');*/
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('From_Date');
        }
        $output=$crud->render();
        $this->load->view('Faculty1');
        
        $this->load->view('showtable',$output,$result);
    }
    public function seminar1()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_add();
        $crud->where('Status','Approved');
        $crud->where('Event!=""');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        //$this->output->enable_profiler(TRUE);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit  <br>'.$Department.' </center><br><br>Seminars/Workshops Attended by Staff</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Seminars/Workshops Attended by Staff </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->where('Presented!="yes"');
  $crud->callback_column('Date',array($this,'pps3'));
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        //$crud->where('Event_Name','Paper Presented');
        $crud->set_subject('Seminar/Workshop');
        $crud->columns('Date','Staff_Name','Event','Title_of_Program','Level','Place','From_Date');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
       //$result['data']=$this->Custom_grocery_crud_model->date($Department);
       /* $crud->display_as('Title','Title of Paper');
        $crud->display_as('Staff_Name','Name of Staff member');
        $crud->display_as('Place','Forum');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->display_as('Name_of_Journal','Name of  the Journal');
        $_SESSION['CustomTitle']='<br><h3> Paper Presented by Staff Members in Seminar/Symposium/Conference/Workshop </h3>';
        $crud->set_theme('flexigrid');*/
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('From_Date');
        }
        $output=$crud->render();
        $this->load->view('Faculty1');
        
        $this->load->view('showtable',$output,$result);
    }

     public function Awards()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->where('Status','Approved');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit  <br>'.$Department.' </center><br><br>Awards Received by Staff</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Awards Received by Staff</b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
         $crud->set_subject('Awards Received'); 
        // $crud->where('Event_Name','Paper Presented');
        // $crud->where('Name_of_Award','Best Paper Presentation Award');
         $crud->columns('Staff_Name','Nature_of_Award','Place','Date');  
         $crud->display_as('Place','Awarding Agency');
         $crud->where('Nature_of_Award!="no"');
         $crud->where('Nature_of_Award!=""');
        //$crud->where('Name_of_Award','Awards');
        $crud->display_as('Staff_Name','Name of Staff member');
        $crud->display_as('Name_of_Award','Nature of Award');
        $crud->display_as('Venue','Awarding Agency');
        //$_SESSION['CustomTitle']='<br><h3>Awards Received By Staff</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
         

        $this->load->view('Faculty1');
        $this->load->view('showtable',$output);
    }

     public function Audio()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->unset_add();
        //$crud->where('Status','Approved');
        $crud->set_table('audio_book');
        $crud->where('Department',$Department);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>E-content Prepared by Staff</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b>E-content Prepared by Staff</b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');;
         $crud->set_subject('Audio Book Launched');
       $crud->columns('Date','Staff_Name','Title_of_Program','Organising_Agency');
        $crud->display_as('Title_of_Program','Title of Program');
        $crud->display_as('Staff_ID','Name of Staff member');
        $crud->display_as('Organising_Agency','Organising Agency');
        //$_SESSION['CustomTitle']='<br><h3>Audio Book Prepared By Staff </h3>';
        $output=$crud->render();
        
        $this->load->view('Faculty1');
        $this->load->view('showtable',$output);
    }

    public function FDP()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
		$crud->unset_add();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('fdp');
        //$crud->where('Status','Approved');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>FDP</h3>';    
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b>Faculty Development Program </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        //$crud->where('Event_Name','FDP');
         $crud->set_subject('FDP');
        //$crud->set_field_upload('Certificate','assets/uploads/files/FDP');
        $crud->columns('From_Date','Staff_Name','Title_of_Program','Organizing_Agency');
        $crud->display_as('Title_of_Program','Title of Program');
$crud->display_as('From_Date','Date');
        $crud->display_as('Staff_Name','Name of Staff member');
        $crud->display_as('Organizing_Agency','Organising Agency');
       

        $output=$crud->render();
        $this->load->view('Faculty1');
         
        $this->load->view('showtable',$output);
    }
    public function book()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('book');
        $crud->where('Status','Approved');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Department Activity');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $crud->where('Type','Book');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->columns('Staff_ID','Staff_Name','Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing');
        $result['title']="<html><h2><center>Faculty Data (Audit) - <b> Books Published </b></h2></html>";
$this->load->view('adminsam2',$result);
$_SESSION['CustomTitle']='<br><h3> <center>Academic Audit  <br>'.$Department.' </center><br><br>Books Published</h3>';
        $crud->set_field_upload('Certificate','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
        $output=$crud->render();
                $this->load->view('Faculty1');
         
        $this->load->view('table',$output);
    }
    public function proceeding()
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
        $crud->columns('Title_of_Paper','Title_of_Program','ISSN','From_Date');
        $crud->display_as('Title_of_Paper','Title_of_book');
        $crud->display_as('Title_of_Program','Proceeding Conference');
        $crud->display_as('ISSN','ISSN/ISBN No.');
$crud->display_as('From_Date','Date');
        //$crud->unset_column();
        //$crud->where('Type','Proceeding');
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Autonomy <br>'.$Department.' </center><br><br> Proceedings</h3>';
        $this->load->view('Faculty1');
        $output=$crud->render();
        $this->load->view('showtable',$output);
    }
public function ag($v,$row)
{
    return $row->Agency_Address.'<br> Amount Generated: Rs.'.$row->Amount_generated;
}
    function Consultancy(){
        $crud=new Grocery_CRUD_MultiSearch();
        
       //  $crud->set_title('Paper Publication');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        
        $crud->set_table('consultancy_service');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit  <br>'.$Department.' </center><br><br>Consultancy</h3>';
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->callback_column('Agency_Address',array($this,'ag'));
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Consultancy </b></h2></html>";
$this->load->view('adminsam2',$result);
        $crud->set_subject('Consultancy Service');
        $crud->where('Department',$Department);
        $crud->columns('Name_of_Project','Agency_Address','Date');
        $crud->display_as('Name_of_Project','Nature of Consultancy Service Offered');
          $crud->display_as('Staff_Name','Name of Consultant');
          $crud->display_as('Agency_Address','Agency Address');
          $crud->display_as('Amount_generated','Amount Generated');
      //  $crud->set_field_upload('Billing Document','assets/uploads/files/consultancy');
        //$_SESSION['CustomTitle']='<br><h3>Consultancy Service</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        $this->load->view('Department1');
        
        $this->load->view('showtable',$output);
    }

function Cluster(){
        $crud=new Grocery_CRUD_MultiSearch();
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Staff_Name','Department','Title');
        }
        else{
            $crud->columns('Date','Staff_Name','Department','Title');
        }
       //  $crud->set_title('Paper Publication');
       $crud->display_as('Staff_Name','Speaker');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('cluster_meeting');
         $crud->set_subject('Cluster Meeting');
         //$crud->columns('Staff_Name','Department','Title');
       $crud->display_as('Department','Discipline');
       if($Department=='')
       redirect('select_ctrl/header');
       $crud->field_type("Department",'hidden',$Department);
       $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Cluster Meetings (Cluster of Departments)</h3>';
       $result['data']=$this->selection_model->disp1($Staff_ID);
       $crud->unset_add();
       $crud->unset_edit();
       $crud->unset_delete();
       $crud->unset_read();
       $result['title']="<html><h2><center>Department Data (Audit) - <b> Cluster Meetings (Cluster of Departments) </b></h2></html>";
$this->load->view('adminsam2',$result);
        $crud->where('Department',$Department);
        //$crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $output=$crud->render();
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
    }
    function Cluster(){
        $crud=new Grocery_CRUD_MultiSearch();
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Staff_Name','Department','Title');
        }
        else{
            $crud->columns('Date','Staff_Name','Department','Title');
        }
       //  $crud->set_title('Paper Publication');
       $crud->display_as('Staff_Name','Speaker');
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('cluster');
         $crud->set_subject('Cluster Meeting');
         //$crud->columns('Staff_Name','Department','Title');
       $crud->display_as('Department','Discipline');
       if($Department=='')
       redirect('select_ctrl/header');
       $crud->field_type("Department",'hidden',$Department);
       $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Cluster Meetings (Cluster of Colleges)</h3>';
       $result['data']=$this->selection_model->disp1($Staff_ID);
       $crud->unset_add();
       $crud->unset_edit();
       $crud->unset_delete();
       $crud->unset_read();
       $result['title']="<html><h2><center>Department Data (Audit) - <b> Cluster Meetings (Cluster of Colleges) </b></h2></html>";
$this->load->view('adminsam2',$result);
        $crud->where('Department',$Department);
        //$crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $output=$crud->render();
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
    }
        
        function research(){
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
        //$crud->where('Status','Approved');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Research Guidance</h3>';     
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Research Guidance </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
    if($Department=='')
    redirect('select_ctrl/header');
         $crud->set_subject('Research Guidance');
         $crud->columns('Staff_Name','Guidance','Completed','Under_Guidance','Year');
        $crud->where('Department',$Department);
        //$_SESSION['CustomTitle']='<br><h3>Research Guidance By the Members of Staff</h3>';
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Year');
        }
        $output=$crud->render();
        $this->load->view('Faculty1');
        
        $this->load->view('showtable',$output);
    }
     function Research_Project(){
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_received');
        $result['data']=$this->selection_model->disp1($Staff_ID);
if($Department=='')            
redirect('select_ctrl/header');
$crud->field_type('Department','hidden',$Department);
        $result['title']="<html><h2><center>Audit (Faculty Data) -<b> Research Project </b> </h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
$crud->set_field_upload('Certificate','assets/uploads/files/project');
$crud->set_field_upload('Evidence3','assets/uploads/files/project');
$crud->set_field_upload('Evidence2','assets/uploads/files/project');
$crud->display_as('Name_of_fundingagency','Name of the funding Agency');
$crud->required_fields('Staff_ID','Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction','Certificate');
    if($Department=='')
    redirect('select_ctrl/header');
         $crud->set_subject('Research Project Received');
        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Research Project Received</h3>';     
        $output=$crud->render();
        $this->load->view('Faculty1');
         
        $this->load->view('showtable',$output);
    }
public function tg($v,$row)
{
    return $row->Objective.' ('.$row->No_of_Participants.' '.$row->Target_Group.')';
}
 public function extension()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('extension_activity');
        //$crud->set_theme('datatables');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->callback_column('Target_Group',array($this,'tg'));
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Extension Activity </b></h2></html>";
 $this->load->view('adminsam2',$result);
         $crud->set_subject('Extension Activity');
         //$crud->where('Event_Type','Extension Activity');
        $crud->columns('Date','Nature_of_Activity','Venue','Target_Group');
        $crud->display_as('Name_of_Program','Nature of Activity');
        $crud->display_as('Purpose','Target Group');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Extension Activities</h3>';     
        $output=$crud->render();
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
    } 

    public function field_visit()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('field_visit');
       // $crud->set_theme('datatables');
        $crud->set_subject('Field Visit');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Field Visit </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $crud->where('Department',$Department);
        $crud->columns('Department','Date1','Institude_Address','No_of_Students','Date');
        $crud->callback_column('Date1',array($this,'pps31'));
        $crud->display_as('Date1','Date');
        $crud->display_as('Institude Address','Institude_Address');
        $crud->display_as('No of Students','No_of_Students');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Field Visit</h3>';     
        $output=$crud->render();
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
}
public function Industry1($value, $row)
{
    
   $str="Over all Shield in ".$row->Title_of_Event.' '.$row->Industry;
    return $str;
} 

public function MoU_signed()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('mou_signed');
       // $crud->set_theme('datatables');
       $result['data']=$this->selection_model->disp1($Staff_ID);
       $crud->unset_add();
       $crud->unset_edit();
       $crud->unset_delete();
       $crud->unset_read();
       $result['title']="<html><h2><center>Department Data (Audit) - <b> MoU Signed </b></h2></html>";
$this->load->view('adminsam2',$result);
        $crud->set_field_upload('Certificate','assets/uploads/files/MoU');
        $crud->set_subject('MoU_signed');
        $crud->where('Department',$Department);
        //$crud->where('Event_Type','MoU Signed');
        $crud->columns('Institute_Company','Purpose','Date');
        $crud->fields('Department','Event_Type','Institute_Industry_Address','Purpose','Date','Name_of_Program','Certificate');
        $crud->display_as('Name_of_Program','Duration');
        $crud->display_as('Institute_Industry_Address','Name of Institution/Industry');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>MoU Signed</h3>';     
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        //$this->_example_output($output);
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
    }

    public function alumini()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('alumni_interaction');
       // $crud->set_theme('datatables');
        $crud->set_subject('Alumini Interaction');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Alumi Interactions </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $crud->where('Department',$Department);
       $crud->columns('Date','Detail_of_Alumni','Type_of_Program');
       $crud->display_as('Detail of Alumini','Detail_of_Alumini');
       $crud->display_as('Type_of_Program','Type of Programme Organized');
       $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Alumni Interactions</h3>';     
       $output=$crud->render();
       
       $this->load->view('Department1');
        $this->load->view('showtable',$output);
    }


public function specialprg()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('special_program');
        $crud->columns('Type_of_Program','Title_of_Course','Strength','Date');
        $crud->display_as('Type_of_Program','Type of Program');
		$crud->display_as('Title_of_Course','Title of Program');
        $crud->display_as('Strength','Enrolment of Student');
        $crud->set_subject('SpecialProgram');
        $crud->where('Department',$Department);
        
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Certificate/Diploma/Crash Course</h3>';
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Certificate/Diploma/Crash Course </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $state=$crud->getState();
 if ($state == 'export' || $state == 'print') {
     $crud->unset_columns('Date','Indexed','Name_of_Journal');
 }       
 $output=$crud->render();
        
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
    }
public function amt($v,$row)
{
    return 'Rs. '.$row->Amount;
}
public function prg($v,$row)
{
    if($row->Event!='others' and $row->Event!='Inter - Collegiate Meet')
    return $row->Event.' on '.$row->Nature_of_program;
    if ($row->Event=='others')
    return $row->Nature_of_program;
    return $row->Event.' - '.$row->Nature_of_program;
}
    public function Dept()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
       // $crud->set_theme('datatables');
       $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Date','Nature_of_program','Level','Source_of_Funding','Amount');    
        }
        else{
            $crud->columns('Date','Nature_of_program','Level','Source_of_Funding','Amount');    
        }
        $crud->callback_column('Amount',array($this,'amt'));
        $crud->callback_column('Nature_of_program',array($this,'prg'));
        $crud->set_subject('Department Activity');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->set_field_upload('Evidence3','assets/uploads/files/Department');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Department');
        $crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Department Organised Events </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $crud->where('Department',$Department);
        $crud->where('Event!="Overall shield"');
        $crud->columns('Date','Nature_of_program','Level','Source_of_Funding','Amount');    
        $crud->display_as('Nature of Program','Nature_of_program');
        $crud->display_as('Source of Funding','Source_of_Funding');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Department Organised Events</h3>';     
        
        $output=$crud->render();
        $this->load->view('Department1');
        
        $this->load->view('showtable',$output);
    }

    public function strength()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('strength_weakness_dept');
        $crud->required_fields('Year','File');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_read();
        $crud->unset_delete();
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Stength Weakness Program</h3>';     
        //$crud->set_theme('datatables');
        //$crud->set_subject('');
        $crud->where('Department',$Department);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Strength Weakness Program </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $crud->set_field_upload('File','assets/uploads/files/Strength');
        $output=$crud->render();
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
      //  $this->load->view('userview', $result,array('error' => ' ' ));
    }   

    public function New_teaching_methods()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('new_teaching_method');
        //$crud->set_theme('datatables');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
       $crud->set_field_upload('Report','assets/uploads/files/NewTeaching');
        $crud->set_subject('New Teaching Method');
        $crud->where('Department',$Department);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        //$crud->unset_add();
        //$crud->unset_edit();
        //$crud->unset_delete();
        //$crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>New Teaching Method Adapted</h3>';     
        $result['title']="<html><h2><center>Department Data (Audit) - <b> New Teaching Methods </b></h2></html>";
 $this->load->view('adminsam2',$result);
       // $crud->set_field_upload('File','assets/uploads/files/Teaching Method');
        //$crud->columns('Staff_Name','New_Teaching_Method_Adapted');
        $crud->required_fields('Year','Report');
        $output=$crud->render();
        $this->load->view('Department1');
        $this->load->view('showtable',$output);

        //$this->load->view('userview', $result,array('error' => ' ' ));
    }   

     public function beyond_syllabus()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('beyondsyllabus_activity');
        //$crud->set_theme('datatables');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $crud->required_fields('Year','File');
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Beyond Syllabus Activities </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $crud->set_subject('Beyond syllabus activity');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_field_upload('File','assets/uploads/files/beyond syllabus activity');
        $output=$crud->render();
        $this->load->view('Department1');
        $this->load->view('showtable',$output);
        
      //  $this->load->view('userview', $result,array('error' => ' ' ));
    }   

    public function womensafety()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud=new Grocery_CRUD_MultiSearch();
        $Department=$this->session->userdata('Department');
        $crud->set_table('womensafety_measures');
        $crud->set_subject('Women Safety Measures');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        $crud->required_fields('Year','File');
        $crud->set_field_upload('File','assets/uploads/files/womensafety');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Women Safety </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1');
 $this->load->view('showtable',$output);
       // $this->load->view('userview');
    }  
	
	public function future_plan()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud=new Grocery_CRUD_MultiSearch();
        $Department=$this->session->userdata('Department');
        $crud->set_table('futureplans');
        $crud->set_subject('Future Plans');
        $crud->required_fields('Year','file');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_field_upload('file','assets/uploads/files/future');
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Future Plans </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1')       ;
 $this->load->view('showtable',$output);
 //$this->load->view('userview');

    }  

    public function green_measures()
    {
        
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud=new Grocery_CRUD_MultiSearch();
        $Department=$this->session->userdata('Department');
        $crud->set_table('green_measures');
        $crud->set_subject('Green Measures');
        $crud->required_fields('Year','File');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_field_upload('File','assets/uploads/files/green measures');
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Green Measures </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1')       ;
 $this->load->view('showtable',$output);
 //$this->load->view('userview');

     //   $this->load->view('showtable',$output);
  //   $Staff_ID=$this->session->userdata('Staff_ID');
//     $result['data']=$this->selection_model->disp1($Staff_ID);
     // $crud->unset_add();
     // $crud->unset_edit();
     // $crud->unset_delete();
     // $crud->unset_read();
  ///   $result['title']="<html><h2><center>Department Data (Audit) - <b> Green Measures </b></h2></html>";
//$this->load->view('adminsam2',$result);
         //$this->load->view('Department1');
    //    $this->load->view('userview');

    }    

    public function significant_achievement()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('significant_achievement');
       // $crud->set_theme('datatables');
        //$crud->set_subject('');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $crud->required_fields('Year','File');
        if($Department=='')
        redirect('select_ctrl/header');
        //$crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        
        $crud->where('Department',$Department);
        $crud->set_field_upload('File','assets/uploads/files/significant achievement');
        $output=$crud->render();
        //$this->load->view('1');
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Significant Achievements </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1');
 $this->load->view('showtable',$output);
 
        //$this->load->view('userview', $result,array('error' => ' ' ));
    }
    public function significant()
    {

        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->required_fields('Year','File');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $crud->set_table('significant');
       // $crud->set_theme('datatables');
        //$crud->set_subject('');
        if($Department=='')
        redirect('select_ctrl/header');
        //$crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        
        $crud->where('Department',$Department);
        $crud->set_field_upload('File','assets/uploads/files/significant achievement');
        $output=$crud->render();
        //$this->load->view('Department1');
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Significant Contribution to College </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1');
 $this->load->view('showtable',$output);
 
       // $this->load->view('userview', $result,array('error' => ' ' ));
    }    

public function overall_result()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('overall_result');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        //$crud->set_theme('datatables');
        $crud->set_subject('Overall Results');
        $crud->where('Department',$Department);
        //$crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $crud->columns('Name_of_course','Final_pass_percentage','Year');
        $crud->required_fields('Name_of_course','Final_pass_percentage','Year');
        $crud->field_type('Department','hidden',$Department);
        $output=$crud->render();
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Overall Results</h3>';     
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Overall Results </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Department1');
        $this->load->view('table',$output);

    }

    public function student_progression()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_progression');
        $crud->set_rules('Batch','Batch','callback_check_year[Batch]');
        //$crud->set_theme('datatables');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $crud->set_subject('Student Progression');
        $crud->where('Department',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Student Progression</h3>';     
        $crud->required_fields('Trends_of_progression','No_of_students','percentage','Batch');
        $crud->field_type('Department','hidden',$Department);
        $crud->columns('Trends_of_progression','No_of_students','percentage','Batch');
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Student Progression </b></h2></html>";
 $this->load->view('adminsam2',$result);
        
        $this->load->view('Department1');
        $this->load->view('table',$output);

    }
    public function stren($value, $row)
     {
         $str=$row->Boys_Strength+$row->Girls_Strength;
      //   return'kk';
         return $str;

     } 
     public function st($value, $row)
     {
        $str=$row->Boys_dropout+$row->Girls_dropout;
    // return'kk';
         return $str;
     } 
     public function Bp($value, $row)
     {
         $str=round(($row->Boys_dropout/$row->Boys_Strength)*100,2);
      //   return'kk';
         return $str.'%';
     } 
     public function Gp($value, $row)
     {
        $str=round(($row->Girls_dropout/$row->Girls_Strength)*100,2);
    // return'kk';
         return $str.'%';
     } 
     public function Tp($value, $row)
     {
         $str=round(((($row->Boys_dropout+$row->Girls_dropout)/($row->Boys_Strength+$row->Girls_Strength))*100),2);
      //   return'kk';
         return $str.'%';
     } 
     
    public function drop()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('dropout');
        $crud->set_rules('year','year','callback_check_year[year]');
        //$crud->set_theme('datatables');
        $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
        $crud->set_subject('Student dropout');
        $crud->where('Department',$Department);
        $crud->field_type('Department','hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Student Dropouts</h3>';     
        $crud->columns('Class','year','Boys_Strength','Girls_Strength','Total Strength','Boys_dropout','Girls_dropout','Total dropout','Boys_Dropout_Percentage','Girls_Dropout_Percentage','Total_Dropout_Percentage');
        $crud->required_fields('Class','year','Boys_Strength','Girls_Strength','Boys_dropout','Girls_dropout');
        $crud->fields('Department','Class','year','Boys_Strength','Girls_Strength','Boys_dropout','Girls_dropout');
        $crud->callback_column('Total_Dropout_Percentage',array($this,'Tp'));
        $crud->callback_column('Boys_Dropout_Percentage',array($this,'Bp'));
        $crud->callback_column('Girls_Dropout_Percentage',array($this,'Gp'));
        $crud->callback_column('Total Strength',array($this,'stren'));
        // $crud->callback_column('Total Strength',array($this,'stren'));
        // $crud->callback_column('Total Strength',array($this,'stren'));
        $crud->callback_column('Total dropout',array($this,'st'));
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Student Dropout </b></h2></html>";
 $this->load->view('adminsam2',$result);
        
        $this->load->view('Department1');
        $this->load->view('table',$output);

    }
    public function strn($val,$row)
    {
        return($row->First_Graduate_Boys_Strength+$row->First_Graduate_Girls_Strength);
    }
    public function first()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('first');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        //$crud->set_theme('datatables');
        $crud->set_subject('First Graduate');
        $crud->where('Department',$Department);
        $crud->field_type('Department','hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Student Dropouts</h3>';     
        $crud->columns('Class','Year','First_Graduate_Boys_Strength','First_Graduate_Girls_Strength','Total');
        $crud->required_fields('Class','Year','First_Graduate_Boys_Strength','First_Graduate_Girls_Strength');
       // $crud->fields('Department','Class','year','Boys_Strength','Girls_Strength','Boys_dropout','Girls_dropout');
       $crud->callback_column('Total',array($this,'strn'));
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
         $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Student Dropout </b></h2></html>";
 $this->load->view('adminsam2',$result);
        
        $this->load->view('Department1');
        $this->load->view('table',$output);

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
    public function tech_event()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->where('Status','Approved');
		$Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $Staff_ID=$this->session->userdata('Staff_ID');

        $result['data']=$this->selection_model->disp1($Staff_ID);
            
            $result['title']="<html><h2><center>Audit (Students Data) -<b> Academic Awards </b> </h2></html>";
      $this->load->view('adminsam2',$result);
      $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
$crud->callback_column('Title_of_Event',array($this,'dat'));
        $crud->callback_column('Organizer',array($this,'data'));
$crud->where('Place_Prize!=""');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->where('Department',$Department);
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Academic Awards by Students</h3>';             
        
        $crud->field_type('Event_Type','hidden','Technical Competition');
        $crud->field_type('Title_of_Event','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','Workshop'=>'Workshop','Other'=>'Other'));
        //$crud->set_subject('Student Progression');
        $crud->where('(Event_Type="Seminar" or Event_Type="Workshop" or Event_Type="Conference" or Event_Type="Inter-Collegiate")');
        $crud->fields('Student_Name','Class','Event_Type','Department','Place_Prize','Title_of_Event','Organizer','Date');
        $crud->columns('Student_Name','Class','Place_Prize','Title_of_Event','Organizer','Date');
        $crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
        
        $this->load->view('student1');
        $this->load->view('table',$output);
    }
    public function competitive_exam()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->where('Status','Approved');
		$Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Competitive Exams</h3>';     
        $result['data']=$this->selection_model->disp1($Staff_ID);
            $result['title']="<html><h2><center>Audit (Students Data) -<b> Competitive Exam</h2></html>";
      $this->load->view('adminsam2',$result);
      $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
		$crud->where('Department',$Department);
		$crud->where('Event_Type','Competitive Exam');
        $crud->columns('Student_Name','Class','Competitive_Exam_Passed','year');
        //$crud->set_relation('Event_Type','student_info','{Event_Type}','{Level}');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center>'.$Department.' </center><br><br>Elective</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns("Date");}
$output=$crud->render();

        $this->load->view('student1');
        //$_SESSION['CustomTitle'];
       // $this->load->view('competitve');
        $this->load->view('table',$output);
 
    }
    public function org($v,$row)
    {
        return $row->Organizer.' on '.date('d-m-Y', strtotime($row->Date));
    }
    public function cultural_event()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_info');
$crud->where('Event_Type','Cultural Competition');
$Staff_ID=$this->session->userdata('Staff_ID');
$crud->where('Status','Approved');
$crud->callback_column('Organizer',array($this,'org'));
$result['data']=$this->selection_model->disp1($Staff_ID);
$_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Cultural Awards by Students</h3>';     
    $result['title']="<html><h2><center>Audit (Students Data) -<b> Cultural Awards </b> </h2></html>";
$this->load->view('adminsam2',$result);
$crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
$crud->where('Place_Prize!=""');
if($Department=='')
redirect('select_ctrl/header');

$crud->columns('Student_Name','Class','Place_Prize','Title_of_Event','Organizer','Date');
        //$crud->set_relation('Event_Type','student_info','{Event_Type}','{Level}');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
        $output=$crud->render();
 
        $this->load->view('student1');
        $this->load->view('table',$output);
    }
public function lvl($v,$row)
{
    return $row->Level.' ('.$row->Place_Prize.')';
}
    public function sports()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $Staff_ID=$this->session->userdata('Staff_ID');
        //$crud->where('Status','Approved');
        $crud->display_as('Title_of_Event','Game/Event');
        $crud->callback_column('Level',array($this,'lvl'));
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Students Achievements in Sports </h3>';                 
            $result['title']="<html><h2><center>Audit (Students Data) -<b> Sports Awards </b> </h2></html>";
      $this->load->view('adminsam2',$result);
      $crud->unset_add();
$crud->unset_edit();
$crud->unset_read();
$crud->unset_delete();
$crud->where('Place_Prize!=""');
        if($Department=='')
        redirect('select_ctrl/header');

$crud->where('Event_Type','Sports and Games');
        $crud->columns('Student_Name','Class','Title_of_Event','Level','Date');
        //$crud->set_relation('Event_Type','student_info','{Event_Type}','{Level}');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Date');
        }
$output=$crud->render();

        $this->load->view('student1');
        $this->load->view('table',$output);
    }

     public function stud()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center><br>'.$Department.' </center><br><br>Students Profile</h3>';     
        $result['title']="<html><h2><center><b> Add Students Details </b></h2></html>";
$this->load->view('adminsam2',$result);
$this->load->view('students1');
$crud->set_field_upload('Photo','assets/uploads/files/Staff_Photo');

 
        $crud->set_table('student_details');
        $crud->where('Department',$Department);
        $output=$crud->render();
       // $this->load->view('student1');
        $this->load->view('import/index');
        $this->load->view('table',$output);
    }

    public function students()
    {

        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']='';//"<html><h2><center>Student Achievements</h2></html>";
$this->load->view('adminsam2',$result);
        $this->load->view('students1');
        //$this->load->view('table',$output);
    }

     public function overall_shield()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
        $crud->where('Department',$Department);
        $crud->where('Event','Overall shield');
        $crud->columns('Date','Department','Industry');
        $crud->callback_column('Industry',array($this,'Industry1'));
        $crud->fields('Date','Department','Industry');
        $crud->display_as('Industry','Event/Institutions');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Overall Shields received</h3>';     
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $output=$crud->render();
        
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Overall Shield </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Department1');
        $this->load->view('table',$output);
    }
public function ppp()
{
    //$this->load->view('adminsam2');
    $this->load->view('staf');
}
    public function internship()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Internship Training Program');
        $crud->columns('Student_ID','Student_Name','Date','To_Date','Department','Title_of_Event','Organizer');
        $crud->display_as('Title_of_Event','Name of Program');
        $crud->display_as('Organizer','Venue');
         //echo "<html><h2><center><b>Internship Training Program</b></center></h2></html>";
         $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Internship Training Program</h3>';     
        $result['data']=$this->selection_model->disp1($Staff_ID);
         $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
         $output=$crud->render();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Internship Training </b></h2></html>";
 $this->load->view('adminsam2',$result);
 $this->load->view('Department1');
        $this->load->view('table',$output);
        //$this->load->view('userview', $result,array('error' => ' ' ));
    }

    public function peer_learning()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Peer Learning');
        $crud->columns('Student_Name','Class','Title_of_Event','beneficiary','venue','Date');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','beneficiary','venue','Year','Date','Event_Type','Certificate','Evidence2','Evidence3');
        $_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Peer Learning</h3>';     
		$crud->display_as('Detail_of_Speaker','Conducted by Students');
        //$output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $output=$crud->render();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Peer Learning </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Department1');
        $this->load->view('table',$output);
        //$this->load->view('userview', $result,array('error' => ' ' ));
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
   
	public function training()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_info');
        $crud->where('Department',$Department);
		$crud->where('Event_Type','Training Program');
        $crud->columns('Student_Name','Event_Type','Title_of_Event','Date','To_Date','time');
        $crud->display_as('Date','From_Date');
		$_SESSION['CustomTitle']='<br><h3> <center>Academic Audit <br>'.$Department.' </center><br><br>Summer Trainning</h3>';     
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
         $crud->unset_edit();
         $crud->unset_delete();
         $crud->unset_read();
         $output=$crud->render();
        $result['title']="<html><h2><center>Department Data (Audit) - <b> Trainning Program </b></h2></html>";
 $this->load->view('adminsam2',$result);
        $this->load->view('Department1');
        $this->load->view('table',$output);
        //$this->load->view('userview', $result,array('error' => ' ' ));
    }

}