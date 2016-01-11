<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*********************************************************************
   POST CONTROLLER
   ---------------
      function construct()
            : loads all models, libraries, and helpers.
      
      function index()
            : create post if form validation is successful
                  with the given set of validation rules.
      
      function verfiy_email()
            : verifies if email exist,
                  then also user_id in post model
                  
      function create_post()
            : packages all inputs into an object
                  is then passed into post model for insertion
   
*********************************************************************/
class Post extends CI_Controller
{
   public function __construct()
   {
      parent::__construct(); 
       $this->load->model('post_model');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
   }
   
   public function index()
   {
	 if (((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)))
    {
	   $this->form_validation->set_rules('title','Title','trim|required');
      $this->form_validation->set_rules('summary','Summary','trim|required');
      
      if ($this->form_validation->run() === FALSE)
      {
         $this->load->view('templates/header');
         $this->load->view('post');
         $this->load->view('templates/footer');
      }
      else
      {
         $this->create_post();
         $this->load->view('templates/header');
         $this->load->view('post');
         $this->load->view('templates/footer');
      }
	 }
	  else{
		  redirect('login');
	  }
  
   }
   
   private function create_post()
   {
      $this->post_model->inserts_into_forum();
   }
   
}

?>