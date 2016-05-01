<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

class Post extends CI_Controller
{
   /* CONSTRUCTOR
   ************************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('post_model');
      $this->post_model->increment_post_views();
      $this->load->helper('url');
      //$this->load->helper('simple_html_dom');
   }
   
   public function index()
   {      
      $this->load->view('templates/header');
      $this->load->view('/forum/post');
      $this->load->view('templates/footer');
   }
}