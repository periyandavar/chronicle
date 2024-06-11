<?php
class admin_ctrl2 extends CI_Controller
{  
    
     public function __construct()
     {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD','session');
        $this->load->model('selection_model');
        $this->load->library('Grocery_CRUD_MultiSearch');
        //$this->$i=0;
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        if(isset($_SESSION['User_Type']))
        if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
              
    }
 public   function index(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
    //$result['title']="<html><h2><center><b>Faculty Details</b></h2></html>";
$this->load->view('admin_nav',$result);
    
  $this->load->view('facultyachieve');
}
public function state()
{
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
    $crud=new Grocery_CRUD_MultiSearch();
    $crud->set_table('state');
    $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
    $crud->set_rules('Year_of_Passout','Year_of_Passout','callback_check_year1[Year_of_Passout]');
    $crud->unset_edit();
    $crud->unset_delete();
    $crud->unset_add();
    $crud->unset_read();
 
    if($Department=='')
    redirect('select_ctrl/header');
    $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center> <b> Students from other States </b></h2></html>";
    $this->load->view('admin_nav',$result);
     
    //$crud->set_theme('datatables');
    $crud->set_subject('other State Student');
    //$crud->where('Department',$Department);
   // $crud->where('Event_Type','Special Program');
   // $crud->unset_print();
    //$crud->unset_export();
   //$crud->fields('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
   $crud->required_fields('Department','Student_ID','Student_Name','Joining_Year','Year_of_passout','Type_of_Disabled','Percentage','Evidence1');
   //$crud->columns('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
   //$crud->callback_edit_field(array($this,'disable_input'));
   //$crud->callback_edit_field('Department',array($this,'disable_input'));

   $crud->set_field_upload('Evidence1','assets/uploads/files/state');
   $crud->set_field_upload('Evidence2','assets/uploads/files/state');
   $crud->set_field_upload('Evidence3','assets/uploads/files/state');
 //  $crud->change_field_type('Department', 'disabled');
 $this->load->view('studrpt1');   
 $state=$crud->getState();
    $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Physically Disabled Students</h3>';     
    if ($state == 'export' || $state == 'print') {
     $crud->unset_columns('Evidence1','Evidence2','Evidence3','Status');}
 $output=$crud->render();
     
    $this->load->view('table',$output);  
}
public function dis()
{
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
    $crud=new Grocery_CRUD_MultiSearch();
    $crud->set_table('disabled');
    $crud->unset_edit();
    $crud->unset_delete();
    $crud->unset_add();
    $crud->unset_read();
 
    $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
    $crud->set_rules('Year_of_Passout','Year_of_Passout','callback_check_year1[Year_of_Passout]');
    if($Department=='')
    redirect('select_ctrl/header');
    $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center> <b> Physically Disabled </b></h2></html>";
    $this->load->view('admin_nav',$result);
     
    //$crud->set_theme('datatables');
    $crud->set_subject('Physically Disabled');
    //$crud->where('Department',$Department);
   // $crud->where('Event_Type','Special Program');
   // $crud->unset_print();
    //$crud->unset_export();
   //$crud->fields('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
   $crud->required_fields('Department','Student_ID','Student_Name','Joining_Year','Year_of_passout','Type_of_Disabled','Percentage','Evidence1');
   //$crud->columns('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
   //$crud->callback_edit_field(array($this,'disable_input'));
   //$crud->callback_edit_field('Department',array($this,'disable_input'));

   $crud->set_field_upload('Evidence1','assets/uploads/files/disabled');
   $crud->set_field_upload('Evidence2','assets/uploads/files/disabled');
   $crud->set_field_upload('Evidence3','assets/uploads/files/disabled');
 //  $crud->change_field_type('Department', 'disabled');
 $this->load->view('studrpt1');   
 $state=$crud->getState();
    $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Physically Disabled Students</h3>';     
    if ($state == 'export' || $state == 'print') {
     $crud->unset_columns('Evidence1','Evidence2','Evidence3','Status');}
 $output=$crud->render();
     
    $this->load->view('table',$output);  
}
public   function dep(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
    //$result['title']="<html><h2><center><b>Faculty Details</b></h2></html>";
$this->load->view('admin_nav',$result);
    
  $this->load->view('deptrpt1');
}
 public function server(){
  $this->load->view('server');

}
function log_user_after_insert($post_array,$primary_key)
{
    $user_logs_insert = array(
        "Staff_ID" => $post_array['Staff_ID'],
        // "New_Password"=>$post_array['Staff_ID']."CO",
        // "Password"=>$post_array['Staff_ID']."CO",
        //"confirm_pass"=>$post_array['Staff_ID']."CO",
        "Department"=>$post_array['Department'],
        // "User_Type"=>"Co-Admin"
        //"Department" => $post_array,
        // "last_update" => date('Y-m-d H:i:s')
    );
    //$_SESSION['post']=$post_array;
    $this->db->insert('staff_info',$user_logs_insert);
 
    return true;
}
public function add_user()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type('Department','hidden',$Department);
        $crud->field_type('User_Type','hidden','User');
        //$crud->set_theme('datatables');
        $crud->set_table('login');  
        $crud->callback_after_insert(array($this, 'log_user_after_insert'));
        $crud->unset_read();
        $crud->unset_edit();
        $crud->required_fields('Staff_ID','Department','Password','New_Password','confirm_pass');
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Add a Faculty</b></h2></html>";
    $this->load->view('admin_nav',$result);
      
        $crud->where('User_Type','User');
$crud->columns('Staff_ID','Department');
//$crud->required_fields('Staff_ID','Password','Department','confirm_pass');
        $output=$crud->render();
        $this->load->view('table',$output);

        }
        public function add_student()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        //$crud->set_theme('datatables');
        //$crud->required_fields('Password');
        if($Department=='')
        redirect('select_ctrl/header');
        $crud->field_type('Department','hidden',$Department);
        $crud->field_type('User_Type','hidden','student');
        //$crud->set_theme('datatables');
        $crud->set_table('login');  
        $crud->unset_read();
        $crud->unset_edit();
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Add a Single Student</b></h2></html>";
    $this->load->view('admin_nav',$result);
     
       
        $crud->where('User_Type','Student');
$crud->columns('Staff_ID','Department');
$crud->required_fields('Staff_ID','Department','Password','confirm_pass');
$crud->display_as('Staff_ID','Student_ID');
        $output=$crud->render();
        $this->load->view('table',$output);

        }
public function Staff()
    {
        
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $crud->set_rules('Date_of_Birth','Date_of_Birth','callback_check_dates[Date_of_Birth]');
        $crud->set_rules('Date_of_Join','Date_of_Join','callback_check_dates[Date_of_Join]');
        $Department=$this->session->userdata('Department');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Department','hidden',$Department);
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $result2['title']="<html><h2><center><b>Staff Profile</b></h2></html>";
    $this->load->view('admin_nav',$result);
    $this->load->view('facultyachieve',$result2);
        //$crud->set_theme('datatables');
        $crud->set_table('staff_info');    
        //$crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->required_fields('Staff_ID','Staff_Name','Department');
       // $crud->columns('Staff_Name','Designation','Department','Qualification','Gender','Date_of_Join','Area_of_Interest','Date_of_Birth','Residential_Address','Contact_No','Year_of_Experience','Image_path');
//        $crud->fields('Staff_ID','Staff_Name','Designation','Department','Qualification','Gender','Date_of_join','Area_of_Interest','Date_of_birth','Residential_Address','Contact_No','Year_of_Experience','Image_path');
         
        //$crud->unset_print();
        //$crud->unset_export(); 
        $crud->set_field_upload('Image_path','assets/uploads/files/Staff_Photo');
        $output=$crud->render();
        $this->load->view('table',$output);
        $this->session->set_flashdata('message', 'success');
    }
         // $crud->set_primary_key('Staff_ID','staff_info');
         
        //  $crud->set_relation('Staff_ID','staff_info','Staff_ID');
          
          // $crud->set_relation_n_n('Department','staff_info','department_code','Department','Department','Department',$where);
          //$crud->set_rules('address', 'Address', 'trim|required|max_length[255]');
        
