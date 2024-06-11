<?php
class pages extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('selection_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('User_Type')==='admin'){
        $this->load->view('adminpage');
         // $this->load->view('Department');
          //$this->load->view('Faculty');
      }else{
          echo "Access Denied";
      }
 
  }
 
function subadmin(){
    //Allowing akses to subadmin only
    if($this->session->userdata('User_Type')==='Co-Admin'){
      $Staff_ID=$this->session->userdata('Staff_ID');
      $result['data']=$this->selection_model->disp1($Staff_ID);
      //print_r($result);
      $this->load->view('adminsam',$result);
      //$this->load->view('sidebar');
    }else{
        echo "Access Denied";
    }
  }
  function adm(){
    //Allowing akses to subadmin only
    if($this->session->userdata('User_Type')==='Subadmin'){
      $Staff_ID=$this->session->userdata('Staff_ID');
      $result['data']=$this->selection_model->disp1($Staff_ID);
      //print_r($result);
      $this->load->view('adminsam3',$result);
      //$this->load->view('sidebar');
    }else{
        echo "Access Denied";
    }
  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('User_Type')==='User'){
      $Staff_ID=$this->session->userdata('Staff_ID');
      $result['data']=$this->selection_model->display($Staff_ID);
      $this->load->view('sidebar',$result);
      //$this->load->view('sidebar');
    }else{
        echo "Access Denied";
    }
  }

  function students(){
    //Allowing akses to staff only
    if($_SESSION['User_Type']!='student')
        redirect('select_ctrl/header');
    if($this->session->userdata('User_Type')==='student'){
      $Staff_ID=$this->session->userdata('Staff_ID');
      $result['data']=$this->selection_model->student($Staff_ID);
      $this->load->view('stud',$result);
      //$this->load->view('sidebar');
    }else{
        echo "Access Denied";
    }
  }
 
 function author(){
    //Allowing akses to author only
    // if($this->session->userdata('User_Type')===''){
    //   $this->load->view('header');
    // }else{
    //     echo "Access Denied";
    // }
    redirect('select_ctrl/header');
  }
  function Faculty(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    // if($_SESSION['User_Type']!='Subadmin' && $_SESSION['User_Type']!='Co-Admin')
    // redirect('select_ctrl/header');
    $result['data']=$this->selection_model->disp1($Staff_ID);
    if( $_SESSION['User_Type']!='Co-Admin')
    redirect('select_ctrl/header');
        $result['title']='';//"<html><h2><center>Audit (Faculty Data)  </h2></html>";
  $this->load->view('adminsam1',$result);

    $this->load->view('Faculty');
  }
  function Faculty1(){
    $Staff_ID=$this->session->userdata('Staff_ID');
    if($_SESSION['User_Type']!='Subadmin')
            redirect('select_ctrl/header');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']='';//"<html><h2><center>Audit (Faculty Data)  </h2></html>";
  $this->load->view('adminsam2',$result);

    $this->load->view('Faculty1');
  }

  function Student(){
    if($_SESSION['User_Type']!='Subadmin' && $_SESSION['User_Type']!='Co-Admin')
    redirect('select_ctrl/header');
    $Staff_ID=$this->session->userdata('Staff_ID');

    $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center>Audit (Students Data) </h2></html>";
        if( $_SESSION['User_Type']!='Co-Admin')
        redirect('select_ctrl/header');
  $this->load->view('adminsam1',$result);
    $this->load->view('student');
  }
  function Student1(){
    if($_SESSION['User_Type']!='Subadmin' && $_SESSION['User_Type']!='Co-Admin')
    redirect('select_ctrl/header');
    $Staff_ID=$this->session->userdata('Staff_ID');
    if($_SESSION['User_Type']!='Subadmin')
    redirect('select_ctrl/header');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center>Audit (Students Data) </h2></html>";
  $this->load->view('adminsam2',$result);
    $this->load->view('student1');
  }

  function Department(){
    $Staff_ID=$this->session->userdata('Staff_ID');
        $result=$this->selection_model->disp1($Staff_ID);
        $Department=$this->session->userdata('Department');
        $Staff_ID=$this->session->userdata('Staff_ID');
        if( $_SESSION['User_Type']!='Co-Admin')
        redirect('select_ctrl/header');
    $result['data']=$this->selection_model->disp1($Staff_ID);
        
        $result['title']="<html><h2><center>Audit (Department Data) </h2></html>";
  $this->load->view('adminsam1',$result);
    $this->load->view('Department',$result);
      }
      function Department1(){
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result=$this->selection_model->disp1($Staff_ID);
            $Department=$this->session->userdata('Department');
            $Staff_ID=$this->session->userdata('Staff_ID');
            if($_SESSION['User_Type']!='Subadmin')
            redirect('select_ctrl/header');
        $result['data']=$this->selection_model->disp1($Staff_ID);
            
            $result['title']="<html><h2><center>Audit (Department Data) </h2></html>";
      $this->load->view('adminsam2',$result);
        $this->load->view('Department1',$result);
          }
     
 function FacultyAchievement(){
  $result['title']='<h3><center>Faculty Achievements</center><br></h3>';
  $this->load->view('admin_nav',$result);
    $this->load->view('facultyachieve');
  }

function deptrpt(){
  if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
  $result['title']='<h3><center>Department Events</center></h3><br>';
  $this->load->view('admin_nav',$result);
  
  $this->load->view('deptrpt');
}
function deptrpt1(){
  if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
  $result['title']='<h3><center>Department Events</center></h3><br>';
  $this->load->view('admin_nav',$result);
  
  $this->load->view('deptrpt1');
}
function facultyrpt(){
  if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
  $result['title']='';//'<h3><center>Faculty Reports</center></h3><br>';
  $this->load->view('admin_nav',$result);
  
  $this->load->view('facultyreport');
}
function studrpt(){
  if($_SESSION['User_Type']!='admin')
        redirect('select_ctrl/header');
  $result['title']='';//<h3><center>Student Achievements </center><br></h3>';
  $this->load->view('admin_nav',$result);
    $this->load->view('studrpt');
  }
  function studrpt1(){
    if($_SESSION['User_Type']!='admin')
          redirect('select_ctrl/header');
    $result['title']='';//'<h3><center>Student Achievements </center><br></h3>';
    $this->load->view('admin_nav',$result);
      $this->load->view('studrpt1');
    }

}