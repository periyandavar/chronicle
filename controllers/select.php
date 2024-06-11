<?php
class select extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->helper('form','url');
      $this->load->model('selection_model');
      $this->load->library('session');
      $this->load->library('form_validation');
   }
public function log(){
	$this->load->library('form_validation');
	$this->load->model('selection_model');
   	$this->form_validation->set_rules('deptcode','Department Code','required');
   	$this->form_validation->set_rules('password','Password','required|matches[deptcode]');
   	
   	if ($this->form_validation->run()==TRUE) {
				//echo "Form Validated";
				if($this->input->post('submit'))
		{
   		$this->load->library('session');
         $newdata=array('Department_Code' => $this->input->post('deptcode'));
         $this->session->set_userdata($newdata);
         redirect('select_ctrl/user_exist');
         }
}
else{
   $this->form_validation->set_message('Password','invalid Password');
}
$this->load->view('samlogin');
}


public function user_exist(){
   $deptcode=$this->session->userdata('deptcode');
   //$deptcode=$this->input->post('deptcode');
         $this->db->where('Department_Code',$deptcode);
         $query=$this->db->get('department_code');
         if($query->num_rows >= 1){
            $this->load->view('adminpage');
         }
        // else{
        //    $is_exist=$this->dept->isEmailExist($deptcode);
   //if($is_exist){
  // $this->form_validation->set_message('isEmailExist','Department is already exist');
 //  return false;
}


public function select(){
      $this->load->library('form_validation');
         $this->form_validation->set_rules('Department_Code','Department Code','required');
         $this->form_validation->set_rules('Password','Password','required|matches[Department_Code]');
         if ($this->form_validation->run()==TRUE) {
            //echo "Form Validated";
            if($this->input->post('submit'))
      {
         

         $this->load->library('session');
         $newdata=array('Department_Code' => $this->input->post('Department_Code'));
         $this->session->set_userdata($newdata);
         redirect('select_ctrl/admin');
         }
      }
     $this->load->view('samlogin','refresh');
   }


   public function login(){
   
$this->load->view('samlogin');
      }


}
?>

