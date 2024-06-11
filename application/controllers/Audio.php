<?php

class Audio extends CI_Controller {

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
        $this->load->view('Audio_book', $result,array('error' => ' ' ));
    }

    function do_upload()
    {
        $config['upload_path'] = './assets/uploads/files/Audio_book/';
        $config['allowed_types'] = 'gif|jpg|png|mpeg|mp3|mp4|';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
        $this->upload->initialize($config);

        $input_name = "Certificate";

        if ( ! $this->upload->do_upload($input_name))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('Audio_book', $error);
        }
        else
        {


            $user_info = $this->get_user();

            }
//echo "inserted";
            $this->load->view('upload_success');
        }
    

    public function get_user() {
$config['upload_path'] = './assets/uploads/files/Audio_book/';
        $config['allowed_types'] = 'mpeg|mp3|mp4|';
        $config['max_size'] = '20'; // Unlimited
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
   'Staff_Name'=>$this->input->post('Staff_Name'),
   'Department'=>$this->input->post('Department'),
   'Title_of_Program' => $this->input->post('Title_of_Program'),
   'Organising_Agency' => $this->input->post('Organising_Agency'),
   'Date'=>$this->input->post('Date'),
   'Certificate' => $image_path
);
/*echo "<pre>";
print_r($image_info);
echo "</pre>";
exit;*/
$this->db->insert('audio_book', $data);
//$this->load->view('upload_success');
		
    }

//gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
}
?>