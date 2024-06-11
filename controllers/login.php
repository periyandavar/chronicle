<?php
class login extends CI_Controller
{
	
	 public function __construct()
	 {
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		//$this->crud->set_theme('datatables');
		//$this->module='papers';
	}
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
			$this->form_validation->set_rules('Staff_ID','Staff ID','required');
			$this->form_validation->set_rules('Password','Password','required|matches[Staff_ID]');
			if ($this->form_validation->run()==TRUE) {
				
				//echo "Form Validated";
				if($this->input->post('submit'))
		{
			$this->load->library('session');
			$newdata=array('Staff_ID' => $this->input->post('Staff_ID'));
			$this->session->set_userdata($newdata);
			$this->session->sess_expiration='32140800';
        $this->session->sess_expire_on_close='true';
        
			if('Staff_ID'=='admin'){
					$this->load->view('adminpage');
				}
				else{
			redirect('select_ctrl/display');
			}
		}
	}
     $this->load->view('header');
   
		
	
}
}
?>