<?php
class loginstud extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('select_model');
    $this->load->library('session');
    $this->load->helper('url');
  }
 
  function index(){
    $this->load->view('sss');
  }
 
  function auth(){
    $Staff_ID   = $this->input->post('Staff_ID',TRUE);
    $password = $this->input->post('password',TRUE);
    $Department=$this->input->post('Department',TRUE);
    $validate = $this->select_model->validate($Staff_ID,$password);
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
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($User_Type === 'student'){
            redirect('pages');
 
        // access login for staff
        }elseif($User_Type === 'User'){
            redirect('pages/staff');
 
        // access login for author
        }
        elseif($User_Type === 'Subadmin'){
            $Department=$this->session->userdata('Department');
            redirect('pages/subadmin');
 
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
 
}