<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct()
    {
       parent::__construct(); 
       $this->load->model('register_model');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
    }
/* INDEX
**********************************************************************************************/  
	public function index()
	{
      $this->form_validation->set_rules('firstname','First name','trim|required');
      $this->form_validation->set_rules('lastname','Last name','trim|required');
      $this->form_validation->set_rules('email','Email','trim|valid_email|callback_verify_email|required');
      $this->form_validation->set_rules('password','password','required|min_length[8]');
      $this->form_validation->set_rules('passwordconf','Password Confirmation','required|matches[password]');

      if ($this->form_validation->run() === FALSE)
      {
         $data['options'] = $this->register_model->load_majors();
         $data['schools'] = $this->register_model->load_schools();
         $this->load->view('templates/header');
         $this->load->view('register', $data);
         $this->load->view('templates/footer');
      }
      else
      {
         $this->register();
         $data['options'] = $this->register_model->load_majors();
         $data['schools'] = $this->register_model->load_schools();
         $this->load->view('templates/header');
         $this->load->view('register', $data);
         $this->load->view('templates/footer');
      }
	}
/* REGISTER
**********************************************************************************************/    
    public function register()
    {       
       $data = array (
          'firstname' => $this->input->post('firstname'),
          'lastname'=> $this->input->post('lastname'),
          'email'=> $this->input->post('email'),
          'password'=>$this->input->post('password'),
          'school'=>$this->input->post('university'),
          'major'=>$this->input->post('major')
       );
       $this->register_model->register($data);
    }
/* VERIFY EMAIL
**********************************************************************************************/
    public function verify_email($email)
    {
        if ($this->register_model->check_unique_email($email) == false)
        {
            $this->form_validation->set_message('verify_email',
                '<center>This email exists already. Please use a different email address.</center>');
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>
