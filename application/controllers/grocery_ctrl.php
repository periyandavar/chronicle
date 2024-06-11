<?php
class grocery_ctrl extends CI_Controller
{  
	
	 public function __construct()
	 {
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD','session');
		$this->load->library('Grocery_CRUD_MultiSearch');
        $this->load->model('selection_model');
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
       // $this->load->view('adminsam',$result);
    }
    function add_field_callback_1()

{

      return '<textarea name="detail" rows="15"></textarea>';

}

    public function header()
    {
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->required_fields('detail');
        //$crud->unset_texteditor('detail');
        $crud->change_field_type('detail', 'text');
        //$crud->callback_add_field('detail',array($this,'add_field_callback_1'));
        $crud->set_table('about');  

  $crud->unset_read();      $output=$crud->render();
        $this->load->view('admin_nav');
        //$this->load->view('end');
        
        $this->load->view('table',$output);

    }
	public function Staff()
    {
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_subject('Staff Info');
        //$crud->set_theme('datatables');
		$crud->unset_add();
        $crud->set_table('staff_info');
        $crud->columns('Staff_Name','Designation','Qualification','Year_of_Experience','Area_of_Interest');
        //$crud->where('Department',$Department);   
        $_SESSION['CustomTittle']='<br><h2><center><b>INTERNAL QUALITY ASSURANCE CELL<br>EXTERNAL ACADEMIC AUDIT PROFORMA</h2><br>';
        $_SESSION['CustomTitle']='<br><h3>Faculty Profile</h3>';
        $crud->display_as('Staff_Name','Staff Name');
        $crud->display_as('Area_of_Interest','Area of Specialization');
        $crud->display_as('Year_of_Experience','Experience');
        $output=$crud->render();
       $this->load->view('facultyreport');
        $this->load->view('showtable',$output);
        
        echo "<html><h2><center><b>Faculty Profile</b></h2></html>";
	}
	public function index1()
	{
		echo "Welcome to Grocery CRUD";

	 //   redirect('grocery_ctrl/dept');
	}

	public function index()
	{
		
        
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }
    
    function log_user_after_insert($post_array,$primary_key)
{
    $user_logs_insert = array(
        "Staff_ID" => strtoupper($post_array['Staff_ID']."CO"),
        "New_Password"=>strtoupper($post_array['Staff_ID']."CO"),
        "Password"=>strtoupper($post_array['Staff_ID']."CO"),
        "confirm_pass"=>strtoupper($post_array['Staff_ID']."CO"),
        "Department"=>$post_array['Department'],
        "User_Type"=>"Co-Admin"
        //"Department" => $post_array,
        // "last_update" => date('Y-m-d H:i:s')
    );
    //$_SESSION['post']=$post_array;
    $this->db->insert('login',$user_logs_insert);
 
    return true;
}
public function check_dates($dt)
    {
      $this->form_validation->set_message('check_dates','You are entering the invalid Date please check it,...!');

      return false;
    }
	public function add_user()
    {
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->callback_after_insert(array($this, 'log_user_after_insert'));
        // $crud->callback_after_insert(function () {
        //     echo "<pre>";
        //     print_r($post_array);
        //     echo "</pre>";         
        //     die();
        // });
      //  echo"jjj";
        $crud->required_fields('Staff_ID','Department','Password','New_Password','confirm_pass');
        //$crud->set_theme('datatables');
        $crud->set_table('login');  
        //$crud->set_rules('Date','Date','callback_check_dates[]');
        $this->selection_model->disp1($Staff_ID);
      //$crud->where('Department',$Department);
        $crud->where('User_Type="Subadmin" or User_Type="Co-Admin"');
        //$crud->where('User_Type','Co-Admin');
        $crud->field_type('User_Type','hidden','Subadmin');
        $crud->edit_fields('Staff_ID','Department');
        $state = $crud->getState();
    $state_info = $crud->getStateInfo();
        if($state == 'edit')
    {
        $primary_key = $state_info->primary_key;
        $crud->field_type('Department', 'readonly');
    }
$crud->columns('Staff_ID','User_Type','Department');
//$crud->insert_fields('Password','hidden');
$crud->display_as('Staff_ID','Department Code');
//$crud->required_fields('Staff_ID','Password','Department');

  $crud->unset_read();      $output=$crud->render();
        $this->load->view('admin_nav');
        //$this->load->view('end');
        $this->load->view('table',$output);


        }

