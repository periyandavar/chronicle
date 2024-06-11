<?php
class paper_ctrl extends CI_Controller
{
	 public function __construct()
	 {
		parent::__construct();
		$this->load->database();
		$this->load->model('paper_model');
		$this->load->model('selection_model');
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('session');
	}


	    public function validate()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Conference_Name','Conference Name','required');
			$this->form_validation->set_rules('Title_of_Paper','Title','required');
			$this->form_validation->set_rules('Issn_Isbn','ISSN/ISBN','required');
			$this->form_validation->set_rules('Name_of_journal','Name of journal','required');
			$this->form_validation->set_rules('Indexed','Indexed','required|numeric');
			$this->form_validation->set_rules('Year_Date','Date&Year','required');
			$this->form_validation->set_rules('Place','Place','required');
			$this->form_validation->set_rules('Certificate','Certificate','required');
if ($this->form_validation->run()==TRUE) {
	if($this->input->post('submit')){
			
		redirect('upload_data/upload');
	}
	}
	$Staff_ID=$this->session->userdata('Staff_ID');
			$result['data']=$this->selection_model->profile($Staff_ID);
			$this->load->view('papermsg',$result);
}
}
		/*Conference_Name => $Conference_Name
Level => $Level
Title => $Title
ISSN_ISBN =>$ISSN_ISBN
Name_of_journal=>$Name_of_journal
Indexed=>$Indexed
Year_Date=>$Year_Date
Certificate=>$Certificate
$cn=$this->input->post('Conference_Name');
$lvl=$this->input->post('Level');
$tt=$this->input->post('Title_of_Paper');
$is=$this->input->post('ISSN_ISBN');
$Nj=$this->input->post('Name_of_journal');
$pg=$this->input->post('Indexed');
$yr=$this->input->post('Year_Date');
$plc=$this->input->post('Place');
$crt=$this->input->post('Certificate');
$this->selection_model->display($Staff_ID);
$this->paper_model->savedata($ID,$pt,$lvl,$tt,$is,$Nj,$pg,$yr,$plc,$crt);
echo 'Added successfully';	
*/