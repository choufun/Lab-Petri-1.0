<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connections_model extends CI_Model
{
/* FIELD
************************************************************************************/
   private $users;
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct() { parent:: __construct(); }
   
/* GET USERS
************************************************************************************/
   public function get_users() { return $this->users; }

/* LOAD USERS
************************************************************************************/
   public function load_users()
   {      
      $query = $this->db->get('users');
      $this->users = $query->result();
   }
   
   /* GET PROFILE PICTURE
   ****************************************************************************/
   public function get_profile_picture($user_id)
   {
      $this->db->where('user_id', $user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return "default.png"; }      
   }
   
/* GET USER
************************************************************************************/
   public function get_user($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname')."&nbsp;".$query->row('lastname');
   }
   
}