<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct() {

    parent::__construct();

    // load base_url
    $this->load->helper('url');
  }

  public function index(){

    $data = array();
    if($this->input->post('submit') != NULL ){ 
			
	$content = $this->input->post('content');
	$data['content'] = $content;
			
    }

    $this->load->view('userview',$data);
    //$this->load->view('showtable');
 
  }

}
