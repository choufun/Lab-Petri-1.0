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
   }
   
   /* INDEX
   ****************************************************************************/
   public function index()
   {
      $this->send_mail('pk.phillipkwong@gmail.com');
      $this->load->view('templates/header');
      $this->load->view('help');
      $this->load->view('templates/footer');
   }
   
   /* SEND MAIL
   ****************************************************************************/
   public function send_mail($email)
   {
      $config['mailtype'] = 'html';
      $config['charset'] = 'utf-8';
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.mailgun.org';
      $config['smtp_port'] = 465;
      $config['smtp_user'] = 'admin@labpetri.org';
      $config['smtp_pass'] = '510labpeetree';
      $config['smtp_timeout'] = '4';
      $config['crlf'] = '\n';
      $config['newline'] = '\r\n';
      $this->email->initialize($config);
      
      /*
      $filename = '/var/wwww/assets/img/email_template.jpg';
      $this->email->attach($filename);
      */
      
      $this->email->from('Ragonto@gmail.com');
      $this->email->to($email);
      $this->email->subject('Welcome to Lab Petri');
      
      /* FUNCTION WORKS IN VERSION 3.0.6 / NOT WORKING IN VERSION 3.0.2
      
      $cid = $this->email->attachmet_cid($filename);
      */

      $data = array(
         'user' => $this->input->post('firstname')." ".$this->input->post('lastname'),
         /* 'img' => '<img src='cid:". $cid ."'/>' */
      );
      
      $body = $this->load->view('templates/emails/welcome', $data, TRUE);
      $this->email->message($body);

      if($this->email->send()) { return; }
      else { return show_error($this->email->print_debugger()); } 
     
   }
}
?>