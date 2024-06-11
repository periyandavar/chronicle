<?php

class Clust extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session','form_validation'));
        $this->load->model('selection_model');

    }

    function index()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
          // $this->load->view('Cluster_Meeting',$result);
        $this->load->view('Cluster', $result,array('error' => ' ' ));
    }
   
    public function get_user() {
      $config['upload_path'] = './assets/uploads/files/Clustermeet';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '60'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);
$this->upload->initialize($config);
$input_name = "Certificate";
$this->upload->do_upload($input_name);

$data=$this->input->post();
$image_info = $this->upload->data();
$image_path=$image_info['file_name'];
$data = array(
   'Staff_ID'=>$this->session->userdata('Staff_ID'),
   'Staff_Name' => $this->input->post('Staff_Name'),
     'Department'=>$this->input->post('Department'),
   'Title'=>$this->input->post('Title'),
   'Date'=>$this->input->post('Date'),
   'Certificate' => $image_path
);
   
$this->db->insert('Cluster_Meeting', $data);
$this->load->view('upload_success');
		
    }


}
?>