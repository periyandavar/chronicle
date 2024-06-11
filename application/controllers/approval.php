<?php
class approval extends CI_Controller
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
        if($_SESSION['User_Type']!='Subadmin')
        redirect('select_ctrl/header');

        //        $_SESSION['appr']='0';        
              
    }
    public function staff(){
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp1($Staff_ID);
            
        $result['title']="<html><h2><center><b>Faculty Details Verification</b></h2></html>";
    $this->load->view('adminsam2',$result);
        
      $this->load->view('sapprove');
    
    }
    public function student(){
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp1($Staff_ID);
            
        $result['title']="<html><h2><center><b>Student Details Verification</b></h2></html>";
    $this->load->view('adminsam2',$result);
        
      $this->load->view('stapprove');
    
    }
 public   function index(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
    $result['title']="<html><h2><center><b>Faculty Details Verification</b></h2></html>";
$this->load->view('adminsam2',$result);
    
  $this->load->view('sapprove');
}

 public function server(){
  $this->load->view('server');

}

public function paper_publication()
    {
    	$Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_add();
       $crud->where('Status!="Approved"');
       $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
       
        $crud->set_subject('Paper Publication');
        $crud->set_table('paper_publication');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Paper Published by Staffs </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/paper');
$crud->set_field_upload('Evidence3','assets/uploads/files/paper');
       // $crud->where('Event_Name','Paper Published');
       $crud->fields('Staff_ID','Staff_Name','Department','Title_of_Paper','ISSN_ISBN','Indexed','Name_of_Journal','Year_Date','Certificate','Evidence2','Evidence3');
        $crud->columns('Staff_Name','Title_of_Paper','ISSN_ISBN','Indexed','Name_of_Journal','Year_Date','Certificate','Evidence2','Evidence3');
		$crud->display_as('Year_Date','Date');
        //$crud->unset_print();
        //$crud->unset_export();    
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
	}

	public function guest_lecture()
    {
    	 			
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('guest_lecture');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='guest_lecture';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/guest_lecture/'.$this->table,'');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Department','Date','Staff_ID','Staff_Name','Certificate','Title','Place');        
        $result['title']="<html><h2><center><b>Guest Lecture Delivered </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->unset_add();
       $crud->where('Status!="Approved"');
       $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
              
//$crud->where('Event_Name','Guest Lecture Delivered');
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->set_subject('Guest Lecture');
        $crud->columns('Staff_Name','Title','Place','Date','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Date','Venue','Certificate','Photo');
        $crud->display_as('Certificate','Certificate/Evidence');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Certificate','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Guestlecture');
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
	}

    public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='seminar_or_workshop';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/seminar/'.$this->table,'');
        $crud->where('Department',$Department);
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        
        //  $crud->where('Event_Name','Paper Presented');
        $crud->set_subject('Seminar/Workshop');
       // $crud->unset_print();
        //$crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Seminar/Workshop/Conference Attended </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
$crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
$crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
$crud->field_type('Event','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','Workshop'=>'Workshop','others'=>'others'));
       $crud->columns('Staff_Name','Level','Event','Title_of_Program','Title_of_Paper','Place','From_Date','To_Date','Certificate','Evidence2','Evidence3');
       $crud->fields('Staff_ID','Staff_Name','Department','Level','Event','Title_of_Program','Presented','Title_of_Paper','Place','From_Date','To_Date','Certificate','Evidence2','Evidence3','Status');
       $crud->required_fields('Staff_ID','Staff_Name','Department','Level','Event','Title_of_Program','Presented','Place','From_Date','Certificate');
       $crud->display_as('Title_of_Paper','Title of the Paper (if presented)') ;
       //$crud->set_theme('datatables');
        //$crud->display_as('From_Date','Date')
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
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
    public function approve($url,$table,$key)
    {
        $result=$this->selection_model->apr($table,$key);   
        //$url = current_url();
        //echo'sucess'.$url;
        //$back=(explode("/",$url));
        //return
        //print_r($back);
        $_SESSION['appr']='1';
        redirect('approval/'.$url);
        // $this->{$back[7]}($val='1');
        // return($back[5]."/".$back[7]);
    }
    public function Awards()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
          $result['data']=$this->selection_model->disp1($Staff_ID);
       
    $result['title']="<html><h2><center><b> Awards </b></h2></html>";
