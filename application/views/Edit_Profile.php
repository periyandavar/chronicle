<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Edit_Profile extends CI_Controller
{
  public function index()
  {
    $this->load->view('edit')
  }
  public function edit($id)
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
  }
}
 