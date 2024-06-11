<?php

class Csv_import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('csvimport');
        $this->load->model('selection_model');
    }

    function index(){
    	$this->load->view('grocery');
    }

    function load_data(){
    	$result=$this->selection_model->select();
    	$output=echo site_url('grocery_ctrl/demo')'<h3>Staff_Details</h3>';
    	echo "$output";
    	
    }
}
?>