	public function demo()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('staff_info');
		//$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$result['title']='<h3><center>Faculty Profile</center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->unset_delete();
        $crud->set_field_upload('Image_path','assets\uploads\files\Staff_Photo');
		$crud->set_theme('flexigrid');
		$output=$crud->render();
		//$this->_example_output($output);
		

		$this->load->view('table',$output);
	}
	function _example_output($output = null){
	$this->load->view('grocery',$output);
	}
    public function proceeding()
    {
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $Staff_ID=$this->session->userdata('Staff_ID');
    //$result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
    $result['title']='<h3><center>Faculty Achievements - <b> Proceedings</b></center><br></h3>';
        //$output=$crud->render();
    
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        $crud=new grocery_CRUD_MultiSearch();
    $crud->field_type('Type','hidden',"Proceeding");
    $crud->where('Type','Proceeding');
    $crud->where('Status','Approved');
    $_SESSION['CustomTitle']='<br><h3>Proceedings</h3>';
    $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
    $crud->fields('Staff_ID','Staff_Name','Title_of_book','Level','Type','Proceeding_of_conference','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3',"Department");
    $crud->columns('Staff_ID','Staff_Name','Title_of_book','Level','Proceeding_of_conference','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3');
    $crud->set_read_fields('Staff_ID','Staff_Name','Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate','Evidence2','Evidence3');
    $crud->required_fields('Staff_ID','Staff_Name','Title_of_book','Proceeding_of_conference','Level','Issn_isbn_for_proceeding','Year_of_publishing','Date','Certificate');
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
    
    //$crud->set_theme('datatables');
   
    $crud->unset_edit();
    $crud->unset_add();
    //    $crud->unset_delete();
       //$crud->unset_export();
        //$crud->unset_print();
        $this->load->view('staff');
    $crud->set_field_upload('Certificate','assets/uploads/files/Book');
    $output=$crud->render();
    $this->load->view('showtable',$output);

    }
   
	public function paper()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('paper_publication');
        //$crud->unset_export();
        $crud->unset_add();
		$_SESSION['CustomTitle']='<br><h3>Paper Publication Staff</h3>';
        $crud->columns('Department','Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Certificate','Evidence2','Evidence3');
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $crud->set_field_upload('Evidence3','assets/uploads/files/paper');
        $crud->set_field_upload('Evidence2','assets/uploads/files/paper');
        $crud->unset_edit();
        $crud->where('Status','Approved');
		//$crud->unset_delete();
	//	$crud->set_theme('flexigrid');
		//$crud->display_as('Staff_ID','Staff Name');
		//$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        $result['title']='<h3><center>Faculty Achievements - <b> Paper Published in Journals by Staffs</b></center><br></h3>';
        $output=$crud->render();
        //$this->_example_output($output);
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        
		$this->load->view('table',$output);
	}

	public function department()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('department_activity');
		$crud->set_theme('flexigrid');
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_delete();		
		$crud->unset_edit();
		$output=$crud->render();
		//$this->load->view('facultyreport');
		$this->load->view('table',$output);
	}
	
	function research(){
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
         $crud->set_subject('Research Guidance');
        // $crud->columns('Staff_Name','Year','Guidance','Completed','Under_Guidance');
        $result['title']='<h3><center>Faculty Achievements - <b>Research Guidance<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->where('Status','Approved');
        $crud->set_field_upload('Certificate','assets/uploads/files/research');
        $crud->set_field_upload('Evidence3','assets/uploads/files/research');
        $crud->set_field_upload('Evidence2','assets/uploads/files/research');
        $_SESSION['CustomTitle']='<br><h3>Research Guidance By the Members of Staff</h3>';
        $output=$crud->render();
       $this->load->view('facultyachieve');
        
        $this->load->view('showtable',$output);
    }
    function Research_Project(){
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        // $crud->where('Status','Approved');
        $crud->set_table('project_received');
        $result['title']='<h3><center>Faculty Achievements - <b>Research Project Recieved<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->unset_add();
        $crud->unset_edit();
    $crud->display_as('Name_of_fundingagency','Name of funding agency');
         $crud->set_subject('Research Project Received');
        // $crud->columns('Staff_Name','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction','Certificate');
        $_SESSION['CustomTitle']='<br><h3>Research Project Received</h3>';
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $output=$crud->render();
        
        $this->load->view('facultyachieve');
       
        $this->load->view('showtable',$output);
    }

