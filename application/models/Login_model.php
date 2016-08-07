<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
/* CONSTRUCTOR
****************************************************************************/
   public function __construct() { parent::__construct(); }
   
/* VERIFY :: login
****************************************************************************/
   public function verify_login($email,$password)
   {
      if ($this->db->query("SELECT * FROM `users` WHERE email = '".$email."' AND PASSWORD = '".$password."';")->num_rows() == 1) return TRUE;
      else return FALSE;
   }
   
/* VERIFY :: account
****************************************************************************/
   public function account_verification($email)
   {      
      $this->db->where('email', $email);
      if ($this->db->get('users')->row('verified') == 1) return TRUE;
      else return FALSE;
   }
   
/* LOGIN :: user
****************************************************************************/
   public function login_user($email)
   {
      $user = $this->db->query("SELECT * FROM  `users` WHERE email =  '".$email."';")->row();
      $this->session->set_userdata(
                                    array(
                                       'user_id'   => $user->user_id,
                                       'email'     => $email,
                                       'firstname' => $user->firstname,
                                       'lastname'  => $user->lastname,
                                       'logged_in' => TRUE
                                    )
      );
   }
   
/* GET :: hash
****************************************************************************/
   public function hash($email)
   {
      $this->db->where('email', $email);
      return $this->db->get('users')->row('hash');
   }
   
/* ACTIVATE :: account
****************************************************************************/
   public function activate_account($email)
   {      
      $this->db->where('email', $email);      
      $this->db->update('users', array('verified' => '1'));
   }
}