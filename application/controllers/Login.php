<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
/* FIELD
****************************************************************************/ 
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
   }
   
/* INDEX PAGE
************************************************************************************/
   public function index()
   {
      /* LOGIN FORM VALIDATIONS
      ******************************************************************************/
      if ($this->input->post('login') == 'login')
      {
         $this->form_validation->set_rules('email','email','trim|required|valid_email');
         $this->form_validation->set_rules('password','password','required|callback_valid_login');
      }
      /* REGISTRATION FORM VALIDATIONS
      ******************************************************************************/
      if ($this->input->post('register') == 'register')
      {
         $this->form_validation->set_rules('firstname','First name','trim|required');
         $this->form_validation->set_rules('lastname','Last name','trim|required');
         $this->form_validation->set_rules('email','Email','trim|valid_email|callback_verify_email|required');
         $this->form_validation->set_rules('password','password','required|min_length[8]');
         $this->form_validation->set_rules('passwordconf','Password Confirmation','required|matches[password]');
         $this->form_validation->set_rules('university','University','callback_verify_school|required');
         $this->form_validation->set_rules('major','Major','required');
      }
      /* PROCESS FORM
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
         /* SUCCESSFUL LOGIN
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
            redirect('');
         }
      }
   }
   
/* REGISTER USER : LOADS DATA
************************************************************************************/    
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

/* VERIFY SCHOOL
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
          </center><br>');
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