public function consultancy()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$result['title']='<h3><center>Faculty Achievements - <b>Consultancy Services<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        
		$crud->set_table('consultancy_service');
		$crud->set_theme('flexigrid');
		//$crud->set_Relation('Staff_Name','staff_info','Staff_Name');
		//$crud->set_Relation('Department','staff_info','Department');
		//$crud->unset_export();
		$crud->unset_add();
		$crud->where('Status','Approved');
        $crud->set_field_upload('Receipt','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence3','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence2','assets/uploads/files/consultancy');
		$crud->unset_edit();
		//$crud->unset_delete();
	//	$crud->columns('Consultancy_project','Consultant_name','Consult_agency','Address','Revenue');
		//$crud->columns('Name_of_Consultant','Consulting_agency','Name_of_Service','Amount_generated','Agency_ContactNo');
		$output=$crud->render();
		//$this->_example_output($output);
		$this->load->view('facultyachieve');
		$this->load->view('table',$output);
	}
	public function seminar_or_workshop()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_theme('flexigrid');
		$crud->set_table('seminar_or_workshop');
        $crud->where('presented','yes');
        //$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
		//$crud->unset_export();
        $crud->unset_add();
        $crud->where('Status','Approved');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
		$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
        $crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Paper Presented by Staffs</h3>';
		//$crud->unset_delete();
		$output=$crud->render();
        //$this->_example_output($output);
        $result['title']='<h3><center>Faculty Achievements - <b>Paper presented in seminar or workshop<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
		$this->load->view('facultyachieve');
		$this->load->view('grocery',$output);
	}
    public function seminar_or_workshop1()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_theme('flexigrid');
		$crud->set_table('seminar_or_workshop');
        //$crud->where('presented','no');
        //$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
		//$crud->unset_export();
		$crud->unset_add();
		$crud->where('Status','Approved');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
		$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
		$crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Seminar/Conference Attended by Staffs </h3>';
        //$crud->unset_delete();
		$output=$crud->render();
        //$this->_example_output($output);
        $result['title']='<h3><center>Faculty Achievements - <b>Seminar or Workshop Participated by Staffs<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
		$this->load->view('facultyachieve');
		$this->load->view('grocery',$output);
	}
	
    public function guest_lecture()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('guest_lecture');
		$crud->set_theme('flexigrid');
		//$crud->set_Relation('Staff_ID','staff_info','{Staff_Name}-{Department}');
		//$crud->unset_export();
		$result['title']='<h3><center>Faculty Achievements - <b>Guest Lectures Delivered<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $_SESSION['CustomTitle']='<br><h3>Guest  Lectures Delivired by Staff</h3>';
        $crud->set_field_upload('Certificate','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Guestlecture');
		$crud->unset_add();
        $crud->unset_edit();
        $crud->where('Status','Approved');
		//$crud->unset_delete();
		$output=$crud->render();
		//$this->_example_output($output);
		$this->load->view('facultyachieve');
		$this->load->view('grocery',$output);
	}
public function Awards()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('awards');
		$crud->set_theme('flexigrid');
		//$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
		//$crud->unset_export();
		$crud->unset_add();
		$result['title']='<h3><center>Faculty Achievements - <b>Awards Received<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Status','Approved');
		//$crud->unset_delete();
		$crud->unset_edit();
		$crud->display_as('Staff_ID','Staff Name ');
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $_SESSION['CustomTitle']='<br><h3>Awards Received by Staff</h3>';
        
        $crud->set_field_upload('Evidence3','assets/uploads/files/Awards');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Awards');
		$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
		$output=$crud->render();
		//$this->_example_output($output);
		$this->load->view('facultyachieve');
		$this->load->view('grocery',$output);
	}

public function extension()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('extension_activity');
		$crud->set_theme('flexigrid');
		$crud->set_field_upload('Certificate','assets/uploads/files/ExtensionAct');
		$crud->unset_export();
		
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$output=$crud->render();
		$this->_example_output($output);
		//$this->load->view('table',$output);
	}

public function field_visit()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('field_visit');
		$crud->set_theme('flexigrid');
		$crud->unset_export();
		$crud->unset_delete();
		
		$crud->unset_edit();
		$crud->set_field_upload('Certificate','assets/uploads/files/field_visit');
		$output=$crud->render();
	$this->_example_output($output);
	//$this->load->view('table',$output);
	}

