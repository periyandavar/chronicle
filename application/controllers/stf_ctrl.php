<?php
class stf_ctrl extends CI_Controller
{
	 public function __construct()
	 {
		parent::__construct();
		$this->load->database();
		$this->load->model('staff_model');
		$this->load->library('session');
	}

	public function index()
	{

	    $this->load->library('session');
		
		if($this->input->post('submit'))
			{
				$newdata=array('Name' => $this->input->post('Name'));
				$this->session->set_userdata($newdata);
				$this->load->helper(url);
				redirect('display');
			}
		}
		
	public function display(){
			$category = $this->input->get('category');
		
		$result['data']=$this->staff_model->showdata($category);
		$this->load->view('stf',$result);
				
				}
			}
			?>
		
			