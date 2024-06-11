<?php
class loginsamp extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('select_model');
    $this->load->model('selection_model');
    $this->load->library('session');
    $this->load->helper('url');
  }
 
  function index(){
    if(isset($_SESSION['User_Type']))
    {       if($_SESSION['User_Type']=='Co-admin')
           redirect('pages/subadmin');
           if($_SESSION['User_Type']=='student')
           redirect('pages/student');
           if($_SESSION['User_Type']=='User')
           redirect('pages/staff');
           if($_SESSION['User_Type']=='admin')
           redirect('pages');
           if($_SESSION['User_Type']=='Subadmin')
           redirect('pages/adm');

   }
   // $data['user'] = $this->select_model->get_user();
    $this->load->view('sss');

  }
 
  function auth(){
    $Staff_ID   = $this->input->post('Staff_ID',TRUE);
    $Password = $this->input->post('Password',TRUE);
    $Department=$this->input->post('Department',TRUE);
    $validate = $this->select_model->validate($Staff_ID,$Password);
    $val = $this->selection_model->abtus();
			//$_SESSION['head']=($val[0]->detail); 
			//echo$_SESSION['head'];
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $Staff_ID  = $data['Staff_ID'];
        $User_Type = $data['User_Type'];
       $Department=$data['Department'];
        $sesdata = array(
            'Staff_ID'  => $Staff_ID,
            'User_Type'     => $User_Type,
            'Department'=>$Department,
            'logged_in' => TRUE,
            'head'=>($val[0]->detail)
        );
        $this->session->set_userdata($sesdata);

        if($User_Type === 'admin'){
            redirect('pages');
        }// access login for staff
        elseif($User_Type === 'User'){
            redirect('pages/staff');
 
        }
        elseif($User_Type === 'Subadmin'){
            redirect('pages/adm');
 
        }
        
        elseif($User_Type === 'student'){
            $Department=$this->session->userdata('Department');
            redirect('pages/students');
 
        // access login for author
        }
        elseif($User_Type === 'Co-Admin'){
            $Department=$this->session->userdata('Department');
            redirect('pages/Subadmin');
            //redirect('pages/coadmin');
 
        // access login for author
        }
        else{
            redirect('pages/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('loginsamp');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('loginsamp');
  }

 /* function admin_auth(){
    $Staff_ID   = $this->input->post('Staff_ID',TRUE);
    $Password = $this->input->post('Password',TRUE);
    $Department=$this->input->post('Department',TRUE);
    $validate = $this->select_model->validate($Staff_ID,$Password,$Department);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $Staff_ID  = $data['Staff_ID'];
        $User_Type = $data['User_Type'];
        $Department=$data['Department'];
        $sesdata = array(
            'Staff_ID'  => $Staff_ID,
            'User_Type'     => $User_Type,
            'Department'=>$Department,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);*/
 

 public function log(){
    $data['Staff_ID']=$this->select_model->get_user();
    $this->load->view('adminlogin',$data);
 }
}