<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
   private $options = "";
   private $schools = "";
   private $hash = "";
   
/* CONSTRUCTOR
****************************************************************************/
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
   
   public function index()
   {      
      if ($this->input->get('id') == "registration")
      {
         $this->load->view('templates/header');
         $this->load->view('login/registration',
                              array(
                                 'options' => $this->register_model->get_majors(),
                                 'schools' => $this->register_model->get_schools(),
                              )
                           );
         $this->load->view('templates/footer');
      }
      else
      {
      
/* LOGIN :: form rules
****************************************************************************/
         if ($this->input->post('login') == 'login')
         {
            $this->form_validation->set_rules('email','email','trim|required|valid_email');
            $this->form_validation->set_rules('password','password','required|callback_login');
         }

/* REGISTRATION :: form validations
****************************************************************************/
         if ($this->input->post('register') == 'register')
         {        
            $required = FALSE;
            if (($this->input->post('undergraduate') !== NULL) ||
                ($this->input->post('graduate')      !== NULL) ||
                ($this->input->post('professor')     !== NULL)) { $required = TRUE; }

            $this->form_validation->set_rules('education', 'Education', $required);
            $this->form_validation->set_rules('firstname','First name','trim|required');
            $this->form_validation->set_rules('lastname','Last name','trim|required');
            $this->form_validation->set_rules('email','Email','trim|valid_email|callback_verify_email|required');
            $this->form_validation->set_rules('password','password','required|min_length[8]');
            $this->form_validation->set_rules('passwordconf','Password Confirmation','required|matches[password]');
            $this->form_validation->set_rules('university','University','required');
            $this->form_validation->set_rules('major','Major','required');
         }

/* LOGIN REGISTRATION :: failure
****************************************************************************/
         if ($this->form_validation->run() === FALSE)
         {    
            $this->load->view('templates/header');
            $this->load->view('login',
                                 array(
                                    'options' => $this->register_model->get_majors(),
                                    'schools' => $this->register_model->get_schools(),
                                 )
                              );
            $this->load->view('templates/footer');
         }
         else
         {

/* REGISTRATION :: success
****************************************************************************/
            if ($this->input->post('register') == 'register')
            {
               $this->register();            
               $this->send_mail($this->input->post('email'));
               redirect('confirmaccount');
            }

/* LOGIN :: success
****************************************************************************/
            if ($this->input->post('login') == 'login')
            {
               if ($this->login_model->account_verification($this->input->post('email')))
               {
                  $this->login_model->login_user($this->input->post('email'));
                  redirect('');
               }
               else redirect('confirmaccount');
            }        
         }
      }
   }
   
/* SEND :: mail
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
      //$this->email->from('labpetri.org@gmail.com');
      $this->email->from('contact@labpetri.org');      
      $this->email->to($email);
      $this->email->subject('Welcome to Lab Petri');
      $this->email->message(
         $this->load->view('templates/emails/welcome',
              array (
                  'user' => $this->input->post('firstname')." ".$this->input->post('lastname'),
                  'email' => $this->input->post('email'),
                  'password' => $this->input->post('password'),
                  'hash' => $this->hash,
              ), TRUE)
      );
      if($this->email->send()) return;
      else return show_error($this->email->print_debugger());    
   }
   
/* REGISTRATION :: callback
****************************************************************************/ 
   public function register()
   {
      $this->hash = md5(rand(0,1000));
      $this->register_model->register(
         array(
            'firstname' => ucfirst($this->input->post('firstname')),
            'lastname'  => ucfirst($this->input->post('lastname')),
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'hash'      => $this->hash,
         )
      );
   }
   
/* LOGIN :: validate
****************************************************************************/
   public function login()
   {    
      if (($this->login_model->verify_login($this->input->post('email'),$this->input->post('password'))) == true) return true;
      else
      {
         $this->form_validation->set_message('login','<center>Invalid email or password.</center>');
         return false;
      }
   }
   
/* VERIFY :: email
****************************************************************************/
   public function verify_email($email)
   {
      if ($this->register_model->username_unique($email) == FALSE)
      {
         $this->form_validation->set_message('verify_email','<center>This user is already registered.</center><br>');
         return FALSE;
      }
      else return TRUE;
   }
   
/* ACTIVATE :: account
****************************************************************************/
   public function activate_account()
   {
      $email = $this->input->get('email');
      $hash = $this->input->get('hash');      
      if ($hash == $this->login_model->hash($email)) $this->login_model->activate_account($email);
      $this->login_model->login_user($email);
      redirect('');      
   }
   
/* LOGOUT :: user
****************************************************************************/
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