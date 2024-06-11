<?php
class page_ctrl extends CI_Controller
{  
	
	 public function __construct()
	 {
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
        $this->load->model('select_model');
        $this->load->library('grocery_CRUD_MultiSearch');
		
    }
    function book()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
            //$crud->set_table('audio_book');
            //$crud->where('Staff_ID',$Staff_ID);
            $res['title']="<h3><center> Books Published </center></h3>";
                $this->load->view('sidepushsam',$res);
                $Staff_ID=$this->session->userdata('Staff_ID');
            $result=$this->selection_model->disp1($Staff_ID);
            $Department=$this->session->userdata('Department');
               $Staff_ID=$this->session->userdata('Staff_ID');
            $res=$this->selection_model->profile($Staff_ID);
            
            $crud=new grocery_CRUD_MultiSearch();
            //$crud->field_type('Nature_of_Award','hidden','Best Paper Award');
            $dat=$res[0];
            $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
            $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
            $crud->fields('Title_of_book','Type','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3','Staff_ID',"Department",'Staff_Name');
            $crud->columns('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
            $crud->set_read_fields('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
            $crud->required_fields('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate');
            ///$crud->where('Nature_of_Award','Best Paper Award');
            $crud->display_as('Issn_isbn_for_proceeding','ISBN');
            $Staff_Name=$dat->Staff_Name;
            $crud->where('Type','book');
             $crud->field_type('Department','hidden',$Department);
             $crud->field_type('Staff_ID','hidden',$Staff_ID);
             $crud->field_type('Type','hidden','book');
             $crud->field_type('Staff_Name','hidden',$Staff_Name);
            $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
            $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
            //$crud->required_fields('Nature_of_Award','Awarding_Agency','Date','Certificate');
                $Staff_ID=$this->session->userdata('Staff_ID');
                $result['data']=$this->selection_model->profile($Staff_ID);
                $crud->set_rules('Year_of_publishing','Year_of_publishing','callback_check_year1[Year_of_publishing]');
                 
            //$crud=new grocery_CRUD_MultiSearch();
            $crud->set_table('book');
            
            //$crud->set_theme('datatables');
           
            $crud->where('Staff_ID',$Staff_ID);
            //$crud->unset_add();
                //$crud->unset_delete();
              //  $crud->unset_export();
                //$crud->unset_print();
            $crud->set_field_upload('Certificate','assets/uploads/files/Book');
            $output=$crud->render();
            $this->load->view('showtable',$output);
        
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
    public function check_year1($dt)
    {$this->form_validation->set_message('check_year1','Invalid year ...!');
        if($dt=='')
      return FALSE;
        $dat=date('Y');
        $dat=(int)$dat;
      
        if (preg_match('/[1-9]{1}[0-9]{3}/', $dt ) ) 
        {
          $dt1=(int)$dt;
          if($dt<=$dat)
          return TRUE;
          else
          return False;
        } 
        else 
        {
          return FALSE;
        }
      
      
    }
    function books()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
            //$crud->set_table('audio_book');
            //$crud->where('Staff_ID',$Staff_ID);
            $res['title']="<h3><center> Proceedings </center></h3>";
                $this->load->view('sidepushsam',$res);
                $Staff_ID=$this->session->userdata('Staff_ID');
            $result=$this->selection_model->disp1($Staff_ID);
            $Department=$this->session->userdata('Department');
               $Staff_ID=$this->session->userdata('Staff_ID');
            $res=$this->selection_model->profile($Staff_ID);
            
            $crud=new grocery_CRUD_MultiSearch();
            //$crud->field_type('Nature_of_Award','hidden','Best Paper Award');
            $dat=$res[0];
            $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
            $crud->set_rules('Date','Date','callback_check_dates[Date]');
            $crud->field_type('Type','hidden',"Proceeding");
            $crud->where('Type','Proceeding');
            $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
            $crud->fields('Title_of_book','Level','Type','Proceeding_of_conference','Issn_isbn_for_proceeding','Date','Certificate','Evidence2','Evidence3','Staff_ID',"Department",'Staff_Name');
            $crud->columns('Title_of_book','Level','Proceeding_of_conference','Issn_isbn_for_proceeding','Date','Certificate','Evidence2','Evidence3');
            $crud->set_read_fields('Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Date','Certificate','Evidence2','Evidence3');
            $crud->required_fields('Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Date','Certificate');
            ///$crud->where('Nature_of_Award','Best Paper Award');
            $crud->display_as('Year_of_publishing','Year');
            $crud->display_as('Title_of_book','Title');
            $Staff_Name=$dat->Staff_Name;
             $crud->field_type('Department','hidden',$Department);
             $crud->field_type('Staff_ID','hidden',$Staff_ID);
             $crud->field_type('Staff_Name','hidden',$Staff_Name);
            $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
            $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
            //$crud->required_fields('Nature_of_Award','Awarding_Agency','Date','Certificate');
                $Staff_ID=$this->session->userdata('Staff_ID');
                $result['data']=$this->selection_model->profile($Staff_ID);
                       
                 
            //$crud=new grocery_CRUD_MultiSearch();
            $crud->set_table('book');
            
            //$crud->set_theme('datatables');
           
            $crud->where('Staff_ID',$Staff_ID);
            //$crud->unset_add();
                //$crud->unset_delete();
              //  $crud->unset_export();
                //$crud->unset_print();
            $crud->set_field_upload('Certificate','assets/uploads/files/Book');
            $output=$crud->render();
            $this->load->view('showtable',$output);
        
    }
    public function edit_profile()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
            $crud=new grocery_CRUD_MultiSearch();
            $crud->unset_fields('Certificate','Evidence1','Evidence2');
            $crud->set_table('staff_info');
            $res['title']="<h3><center> Edit Profile </center></h3>";
            $this->load->view('sidepushsam',$res);
            //$crud->set_theme('datatables');
            $crud->where('Staff_ID',$Staff_ID);
            $crud->unset_add();
            $crud->unset_delete();
            //$crud->unset_export();
           // $crud->unset_print();
        $crud->set_field_upload('Image_path','assets/uploads/files/Staff_Photo');
        $crud->display_as('Image_path','Staff Photo');
        $output=$crud->render();
        $this->load->view('showtable',$output);
    }
	public function awardrec()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
    	//$crud->set_table('audio_book');
        //$crud->where('Staff_ID',$Staff_ID);
        
