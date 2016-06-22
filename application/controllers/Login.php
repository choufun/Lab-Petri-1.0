<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
/* FIELD
************************************************************************************/ 
   private $options = "";
   private $schools = "";
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent::__construct(); 
      $this->load->model('login_model');
      $this->load->model('register_model');
      $this->register_model->load_majors();
      $this->register_model->load_schools();
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->library('email');
   }
   
/* INDEX PAGE
************************************************************************************/
   public function index()
   {
      
/* PROCESS USER DATA
************************************************************************************/
      
      /******************************************************************************
      - LOGIN FORM
        LOGIN FORM VALIDATIONS
      ******************************************************************************/
      if ($this->input->post('login') == 'login')
      {
         $this->form_validation->set_rules('email','email','trim|required|valid_email');
         $this->form_validation->set_rules('password','password','required|callback_valid_login');
      }
      /******************************************************************************
      - REGISTRATION FORM
        REGISTRATION FORM VALIDATIONS
      ******************************************************************************/
      if ($this->input->post('register') == 'register')
      {
         $required = FALSE;
         if (  ($this->input->post('undergraduate') !== NULL) ||
               ($this->input->post('graduate')      !== NULL) ||
               ($this->input->post('professor')     !== NULL)
            ) { $required = TRUE; }
         
         $this->form_validation->set_rules('education', 'Education', $required);
         $this->form_validation->set_rules('firstname','First name','trim|required');
         $this->form_validation->set_rules('lastname','Last name','trim|required');
         $this->form_validation->set_rules('email','Email','trim|valid_email|callback_verify_email|required');
         $this->form_validation->set_rules('password','password','required|min_length[8]');
         $this->form_validation->set_rules('passwordconf','Password Confirmation','required|matches[password]');
         $this->form_validation->set_rules('university','University','callback_verify_school|required');
         $this->form_validation->set_rules('major','Major','required');
      }
      /******************************************************************************
      - PROCESS FORMS
        RUN
      ******************************************************************************/
      if ($this->form_validation->run() === FALSE)
      {
         $data['options'] = $this->register_model->get_majors();
         $data['schools'] = $this->register_model->get_schools();
         $this->load->view('templates/header');
         $this->load->view('login', $data);
         $this->load->view('templates/footer');
      }
      else
      {
         /***************************************************************************
         - PROCESS RESULTS
           SUCCESSFUL LOGIN
         ***************************************************************************/
         if ($this->input->post('login') == 'login')
         {
            $email = $this->input->post('email');
            $this->login_model->login_user($email);
            redirect('');
         }
         /* SUCCESSFUL REGISTRATION
         ***************************************************************************/
         if ($this->input->post('register') == 'register')
         {
            $this->register();
            $this->login_model->login_user($this->input->post('email'));
            $this->send_mail($this->input->post('email'));
            redirect('');
         }
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
      $this->email->subject('Welcome to Lab Petri');
      
      $data = array(
         'user' => $this->input->post('firstname')." ".$this->input->post('lastname'),
      );      
      $body = $this->load->view('templates/emails/welcome', $data, TRUE);
      $this->email->message($body);

      if($this->email->send()) { return; }
      else { return show_error($this->email->print_debugger()); }      
   }
   
/* REGISTER USER : LOADS DATA
************************************************************************************/    
   public function register()
   {       
      $user_data = array (
         'firstname'=> ucfirst($this->input->post('firstname')),
         'lastname' => ucfirst($this->input->post('lastname')),
         'email'    => $this->input->post('email'),
         'password' => $this->input->post('password'),
      );
      $this->register_model->register($user_data);
   }
   
/* VERIFCATION CALLBACKS
   VERIFY SCHOOL
************************************************************************************/
   public function verify_school($university)
   {
      if ($this->register_model->school_match($university) == FALSE)
      {
         $this->form_validation->set_message('verify_school',
         '<center>
            The university extension<br>
            does not match<br>
            the given email extension.
          </center><br>');
         return FALSE;
      }
      else { return TRUE; }
   }
   
/* VERIFY EMAIL
************************************************************************************/
   public function verify_email($email)
   {
      if ($this->register_model->is_school_email($email) == FALSE)
      {
         $this->form_validation->set_message('verify_email',
         '<center>
            This not is a university email.
            <br>
            Please use your university email address.
          </center><br>');
         return FALSE;
      }
      else if ($this->register_model->username_unique($email) == FALSE)
      {
         $this->form_validation->set_message('verify_email',
         '<center>
            This user is already registered.
          </center>
          <br>');
         return FALSE;
      }
      else { return TRUE; }
   }

/* VALIDATE LOGIN
************************************************************************************/
   public function valid_login($password,$email)
   {
      $password = $this->input->post('password');
      $email = $this->input->post('email');
      $validLogin = $this->login_model->verify_login($email,$password);

      if( $validLogin == true) { return true; }
      else
      {
         $this->form_validation->set_message('valid_login',
            '<center>
               Invalid email or password.
             </center>');
         return false;
      }
   }

/* LOGOUT
************************************************************************************/
   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('firstname');
      $this->session->unset_userdata('lastname');
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
      redirect('');
   }
}
?>