$this->load->view('adminsam2',$result);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        
        //$result['award']=$y1;
        //print_r($result['award']);
        $crud->set_table('seminar_or_workshop');
        $crud->where('Department',$Department);
       $crud->unset_add();
     $crud->where('Nature_of_Award!="no"');
     $crud->where('Nature_of_Award!=""');
     $crud->where('Status!="Approved"');
     if(isset($_SESSION['appr']))
     {   if($_SESSION['appr']=='1')
        {$this->load->view('tost');            
            $_SESSION['appr']='0';
        }
    }
    $crud->unset_edit(); 
      $this->table='seminar_or_workshop';
       $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/awards/'.$this->table,'');
       $crud->set_rules('Date','Date','callback_check_dates[Date]');
       $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        //$crud->unset_export();
        //$crud->unset_back_to_list();
        $crud->required_fields('Staff_ID','Staff_Name','Nature_of_Award','Place','Date','Certificate','Department');
        $crud->display_as('Place','Awarding Agency');
        $crud->columns('Staff_Name','Nature_of_Award','Place','From_Date','Certificate','Evidence2','Evidence3');
        //$crud->display_as('Title','Title of Paper');
        $crud->display_as('From_Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }
    public function Award()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
          $result['data']=$this->selection_model->disp1($Staff_ID);
        
          $result['title']="<html><h2><center><b> Best Paper Awards </b></h2></html>";
$this->load->view('adminsam2',$result);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->set_table('awards');
        $crud->where('Department',$Department);
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='awards';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/Award/'.$this->table,'');
        //  $crud->unset_print();
        //$crud->unset_export();
        $crud->unset_add();
        $this->table='awards';
       //$crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/'.$this->table,'');
       $crud->unset_edit();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved")); 
        $crud->where('Nature_of_Award','Best Paper Award');
        $crud->field_type("Nature_of_Award",'hidden','Best Paper Award');
        $crud->columns('Staff_Name','Nature_of_Award','Awarding_Agency','Date','Certificate','Evidence2','Evidence3');
        //$crud->display_as('Title','Title of Paper');
        //$crud->display_as('Staff_ID','Name of Staff member');
        //$crud->set_theme('datatables');
        $crud->required_fields('Department','Staff_ID','Staff_Name','Nature_of_Award','Awarding_Agency','Date','Certificate');
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Awards');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Awards');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }

     public function mlm()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('audio_book');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='audio_book';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/mlm/'.$this->table,'');
        $crud->where('Department',$Department);
       // $crud->where('Event_Name','MLM Prepared');
        //$crud->unset_print();
        //$crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> MLM </b></h2></html>";
$this->load->view('adminsam2',$result); 
    // $crud->field_type('Department','hidden',$Department);
     //$crud->field_type('Staff_ID','hidden',$Staff_ID);
     $crud->unset_add();
       $crud->where('Status!="Approved"');
       $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
     $crud->required_fields('Staff_ID','Staff_Name','Title_of_Program','Organising_Agency','Date','Type','Certificate','Department');
     $crud->field_type('Type','dropdown',array('MLM'=>'MLM','Audio'=>'Audio','Video'=>'Video','Mobile App'=>'Mobile App'));
     //$crud->field_type('Staff_Name','hidden',$Staff_Name);
     $crud->set_field_upload('Certificate','assets/uploads/files/Audio_book');
    $crud->set_field_upload('Evidence3','assets/uploads/files/Audio_book');
    $crud->set_field_upload('Evidence2','assets/uploads/files/Audio_book');
    $output=$crud->render();
    $this->load->view('sapprove');
    $this->load->view('showtable',$output);
    }

    public function FDP()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('fdp');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='fdp';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/FDP/'.$this->table,'');
        $crud->where('Department',$Department);
        //$crud->where('Event_Name','FDP');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Faculty Development Program </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/FDP');