        $res['title']="<h3><center> Awards Recieved </center></h3>";
            $this->load->view('sidepushsam',$res);
            $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        
        $crud=new grocery_CRUD_MultiSearch();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->unset_fields('Status');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
        
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
                   //$crud->required_fields()
             $crud->where('Nature_of_Award!=""');
             $crud->where('Nature_of_Award!="no"');
        //$crud=new grocery_CRUD_MultiSearch();
        $crud->set_table('seminar_or_workshop');
        $crud->columns('Nature_of_Award','Place','From_Date','Certificate','Evidence2','Evidence3');
        $crud->display_as('Place','Awarding Agency');
        $crud->display_as('From_Date','Date');
        //$crud->set_theme('datatables');
       
        $a=$crud->where('Staff_ID',$Staff_ID);
        //$crud->unset_add();
            //$crud->unset_delete();
          //  $crud->unset_export();
            //$crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}
    public function award()
    {if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
    	//$crud->set_table('audio_book');
        //$crud->where('Staff_ID',$Staff_ID);
        $res['title']="<h3><center> Best Paper Awards </center></h3>";
            $this->load->view('sidepushsam',$res);
            $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->field_type('Nature_of_Award','hidden','Best Paper Award');
        $dat=$res[0];
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->unset_fields('Status');
        $crud->where('Nature_of_Award','Best Paper Award');
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/Awards');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Awards');
        $crud->required_fields('Nature_of_Award','Awarding_Agency','Date','Certificate');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
                   
         	
        //$crud=new grocery_CRUD_MultiSearch();
        $crud->set_table('awards');
        
        //$crud->set_theme('datatables');
       
        $a=$crud->where('Staff_ID',$Staff_ID);
        //$crud->unset_add();
            //$crud->unset_delete();
          //  $crud->unset_export();
            //$crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	public function Paper()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
           
