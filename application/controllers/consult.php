<?php

class consult extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session','form_validation'));
        $this->load->model('selection_model');
    }

    function index()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp($Staff_ID);
        $this->load->view('consultancy',$result, array('error' => ' ' ));
    }

    function do_upload()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
        $result['data']=$this->selection_model->disp($Staff_ID);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
        $this->upload->initialize($config);

        $input_name = "Billing_Document";

        if (  $this->upload->do_upload($input_name))
        {
            $user_info = $this->get_user();
        }
        else
        {
$error = array('error' => $this->upload->display_errors());

            $this->load->view('consultancy',$error);
        }
}
            

        /*    if ($user_info) {

                $image_info = $this->upload_data();
                $image_path=base_url("uploads/".$image_info['raw_name'].$image_info['file_ext']);

                $data = array(
                    'username' => $user_info['username'],
                    'image' => $image_info['$image_path']
                );

                $this->db->where('username', $user_info['username']);
                $this->db->update('image', $data);*/

          //  }

         //   $this->load->view('upload_success');
        //}
    

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
$image_info = $this->upload->data();
$image_path=base_url("uploads/consultancy".$image_info['raw_name'].$image_info['file_ext']);

$data = array(
    'Staff_ID'=>$this->input->post('Staff_ID'),
   'Staff_Name'=>$this->input->post('Staff_Name'),
   'Name_of_Project' => $this->input->post('Name_of_Project'),
   'Name_of_Agency' => $this->input->post('Name_of_Agency'),
   'Agency_Address'=>$this->input->post('Agency_Address'),
   'Agency_Contact'=>$this->input->post('Agency_Contact'),
   'Amount_generated'=>$this->input->post('Amount_generated'),
   'Billing_Document' => $image_path
);
echo "<pre>";
print_r($data);
echo "</pre>";
exit;

$this->db->insert('consultancy_service', $data);

		
    }

     public function showimg() {
     
$this->load->view('viewImages');
     }

}
?>