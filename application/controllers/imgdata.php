function do_upload()
    {
        $config['upload_path'] = './uploads/';
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

            $this->load->view('paper_publication', $error);
        }
        else
        {


            $user_info = $this->get_user();

          
            echo "Added Successfully";
            //$this->load->view('upload_success');
        }
    }

    public function get_user() {

        // your user model data
$image_info = $this->upload->data();
$image_path=base_url("uploads/".$image_info['raw_name'].$image_info['file_ext']);
$data = array(
   'username' => $this->input->post('username'),
   'password' => $this->input->post('password'),
   'image' => $image_info['file_name']
);


$this->db->insert('image', $data);

		
    }

