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
    	$output='<h3> Staff_Details</h3>
        <a href= "<?php echo site_url("grocery_ctrl/demo")?>"/>';    	//echo "$output";
    	
    }
function import(){
$file_data=$this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
foreach($file_data as $row)
{
    $data[]=array(
    'first_name'=>$row["First Name"],
    'first_name'=>$row["First Name"]);

}
$this->selection_model->insert($data);
}


}
?>