// $crud->set_relation('Department','department_code','Department');

/*if(!empty($this->input->post('Staff_ID')){

    if($crud->getState()=='edit')
    {
        $user_data = $this->db->get_where('staff_info',array('Staff_ID'=>$this->input->post('$Staff_ID')))->row_array();

        if($user_data['Staff_ID']!=$this->input->post('Staff_ID'))
        {
              $crud->set_rules('Staff_ID', 'Staff ID', 'trim|required|max_length[6]|is_unique[staff_info.Staff_ID');
        }
    }
    else
    {
         $crud->set_rules('Staff_ID', 'Staff ID', 'trim|required|max_length[6]|is_unique[staff_info.Staff_ID');
     }
}*/
        
        //redirect('admin/product');
        public function NME()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('nme');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Elective </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        //$crud->set_theme('datatables');
        $crud->set_subject('Elective');
        
       // $crud->where('Event_Type','Special Program');
       // $crud->unset_print();
        //$crud->unset_export();
       $crud->fields('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
       $crud->required_fields('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1');
       $crud->columns('Department','Year','Title_Of_Paper','SubjectCode','Semester','Strength','Incharge','Evidence1','Evidence2','Evidence3');
       //$crud->callback_edit_field(array($this,'disable_input'));
       //$crud->callback_edit_field('Department',array($this,'disable_input'));
       $crud->display_as('Evidence1','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence1','assets/uploads/files/Assosiation');
       $crud->set_field_upload('Evidence2','assets/uploads/files/Assosiation');
       $crud->set_field_upload('Evidence3','assets/uploads/files/Assosiation');
     //  $crud->change_field_type('Department', 'disabled');
     $this->load->view('deptrpt1');   
     $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center></center><br><br>Elective</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence1','Evidence2','Evidence3','Status');}
     $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function phd()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('phd');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Completing_Year','Completing_Year','callback_check_year2[Completing_Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        $_SESSION['CustomTitle']='<br><h3> <center> '.$Department." </center><br><br> PhD., </h3>";    
        $crud->required_fields('Staff_ID','Staff_Name','University','Title','Joining_Year','Evidence');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b>  PhD </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        
        $crud->unset_fields('Status');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence2','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence3','assets/uploads/files/phd');
     //  $crud->change_field_type('Department', 'disabled');
     $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function guide()
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
        $_SESSION['CustomTitle']='<br><h3> <center> '.$Department." </center><br><br> PhD Scholars Guided </h3>";    
        $crud->required_fields('Staff_ID','Staff_Name','University','Title','Joining_Year','Evidence');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b>  PhD Scholars Guided </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        $crud->display_as("Staff_Name",'Name of the Guide');
       $crud->display_as('Co_Guide','Name of the Co-Guide');
       $crud->display_as('Student_Name','Name of the Student and Reg. No.');
       $crud->display_as('Title','Title of the Thesis');
        $crud->unset_fields('Status');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence2','assets/uploads/files/phd');
       $crud->set_field_upload('Evidence3','assets/uploads/files/phd');
     //  $crud->change_field_type('Department', 'disabled');
     $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function exam()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('exam');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Exams Passed By Staff (NET/SET) </h3>';    
        $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Exam Passed (NET/SET)</b></h2></html>";
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        $crud->unset_fields('Status');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        
       $crud->required_fields('Staff_ID','Staff_Name','Exam_Passed','Year','Evidence');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/exam');
       $crud->set_field_upload('Evidence2','assets/uploads/files/exam');
       $crud->set_field_upload('Evidence3','assets/uploads/files/exam');
     //  $crud->change_field_type('Department', 'disabled');
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function study()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('study');
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Board of Studies </b></h2></html>";
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br> Board of Studies Attended by faculty </h3>';    
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        $crud->unset_edit();
        $crud->unset_delete();
        
        $crud->unset_add();
        $crud->unset_read();
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        
       $crud->required_fields('Staff_ID','Date','From_Date','To_Date','Title','Department_Name','UG_or_PG','Place','Evidence','Staff_Name');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/study');
       $crud->set_field_upload('Evidence2','assets/uploads/files/study');
       $crud->set_field_upload('Evidence3','assets/uploads/files/study');
     //  $crud->change_field_type('Department', 'disabled');
     $state=$crud->getState();
     if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}   
     $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function board()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('study2');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Board of Studies </b></h2></html>";
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Board of Studies  </h3>';    
        $this->load->view('admin_nav',$result);
        $this->load->view('deptrpt1');
        $crud->unset_fields('To_Date');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        //$crud->where('Department',$Department);
       $crud->required_fields('Staff_ID','Date','From_Date','External_Examiner','Industrial_Specialist','Student_Nomine','Title','Department_Name','UG_or_PG','Place','Evidence','Staff_Name');
       $crud->display_as('From_Date','Date');
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/study');
       $crud->set_field_upload('Evidence2','assets/uploads/files/study');
       $crud->set_field_upload('Evidence3','assets/uploads/files/study');
     //  $crud->change_field_type('Department', 'disabled');
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function special()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('special');
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->set_rules('Joining_Year','Joining_Year','callback_check_year1[Joining_Year]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Special Programs </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $this->load->view('facultyachieve');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Non-Major Elective');
        
       
       $crud->display_as('Evidence','Circular/Evidence');
       $crud->display_as('Evidence2','Circular/Evidence');
       $crud->display_as('Evidence3','Circular/Evidence');
       $crud->set_field_upload('Evidence','assets/uploads/files/special');
       $crud->set_field_upload('Evidence2','assets/uploads/files/special');
       $crud->set_field_upload('Evidence3','assets/uploads/files/special');
     //  $crud->change_field_type('Department', 'disabled');
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function assosiate()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('association');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Association Meeting </b></h2></html>";
        $this->load->view('admin_nav',$result);
        //$crud->set_theme('datatables');
        $crud->set_subject('Association Meetings');
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        
       // $crud->where('Event_Type','Special Program');
       // $crud->unset_print();
        //$crud->unset_export();
       $crud->fields('Department','Event','Date','Strength','Staff_Incharge','Winner','Runner','Evidence1','Evidence2','Evidence3');
       $crud->required_fields('Department','Event','Year','Date','Staff_Incharge','Evidence1');
       $crud->columns('Department','Event','Date','Strength','Staff_Incharge','Winner','Runner','Evidence1','Evidence2','Evidence3');
        $crud->display_as('Strength',"Participants Count");
        $crud->display_as('Year',"Acadamic Year");
        $crud->display_as('Evidence1','Circular/Evidence');
        $crud->display_as('Evidence2','Circular/Evidence');
        $crud->display_as('Evidence3','Circular/Evidence');
        $crud->set_field_upload('Evidence1','assets/uploads/files/Assosiation');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Assosiation');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Assosiation');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Assosiation Meetings</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence1','Evidence2','Evidence3','Status');}
        $this->load->view('deptrpt1');
        $output=$crud->render();
         
        $this->load->view('table',$output);  
    }
    public function change_pass1()
    {
        $msg='';
        
        if($this->input->post('change_pass1'))
        {
            //print_r('wkeekkk');
            $Password=$this->input->post('Password');
            $New_Password=$this->input->post('New_Password');
            $Staff_ID=$this->session->userdata('Staff_ID');
        $Department=$this->selection_model->disp1($Staff_ID);
                //$this->select_model->change_pass1($Password,$New_Password);
                $data= $Department;
                //$Department=
                // else{
                //     $msg ="Invalid request";
                // }
        
            }
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result=$this->selection_model->disp1($Staff_ID);
            $Department1=$this->session->userdata('Department');
        
        if($Department1=='')
        redirect('select_ctrl/header');
        else{
        $result['msg']='<center><h3>Class and the students are added Successfully<h3><center>';
        //echo($Password.' '.$New_Password.' '.$keys);
        $this->selection_model->change_pass1($Password,$New_Password,$Department1);
        $Staff_ID=$this->session->userdata('Staff_ID');
      $res['data']=$this->selection_model->disp1($Staff_ID);
        $this->load->view('admin_nav',$res);
        $this->load->view('class',$result);   
        }
    }
