<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
/* CONSTRUCTOR
****************************************************************************/
   function __construct() { parent::__construct(); }

/* VERIFY LOGIN - callback() for login.valid_login()
****************************************************************************/
   public function verify_login($email,$password){
      $query = $this->db->query(
         "SELECT * FROM  `users` WHERE email =  '".$email."' AND PASSWORD =  '".$password."';"
      );

      if ($query->num_rows() == 1)
         return true;
      else
         return false;
   }
   
/* LOGIN USER
****************************************************************************/
   public function login_user($email)
   {
      $query = $this->db->query("SELECT * FROM  `users` WHERE email =  '".$email."';");
      $user = $query->row();
      $newdata = array(
         'user_id' => $user->user_id,
         'email'  => $email,
         'firstname' => $user->firstname,
         'lastname'=> $user->lastname,
         'logged_in' => TRUE
      );
      $this->session->set_userdata($newdata);
   }
}
?>