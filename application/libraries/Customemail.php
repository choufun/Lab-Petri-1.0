<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

/* CUSTOM EMAIL
*******************************************************************************/
class Customemail extends CI_Controller
{
   private $stack = array();
   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      $this->load->library('form_validation');
      $this->load->helper(array('form','url'));
   }
   
   public function sendMail()
   {   
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
      //$this->email->send();
      //mail('choufun69@gmail.com', 'hi', 'test');
      echo "Email successfully sent. Thank you for your interest.";
   } 
  
}