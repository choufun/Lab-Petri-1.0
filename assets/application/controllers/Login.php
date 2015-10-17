<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/************************************************************************************************
   LOGIN CONTROLLER
   ----------------
      function construct()
            : loads all models, libraries, and helpers
      
      function index()
            : execute login if form set rules have been met
            : if login successful set user session
            
      function valid_login()
            : gets callback() when set rules are being validated
            : validates if email exists by calling login_model->verify_login()
            
      function logout
            : unsets user session
            : destroys session
            
************************************************************************************************/
class Login extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('login_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation'); 
    }
    
    public function index()
    {      
        $this->form_validation->set_rules('email','email','trim|required|valid_email');
        $this->form_validation->set_rules('password','password','required|callback_valid_login');
        
        if ($this->form_validation->run() === FALSE)
          {
               $this->load->view('templates/header');
               $this->load->view('login');
               $this->load->view('templates/footer');
          }
          else
          {
               $email = $this->input->post('email');
               $this->login_model->login_user($email);
               $this->load->view('templates/header');
               $this->load->view('login');
               $this->load->view('templates/footer');
               redirect('forum');
               
          }
    }
    
    public function valid_login($password,$email){
        
        $password = $this->input->post('password');
        $email = $this->input->post('email');
       
        $validLogin = $this->login_model->verify_login($email,$password);

        if( $validLogin == true){
            return true;
        }
        else{
            $this->form_validation->set_message('valid_login','<center>Invalid email or password.</center>');
            return false;
        }
    }
   
   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
	   redirect('');
   }
    

}?>