public function training(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    $result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
    $crud=new Grocery_CRUD_MultiSearch();
    $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
    //$crud->set_theme('datatables');
    //$crud->set_subject('Paper Publication');
    $crud->set_table('student_info');
    //
    $crud->set_rules('Date','Date','callback_check_dates1[Date]');
    $crud->set_rules('year','year','callback_check_year[year]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
    if($Department=='')
    redirect('select_ctrl/header');
    $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
    $crud->field_type("Event_Type",'dropdown',array('Internship Training Program'=>'Internship Training Program','Training Program'=>'Training Program'));
    $crud->where("(Event_Type='Training Program' or Event_Type='Internship Training Program') ");
    //$crud->unset_print();
    $result['data']=$this->selection_model->disp1($Staff_ID);
    
    $result['title']="<html><h2><center>Internship/Training Programs</b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/internship');
$crud->set_field_upload('Evidence3','assets/uploads/files/internship');
   // $crud->where('Event_Name','Paper Published');
   $crud->fields('Student_ID','Student_Name','Class','Department','Date','To_Date','time','Event_Type','Title_of_Event','Organizer','year','Certificate','Evidence2','Evidence3');
   $crud->required_fields('Student_ID','Student_Name','Class','Department','Date','time','Event_Type','Title_of_Event','Organizer','year','Certificate'); 
   $crud->columns('Student_ID','Student_Name','Class','Department','Date','To_Date','time','Event_Type','Title_of_Event','Organizer','year','Certificate','Evidence2','Evidence3');
    $crud->set_read_fields('Student_ID','Student_Name','Class','Department','Date','To_Date','time','Event_Type','Title_of_Event','Organizer','year','Certificate','Evidence2','Evidence3');
    $crud->display_as('Organizer','Venue');
    //$crud->unset_print();
    //$crud->unset_export();    
    $crud->set_field_upload('Certificate','assets/uploads/files/internship');
    $state=$crud->getState();
    $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Internship/Trainning Programs</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        
    $output=$crud->render();
//    $this->load->view('facultyachieve');
   $this->load->view('studrpt1');
    $this->load->view('table',$output);
}
    public function add_class()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Add a Class</b></h2></html>";
    $this->load->view('admin_nav',$result);
    $this->load->view('class',$result);    
    }

public function paper_publication()
    {
    	$Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $crud->set_subject('Paper Publication');
        $crud->set_table('paper_publication');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Paper Published by Staff </b></h2></html>";
$this->load->view('admin_nav',$result);
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
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
	}

	public function guest_lecture()
    {
    	 			
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('guest_lecture');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
       $state=$crud->getState();
       $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');
    }
       $crud->field_type('Status','hidden','');
       $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Guest Lectures Delivered by Staff </h3>';    
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Department','Date','Staff_ID','Staff_Name','Certificate','Title','Place');        
        $result['title']="<html><h2><center><b>Guest Lectures Delivered </b></h2></html>";
$this->load->view('admin_nav',$result);
        //$crud->where('Event_Name','Guest Lecture Delivered');
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->set_subject('Guest Lecture');
        //$crud->columns('Staff_Name','Title','Place','Date','Certificate');
        $crud->unset_fields('Status');
        //$crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Date','Venue','Certificate','Photo');
        $crud->display_as('Evidence2','Certificate/Circular/Evidence');
        $crud->set_field_upload('Certificate','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Guestlecture');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Guestlecture');
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
	}

    public function seminar()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->callback_after_insert(array($this, 'log_user_after_insert1'));
       // 
      //  $crud->where('Event_Name','Paper Presented');
      //if (isset($_SESSION['post'])) print_r($_SESSION['post']);
        $crud->set_subject('Seminar/Conference');
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Seminars/Conferences Attended by Staff </h3>';     
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
      // $crud->where('Status','Approved');
       // $crud->unset_print();
       $crud->where('(Event="Seminar" or Event="Conference") ');
       $crud->set_rules('From_Date','From_Date','callback_check_dates1[From_Date]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        //$crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Status','hidden','');
        $result['title']="<html><h2><center><b> Seminars/Conferences Attended By Staff</b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
$crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
$crud->field_type('Best_Paper_Award','dropdown',array('yes'=>'yes','no'=>'no'));
$crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
$crud->field_type('Event','dropdown',array('Seminar'=>'Seminar','Conference'=>'Conference','others'=>'others'));
       $crud->columns('Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Title_of_Paper','Place','Certificate','Evidence2','Evidence3');
       $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Title_of_Paper','Place');
        }
       $crud->fields('Staff_ID','Status','Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Place','Presented','Title_of_Paper','Page_No','ISSN','Best_Paper_Award','Certificate','Evidence2','Evidence3');
       $crud->required_fields('Staff_ID','Staff_Name','Department','Level','Event','Title_of_Program','Presented','Best_Paper_Award','Place','From_Date','Certificate');
       $crud->display_as('Title_of_Paper','Title of the Paper (if presented)') ;
       $crud->display_as('ISSN','ISSN/ISBN No.');
       $crud->display_as('Best_Paper_Award','Secure Best Paper Award..?');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }
    public function workshop()
    {
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('seminar_or_workshop');
        //$crud->callback_after_insert(array($this, 'log_user_after_insert1'));
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_subject('workshop');
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Workshops Attended By Staff </h3>';     
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
       // $crud->unset_print();
       $crud->where('Event','Workshop');
       $crud->set_rules('From_Date','From_Date','callback_check_dates1[From_Date]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        //$crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->field_type('Status','hidden','');
        $result['title']="<html><h2><center><b> workshops Attended By Staff </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/seminar');
$crud->set_field_upload('Evidence3','assets/uploads/files/seminar');
//$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
//$crud->field_type('Best_Paper_Award','dropdown',array('yes'=>'yes','no'=>'no'));
$crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
$crud->field_type('Event','hidden','Workshop');
$crud->columns('Staff_ID','Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Place','Certificate','Evidence2','Evidence3');
       $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Staff_ID','Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Place');
        }
       $crud->fields('Staff_ID','Status','Staff_Name','Department','From_Date','To_Date','Level','Event','Title_of_Program','Place','Certificate','Evidence2','Evidence3');
       $crud->required_fields('Staff_ID','Staff_Name','Department','Level','Event','Title_of_Program','Presented','Best_Paper_Award','Place','From_Date','Certificate');
       $crud->display_as('Title_of_Paper','Title of the Paper (if presented)') ;
       //$crud->set_theme('datatables');
       $crud->display_as('Best_Paper_Award','Secure Best Paper Award..?');
        $crud->set_field_upload('Certificate','assets/uploads/files/Seminar');
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }
    function log_user_after_insert1($post_array,$primary_key)
    {
         if($post_array['Best_Paper_Award']=='yes')
       { $user_logs_insert = array(
            "Staff_ID" => ($post_array['Staff_ID']),
            "Staff_Name"=>($post_array['Staff_Name']),
            "Department"=>($post_array['Department']),
            "Awarding_Agency"=>($post_array['Place']),
            //'Date'=>date_format(new DateTime($post_array['From_Date']),'d/m/Y'),
            "Date"=>date('d/m/Y',strtotime($post_array['From_Date'])),
            
            "Nature_of_Award"=>"Best Paper Award"
            
            //"Department" => $post_array,
            // "last_update" => date('Y-m-d H:i:s')
        );
        $_SESSION['post']=$user_logs_insert;
        $this->db->insert('awards',$user_logs_insert);
    }
        return true;
    }
     public function Awards()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
          $result['data']=$this->selection_model->disp1($Staff_ID);
          $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
          $crud->where('Status','Approved');
          $crud->field_type('Status','hidden','');
    $result['title']="<html><h2><center> <b> Awards Received </b></h2></html>";
