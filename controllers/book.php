<?php

class book extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session','form_validation'));
        $this->load->model('selection_model');
        $this->load->model('select_model');
        $this->load->library('grocery_CRUD_MultiSearch');
        //$this->load->library('grocery_CRUD');

    }

    function index()
    {
            //$crud->set_table('audio_book');
            //$crud->where('Staff_ID',$Staff_ID);
            $res['title']="<h3><center> Books Published </center></h3>";
                $this->load->view('sidepushsam',$res);
                $Staff_ID=$this->session->userdata('Staff_ID');
            $result=$this->selection_model->disp1($Staff_ID);
            $Department=$this->session->userdata('Department');
               $Staff_ID=$this->session->userdata('Staff_ID');
            $res=$this->selection_model->profile($Staff_ID);
            
            $crud=new grocery_CRUD_MultiSearch();
            //$crud->field_type('Nature_of_Award','hidden','Best Paper Award');
            $dat=$res[0];
            $crud->where('Nature_of_Award','Best Paper Award');
            $Staff_Name=$dat->Staff_Name;
             $crud->field_type('Department','hidden',$Department);
             $crud->field_type('Staff_ID','hidden',$Staff_ID);
             $crud->field_type('Staff_Name','hidden',$Staff_Name);
            $crud->set_field_upload('Evidence3','assets/uploads/files/Awards');
            $crud->set_field_upload('Evidence2','assets/uploads/files/Awards');
            //$crud->required_fields('Nature_of_Award','Awarding_Agency','Date','Certificate');
                $Staff_ID=$this->session->userdata('Staff_ID');
                $result['data']=$this->selection_model->profile($Staff_ID);
                       
                 
            //$crud=new grocery_CRUD_MultiSearch();
            $crud->set_table('book');
            
            //$crud->set_theme('datatables');
           
            $a=$crud->where('Staff_ID',$Staff_ID);
            //$crud->unset_add();
                //$crud->unset_delete();
              //  $crud->unset_export();
                //$crud->unset_print();
            $crud->set_field_upload('Certificate','assets/uploads/files/Awards');
            $output=$crud->render();
            $this->load->view('showtable',$output);
        
    }

    function do_upload()
    {
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
        $config['upload_path'] = './uploads/seminar/';
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

            $this->load->view('book_publish', $result,$error);
        }
        else
{


            $user_info = $this->get_user();
        }
         $this->load->view('upload_success');
}

    public function get_user() {
$config['upload_path'] = './uploads/seminar/';
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
$image_path=base_url("uploads/seminar/".$image_info['raw_name'].$image_info['file_ext']);

$data = array(
   'Staff_ID'=>$this->session->userdata('Staff_ID'),
  // 'Staff_Name' => $this->session->userdata('Staff_Name'),
   'Name_of_Project' => $this->input->post('Name_of_Project'),
   'Name_of_Agency' => $this->input->post('Name_of_Agency'),
   'Agency_Address'=>$this->input->post('Agency_Address'),
   'Amount_generated'=>$this->input->post('Amount_generated'),
   'Agency_Contact'=>$this->input->post('Agency_Contact'),
   'Billing_Document' => $image_path
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