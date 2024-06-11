<?php
class upload_data extends CI_Controller
{
     public function __construct()
     {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url'));
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->model('selection_model');
        $this->load->library('form_validation');
    }
public function upload()
        {
                $config=[
                	'upload_path'=> './uploads/',
               'allowed_types'  => 'gif|jpg|png',
               'max_size'      => 50,
               'max_width'    => 1024,
               'max_height'    => 768
           ];
                //$config['file_name'] = '_' . $i . '_';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->form_validation->set_error_delimiters();
                if($this->upload->do_upload()){
                	$user_info = $this->get_user();}
                  echo 'INSERTED SUCCESSFULLY';            
                }
                else{
                  echo 'Not inserted';
                }
              }

                public function get_user() {

        // your user model data
$image_info = $this->upload->data();
$image_path=base_url("uploads/".$image_info['raw_name'].$image_info['file_ext']);
$data = array(
  'Staff_ID'=>$this->session->userdata('Staff_ID'),
   'Conference_Name' => $this->input->post('Conference_Name'),
   'Title_of_paper' => $this->input->post('Title_of_paper'),
   'Level' => $this->input->post('Level'),
   'ISSN_ISBN'=>$this->input->post('ISSN_ISBN'),
   'Name_of_journal'=>$this->input->post('Name_of_journal'),
   'Indexed'=>$this->input->post('Indexed'),
   'Year_Date'=>$this->input->post('Year_Date'),
   'Place'=>$this->input->post('Place'),
   'Certificate' => $image_path
);
$this->db->insert('paper_publication',$data);
}
}
?>