$this->load->view('admin_nav',$result);
        $Department=$this->session->userdata('Department');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $crud->set_table('awards');
        
      //  $crud->unset_print();
        //$crud->unset_export();
        $crud->required_fields('Staff_ID','Staff_Name','Nature_of_Award','Awarding_Agency','Date','Certificate','Department');
        //$crud->unset_columns("Department");
        //$crud->columns('Staff_Name','Nature_of_Award','Awarding_Agency','Date','Certificate','Evidence2','Evidence3');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        //$crud->display_as('Title','Title of Paper');
        //$crud->display_as('Staff_ID','Name of Staff member');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Awards');
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br> Awards Received by Staff </h3>';    
          $state=$crud->getState();
         if ($state == 'export' || $state == 'print') {
          $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $crud->set_field_upload('Evidence2','assets/uploads/files/Awards');
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }
    public function Award()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
          $result['data']=$this->selection_model->disp1($Staff_ID);
          $crud->set_rules('Date','Date','callback_check_dates[Date]');
          //$crud->where('Status','Approved');
          $crud->field_type('Status','hidden','');
          $result['title']="<html><h2><center>Faculty Achievements - <b> Best Paper Awards </b></h2></html>";
$this->load->view('admin_nav',$result);
        $Department=$this->session->userdata('Department');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $crud->set_table('awards');
        
      //  $crud->unset_print();
        //$crud->unset_export();
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
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }

     public function mlm()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('audio_book');
        $crud->field_type('Status','hidden','');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
       $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
       $crud->unset_edit();
       $crud->unset_delete();
       $crud->unset_add();
       $crud->unset_read();
        
       // $crud->where('Event_Name','E-Contents Prepared');
        //$crud->unset_print();
        //$crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> E-Contents Prepared </b></h2></html>";
$this->load->view('admin_nav',$result); 
    // $crud->field_type('Department','hidden',$Department);
     //$crud->field_type('Staff_ID','hidden',$Staff_ID);
     $crud->required_fields('Staff_ID','Staff_Name','Title_of_Program','Organising_Agency','Date','Type','Certificate','Department');
     $crud->field_type('Type','dropdown',array('MLM'=>'MLM','Audio'=>'Audio','Video'=>'Video','Mobile App'=>'Mobile App'));
     //$crud->field_type('Staff_Name','hidden',$Staff_Name);
     $crud->set_field_upload('Certificate','assets/uploads/files/Audio_book');
    $crud->set_field_upload('Evidence3','assets/uploads/files/Audio_book');
    $crud->set_field_upload('Evidence2','assets/uploads/files/Audio_book');
    $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>E-Contents Prepared</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
    $output=$crud->render();
    $this->load->view('deptrpt1');
    $this->load->view('showtable',$output);
    }
    public function grant_applied()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('grant_applied');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        
        $crud->columns('Department','Event_Name','Title','Fund_expected','Agency','Date');
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br> Project Pro Applied (Grant)</h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->required_fields('Date','Event_Name','Title','Fund_expected','Agency','Evidence');
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
           $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
$result['title']="<html><h2><center><b>Project Pro Applied - Grant Applied</b></h2></html>";
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('deptrpt1');
        
        $this->load->view('showtable',$output);
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
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        
        $crud->field_type('Department','hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center><br> </center><br><br>First Graduate</h3>';     
        $crud->columns('Department','Class','Year','First_Graduate_Boys_Strength','First_Graduate_Girls_Strength','Total');
        $crud->required_fields('Class','Year','First_Graduate_Boys_Strength','First_Graduate_Girls_Strength');
       // $crud->fields('Department','Class','year','Boys_Strength','Girls_Strength','Boys_dropout','Girls_dropout');
       $crud->callback_column('Total',array($this,'strn'));
        $output=$crud->render();
        
        $result['data']=$this->selection_model->disp1($Staff_ID);
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_delete();
        // $crud->unset_read();
        $result['title']="<html><h2><center><b> First Graduate </b></h2></html>";
 $this->load->view('admin_nav',$result);
        
        $this->load->view('deptrpt1');
        $this->load->view('table',$output);

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
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_subject('Overall Results');
        
        //$crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $crud->columns('Department','Name_of_course','Final_pass_percentage','Year');
        $crud->required_fields('Name_of_course','Final_pass_percentage','Year');
        $crud->field_type('Department','hidden',$Department);
        $output=$crud->render();
        $_SESSION['CustomTitle']='<br><h3> <center><br> </center><br><br>Overall Results</h3>';     
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $result['title']="<html><h2><center><b> Overall Results </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('deptrpt1');
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
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_subject('Student dropout');
        
        $crud->field_type('Department','hidden',$Department);
        $_SESSION['CustomTitle']='<br><h3> <center><br> </center><br><br>Student Dropouts</h3>';     
        $crud->columns('Department','Class','year','Boys_Strength','Girls_Strength','Total Strength','Boys_dropout','Girls_dropout','Total dropout','Boys_Dropout_Percentage','Girls_Dropout_Percentage','Total_Dropout_Percentage');
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
        $result['title']="<html><h2><center> <b> Student Dropout </b></h2></html>";
 $this->load->view('admin_nav',$result);
        
        $this->load->view('deptrpt1');
        $this->load->view('table',$output);

    }
    public function strn($val,$row)
    {
        return($row->First_Graduate_Boys_Strength+$row->First_Graduate_Girls_Strength);
    }
    public function Project_pro()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('project_pro');
        $Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $result['title']="<html><h2><center><b>Project Pro Applied - Student Project </b></h2></html>";
    $this->load->view('admin_nav',$result);
    $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
    $crud->set_field_upload('Evidence','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br>Project Applied (student project) </h3>';
        
        // $crud->columns('Date','Event_Name','Title','Fund_expected','Agency');
        $crud->required_fields('Title_of_Project','Student_Name','Staff_Name','Date','Agency','Amount','Evidence');
        $state=$crud->getState();
        // $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>E-Contents Prepared</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
$output=$crud->render();
        $this->load->view('deptrpt1');
        
        $this->load->view('showtable',$output);
    }
    public function work()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('work');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Year','Year','callback_check_year[Year]');
        //  $crud->unset_read();
        
        //$crud->where('Event','Overall shield');
        $crud->columns('Staff_ID','Staff_Name','Department','Year','UG_Gain','UG_Loss','[UG] (+) or (-) ','PG_Gain','PG_Loss','[PG] (+) or (-) ');
        $crud->fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss','Year');
        $crud->set_read_fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss');
        $crud->required_fields('Department','Staff_ID','Staff_Name','UG_Gain','UG_Loss','PG_Gain','PG_Loss','Year');
       // $crud->display_as('POMU','[UG] (+) or (-) ');
        //$crud->display_as('POMP','[PG] (+) or (-) ');
        $crud->field_type('Department','hidden',$Department);
        $crud->callback_column('[UG] (+) or (-) ',array($this,'add'));
        $crud->callback_column('[PG] (+) or (-) ',array($this,'add1'));
        //$crud->unset_add();
        //$crud->unset_edit();
        //$crud->unset_delete();
        //$crud->unset_read();
        $_SESSION['CustomTitle']='<br><h3> <center><br> </center><br><br>Work Adjustment</h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Work Adjustment </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('deptrpt1');
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
    public function remed()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('remedial');
        $crud->set_rules('Date','Date','callback_check_dates1[Date]');
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        //$crud->where('Event','Faculty Development Programme');
        $_SESSION['CustomTitle']='<br><h3> <center></center><br><br>Remedial Class </h3>';
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
       $crud->required_fields('Staff_ID','Staff_Name','Department','Class','Title','Category');
        // $crud->unset_add();
        $result['title']= "<html><h2><center><b>Remedial Class</b></h2></html>";
        $crud->unset_columns('Certificate','Evidence2','Evidence3');
