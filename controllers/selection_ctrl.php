<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class selection_ctrl extends CI_Controller
{
	 public function __construct()
	 {
		parent::__construct();
		$this->load->database();
		$this->load->model('selection_model');
		$this->load->library('session');
		$this->load->helper('url','form');
		
	}

	public function display(){
		
				$ID=$this->session->userdata('ID');
				$result['data']=$this->selection_model->profile($ID);
				$this->load->view('profile_sam',$result);
				
			}
			public function dept(){
				$this->load->view('dep');
				$this->load->library('session');
				if($this->input->post('submit'))
			{
				$newdata=array('Name' => $this->input->post('Name'));
				$this->session->set_userdata($newdata);
				$this->load->helper(url);
				redirect('stf_ctrl/display');
				
		}
	}
			public function depts(){
			
				$this->load->view('dptlist');
			}
			public function im(){
			
				$this->load->view('img');
			}
			public function disp(){
		
				$Staff_ID=$this->session->userdata('Staff_ID');
				$result['data']=$this->selection_model->display($Staff_ID);
				$this->load->view('sidebar',$result);
				
			}
			public function upload()
        {
                $config=[
                	'upload_path'=> './uploads/',
               'allowed_types'  => 'gif|jpg|png',
               'max_size'      => 50,
               'max_width'    => 1024,
               'max_height'    => 768
           ];
                //$config['file_name'] = '_' . $i . '_';
                $this->load->library('upload', $config);
                $this->form_validation->set_error_delimiters();
                if($this->upload->do_upload()){
                	$data=$this->input->post();
                	$info=$this->upload->data();
                	//$id=$this->input->post('id');
                	$image_path=base_url("uploads/".$info['raw_name'].$info['file_ext']);
                	$data['avatar']=$image_path;
                	/*$data=array(
                		"id"=>$id,
                		"avatar"=>$data['avatar']
                	);*/
                	unset($data['submit']);
                	$this->load->model('Queries');
                	if($this->Queries->insertImage($data)){
                		echo 'Image loaded successfully';
                	}
                	else{

                	echo 'Failed to add image';                	
                }
                }

                else{
                	$this->index();
                }              	
                 
                }
                public function index(){
                	$this->load->view('imgupload');

                }
                public  function viewimg(){
                	$this->load->model('Queries');
                	$images=$this->Queries->getImages();
                           	$this->load->view('viewImages',['images'=>$images]);

                }
        

public function dept1(){
				$this->load->view('depcspg');
				$this->load->library('session');
				if($this->input->post('submit'))
			{
				$newdata=array('Name' => $this->input->post('Name'));
				$this->session->set_userdata($newdata);
				$this->load->helper(url);
				redirect('stf_ctrl/display');
				
		}
	}

public function login()
{
	$this->load->view('sss');
}

	}
	?>