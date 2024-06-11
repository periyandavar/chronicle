<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends MY_Model
{
  public $table = 'posts';
  public $primary_key = 'Staff_ID';
  public $timestamps = FALSE;

  public function __construct()
  {
    parent::__construct();
  }

  public $rules = array(
    'insert' => array(
      'title' => array('field'=>'title',
      'label'=>'Title',
      'rules'=>'trim|required')
    ),
    'update' => array( 
      'title' => array('field'=>'title',
      'label'=>'Title',
      'rules'=>'trim|required')
    )
  );
}