$output=$crud->render();
$Staff_ID=$this->session->userdata('Staff_ID');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
        $this->load->view('deptrpt1');
        
        $this->load->view('showtable',$output);
    }
    public function FDP()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
          $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('fdp');
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->field_type('Status','hidden','');
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');
        }
        //$crud->where('Event_Name','FDP');
        $crud->set_rules('From_Date','From_Date','callback_check_dates1[From_Date]');
        $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        //$crud->set_rules('Date','Date','callback_check_dates[Date]');
       $crud->field_type('Level','dropdown',array('Internal'=>"Internal",'External'=>"External"));
        //$crud->where('Status','Approved');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $crud->required_fields('From_Date','Staff_ID','Staff_Name','Title_of_Program','Organizing_Agency','Speaker','Place','Certificate');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Faculty Development Programs </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/FDP');
$crud->set_field_upload('Evidence3','assets/uploads/files/FDP');
        $crud->set_subject('FDP');
        $crud->set_field_upload('Certificate','assets/uploads/files/FDP');
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br>Faculty Development Programs Attended by Staff</h3>';     

       // $crud->set_field_upload('Photo','assets/uploads/files/FDP');
       //$crud->columns('Staff_Name','Title_of_Program','Organizing_Agency','Place','Date','Certificate');
       // $crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Organizing_Agency','Venue','Date','Certificate','Photo');
        //$crud->unset_print();
        //$crud->unset_export();
        //$crud->set_theme('datatables');
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }

    function Consultancy(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->field_type('Status','hidden','');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
        $result['title']="<html><h2><center><b> Consultancy Service </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->required_fields('Date','Name_of_The_Staff','Date','Name_of_Project','Name_of_Agency','Agency_Address','Amount_generated','Year','Receipt','Department');
        $crud->set_table('consultancy_service');
        $crud->set_subject('Consultancy Service');
       // $crud->unset_print();
      //  $crud->unset_export();
        $crud->display_as('Receipt','Receipt/Evidence');
        
       // $crud->where('Event_Name','Consultancy Service');
        //$crud->fields('Staff_ID','Staff_Name','Department','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        //$crud->columns('Staff_Name','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        //$crud->columns('Staff_Name','Name_of_Project','Consulting_Agency','Amount_generated','Certificate');
        $crud->set_field_upload('Receipt','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence2','assets/uploads/files/consultancy');
        $crud->set_field_upload('Evidence3','assets/uploads/files/consultancy');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Consultancy</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Receipt','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('deptrpt1');
       
        $this->load->view('table',$output);
    }

function Cluster(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
       $crud->field_type('Status','hidden',"");
       $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_table('cluster_meeting');
        $crud->display_as('Staff_Name','Staff/Speaker Name');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Staff_ID','Organized_by','Date','Staff_Name','Title','Certificate','Department');
        $result['title']="<html><h2><center> <b> Cluster Meetings (Cluser of Depatments) </b></h2></html>";
$this->load->view('admin_nav',$result);
        
        //$crud->columns('Staff_Name','Title_of_Program','Venue','Date','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Venue','Date','Certificate');
        $crud->set_subject('Cluster Meeting');
      //  $crud->unset_print();
        //$crud->unset_export();
        
       // $crud->where('Event_Name','Cluster Meeting');
        $crud->display_as('Certificate','Circular');
        $crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Clustermeet');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Cluster Meetings (Cluster of Departments)</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('deptrpt1');
       
        $this->load->view('table',$output);
    }
    function Cluster1(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
       $crud->field_type('Status','hidden',"");
       $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_table('cluster');
        $crud->display_as('Staff_Name','Staff/Speaker Name');
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Staff_ID','Organized_by','Date','Staff_Name','Title','Certificate','Department');
        $result['title']="<html><h2><center> <b> Cluster Meetings (Cluster of Colleges) </b></h2></html>";
$this->load->view('admin_nav',$result);
        
        //$crud->columns('Staff_Name','Title_of_Program','Venue','Date','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Event_Name','Title_of_Program','Venue','Date','Certificate');
        $crud->set_subject('Cluster Meeting');
      //  $crud->unset_print();
        //$crud->unset_export();
        
       // $crud->where('Event_Name','Cluster Meeting');
        $crud->display_as('Certificate','Circular');
        $crud->set_field_upload('Certificate','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Clustermeet');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Clustermeet');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Cluster Meetings (Cluster of Colleges)</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('deptrpt1');
       
        $this->load->view('table',$output);
    }
        
     public   function research(){
        $crud=new Grocery_CRUD_MultiSearch();
        //$crud->set_theme('datatables');
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('research');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->field_type('Status','hidden','');
         $crud->set_subject('Research Guidance');
         $crud->set_rules('Year','Year','callback_check_year1[Year]');
        // $crud->unset_print();
        $_SESSION['CustomTitle']='<br><h3> <center>  </center><br><br>Staff - Research Guidance</h3>';     
        //$crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
        // $crud->unset_export();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
       // $crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center><b> Research Guidance  </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/Research');
$crud->set_field_upload('Evidence3','assets/uploads/files/Research');
$crud->required_fields('Staff_ID','Staff_Name','Guidance','Department','Under_Guidance','Year','Certificate');
        //$crud->where('Event_Name','Research Guidance');
        
        $crud->columns('Staff_Name','Department','Guidance','Year','Completed','Under_Guidance','Certificate');
        //$crud->fields('Staff_ID','Staff_Name','Department','Guidance','Completed','Under_guidance','Certificate');
        $crud->set_field_upload('Certificate','assets/uploads/files/Research');
        $state=$crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('facultyachieve');
       
        $this->load->view('table',$output);
    }
    public function check_year($dt)
    {
      
      $dt1=explode('-',$dt);
      $this->form_validation->set_message('check_year','Invalid year format, The year format should be like this 2017-2018,...!');
      if($dt=='')
      return FALSE;
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
   
 public function extension()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('extension_activity');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
       // $crud->set_theme('datatables');
         $crud->set_subject('Extension Activity');
         $crud->set_rules('Date','Date','callback_check_dates[Date]');
      //  $crud->unset_print();
      if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Extension Activities </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/ExtensionAct');
        $crud->set_field_upload('Evidence3','assets/uploads/files/ExtensionAct');
        
        //$crud->unset_export();
		$crud->columns('Nature_of_Activity','Source_of_Fund','Venue','Date','No_of_Students','No_of_Faculty','Objective','Impact','Target_Group','Amount_Spent','Description','certificate','Evidence2','Evidence3');
        $crud->fields('Department','Nature_of_Activity','Source_of_Fund','Venue','Date','No_of_Students','No_of_Faculty','Target_Group','Objective','Impact','No_of_Participants','Amount_Spent','Description','certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Nature_of_Activity','Department','Venue','Date','Source_of_Fund','certificate');
        
        $crud->set_field_upload('certificate','assets/uploads/files/ExtensionAct');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Extension Activities</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('deptrpt1');
        $this->load->view('table',$output);
    } 
    public function shield()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
        
        $crud->where('Event','Overall shield');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        //$crud->set_rules('Year','Year','callback_check_year1[Year]');
        $crud->display_as('Details','Other Details');
        $crud->columns('Date','Department','Industry','Title_of_Event','Details','Certificate','Evidence2','Evidence3');
        $crud->fields('Date','Department','Title_of_Event','Industry','Event','Details','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Date','Department','Industry','Event','Title_of_Event','Details','Certificate');
        $crud->set_read_fields('Date','Department','Industry','Event','Certificate','Evidence2','Evidence3');
        $crud->display_as('Industry','Institute');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $crud->field_type('Event','hidden','Overall shield');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Overall Shields </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/overall');
        $crud->set_field_upload('Evidence3','assets/uploads/files/overall');
        $crud->set_field_upload('Certificate','assets/uploads/files/overall');
        $this->load->view('deptrpt1');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Overall Shields</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        
        $this->load->view('table',$output);
    }
    public function inter_clge()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_info');
        
        $crud->where('Event_Type','Overall shield');
        $crud->columns('Date','Department','Institute_Industry_Address','Certificate','Evidence2','Evidence3');
		$crud->fields('Date','Department','Institute_Industry_Address','Certificate','Evidence2','Evidence3');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Conducted Inter College Meets </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/overall');
        $crud->set_field_upload('Evidence3','assets/uploads/files/overall');
        $crud->set_field_upload('Certificate','assets/uploads/files/overall');
        $output=$crud->render();
        
        $this->load->view('table',$output);
    }
    public function field_visit()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');


        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Field Visit </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidance2','assets/uploads/files/field_visit');
        $crud->set_field_upload('Evidance3','assets/uploads/files/field_visit');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
        $crud->set_table('field_visit');
        $crud->required_fields('Date','Staff_Incharge','Institude_Address','Class','Certificate','Department');
        $crud->set_subject('Field Visit');
        
		$crud->display_as('Institude_Address','Detail of Industry');
		$crud->columns('Date','Class','Department','Institude_Address','No_of_Students','Certificate','Evidance2','Evidance3');
        //$crud->unset_print();
        //$crud->unset_export();
        $crud->display_as('Evidance2','Evidence2');
        $crud->display_as('Evidance3','Evidence3');
        $crud->set_field_upload('Certificate','assets/uploads/files/field_visit');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Field Visit</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidance2','Evidance3','Status');}
        $output=$crud->render();
 $this->load->view('deptrpt1');
        $this->load->view('table',$output);
}

