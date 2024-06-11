<?php

class imginsert extends CI_Controller {

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
        $this->load->view('papermsg', $result,array('error' => ' ' ));
    }

    function do_upload()
    {
        $config['upload_path'] = './assets/uploads/files/paper/';
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

            $this->load->view('papermsg', $error);
        }
        else
        {


            $user_info = $this->get_user();

            }
//echo "inserted";
            $this->load->view('upload_success');
        }
    

    public function get_user() {
$config['upload_path'] = './assets/uploads/files/paper/';
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
   'Staff_Name'=>$this->input->post('Staff_Name'),
   'Department'=>$this->input->post('Department'),
   'Conference_Name' => $this->input->post('Conference_Name'),
   'Level' => $this->input->post('Level'),
   'Title_of_paper' => $this->input->post('Title_of_paper'),
   'Name_of_journal'=>$this->input->post('Name_of_journal'),
   'ISSN_ISBN'=>$this->input->post('ISSN_ISBN'),
   'Indexed'=>$this->input->post('Indexed'),
   'Year_Date'=>$this->input->post('Year_Date'),
   'Place'=>$this->input->post('Place'),
   'Certificate' => $image_path
);
/*echo "<pre>";
print_r($image_info);
echo "</pre>";
exit;*/

$this->db->insert('paper_publication', $data);

		
    }

     public function showimg() {
     
$this->load->view('viewImages');
     }

}
?>