        //$this->load->view('papermsg', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
           $Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        $res2['title']='<h3><center>Paper Publication</h3></center>';
        $this->load->view('sidepushsam',$res2);
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->set_rules('Year_Date','Year_Date','callback_check_dates[Year_Date]');
        $crud->fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->columns('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->set_read_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate');
        $crud->display_as('Year_Date','Date');
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/paper');
        $crud->set_field_upload('Evidence2','assets/uploads/files/paper');
        
        $crud->set_table('paper_publication');
        $crud->where('Staff_ID',$Staff_ID);
        //$crud->set_theme('datatables');
    //    $crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();      
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        
        $this->load->view('showtable',$output);
	}

	public function Consultancy()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
           $Staff_ID=$this->session->userdata('Staff_ID');
           //$result['title']='<center>Consultancy</center>';
        $result['data']=$this->selection_model->profile($Staff_ID);
        //$this->load->view('consultancy', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->required_fields('Name_of_Project','Name_of_Agency','Agency_Address','Amount_generated','Year','Receipt');
        $crud->display_as('Amount_generated','Amount');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
       $Staff_ID=$this->session->userdata('Staff_ID');
    $res=$this->selection_model->profile($Staff_ID);
    
    $crud->unset_fields('Status');
    
    $dat=$res[0];
    $Staff_Name=$dat->Staff_Name;
     $crud->field_type('Department','hidden',$Department);
     $crud->field_type('Staff_ID','hidden',$Staff_ID);
     $crud->field_type('Staff_Name','hidden',$Staff_Name);
    $crud->set_field_upload('Evidence3','assets/uploads/files/Consultancy');
    $crud->set_field_upload('Evidence2','assets/uploads/files/Consultancy');
    
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        $res2['title']='<h3><center>Consultancy Service</h3></center>';
        $crud->set_table('consultancy_service');
        $crud->where('Staff_ID',$Staff_ID);
        //$crud->set_theme('datatables');
        //$crud->unset_add();
        $this->load->view('sidepushsam',$res2);
        //$crud->unset_export();
        //$crud->unset_print();    
        $crud->set_field_upload('Receipt','assets/uploads/files/consultancy');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	public function Seminar()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        //$this->load->view('seminar', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
           $Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        $res2['title']='<h3><center>Seminars/Workshops/Conference</h3></center>';
        $this->load->view('sidepushsam',$res2);
        $crud->set_rules('From_Date','From_Date','callback_check_dates1[From_Date]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        $crud->unset_fields('Status');
        $dat=$res[0];
        $crud->where("Event!=''");
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
         $crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
         $crud->field_type('Event','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','Workshop'=>'Workshop','others'=>'others'));
        $crud->set_field_upload('Evidence3','assets/uploads/files/Seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Seminar');
        $crud->required_fields('Event','Level','Title_of_Program','Presented','Place','From_Date','Certificate');
        $crud->display_as('Title_of_Paper','Title of the Paper (If Presented)');
        $crud->set_table('seminar_or_workshop');
        $crud->where('Staff_ID',$Staff_ID);
        // $crud->set_theme('datatables');
        // $crud->unset_add();
        // $crud->unset_export();
        // $crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	public function Guest_lecture()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        //$this->load->view('Guest_lecture', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
           $Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        $res2['title']='<h3><center>Guest Leture Deleviered</h3></center>';
        $this->load->view('sidepushsam',$res2);
        $crud->required_fields("Title",'Place','Date','Certificate');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->unset_fields('Status');
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Guestlecture');
        
        $crud->set_table('guest_lecture');
        $crud->where('Staff_ID',$Staff_ID);
        // $crud->set_theme('datatables');
        // $crud->unset_add();
        // $crud->unset_export();
        // $crud->unset_print();
         $crud->set_field_upload('Certificate','assets/uploads/files/Guestlecture');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	public function FDP()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        //$this->load->view('FDP', $result,array('error' => ' ' )); 
           	
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
       $Staff_ID=$this->session->userdata('Staff_ID');
    $res=$this->selection_model->profile($Staff_ID);
    $crud->set_rules('From_Date','From_Date','callback_check_dates1[From_Date]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
    $res2['title']='<h3><center>Faculty Development Program</h3></center>';
    $this->load->view('sidepushsam',$res2);
    $crud->required_fields('From_Date','Title_of_Program','Speaker','Organizing_Agency',"Place",'Certificate');
    $crud->unset_fields('Status');
    
    $dat=$res[0];
    $Staff_Name=$dat->Staff_Name;
     $crud->field_type('Department','hidden',$Department);
     $crud->field_type('Staff_ID','hidden',$Staff_ID);
     $crud->field_type('Staff_Name','hidden',$Staff_Name);
    $crud->set_field_upload('Evidence3','assets/uploads/files/FDP');
    $crud->set_field_upload('Evidence2','assets/uploads/files/FDP');
    
        $crud->set_table('fdp');
        $crud->where('Staff_ID',$Staff_ID);
        //$crud->set_theme('datatables');
        //$crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/FDP');
        $output=$crud->render();
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
    public function check_dates1($dt)
    {$this->form_validation->set_message('check_dates1','You are entering the invalid Date please check it,...!');
        if($dt=='')
        return FALSE;
  
        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        
        $time1 = strtotime($dt2);
        $this->From=$time1;
        $time2 = strtotime($dat2);
        if($time1<=$time2)
        return True;
        // $diff=date_diff($dt2,$dat2);
        //$this->form_validation->set_message('check_dates1','You are entering the invalid Date please check it,...!');
      return false;
    } public function check_dates2($dt)
    {
        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        $time1 = strtotime($dt2);
        $time2 = strtotime($dat2);
        if($time1<=$time2 && $time1>$this->From)
        return True;
        // $diff=date_diff($dt2,$dat2);
        $this->form_validation->set_message('check_dates2','Invalid Periods,...!');
      return false;
    }
	public function Audio_book()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
    	$res['title']="<h3><center> Audio Books </center></h3>";
            $this->load->view('sidepushsam',$res);
            $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->set_table('audio_book');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->unset_fields('Status');
        $crud->where('Staff_ID',$Staff_ID);
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->required_fields('Title_of_Program','Organising_Agency','Date','Type','Certificate');
         $crud->field_type('Type','dropdown',array('MLM'=>'MLM','Audio'=>'Audio','Video'=>'Video','Mobile App'=>'Mobile App'));
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
         $crud->set_field_upload('Certificate','assets/uploads/files/Audio_book');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Audio_book');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Audio_book');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}
    public function change_pass()
    {
        if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
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
      //$res['data']=$this->selection_model->disp1($Staff_ID);
        //$this->load->view('adminsam1',$res);
        $this->load->view('sidepushsam');
        $this->load->view('change_pass',$result);   
        
    }

	public function Research()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        
        //$this->load->view('Research_guidance', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
           $Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        $res2['title']='<h3><center>Research Guidance</h3></center>';
        $this->load->view('sidepushsam',$res2);
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->required_fields('Guidance','Year','Completed','Under_Guidance','Certificate');
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/Research');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Research');
        $crud->unset_fields('Status');
        $crud->set_table('research');
        $crud->where('Staff_ID',$Staff_ID);
        // $crud->set_theme('datatables');
        // $crud->unset_add();
        // $crud->unset_export();
        // $crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/Research');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	public function Cluster()
    {
    	if($_SESSION['User_Type']!='User')
        redirect('select_ctrl/header');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->profile($Staff_ID);
        //$this->load->view('Cluster', $result,array('error' => ' ' ));    	
        $crud=new grocery_CRUD_MultiSearch();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $res['title']="<h3><center> Cluster Meetings </center></h3>";
            $this->load->view('sidepushsam',$res);
            $crud->required_fields('Date','Title','Certificate');
            $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
   		$Staff_ID=$this->session->userdata('Staff_ID');
        $res=$this->selection_model->profile($Staff_ID);
        
        
        
        $dat=$res[0];
        $Staff_Name=$dat->Staff_Name;
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->unset_fields('Status');
         $crud->field_type('Department','hidden',$Department);
         $crud->field_type('Staff_ID','hidden',$Staff_ID);
         $crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Clustermeet');
        
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
        
        $crud->set_table('cluster_meeting');
        $crud->where('Staff_ID',$Staff_ID);
        //$crud->set_theme('datatables');
        //$crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();
        $crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $output=$crud->render();
        $this->load->view('showtable',$output);
	}

	
}