public function MoU_signed()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_rules('Date','Date','callback_check_dates[From_Date]');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
    //$crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
    
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b>MoU Signed</b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/MoU');
        $crud->set_field_upload('Evidence3','assets/uploads/files/MoU');
        
        $crud->set_table('mou_signed');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/MoU');
        $crud->set_subject('MoU_signed');
		$crud->columns('Department','Date','Institute_Company','Purpose','Duration','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Date','Institute_Company','Purpose','Duration','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Date','Institute_Company','Purpose','Duration','Certificate');
        
      //  $crud->unset_print();
        //$crud->unset_export();
        $this->load->view('deptrpt1');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>MoU Signed</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        
        $this->load->view('table',$output);
    }

    public function alumni()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('alumni_interaction');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Alumni Interaction </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/Alumni');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Alumni');
        
        //$crud->where('Event_Type','Alumni Interaction');
        //$crud->set_theme('datatables');
        $crud->set_subject('Alumni Interaction');
        
        $crud->set_field_upload('Certificate','assets/uploads/files/Alumni');
        $crud->columns('Department','Date','Detail_of_Alumni','Type_of_Program','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Date','Detail_of_Alumni','Type_of_Program','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Date','Detail_of_Alumni','Type_of_Program','Certificate');
        $crud->display_as('Certificate','Photo/Circular');

      //  $crud->unset_print();
        //$crud->unset_export();
        $this->load->view('deptrpt1');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Alumni Intraction</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        
        $this->load->view('table',$output);
    }


public function specialprg()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_rules('Date','Date','callback_check_dates1[Date]');
        $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->set_rules('Year','Year','callback_check_year1[Year]');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Special Program </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/SpecialPrg');
        $crud->set_field_upload('Evidence3','assets/uploads/files/SpecialPrg');
        $crud->set_table('special_program');
        //$crud->set_theme('datatables');
        $crud->set_subject('SpecialProgram');
        
       // $crud->where('Event_Type','Special Program');
       // $crud->unset_print();
        //$crud->unset_export();
       $crud->fields('Department','Date','To_Date','Type_of_Program','Title_of_Course','Duration','Strength','Incharge_Faculty','Amount','Certificate','Evidence2','Evidence3');
       $crud->required_fields('Department','Year','Date','Type_of_Program','Title_of_Course','Duration','Incharge_Faculty','Certificate');
       $crud->columns('Department','Date','Type_of_Program','Title_of_Course','Duration','Strength','Incharge_Faculty','Certificate','Evidence2','Evidence3');
        
        $crud->display_as('Certificate','Circular/Evidence');
        $crud->set_field_upload('Certificate','assets/uploads/files/SpecialPrg');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Special Programs</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('deptrpt1');
        $this->load->view('table',$output);
    }

    public function Dept()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('department_activity');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->field_type('Event','dropdown',array('Seminar'=>'Seminar','Workshop'=>'Workshop','FDP'=>'FDP','Guest Lecture'=>'Guest Lecture','Inter - Collegiate Meet'=>'Inter - Collegiate Meet','others'=>'others'));
        //$crud->set_theme('datatables');
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates1[Date]');
    $crud->set_rules('To_Date','To_Date','callback_check_dates2[To_Date]');
        $crud->where('Event!="Overall shield"');
        if($Department=='')
        redirect('select_ctrl/header');
        
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> <b> Department Organized Events </b></h2></html>";
        $this->load->view('admin_nav',$result);
        $crud->set_field_upload('Evidence2','assets/uploads/files/Department');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Department');
        
        //$crud->set_subject('Department Activity');
        
       // $crud->unset_print();
        //$crud->unset_export();
        $crud->columns('Department','Date','To_Date','Level','Event','Nature_of_program','Source_of_Funding','Amount','Name_of_Speaker','Certificate','Evidence2','Evidence3');
        $crud->fields('Department','Date','To_Date','Level','Event','Nature_of_program','Source_of_Funding','Amount','Name_of_Speaker','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Date','Level','Event','Nature_of_program','Source_of_Funding','Amount','Certificate');
        $crud->set_read_fields('Department','Date','To_Date','Level','Event','Nature_of_program','Source_of_Funding','Amount','Name_of_Speaker','Certificate','Evidence2','Evidence3');
        $crud->display_as('Certificate','Circular');
        $crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $this->load->view('deptrpt1');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Department Organized Events</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence1','Evidence2','Certificate','Status');}
        $output=$crud->render();
         
        $this->load->view('table',$output);
    }
    public function check_dates1($dt)
    {
        $this->form_validation->set_message('check_dates1','You are entering the invalid Date please check it,...!'.$time1);
        if($dt=='')return False;
        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        
        $time1 = strtotime($dt2);
        $this->From=$time1;
        $time2 = strtotime($dat2);
        if($time1<=$time2)
        return true;
        // $diff=date_diff($dt2,$dat2);
        
      return true;
    } public function check_dates2($dt)
    {
        $this->form_validation->set_message('check_dates2','Invalid Periods,...!');
        if($dt=='')return True;
        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        $time1 = strtotime($dt2);
        $time2 = strtotime($dat2);
        if( $time1>$this->From)
        return True;
        // $diff=date_diff($dt2,$dat2);
        $this->form_validation->set_message('check_dates2','Invalid Periods,...!');
      return false;
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
        $result['title']="<html><h2><center><b> Research Project </b> </h2></html>";
  $this->load->view('admin_nav',$result);
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
     //   $crud->where('Department',$Department);
        $crud->columns('Staff_Name','Department','Duration_of_project','Name_of_Project','Amount_fund_received','Name_of_fundingagency','Year_of_sanction','Certificate','Evidence2','Evidence3');
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br>Research Project Received</h3>';     
        $state=$crud->getState();
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}
        $output=$crud->render();
        $this->load->view('facultyachieve');
         
        $this->load->view('showtable',$output);
    }
    public function book()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
        $crud->set_table('book');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->field_type('Status','hidden','');
        $crud->set_rules('Year_of_publishing','Year_of_publishing','callback_check_year1[Year_of_publishing]');
        //$crud->set_theme('datatables');
        //$crud->set_subject('Department Activity');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        
       
        $crud->fields('Staff_ID','Staff_Name','Date','Status','Title_of_book','Type','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3',"Department");
        $crud->columns('Staff_ID','Staff_Name','Department','Date','Title_of_book','Type','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3',"Status");
        $crud->set_read_fields('Title_of_book','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Title_of_book','Date','Issn_isbn_for_proceeding','Year_of_publishing','Certificate','Staff_ID','Staff_Name','Department');
        ///$crud->where('Nature_of_Award','Best Paper Award');
        $crud->display_as('Issn_isbn_for_proceeding','ISBN');
        //$Staff_Name=$dat->Staff_Name;
        $crud->where('Type','book');
        $state = $crud->getState();
        if ($state == 'export' || $state == 'print') {
            $crud->columns('Staff_ID','Staff_Name','Department','Date','Title_of_book','Type','Issn_isbn_for_proceeding','Year_of_publishing');
        }
        $crud->field_type('Type','hidden','book');
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br>Books Published by Staff</h3>';     
        $result2['title']="<html><h2><center> <b> Books Published </b></h2></html>";