public function audio_book()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('audio_book');
		$crud->set_theme('flexigrid');
		//$crud->unset_export();
		$crud->unset_add();
		$result['title']='<h3><center>Faculty Achievements - <b>Audio Books<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Status','Approved');
		$crud->unset_delete();
		$crud->unset_edit();
		//$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
        $crud->set_field_upload('Certificate','assets/uploads/files/Audio_book');
        $_SESSION['CustomTitle']='<br><h3>MLM Prepared</h3>';
        
        $crud->set_field_upload('Evidence2','assets/uploads/files/Audio_book');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Audio_book');
		$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
		$output=$crud->render();
		//$this->_example_output($output);
		$this->load->view('facultyachieve');
		$this->load->view('grocery',$output);
	}

public function MoU_signed()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('mou_signed');
		$crud->set_theme('flexigrid');
		$crud->set_field_upload('Certificate','assets/uploads/files/MoU');
		$crud->unset_export();
		$crud->unset_delete();
		
		$crud->unset_edit();
		$crud->set_subject('MoU_signed');
		$output=$crud->render();
		$this->_example_output($output);
		//$this->load->view('table',$output);
	}

public function alumini()
	{
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('alumini_interaction');
		$crud->set_theme('flexigrid');
		$crud->unset_delete();
		$crud->unset_export();
		
		$crud->unset_edit();
	//$crud->set_Relation('Staff_ID','staff_info','{Staff_Name}-{Department}');
		//$crud->set_suject('MoU_signed');
		$output=$crud->render();
		$this->_example_output($output);
		//$this->load->view('table',$output);
	}

public function specialprg()
	{
		//$this->load->view('adminsam');
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('special_program');
		$crud->set_theme('flexigrid');
		$crud->set_subject('SpecialProgram');
        $crud->set_field_upload('Certificate','assets/uploads/files/SpecialPrg');
        $crud->set_field_upload('Evidence2','assets/uploads/files/SpecialPrg');
        $crud->set_field_upload('Evidence3','assets/uploads/files/SpecialPrg');
		//$crud->unset_export();
		
		$crud->unset_delete();
		$crud->unset_edit();
		$output=$crud->render();
		$this->_example_output($output);
		//$this->load->view('table',$output);
	}

	public function fdp()
	{
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('fdp');
		$crud->set_theme('flexigrid');
		$crud->set_subject('FDP');
		$crud->unset_add();
		$result['title']='<h3><center>Faculty Achievements - <b>FDP<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Status','Approved');
        $_SESSION['CustomTitle']='<br><h3>FDP</h3>';
        $crud->set_field_upload('Evidence3','assets/uploads/files/FDP');
        $crud->set_field_upload('Evidence2','assets/uploads/files/FDP');
		$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
		//$crud->unset_edit();
		$crud->unset_delete();
		//$crud->set_Relation('Staff_ID','staff_info','Staff_Name');
		//$crud->display_as('Staff_ID','Staff Name ');
		$crud->set_field_upload('Certificate','assets/uploads/files/FDP');
		$output=$crud->render();
		$this->load->view('facultyachieve');
		$this->_example_output($output);
}
public function Cluster()
	{
		$crud=new Grocery_CRUD_MultiSearch();
		$crud->set_table('cluster_meeting');
		$crud->set_theme('flexigrid');
		$crud->unset_export();
		
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
$output=$crud->render();
		$this->_example_output($output);
		//$this->load->view('table',$output);
}

