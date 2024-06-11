<?php

class FDP extends CI_Controller {

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
        $Department=$this->session->userdata('Department');
            $result['data']=$this->selection_model->profile($Staff_ID);
           // $this->load->view('papermsg',$result);
        $this->load->view('FDP', $result,array('error' => ' ' ));
    }
    function do_upload()
    {
        /*$Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->display($Staff_ID);
            $this->load->view('papermsg',$result);*/
        $config['upload_path'] = './assets/uploads/files/FDP/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '50'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
        $this->upload->initialize($config);

        $input_name = "Certificate";

        if ( ! $this->upload->do_upload($input_name))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('fdp', $error);
        }
        else
        {


            $user_info = $this->get_user();

            }
//echo "inserted";
            $this->load->view('upload_success');
        }
    public function get_user() {
$config['upload_path'] = './assets/uploads/files/FDP/';
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
  'From_Date'=>$this->input->post('From_Date'),
  'To_Date'=>$this->input->post('To_Date'),
   'Staff_ID'=>$this->session->userdata('Staff_ID'),
   'Staff_Name' => $this->input->post('Staff_Name'),
   'Department' => $this->input->post('Department'),
     'Title_of_Program'=>$this->input->post('Title_of_Program'),
   'Organizing_Agency'=>$this->input->post('Organizing_Agency'),
   'Certificate'=>$image_path
   
   );
$this->db->insert('FDP', $data);
$this->load->view('upload_success');

		
    }


}
?>