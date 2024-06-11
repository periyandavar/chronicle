<?php
class admin_login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('select_model');
    $this->load->model('selection_model');
    $this->load->library('session');
    $this->load->helper('url');
  }
 
  function index(){
    if(isset($_SESSION['User_Type']))
    {       if($_SESSION['User_Type']=='Subadmin')
           redirect('pages/subadmin');
           if($_SESSION['User_Type']=='student')
           redirect('pages/student');
           if($_SESSION['User_Type']=='User')
           redirect('pages/staff');
           if($_SESSION['User_Type']=='admin')
           redirect('pages');
   }
   $data['Staff_ID']=$this->select_model->get_user();
    //$this->load->view('adminlogin',$data);
    redirect('loginsamp');

  }
 
  function auth(){
    $Staff_ID   = $this->input->post('Staff_ID',TRUE);
    $Password = $this->input->post('Password',TRUE);
    $Department=$this->input->post('Department',TRUE);
    $validate = $this->select_model->validate($Staff_ID,$Password);
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
        if($User_Type === 'admin'){
            redirect('pages');
        }// access login for Subadmin
         elseif($User_Type === 'Subadmin'){
            $Department=$this->session->userdata('Department');
            
            redirect('pages/subadmin');
        // access login for staff
        }
        else{
            redirect('pages/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('admin_login');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('admin_login/index');
  }
public function change_pass()
    {
        // if($_SESSION['User_Type']!='admin')
        // redirect('select_ctrl/header');
        $msg='';
        if($this->input->post('change_pass'))
        {
            $Password=$this->input->post('Password');
            $New_Password=$this->input->post('New_Password');
            $confirm_pass=$this->input->post('confirm_pass');
            $Staff_ID=$this->session->userdata('Staff_ID');
            $que=$this->db->query("select * from login where Staff_ID='$Staff_ID'");
            $row=$que->row();
            //print_r($row->Password);
            if((!strcmp($Password, $row->Password))&& (!strcmp($New_Password, $confirm_pass))){
                $this->select_model->change_pass($Staff_ID,$New_Password);
                $msg= "Password changed successfully !";
                }
                else{
                    $msg ="Invalid request";
                }
        }
        $result['msg']="<h3><center>".$msg."</center></h3>";
        $Staff_ID=$this->session->userdata('Staff_ID');
      $res['data']=$this->selection_model->disp1($Staff_ID);
        if($_SESSION['User_Type']=='admin')
        $this->load->view('admin_nav');
        if($_SESSION['User_Type']=='Subadmin')  
      $this->load->view('adminsam2',$res);
      if($_SESSION['User_Type']=='Co-Admin')
        $this->load->view('adminsam1',$res);
        $this->load->view('change_pass',$result);   
        
    }
    public function change_pass1()
    {
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
      $res['data']=$this->selection_model->disp1($Staff_ID);
      if($_SESSION['User_Type']=='Subadmin')  
      $this->load->view('adminsam2',$res);
      if($_SESSION['User_Type']=='Co-Admin')
        $this->load->view('adminsam1',$res);
        $this->load->view('change_pass',$result);   
        
    }

}
  ?>