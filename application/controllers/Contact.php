<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct(); 
        
    }
    
    public function index(){
  
       
        $this->load->library('email');
        $this->load->library('form_validation');
        
        $this->load->helper(array('form', 'url'));
  
        
        //Validate the user input on the mail form
        $this->form_validation->set_rules('firstname','firstname','trim|required');
        $this->form_validation->set_rules('lastname','last name', 'trim|required');
        $this->form_validation->set_rules('email','email','trim|required|valid_email');
        $this->form_validation->set_rules('message','message','trim|required');
      
        
        if($this->form_validation->run() === true){
            $this->sendMail();
            $this->load->view('templates/header');
            $this->load->view('contact');
            $this->load->view('templates/footer');
        
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('contact');
            $this->load->view('templates/footer');
        }
    }
    
    public function sendMail(){
        
        //Post the user data
        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        $subject = $this->input->post('subject');
        
        
        //Send the mail     
        $this->email->to('choufun69@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        //mail('choufun69@gmail.com', 'hi', 'test');
        echo "Email successfully sent. Thank you for your interest.";
    }
    

}?>