public function awardrec()
    {
    	//$this->load->view('Awards');
   $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
            $crud->unset_export();
		
		$crud->unset_edit();
           // $this->load->view('papermsg',$result);
        $this->load->view('Awards', $result,array('error' => ' ' ));    	
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('awards');
        
        $crud->set_theme('flexigrid');
       
        //$crud->display_as('Staff_ID','Staff Name & Department');
       // $crud->set_Relation($Staff_ID,'staff_info','Staff_Name');
        
       // $crud->where('Staff_ID',$Staff_ID);
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $output=$crud->render();
        //$this->_example_output($output);
        $this->load->view('Awardsrec',$output);
	}
	
 public function intercollegiate()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Status','Approved');
        $crud->where('Event_Type','Inter-Collegiate');
        $result['title']='<h3><center>Student Achievements - <b>Inter Collegiate<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
		$_SESSION['CustomTitle']='<br><h3>Inter Collegiate Achievements</h3>';
		//$crud->unset_delete();
		$crud->unset_edit();
        $crud->unset_add();
        //$crud->unset_read();
        $crud->columns('Department','Student_Name','Class','Title_of_Event','Place_Prize','Date');
       // $crud->fields('Student_ID','Student_Name','Class','Department','Title_of_Event','Event_Type','Date','Certificate');
        $crud->display_as('Student_Name','Name of the Students');
        
        $crud->display_as('Organizer','Organized / Sponsored by');
        $crud->display_as('Place_Prize','Prize');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/intercollegiate');
        $crud->set_field_upload('Evidence2','assets/uploads/files/intercollegiate');
        $crud->set_field_upload('Evidence3','assets/uploads/files/intercollegiate');
        $output=$crud->render();
        $this->load->view('studrpt');
        $this->load->view('table',$output);
    }
  
   public function workshop()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->where('Status','Approved');
        //$crud->where('Title_of_Event','Seminar');
        $crud->where('Event_Type','Workshop');
        $result['title']='<h3><center>Student Achievements - <b> Workshop Participated by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        //$crud->unset_print();
        //$crud->unset_export();
        //$crud->unset_read();
        $crud->unset_add();
        //$crud->unset_delete();
        $crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Workshop Attended by Students</h3>';
        $crud->columns('Department','Student_Name','Class','Title_of_program','Title_of_Event','Date');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_program','Title_of_Event','Level','Organizer','Date','Year');
        $crud->display_as('Student_Name','Name of the Students');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_program','Program Title');
        $crud->display_as('Title_of_Event','Event Title');
        $crud->display_as('Level','Level');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Date','Date');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
   public function conference()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $_SESSION['CustomTitle']='<br><h3>Confeence Attended by Students</h3>';
        $crud->where('Event_Type','Conference');
        $crud->unset_add();
        $crud->where('Status','Approved');
		$result['title']='<h3><center>Student Achievements - <b>Conference Attended by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
		//$crud->unset_delete();
        $crud->unset_edit();
        //$crud->unset_read();
        $crud->columns('Department','Student_Name','Class','Title_of_Paper','Title_of_Event','Title_of_program','Level','Organizer','Date');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Title_of_program','Title_of_Paper','Level','Organizer','Date','Year','Certificate');
       
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Conference');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Conference');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Conference');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function seminar()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $result['title']='<h3><center>Student Achievements - <b>Seminars Attended by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Event_Type','Seminar');
        $crud->unset_add();
		//$crud->unset_read();
        //$crud->unset_delete();
        $crud->where('Status','Approved');
        $crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Seminars Attended by Students</h3>';
        $crud->columns('Department','Student_Name','Class','Title_of_Event','Title_of_Paper','Title_of_program','Level','Organizer','Date');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Title_of_program','Title_of_Paper','Level','Organizer','Date','Year');
      //  $crud->display_as('Student_Name','Author(s)');
        
        $crud->display_as('Organizer','Organized by');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Seminar');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function project_applied()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
     $crud->where('Event_Type','Project Applied');
        $crud->unset_add();
      //  $crud->unset_read();
      $crud->where('Status','Approved');
      $_SESSION['CustomTitle']='<br><h3>Project Applied by Students</h3>';  
      $result['title']='<h3><center>Student Achievements - <b>Project by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
	//	$crud->unset_delete();
		$crud->unset_edit();
        $crud->columns('Department','Student_Name','Class','nameofguide','Titleoftheproject');
        $crud->fields('Department','Student_ID','Student_Name','Class','Titleoftheproject','nameofguide','Year');
        $crud->display_as('Student_Name','Name of the Students');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function peerlearning()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $result['title']='<h3><center>Student Achievements - <b>Peer Learning<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Event_Type','Peer Learning');
        $crud->unset_add();
        $crud->where('Status','Approved');
        $crud->set_field_upload('Evidence3','assets/uploads/files/peer');
        $crud->set_field_upload('Evidence2','assets/uploads/files/peer');
        $crud->set_field_upload('Certificate','assets/uploads/files/peer');
        
		// $crud->unset_read();
		// $crud->unset_delete();
        $crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Peer Learning</h3>';
        $crud->columns('Department','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','year');
        $crud->fields('Department','Student_ID','Student_Name','Class','Title_of_Event','Organizer','beneficiary','venue','Year','Date');
        $crud->display_as('Student_Name','Name of the Students');
        
        $crud->display_as('Organizer','Organized by');
         
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function competitive()
    {
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $crud->where('Status','Approved');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
     //$crud->unset_read();
        $crud->where('Event_Type','competitive Exam');
        $crud->unset_add();
		$result['title']='<h3><center>Student Achievements - <b>Competitive Exams passed by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        // $crud->unset_delete();
        $crud->set_field_upload('Certificate','assets/uploads/files/comp');
        $crud->set_field_upload('Evidence3','assets/uploads/files/comp');
        $crud->set_field_upload('Evidence2','assets/uploads/files/comp');
         $crud->unset_edit();
        $_SESSION['CustomTitle']='<br><h3>Competitive Exams</h3>';
        $crud->columns('Department','Student_Name','Class','Competitive_Exam_Passed');
        $crud->fields('Department','Student_ID','Student_Name','Class','Competitive_Exam_Passed','Year');
        $crud->display_as('Student_Name','Name of the Student');
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function sports()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        // $crud->unset_read();
        $result['title']='<h3><center>Student Achievements - <b>Sports/Game Participated by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Event_Type','Sports and Games');
        $crud->unset_add();
        $crud->where('Status','Approved');
		$_SESSION['CustomTitle']='<br><h3>Sports</h3>';
		//$crud->unset_delete();
		$crud->unset_edit();
        $crud->columns('Department','Student_Name','Class','Title_of_Event','Level','Place_Prize');
        $crud->fields('Department','Rollno','Title_of_program','Title_of_Event','Level','Organizer','Date','Year');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Game/Event');
        $crud->display_as('Level','Level');
        $crud->display_as('Place_Prize','Prize');
        $crud->set_field_upload('Evidence3','assets/uploads/files/sports');
        $crud->set_field_upload('Evidence2','assets/uploads/files/sports');
        $crud->set_field_upload('Certificate','assets/uploads/files/sports');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  
  public function cultural()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $result['title']='<h3><center>Student Achievements - <b>Cultural Events by Students<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
        $crud->where('Event_Type','Cultural Competition');
        $crud->unset_add();
        $crud->where('Status','Approved');
		// $crud->unset_read();
        // $crud->unset_delete();
        $_SESSION['CustomTitle']='<br><h3>Cultural Meet </h3>';
		$crud->unset_edit();
        $crud->columns('Department','Student_Name','Class','Place_Prize','Title_of_Event','Organizer','Date');
        $crud->fields('Department','Rollno','Event_Type','Title_of_program','Title_of_Event','Level','Organizer','Date','Year','Certificate');
        $crud->display_as('Student_Name','Name of the Student');
        $crud->display_as('Class','Class');
        $crud->display_as('Title_of_Event','Event');
        $crud->display_as('Organizer','Organized by');
        $crud->display_as('Place_Prize','Prize');
        $crud->display_as('Date','Date');
        $crud->set_field_upload('Evidence3','assets/uploads/files/cultural');
        $crud->set_field_upload('Evidence2','assets/uploads/files/cultural');
        $crud->set_field_upload('Certificate','assets/uploads/files/cultural');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
    public function book()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        
    $result['title']="<html><h2><center><b>Books Published</b></h2></html>";
    $this->load->view('admin_nav',$result);
        $crud->set_table('book');
        //$crud->unset_read();
        $crud->unset_edit();
        $crud->where('Status','Approved');
        //$crud->unset_read();
        //$crud->unset_delete();
        $crud->set_field_upload('Evidence3','assets/uploads/files/book');
        $crud->set_field_upload('Evidence2','assets/uploads/files/book');
        $crud->columns('Department','Staff_ID','Staff_Name','Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
        $_SESSION['CustomTitle']='<br><h3>Books Published</h3>';
        //$crud->columns('Staff_Name','From_Date','To_Date','Event');
        //$crud->fields('Date','Staff_Name','Title','Level','Place');
        $crud->set_field_upload('Certificate','/assets/uploads/files/book');
        $crud->display_as('Staff_Name','Staff Name');
        $crud->unset_add();
        $_SESSION['CustomTitle']='<br><h3>10) Books Published</h3>';
        $this->load->view('facultyachieve');
        $output=$crud->render();
        $this->load->view('showtable',$output);
    }

    public function placement()
    {             
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        //$crud->set_theme('datatables');
        $crud->unset_add();
		$result['title']='<h3><center>Student Achievements - <b>Student Placements<b></center><br></h3>';
        $this->load->view('admin_nav',$result);
		// $crud->unset_delete();
		 $crud->unset_edit();
        $crud->set_table('placement');
        $crud->where('Status','Approved');
     //$crud->unset_read();
     $crud->columns('Student_ID','Student_Name','Year','Department','Placed_In');
     $crud->set_field_upload('Evidence3','assets/uploads/files/placement');
        $crud->set_field_upload('Evidence2','assets/uploads/files/placement');
        $crud->set_field_upload('Evidance','assets/uploads/files/placement');
        $output=$crud->render();
        $this->load->view('studrpt');
           $this->load->view('table',$output);
    }
  }