$crud->set_field_upload('Evidence3','assets/uploads/files/FDP');
        $crud->set_subject('FDP');
        $crud->set_field_upload('Certificate','assets/uploads/files/FDP');
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        $crud->required_fields('From_Date','Staff_ID','Staff_Name','Title_of_Program','Organizing_Agency','Speaker','Place','Certificate');
       // $crud->set_field_upload('Photo','assets/uploads/files/FDP');
       $crud->columns('Staff_Name','Title_of_Program','Organizing_Agency','Place','From_Date','Certificate');
       // $crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Organizing_Agency','Venue','Date','Certificate','Photo');
        //$crud->unset_print();
        //$crud->unset_export();
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }

    function Consultancy(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Consultancy Service </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->required_fields('Date','Staff_ID','Staff_Name','Name_of_Project','Name_of_Agency','Agency_Address','Amount_generated','Year','Receipt','Department');
        $crud->set_table('consultancy_service');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='consultancy_service';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/Consultancy/'.$this->table,'');
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        
        $crud->set_subject('Consultancy Service');
       // $crud->unset_print();
      //  $crud->unset_export();
        $crud->display_as('Receipt','Receipt/Evidence');
        $crud->where('Department',$Department);
       // $crud->where('Event_Name','Consultancy Service');
        //$crud->fields('Staff_ID','Staff_Name','Department','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        //$crud->columns('Staff_Name','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        //$crud->columns('Staff_Name','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        $crud->set_field_upload('Receipt','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence2','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence3','assets/uploads/files/consultancy');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }

function Cluster(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('cluster_meeting');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='cluster_meeting';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/Cluster/'.$this->table,'');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Date','Staff_ID','Staff_Name','Title','Certificate','Department');
        $result['title']="<html><h2><center><b> Cluster Meeting </b></h2></html>";
$this->load->view('adminsam2',$result);
        
        //$crud->columns('Staff_Name','Title_of_Program','Venue','Date','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Venue','Date','Certificate');
        $crud->set_subject('Cluster Meeting');
      //  $crud->unset_print();
        //$crud->unset_export();
        $crud->where('Department',$Department);
       // $crud->where('Event_Name','Cluster Meeting');
        $crud->display_as('Certificate','Circular');
        $crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Clustermeet');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }
        
     public   function research(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        
        $crud->set_table('research');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='research';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/research/'.$this->table,'');
         $crud->set_subject('Research Guidance');
        // $crud->unset_print();
        // $crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Research Guidance by Staffs </b></h2></html>";
$this->load->view('adminsam2',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/Research');
$crud->set_field_upload('Evidence3','assets/uploads/files/Research');
$crud->required_fields('Staff_ID','Staff_Name','Guidance','Department','Under_Guidance','Year','Certificate');
        //$crud->where('Event_Name','Research Guidance');
        $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Guidance','Year','Completed','Under_Guidance','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Guidance','Completed','Under_guidance','Certificate');
        $crud->set_field_upload('Certificate','assets/uploads/files/Research');
        $output=$crud->render();
        $this->load->view('sapprove');
       
        $this->load->view('table',$output);
    }

    public function shield()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
        $crud->where('Department',$Department);
        $crud->where('Event','Overall shield');
        $crud->columns('Date','Department','Industry','Certificate','Evidence2','Evidence3');
        $crud->fields('Date','Department','Industry','Event','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Date','Department','Industry','Event','Certificate');
        $crud->set_read_fields('Date','Department','Industry','Event','Certificate','Evidence2','Evidence3');
        $crud->display_as('Industry','Institute');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        $crud->field_type('Event','hidden','Overall shield');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Overall Shields </b></h2></html>";
        $this->load->view('adminsam2',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/overall');
        $crud->set_field_upload('Evidence3','assets/uploads/files/overall');
        $crud->set_field_upload('Certificate','assets/uploads/files/overall');
        $output=$crud->render();
        
        $this->load->view('table',$output);
    }
    
    public function book()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_add();
        $crud->where('Status!="Approved"');
        $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='book';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/book/'.$this->table,'');
        $crud->set_table('book');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Department Activity');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $crud->fields('Staff_ID','Staff_Name','Title_of_book','Type','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3',"Department",'Status');
        $crud->columns('Staff_ID','Staff_Name','Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
        $crud->set_read_fields('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Staff_ID','Staff_Name','Department');
        ///$crud->where('Nature_of_Award','Best Paper Award');
        $crud->display_as('Issn_isbn_for_proceeding','ISBN');
        //$Staff_Name=$dat->Staff_Name;
        $crud->where('Type','book');
        $crud->field_type('Type','hidden','book');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Books Published </b></h2></html>";
$this->load->view('adminsam2',$result);
        //$crud->unset_export();
        $crud->set_field_upload('Certificate','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
        $output=$crud->render();
                $this->load->view('sapprove');
         
        $this->load->view('table',$output);
    }
    public function proceeding()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
    //$result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
      // $Staff_ID=$this->session->userdata('Staff_ID');
       $result['data']=$this->selection_model->disp1($Staff_ID);
        
       $result['title']="<html><h2><center><b> Proceeding </b></h2></html>";
$this->load->view('adminsam2',$result); 
    $crud=new grocery_CRUD_MultiSearch();
    //$crud->field_type('Nature_of_Award','hidden','Best Paper Award');
    //$dat=$res[0];
    $crud->field_type('Type','hidden',"Proceeding");
    $crud->where('Type','Proceeding');
    $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
    $crud->fields('Staff_ID','Staff_Name','Title_of_book','Level','Type','Proceeding_of_conference','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3',"Department","Status");
    
    $crud->unset_add();
       $crud->where('Status!="Approved"');
       $crud->field_type('Status','dropdown',array("Approved"=>"Approved"));
    $crud->columns('Staff_ID','Staff_Name','Title_of_book','Level','Proceeding_of_conference','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3');
    $crud->set_read_fields('Staff_ID','Staff_Name','Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3');
    $crud->required_fields('Staff_ID','Staff_Name','Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Department');
    ///$crud->where('Nature_of_Award','Best Paper Award');
    $crud->display_as('Year_of_publishing','Year');
    $crud->display_as('Title_of_book','Title');
    //$Staff_Name=$dat->Staff_Name;
     $crud->field_type('Department','hidden',$Department);
    // $crud->field_type('Staff_ID','hidden',$Staff_ID);
     //$crud->field_type('Staff_Name','hidden',$Staff_Name);
    $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
    $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
    //$crud->required_fields('Nature_of_Award','Awarding_Agency','Date','Certificate');
        //$Staff_ID=$this->session->userdata('Staff_ID');
      //  $result['data']=$this->selection_model->profile($Staff_ID);
               
         
    //$crud=new grocery_CRUD_MultiSearch();
    $crud->set_table('book');
    if(isset($_SESSION['appr']))
    {   if($_SESSION['appr']=='1')
       {$this->load->view('tost');            
           $_SESSION['appr']='0';
       }
   }
   $crud->unset_edit(); 
     $this->table='book';
     $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/proceeding/'.$this->table,'');
    //$crud->set_theme('datatables');
   
    $crud->where('Department',$Department);
    //$crud->unset_add();
        //$crud->unset_delete();
      //  $crud->unset_export();
        //$crud->unset_print();
        $this->load->view('sapprove');
    $crud->set_field_upload('Certificate','assets/uploads/files/Book');
    $output=$crud->render();
    $this->load->view('showtable',$output);

    }
    public function journal()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Journals </b></h2></html>";
$this->load->view('adminsam2',$result);
$this->load->view('sapprove');
$crud->unset_add();
$crud->where('Status!="Approved"');
$crud->field_type('Status','dropdown',array("Approved"=>"Approved"));

$crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','Level','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3','Status');
        $crud->columns('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->set_read_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','Level','ISSN_ISBN','Indexed','Certificate');
        $crud->display_as('Year_Date','Date');
        //$dat=$res[0];
        //$Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         //$crud->field_type('Staff_ID','hidden',$Staff_ID);
         //$crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/paper');
        $crud->set_field_upload('Evidence2','assets/uploads/files/paper');
        
        $crud->set_table('paper_publication');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='paper_publication';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/journal/'.$this->table,'');
        $crud->where('Department',$Department);
        //$crud->set_theme('datatables');
    //    $crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();      
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        
        $this->load->view('showtable',$output);
    }
    public function meet()
    {
                    
      $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        
        $crud->set_table('student_info');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='student_info';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/meet/'.$this->table,'');
         $crud->where('Status!="Approved"');
         $crud->unset_add();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        //$crud->where('Department',$Department);
        $crud->where('(Event_Type="Inter-Collegiate" or Event_Type="Sports and Games" or Event_Type="Cultural Competition")and Department="'.$Department.'"');
        $crud->field_type('Event_Type','hidden','Inter-Collegiate');
        $result['title']="<html><h2><center><b> Inter-Collegiate/Cultural/Sports Meet Attended by Students </b></h2></html>";
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $this->load->view('adminsam2',$result);
$crud->fields('Event_Type','Student_ID','Student_Name','Class','Department','Title_of_program','Title_of_Event','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
$crud->required_fields('Event_Type','Student_ID','Student_Name','Class','Department','Title_of_program','Title_of_Event','Date','Level','Certificate');
$crud->columns('Student_ID','Student_Name','Class','Department','Event_Type','Title_of_program','Title_of_Event','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
$crud->set_read_fields('Event_Type','Student_ID','Student_Name','Class','Department','Event_Type','Title_of_program','Title_of_Event','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
//$crud->read('Student_Id','Student_Name','Class','Department','Title_of_Program','Organizer','Date','Level','Place_Prize','Certificate','Evidence2','Evidence3');
$crud->set_field_upload('Evidence2','assets/uploads/files/Intercollegiate');
$crud->set_field_upload('Evidence3','assets/uploads/files/intercollegiate');
       // $crud->where('Department',$Department);
        //$crud->where('Event_Type','Inter-Collegiate');
       // $crud->unset_print();
        //$crud->unset_export();
        //$crud->columns('Student_Name','Class','Title_of_program','Title_of_Event','Date','Certificate');
       // $crud->fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Event_Type','Date','Certificate');
        $crud->display_as('Student_Name','Name of the Students');
        
        $crud->display_as('Organizer','Organized / Sponsored by');
        $crud->display_as('Place_Prize','Prizes Won');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/intercollegiate');
        
        $output=$crud->render();
        $this->load->view('stapprove');
        $this->load->view('table',$output);
    }
    public function seminars()
    {
                    
      $crud=new Grocery_CRUD_MultiSearch();
    
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='student_info';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/seminars/'.$this->table,'');
         $crud->where('Status!="Approved"');
         $crud->unset_add();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
      ///  $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $result['title']="<html><h2><center><b> Workshop/Seminar/Conference Attended by Students </b></h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
  $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
  $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Event_Type','Title_of_program','Level','Organizer','Date','Year','Place_Prize','Certificate','Evidence2','Evidence2','Presented');
  $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
  //$crud->where('Department',$Department);
        $crud->where('(Event_Type="Workshop" or Event_Type="Seminar" or Event_Type="Conference") and Department="'.$Department.'"');
        //$crud->where('Title_of_Event','Workshop');
        $crud->field_type('Event_Type','hidden','Workshop');
        $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','Event_Type','Title_of_program','Organizer','Date');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_program','Place_Prize','Title_of_Paper','Level','Organizer','Date','Year','Certificate','Evidence2','Evidence3','Event_Type');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Year','Certificate');
   //      $crud->unset_read_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Title_of_Event','Level','Organizer','Date','Year','Certificate','Evidence2','Evidence2');
        $crud->display_as('Student_Name','Name of the Students');
        $crud->display_as('Class','Class');
        
        $crud->display_as('Title_of_program','Program Title');
        $crud->display_as('Title_of_Event','Event Title');
        $crud->display_as('Level','Level');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $output=$crud->render();
        $this->load->view('Stapprove');
           $this->load->view('table',$output);
    }
    public function project_applied()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
       $crud->unset_add();
         $this->table='student_info';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/project_applied/'.$this->table,'');
         $crud->where('Status!="Approved"');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','Project Applied');
        $crud->field_type('Event_Type','hidden','Project Applied');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Projects Applied </b></h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/project');
  $crud->set_field_upload('Evidence3','assets/uploads/files/project');
  //$crud->set_read_fields('Titleoftheproject','nameofguide','designation','beneficiary','venue','time','year','Competitive_Exam_Passed','traininsitiut','To_Date');
        
       // $crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','nameofguide','Titleoftheproject','Certificate','Evidence1','Evidence2');
        $crud->fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','Year','Event_Type','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','Year','Event_Type','Certificate');
        $crud->display_as('Titleoftheproject','Title of the Project');
        $crud->display_as('nameofguide','Name of the Guide');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','Year','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $output=$crud->render();
        $this->load->view('stapprove');
           $this->load->view('table',$output);
    }
    public function peerlearning()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
       $crud->unset_add();
         $this->table='student_info';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/peerlearning/'.$this->table,'');
         $crud->where('Status!="Approved"');
        $crud->where('Department',$Department);
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
      //  $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center> <b> Peer Learning </b></h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/peer');
  $crud->set_field_upload('Certificate','assets/uploads/files/peer');
  $crud->set_field_upload('Evidence3','assets/uploads/files/peer');
        $crud->where('Event_Type','Peer Learning');
        $crud->field_type('Event_Type','hidden','Peer Learning');
       // $crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','year','Certificate','Evidence1','Evidence2');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date','Certificate','Evidence2','Evidence3','Event_Type');
        $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date','Certificate','Event_Type');
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Student_Name','Name of the Student');
        
        $crud->display_as('Organizer','Organized by');
         
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('stapprove');
           $this->load->view('table',$output);
    }
    public function competitive()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->unset_add();
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='student_info';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/competitive/'.$this->table,'');
         $crud->where('Status!="Approved"');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate','Evidence2','Evidence3');
        $result['title']="<html><h2><center> <b> Competitive Exams Passed </b></h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/comp');
  $crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/comp');
        $crud->field_type('Event_Type','hidden','competitive Exam');
        $crud->where('Department',$Department);
        $crud->where('Event_Type','competitive Exam');
     //   $crud->unset_print();
       // $crud->unset_export();
        $crud->columns('Student_Name','Class','Competitive_Exam_Passed');
        $crud->fields('Department','Event_Type','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Event_Type','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year','Certificate');
        $crud->display_as('Student_Name','Name of the Student');
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('stapprove');
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
        $crud->where('Status!="Approved"');
        $crud->unset_add();
        $crud->unset_edit();
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type("Department",'hidden',$Department);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Student_ID','Student_Name','Placed_In','Evidance','Year');
        $crud->display_as('Evidance','Evidence');
        $result['title']="<html><h2><center> <b> Placements </b></h2></html>";
  $this->load->view('adminsam2',$result);
  $crud->set_field_upload('Evidence2','assets/uploads/files/placement');
  //$crud->set_field_upload('Certificate','assets/uploads/files/comp');
  $crud->set_field_upload('Evidence3','assets/uploads/files/placement');
        $crud->set_table('placement');
        if(isset($_SESSION['appr']))
        {   if($_SESSION['appr']=='1')
           {$this->load->view('tost');            
               $_SESSION['appr']='0';
           }
       }
       $crud->unset_edit(); 
         $this->table='placement';
         $crud->add_action('Approve','/chronicle/images/t1.png','approval/approve/placement/'.$this->table,'');
        $crud->where('Department',$Department);
        $crud->set_field_upload('Evidance','assets/uploads/files/placement');
        $output=$crud->render();
        $this->load->view('stapprove');
           $this->load->view('table',$output);
    }
 
  

}