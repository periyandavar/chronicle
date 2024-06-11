<?php

class Seminar extends CI_Controller {

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
        $this->load->view('seminar', $result,array('error' => ' ' ));
    }

    function do_upload()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
        $config['upload_path'] = './assets/uploads/files/seminar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '50'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

 $this->upload->initialize($config);

        $input_name = "Certificate";

        if ( ! $this->upload->do_upload($input_name))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('seminar', $result,$error);
        }
        else
{


            $user_info = $this->get_user();
        }
         $this->load->view('upload_success');
}

    public function get_user() {
$config['upload_path'] = './assets/uploads/files/seminar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);
$this->upload->initialize($config);
$input_name = "Certificate";
$this->upload->do_upload($input_name);
        // your user model data
$data=$this->input->post();
        
$image_info = $this->upload->data();
$image_path=$image_info['file_name'];

$data = array(
   'Staff_ID'=>$this->session->userdata('Staff_ID'),
  'Staff_Name' => $this->input->post('Staff_Name'),
  'Department'=>$this->input->post('Department'),
   'Event' => $this->input->post('Event'),
   'Title' => $this->input->post('Title'),
   'Place'=>$this->input->post('Place'),
   'Level'=>$this->input->post('Level'),
   'From_Date'=>$this->input->post('From_Date'),
   'To_Date'=>$this->input->post('To_Date'),
   'Certificate' => $image_path
  // $image_path=base_url("uploads/consultancy".$image_info['raw_name'].$image_info['file_ext']);
);
/*echo '<pre>';
print_r($image_path);
echo '</pre>';
exit();*/

$this->db->insert('seminar_or_workshop', $data);

		
    }


}
?>