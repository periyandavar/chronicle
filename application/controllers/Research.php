<?php

class Research extends CI_Controller {

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
           // $this->load->view('papermsg',$result);
        $this->load->view('Research_guidance', $result,array('error' => ' ' ));
    }

   
    public function get_user() {

$data=$this->input->post();     
$data = array(
   'Staff_ID'=>$this->session->userdata('Staff_ID'),
  // 'Staff_Name' => $this->session->userdata('Staff_Name'),
   'Guidance' => $this->input->post('Guidance'),
   'Completed' => $this->input->post('Completed'),
   'Under_Guidance'=>$this->input->post('Under_Guidance')
   
  // $image_path=base_url("uploads/consultancy".$image_info['raw_name'].$image_info['file_ext']);
);
/*echo '<pre>';
print_r($image_path);
echo '</pre>';
exit();*/

$this->db->insert('research', $data);

		
    }


}
?>