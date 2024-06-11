<?php
class select_ctrl extends CI_Controller
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
	public function select(){
		$this->load->library('form_validation');
			$this->form_validation->set_rules('Staff_ID','User ID','required');
			$this->form_validation->set_rules('Password','Password','required|matches[Staff_ID]');
			
			if ($this->form_validation->run()==TRUE) {
				//echo "Form Validated";

				if($this->input->post('submit'))
		{

			$this->load->library('session');
			$newdata=array('Staff_ID' => $this->input->post('Staff_ID'));
			$this->session->set_userdata($newdata);
			redirect('select_ctrl/display');
			}
		}
     $this->load->view('sss');
   }

public function display(){
		$Staff_ID=$this->session->userdata('Staff_ID');
		$result['data']=$this->selection_model->display($Staff_ID);
		$this->load->view('sidebar',$result);
	
	}
		
public function msg(){
			$Staff_ID=$this->session->userdata('Staff_ID');
			$result['data']=$this->selection_model->profile($Staff_ID);
			$this->load->view('papermsg',$result);
			//redirect('insert/validate');
		}

public function header(){
//	echo$_SESSION['head'];
	if(isset($_SESSION['User_Type']))
 {       if($_SESSION['User_Type']=='Subadmin')
		redirect('pages/adm');
		if($_SESSION['User_Type']=='Co-Admin')
		redirect('pages/subadmin');
		if($_SESSION['User_Type']=='student')
		redirect('pages/students');
		if($_SESSION['User_Type']=='User')
		redirect('pages/staff');
		if($_SESSION['User_Type']=='admin')
		redirect('pages');
}
$this->load->view('header');
		}

		
		public function edprf(){

    $Staff_ID = $this->input->post('Staff_ID', TRUE);
    $data['view'] = $this->selection_model->profile($Staff_ID);
    //$data['main_content'] = 'view_adminviewmore';
    $this->load->view('edit', $data);
}
	

public function admin(){
	//$Department_Code=$this->session->userdata('Departmnent_Code');
	//	$result['data']=$this->selection_model->disp1($Department_Code);
$this->load->view('adminpage');//,$result);
		}
public function sidenav(){
	
$this->load->view('sidebars');
		}

public function push(){
	
$this->load->view('sidepush');
		}

}
	?>


	