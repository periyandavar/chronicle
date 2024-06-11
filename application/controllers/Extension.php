<?php

class Extension extends CI_Controller {

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
        $this->load->view('extension', $result,array('error' => ' ' ));
    }

    function do_upload()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
        $config['upload_path'] = './uploads/consultancy/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

 $this->upload->initialize($config);

        $input_name = "Billing_Document";

        if ( ! $this->upload->do_upload($input_name))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('extension', $result,$error);
        }
        else
{


            $user_info = $this->get_user();
        }
         $this->load->view('upload_success');
}

    public function get_user() {
      
$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);
$this->upload->initialize($config);
$input_name = "Billing_Document";
$this->upload->do_upload($input_name);
        // your user model data
$data=$this->input->post();
        
$image_info = $this->upload->data();
$image_path=base_url("uploads/consultancy/".$image_info['raw_name'].$image_info['file_ext']);

$data = array(
   
   'Department' => $this->input->post('Department'),
   'Name_of_Activity' => $this->input->post('Name_of_Activity'),
   'Name_of_Scheme' => $this->input->post('Name_of_Scheme'),
   'Date'=>$this->input->post('Date'),
   'No_of_Faculty'=>$this->input->post('No_of_Faculty'),
   'No_of_Students'=>$this->input->post('No_of_Students'),
   'Amount_Spent'=>$this->input->post('Amount_Spent'),
   
   'Venue'=>$this->input->post('Venue'),
   
   'Target_Group'=>$this->input->post('Target_Group')
   
   
  // $image_path=base_url("uploads/consultancy".$image_info['raw_name'].$image_info['file_ext']);
);
/*echo '<pre>';
print_r($image_path);
echo '</pre>';
exit();*/

$this->db->insert('extension_activity', $data);

		
    }


}
?>