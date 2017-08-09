<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labmates_model extends CI_Model
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
         "  SELECT DISTINCT university
            FROM education
            WHERE standing = '".$standing."'
            ORDER BY university <> 'a',
            university ASC
            ;
         "
      );
      return $query->result();
   }
  
/* SET :: pending status
************************************************************************************/
   public function set_pending_status($data)
   {
      $this->db->insert('friends', array(
            'user_id' => $data['user_id'],
            'friend_id' => $data['friend_id'],
            'status' => "pending",
            'action' =>  "accepting",
      ));
      
      $this->db->insert('friends', array (
            'user_id' => $data['friend_id'],
            'friend_id' => $data['user_id'],
            'status' => "pending",
            'action' => "requesting",
      ));
   }

/* GET CONNECTION PENDING
************************************************************************************/
   public function get_pending_status($user_id)
   {
      $this->db->where('friend_id', $user_id);
      $query = $this->db->get('friends');
      return $query->row('status');
   }

/* GET :: connection status
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
      else { return NULL;} //return "default.png"; }        
   }
   
/* GET USER
************************************************************************************/
   public function get_user($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname')."&nbsp;".$query->row('lastname');
   }
   
/* UNSET :: message notification
********************************************************************/
   public function unset_message_notification($friend_id)
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('friend_id', $friend_id);
      $this->db->where('new_messages', 1);
      $this->db->update('notifications', array('new_messages' => 0));
   }
}