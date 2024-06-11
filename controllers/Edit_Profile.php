<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Edit_Profile extends CI_Controller
{
  function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session','form_validation'));
        $this->load->model('selection_model');
        $Staff_ID=$this->session->userdata('Staff_ID');
            $result['data']=$this->selection_model->profile($Staff_ID);
           // $this->load->view('edit',$result);

    }
  public function index()
  {
   
  }
/*  public function edit($id)
  {
    $this->load->library('form_validation');
    if($this->form_validation->is_natural_no_zero($id)===FALSE)
    {
      redirect('');
    }
    $this->load->model('post_model');
    $post = $this->post_model->get($id);
    if($post===FALSE)
    {
      redirect('welcome');
    }
    $data['post'] = $post;
    $this->load->helper('form');
    $this->load->view('edit_view',$data);

     else
    {
      $title = $this->input->post('title');
      // we already have the ID, so we actually do not need to get the input hidden value, because that one is passed in the url. I think this is the perfect way of working with the id, as you already verified if the id is correct.
 
      $updated_data = array(
        'title' => $title
      );
 
      //now we simply update the data
      //TAKE NOTE: THE UPDATE() METHOD IS DEFINED IN THE MY_Model FILE.
      if($this->post_model->update($updated_data,$id))
      {
        redirect('welcome');
        //of course you can also pass a success message inside a session variable (maybe a flash type of message?)
      }
      else
      {
        echo 'Couldn\'t update the data';
        exit();
      }
    }
  }*/
}
 