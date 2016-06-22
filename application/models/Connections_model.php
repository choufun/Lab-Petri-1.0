<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connections_model extends CI_Model
{
/* FIELD
************************************************************************************/
   private $users;
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      $this->load->library('quicksort');
   }   

/* GET REGISTERED UNIVERSITIES
      - UNDERGRADUATES
      - GRADUATES
      - PROFESSORS
************************************************************************************/
   public function get_registered_universities($standing)
   {
      $query = $this->db->query(
         "
            SELECT DISTINCT university
            FROM education
            WHERE standing = '".$standing."'
            ORDER BY university <> 'a',
            university ASC
            ;
         "
      );
      return $query->result();
   }
  
   public function accepts_request($user_id, $friend_id)
   {
      $data = array('status' => "accepted");      
      $this->db->where('user_id', $user_id);
      $this->db->where('friend_id', $friend_id);
      $this->db->where('status', "pending");      
      $this->db->update('friends', $data);
      
      $data2 = array(
         'user_id' => $friend_id,
         'friend_id' => $user_id,
         'status' => "accepted",
      );
      $this->db->insert('friends', $data2);
   }
  
/* SET SET PENDING STATUS
************************************************************************************/
   public function pending_status($data)
   {
      $this->db->insert('friends', $data);
   }

/* GET CONNECTION PENDING
************************************************************************************/
   public function get_pending_status($user_id)
   {
      $this->db->where('friend_id', $user_id);
      $query = $this->db->get('friends');
      return $query->row('status');
   }
   
/* LOAD PENDING
************************************************************************************/
   public function load_pendings()
   {
      $this->db->where('friend_id', $this->session->user_id);
      $this->db->where('status', "pending");
      $query = $this->db->get('friends');
      
      if ($query->num_rows() > 0) { return $query->result(); }
      else { return NULL; }
   }

/* GET CONNECTION STATUS
************************************************************************************/
   public function get_status($user_id)
   {
      $this->db->where('friend_id', $user_id);
      $query = $this->db->get('friends');
      return $query->row('status');
   }

/* GET REGISTERED USERS
      - UNDERGRADUATES
      - GRADUATES
      - PROFESSORS
************************************************************************************/
   public function get_registered_users($university, $standing)
   {      
      $query = $this->db->query(
         "
            SELECT user_id
            FROM education
            WHERE university = '".$university->university."'
            AND standing = '".$standing."'
            ;
         "
      );
      
      return $query->result();
   }
   
/* REMOVES SCHOOL EXTENSION
************************************************************************************/
   public function remove_extension($school)
   {
      $i;
      for ($i = (strlen($school)-1); $i >= 0; $i--)
      {
         if ($school[$i] == '(') break;
      }
      return substr($school, 0, $i-1);
   }
   
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
************************************************************************************/
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