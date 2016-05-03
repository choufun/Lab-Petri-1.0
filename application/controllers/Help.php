<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Help extends CI_Controller
{
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));
      
      $this->load->library('email');
      
      $config['protocol']     = 'ssmtp';
      $config['smtp_host']    = 'ssl://ssmtp.gmail.com';
      $config['smtp_port']    = '465';
      $config['smtp_timeout'] = '7';
      $config['smtp_user']    = 'labpetri.com@gmail.com';
      $config['smtp_pass']    = 'labpeetree';
      $config['charset']      = 'utf-8';
      $config['newline']      = "\r\n";
      $config['mailtype']     = 'text'; // or html
      $config['validation']   = TRUE; // bool whether to validate email or not      

      $this->email->initialize($config);
   }
   
   /* INDEX
   ****************************************************************************/
   public function index()
   {      
      if ($this->send_mail())
      {
         echo 'SUCCESS';
      }
      else
      {
         echo 'FAILED';
      }
      $this->load->view('templates/header');
      $this->load->view('help');
      $this->load->view('templates/footer');
   }
   
   /* SEND MAIL
   ****************************************************************************/
   public function send_mail()
   {     
      //Send the mail 
      $this->email->from('labpetri.com@gmail.com');
      $this->email->to('labpetri.org@gmail.com');
      $this->email->subject('TEST');
      $this->email->message('TESTING');
      $this->email->send();
   } 
}
?>