$this->load->view('admin_nav',$result);
        //$crud->unset_export();
        $crud->set_field_upload('Certificate','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence3','assets/uploads/files/Book');
        $crud->set_field_upload('Evidence2','assets/uploads/files/Book');
        $output=$crud->render();
                $this->load->view('facultyachieve',$result2);
         
        $this->load->view('table',$output);
    }
    public function proceeding()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
    //$result=$this->selection_model->disp1($Staff_ID);
    $Department=$this->session->userdata('Department');
      // $Staff_ID=$this->session->userdata('Staff_ID');
       $result['data']=$this->selection_model->disp1($Staff_ID);
        
       $result['title']="<html><h2><center>Faculty Achievements - <b> Proceedings </b></h2></html>";
$this->load->view('admin_nav',$result); 
    $crud=new grocery_CRUD_MultiSearch();
    //$crud->field_type('Nature_of_Award','hidden','Best Paper Award');
    //$dat=$res[0];
    $crud->set_rules('Year','Year','callback_check_year1[Year]');
    $crud->set_rules('Date','Date','callback_check_dates[Date]');
       //$crud->where('Status','Approved');
    $crud->field_type('Type','hidden',"Proceeding");
    $crud->field_type('Status','hidden','');
    $crud->where('Type','Proceeding');
    $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
    $crud->fields('Staff_ID','Staff_Name','Status','Title_of_book','Level','Type','Proceeding_of_conference','Issn_isbn_for_proceeding','Date','Certificate','Evidence2','Evidence3',"Department");
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
    
    //$crud->set_theme('datatables');
   
    
    //$crud->unset_add();
        //$crud->unset_delete();
      //  $crud->unset_export();
        //$crud->unset_print();
        $this->load->view('facultyachieve');
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
        $crud->field_type('Status','hidden','');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Year_Date','Year_Date','callback_check_dates[Year_Date]');
        $_SESSION['CustomTitle']='<h3> <center> <br> </center><br><br>Papers in Journals by Staff</h3>';     
        //$crud->where('Status','Approved');
       //$crud->set_rules('Year','Year','callback_check_year1[Year]');
        $result['title']="<html><h2><center> <b> Papers in Journals bu Staffs </b></h2></html>";
