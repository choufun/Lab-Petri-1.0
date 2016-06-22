<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Labsupport extends CI_Controller
{
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {
      parent:: __construct();      
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));
      $this->load->library('email');
      $this->load->model('labsupport_model');
   }
   
   /* INDEX
   ****************************************************************************/
   public function index()
   {
      $this->form_validation->set_rules('firstname','firstname','trim|required');
      $this->form_validation->set_rules('lastname','lastname','trim|required');
      $this->form_validation->set_rules('email','email','trim|required');
      
      if ($this->form_validation->run() === FALSE)
      {
         $this->load->view('templates/header');
         $this->load->view('labsupport');
         $this->load->view('templates/footer');
      }
      else
      {
         $this->send_mail($this->input->post('email'));
         $this->send_copy($this->input->post('email')); 
         redirect('support');
      }
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
      
      $this->email->from('contact@labpetri.org');
      //$this->email->from('labpetri.org@gmail.com');
      $this->email->to($email);
      $this->email->subject('Technical Issue');
      
      $data = array(
         'user' => $this->input->post('firstname')." ".$this->input->post('lastname'),
         'issue' => $this->input->post('issue'),
      );      
      $body = $this->load->view('templates/emails/technical_issue', $data, TRUE);
      $this->email->message($body);

      if($this->email->send()) { return; }
      else { return show_error($this->email->print_debugger()); }      
   }
   
   /* SEND COPY MAIL
   ****************************************************************************/
   public function send_copy($email)
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
      
      $this->email->from($email);
      //$this->email->to('contact@labpetri.org');
      $this->email->to('labpetri.org@gmail.com');
      $this->email->subject('Technical Issue');

      $data = array(
         'user' => $this->input->post('firstname')." ".$this->input->post('lastname'),
         'issue' => $this->input->post('issue'),
      );      
      $body = $this->load->view('templates/emails/technical_issue', $data, TRUE);
      $this->email->message($body);

      if($this->email->send()) { return; }
      else { return show_error($this->email->print_debugger()); }
   }
   
   /* GENERATES ISSUE_ID
   
   precondition: 
   - user has an account
   
   ****************************************************************************/
   public function make_issue($email) {
      /*
      
      CHECKLIST
      1. retrieve user_id from DB using email
      2. 
      
      if($email) { return $issue_id = ; }
      
      */
   }
}
?>