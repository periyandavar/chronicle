q<?php

class Awards extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session','form_validation','Notify'));
        $this->load->model('selection_model');
        

    }

    function index()
    {

        $Staff_ID=$this->session->userdata('Staff_ID');
        //$Department=$this->session->userdata('Department');
            $result['data']=$this->selection_model->profile($Staff_ID);
            
           // $this->load->view('papermsg',$result);
        $this->load->view('Awards', $result,array('error' => ' ' ));
    }
   
   function do_upload()
    {
        $config['upload_path'] = './assets/uploads/files/Awards/';
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

            $this->load->view('Awards', $error);
        }
        else
        {


            $user_info = $this->get_user();

            }
            $this->notify->set_message('success', 'Your information was successfully submitted.');
            echo $this->notify->output();
//echo "inserted";
           // $this->load->view('upload_success');
        }
    public function get_user() {
$config['upload_path'] = './assets/uploads/files/Awards/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
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
   'Staff_Name'=>$this->input->post('Staff_Name'),
   'Department'=>$this->input->post('Department'),
   'Nature_of_Award' => $this->input->post('Nature_of_Award'),
   'Awarding_Agency'=>$this->input->post('Awarding_Agency'),
   'Date'=>$this->input->post('Date'),
   'Certificate'=>$image_path
   );
/*echo "<pre>";
print_r($image_info);
echo "</pre>";
exit;*/


$this->db->insert('Awards', $data);



		
    }
public function Awards()
    {
        $crud=new grocery_CRUD();
        $crud->set_table('awards');
        $crud->set_theme('datatables');
        $crud->set_Relation('Staff_ID','staff_info','{Staff_Name}-{Department}');
        $crud->display_as('Staff_ID','Staff Name & Department');
        $crud->where('Staff_ID',$Staff_ID);
        $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
        $output=$crud->render();
        //$this->_example_output($output);
        $this->load->view('Awardsrec',$output);
    }

}
?>