$this->load->view('admin_nav',$result);
$this->load->view('facultyachieve');
$crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->fields('Staff_ID','Staff_Name','Year_Date','Status',"Department",'Name_of_Journal','Title_of_Paper','Level','ISSN_ISBN','Indexed','Page_No','Impact_Factor','Certificate','Evidence2','Evidence3');
        $crud->columns('Staff_ID','Staff_Name','Department','Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Page_No','Impact_Factor','Certificate','Evidence2','Evidence3','Status');
        $crud->set_read_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Page_No','Impact_Factor','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Staff_ID','Staff_Name',"Department",'Name_of_Journal','Year_Date','Title_of_Paper','Level','ISSN_ISBN','Indexed','Page_No','Impact_Factor','Certificate');
       $state=$crud->getState();
       //if($)
       $state = $crud->getState();
       if ($state == 'export' || $state == 'print') {
        $crud->columns('Staff_ID','Staff_Name','Department','Name_of_Journal','Year_Date','Title_of_Paper','ISSN_ISBN','Indexed','Page_No','Impact_Factor');
       }
        $crud->display_as('Year_Date','Date');
        //$dat=$res[0];
        //$Staff_Name=$dat->Staff_Name;
         $crud->field_type('Department','hidden',$Department);
         //$crud->field_type('Staff_ID','hidden',$Staff_ID);
         //$crud->field_type('Staff_Name','hidden',$Staff_Name);
        $crud->set_field_upload('Evidence3','assets/uploads/files/paper');
        $crud->set_field_upload('Evidence2','assets/uploads/files/paper');
        
        $crud->set_table('paper_publication');
        
        //$crud->set_theme('datatables');
    //    $crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();      
        $crud->set_field_upload('Certificate','assets/uploads/files/paper');
        $output=$crud->render();
        
        $this->load->view('showtable',$output);
    }
    public function check_dates($dt)
    {
        $this->form_validation->set_message('check_dates','You are entering the invalid Date please check it,...!');
        if($dt=='') return False;
        $dat=date('Y-m-d');
        $dt1=explode('/',$dt);
        $dt2=join('-',$dt1);
        $dat1=explode('/',$dat);
        $dat2=join('-',$dat1);
        $time1 = strtotime($dt2);
        $time2 = strtotime($dat2);
        //if($time1<=$time2)
        return True;
        // $diff=date_diff($dt2,$dat2);
        
      //return false;
    }
    public function check_year1($dt)
    {
        $dat=date('Y');
        $dat=(int)$dat;
      $this->form_validation->set_message('check_year1','Invalid year ...!');
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
    public function check_year2($dt)
    {
        if($dt=='') return True;
        $dat=date('Y');
        $dat=(int)$dat;
      $this->form_validation->set_message('check_year1','Invalid year ...!');
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
public function progression()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('student_progression');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        //$crud->set_theme('datatables');
        //$crud->set_subject('Department Activity');
        $crud->set_rules('Batch','Batch','callback_check_year[Batch]');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Roll_No','Student_Name','College','Course','Evidence1','Batch','Department');
        $result['title']="<html><h2><center><b>Higher Studies </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence2','assets/uploads/files/higher');
$crud->set_field_upload('Evidence3','assets/uploads/files/higher');
$crud->set_field_upload('Evidence1','assets/uploads/files/higher');
$crud->callback_column('menu_title',array($this,'_callback_webpage_url'));
//$crud->columns('Batch','Trends_of_progression','No_of_students');
      //  $crud->unset_print();
        //$crud->unset_export();
        //$crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Higher Studies</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence1','Evidence2','Evidence3');}
        $output=$crud->render();
                //$this->load->view('facultyachieve');
         $this->load->view('studrpt1');
        $this->load->view('table',$output);
    } 
    public function scholar()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud=new Grocery_CRUD_MultiSearch();
        $crud->set_table('scholar');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        //$crud->set_theme('datatables');
        //$crud->set_subject('Department Activity');
        //$crud->set_rules('Batch','Batch','callback_check_year[Batch]');
        
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->unset_print();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $crud->required_fields('Student_ID','Student_Name','Scholarship_Type','Course','Evidence','Amount','Department');
        $result['title']="<html><h2><center><b>Scholarships Received </b></h2></html>";
$this->load->view('admin_nav',$result);
$crud->set_field_upload('Evidence','assets/uploads/files/higher');
// $crud->set_field_upload('Evidence3','assets/uploads/files/higher');
// $crud->set_field_upload('Evidence1','assets/uploads/files/higher');
// $crud->callback_column('menu_title',array($this,'_callback_webpage_url'));
//$crud->columns('Batch','Trends_of_progression','No_of_students');
      //  $crud->unset_print();
        //$crud->unset_export();
        //$crud->set_field_upload('Certificate','assets/uploads/files/Department');
        $state=$crud->getState();
        $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Scholarships Received</h3>';     
        if ($state == 'export' || $state == 'print') {
         $crud->unset_columns('Evidence','Evidence2','Evidence3','Status');}
        $output=$crud->render();
                //$this->load->view('facultyachieve');
         $this->load->view('studrpt1');
        $this->load->view('table',$output);
    } 
    public function others()
    {
                    
        $crud=new grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        //$result=$this->selection_model->disp1($Student_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        //$crud->required_fields('Student_ID','Student_Name','Scholarship_Type','Course','Evidence','Amount','Department');
        $result['title']="<html><h2><center><b>Others </b></h2></html>";
$this->load->view('admin_nav',$result);
        $crud->where('Event_Type','others');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        //$crud->field_type('Student_ID','hidden',$Student_ID);
        // $sname=$this->selection_model->sname($Student_ID);
        // if(count($sname)!=0 && $sname[0]->Student_Name!=''){
        // $dat=$sname[0];
        // $Std_Name=$dat->Student_Name;
        //$crud->field_type('Student_Name','hidden',$Std_Name);}
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        $crud->set_rules('year','year','callback_check_year[year]');
            $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
            $crud->field_type('Event_Type','hidden','others');
            //$crud->field_type('Presented','dropdown',array('yes'=>'yes','no'=>'no'));
            $crud->set_field_upload('Evidence2','assets/uploads/files/conference');
            $crud->set_field_upload('Evidence3','assets/uploads/files/conference');
          //  $crud->display_as('Title_of_Paper','Title of the Paper (if Presented)');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->student($Staff_ID);
            $result['title']="<center><h3>Others</h3></center>";
            //$this->load->view('s1',$result);
            $crud->columns('Student_Name','Department','Class','Place_Prize','Title_of_program','Level','Organizer','Date','Certificate','Evidence2','Evidence3');
            $crud->fields('Department','Student_ID','Student_Name','Event_Type','Class','Date','Level','Title_of_program','Organizer','Place_Prize','Certificate','Evidence2','Evidence3');
            $crud->required_fields('Department','Student_ID','Student_Name','Class','Title_of_program','Level','Organizer','Date','Certificate');
            $crud->set_read_fields('Department','Student_ID','Student_Name','Class','Place_Prize','Title_of_program','Title_of_Paper','Level','Organizer','Date','Presented','Certificate','Evidence2','Evidence3');
            //$crud->set_theme('datatables');
            $crud->set_field_upload('Certificate','assets/uploads/files/Conference');
            $_SESSION['CustomTitle']='<br><h3> <center> </center><br><br>Others</h3>';     
          $state=$crud->getState();
            if ($state == 'export' || $state == 'print') {
             $crud->unset_columns('Certificate','Evidence2','Evidence3','Status');}    
            $output=$crud->render();
            $this->load->view('studrpt1');
               $this->load->view('table',$output);
        }

    public function _callback_webpage_url($value, $row)
{
    $this->$i=$this->$i+1;
  return 0;
}
public function AnnexureIX()
    {
                    
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('student_info');
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->set_rules('Date','Date','callback_check_dates[Date]');
        //$crud->callback_column('Student_Name',array($this,'name'));
        //$crud->where('Status','Approved');
        $crud->where('Event_Type','Journals');
        $crud->field_type('Event_Type','hidden','Journals');
        $crud->field_type('Department','hidden',$Department);
        //$crud->where('Title_of_Event','Web master');
        //$crud->unset_add();
        //$crud->unset_edit();
    
        $crud->columns('Student_ID','Student_Name','Department','Class','Title_of_program','Organizer','Date','Indexed');
        $crud->fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate','Evidence2','Evidence3');
        $crud->required_fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate');
        $crud->set_read_fields('Department','Event_Type','Student_ID','Student_Name','Class','Level','Title_of_Event','Title_of_program','Organizer','Date','Indexed','ISSN','Certificate','Evidence2','Evidence3');
        //$crud->fields('Department','Student ID','Student Name','Class','Title of program','Title of Event','Level','Organized by','Date','Year','Certificate');
        $crud->display_as('ISSN','ISSN/ISBN No. with Pg No.');
        $crud->display_as('Title_of_Event','Title of the Paper');
        $crud->display_as('Organizer','Journal Name');
        $crud->display_as('Title_of_program','Title of the Program');
        $crud->field_type('Level','dropdown',array("Internal"=>'Internal',"District"=>"District","Zonal"=>"Zonal","State"=>'State',"National"=>"National","International"=>'International'));
        $crud->display_as('Organizer','Occasion in which presented/published');
        //$crud->set_theme('datatables');
        $crud->set_field_upload('Certificate','assets/uploads/files/project');
        $crud->set_field_upload('Evidence3','assets/uploads/files/project');
        $crud->set_field_upload('Evidence2','assets/uploads/files/project');
        $_SESSION['CustomTitle']='<br><h3> <center> <br> </center><br><br>Students Publications </h3>';
        $output=$crud->render();
        $result['data']=$this->selection_model->disp1($Staff_ID);
        $result['title']="<html><h2><center> Students Publications (Papers in Journals) </b></h2></html>";
 $this->load->view('admin_nav',$result);
        $this->load->view('studrpt1');
           $this->load->view('table',$output);
    }

public function refresher_orientation()
    {
        $result['title']= "<html><h2><center><b> Refresh Orientation</b></h2></html>";
        $crud=new Grocery_CRUD_MultiSearch();
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $crud->set_table('refresh_orientation_course');
        
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $Staff_ID=$this->session->userdata('Staff_ID');
        if($Department=='')
        redirect('select_ctrl/header');
        $Departments= $this->selection_model->depts12();         foreach ($Departments as $dept )         $dep[($dept->Department)]=$dept->Department;         $crud->field_type('Department','dropdown',$dep);
        $_SESSION['CustomTitle']='<br><h3> <center>Appraisal <br> </center><br><br>Refresh/Orientation Courses </h3>';
        $result['title']= "<html><h2><center><b>Refresh/Orientation Courses</center></b></h2></html>";
        $result['data']=$this->selection_model->disp1($Staff_ID);
    $this->load->view('admin_nav',$result);
    $crud->display_as('Duration_From','Duration');
    //$crud->display_as('Duration')
    $crud->required_fields('Staff_ID','Staff_Name','Name_of_Course','Place','Duration_From','Date','Evidence')    ;
    $crud->set_field_upload('Evidence','assets/uploads/files/project');
    $crud->set_field_upload('Evidence2','assets/uploads/files/project');
    $crud->set_field_upload('Evidence3','assets/uploads/files/project');
    $crud->columns('Staff_Name','Department','Name_of_Course','Duration_From','Place');
$output=$crud->render();
        $this->load->view('facultyachieve');
    
        $this->load->view('showtable',$output);
    }
}