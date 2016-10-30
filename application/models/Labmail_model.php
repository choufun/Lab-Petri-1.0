<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
class Labmail_model extends CI_Model
{
/* CONSTRUCTOR
********************************************************************/
   public function __construct() { parent::__construct(); }
   
/* GET :: messages
********************************************************************/
   public function get_messages()
   {      
      $result = NULL;      
      if ($this->input->get('id') !== NULL)
      {
         $result = "no messages";
         
         $group_id = $this->group_id($this->session->user_id, $this->input->get('id'));
         $this->db->where('group_id', $group_id);
         $query = $this->db->get('messages');
         
         if ($query->num_rows() > 0)
         {            
            $this->db->where('group_id', $group_id);
            $this->db->order_by('order_id', "ASC");
            $messages = $this->db->get('messages');
            $result = $messages->result();
         }
         /*
         if ($query->num_rows() > 0)
         {
            $friend_id = $this->input->get('id');
            $user_id = $this->session->user_id;
            $group_ids = array();            
            foreach ($query->result() as $row)
            {
               if (in_array($user_id, explode(",", $row->group_id)))
               {
                  array_push($group_ids, $row->group_id);
               }
            }            
            foreach ($group_ids as $group_id)
            {
               if (in_array($friend_id, explode(",", $group_id)) &&
                   in_array($user_id, explode(",", $group_id)))
               {
                  $this->db->where('group_id', $group_id);
                  $this->db->order_by('order_id', "ASC");
                  $messages = $this->db->get('messages');
                  $result = $messages->result();
               }
            }            
         }
      }
      */
      }
      return $result;
   }

/* SET :: group id :: from least to greatest
********************************************************************/
   private function group_id($user_id, $friend_id)
   {
      if ($user_id < $friend_id) return implode(',',array($user_id, $friend_id));
      else return implode(',', array($friend_id, $user_id));
   }
   
/* INSERT :: message
********************************************************************/
   public function inserts_message($data)
   {
      //$group_id = implode (',', array ($data['user_id'], ($data['friend_id'])));
      $group_id = $this->group_id($data['user_id'], ($data['friend_id']));
      $this->db->limit(1);
      $this->db->order_by('order_id', 'DESC');
      $this->db->where('group_id', $group_id);
      $query = $this->db->get('messages');
      
      if ($query->num_rows() > 0)
      {
         $this->db->insert('messages', array(
                                 'group_id' => $group_id,
                                 'order_id' => $query->row('order_id')+1,
                                 'user_id'  => $data['user_id'],
                                 'message'  => $data['message'], 
         ));
      }
      else
      {
         $this->db->insert('messages', array(
                                    'group_id' => $group_id,
                                    'order_id' => 1,
                                    'user_id'  => $data['user_id'],
                                    'message'  => $data['message'], 
         ));
      }
   }
   
/* GET :: users name
********************************************************************/
   public function get_friends_name($friend_id)
   {
      $this->db->where('user_id', $friend_id);
      $query = $this->db->get('users');
      return $query->row('firstname')." ".$query->row('lastname');
   }
   
/* GET :: friends list
********************************************************************/
   public function get_friends_list()
   {
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      {
         $this->db->select('friend_id');
         $this->db->where('user_id', $this->session->user_id);
         $this->db->where('status', "accepted");
         $query = $this->db->get('friends');
         
         if ($query->num_rows() > 0) { return $query->result(); }
         else { return NULL; }
      }
      else { return NULL; }
   }

/* GET :: pending requests :: user accepts
********************************************************************/
   public function get_pending_requests()
   {
      $this->db->where('friend_id', $this->session->user_id);
      $this->db->where('status', "pending");
      $this->db->where('action', "accepting");
      $query = $this->db->get('friends');
      
      if ($query->num_rows() > 0) { return $query->result(); }
      else { return NULL; }
   }
   
/* ACCEPT :: pending request
********************************************************************/
   public function accepts_pending_request($user_id, $friend_id)
   {            
      $this->db->where('user_id', $user_id);
      $this->db->where('friend_id', $friend_id);
      $this->db->where('status', "pending");      
      $this->db->update('friends', array('status' => "accepted"));
      
      $this->db->where('user_id', $friend_id);
      $this->db->where('friend_id', $user_id);
      $this->db->where('status', "pending");      
      $this->db->update('friends', array('status' => "accepted"));
   }
   
/* GET :: pending requests :: user accepts

$this->db->where('email', $email);      
$this->db->update('users', array('verified' => '1'));

********************************************************************/
   public function get_new_message_notifications()
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('new_messages', 1);
      $query = $this->db->get('notifications');
      
      if ($query->num_rows() > 0) { return $query->result(); }
      else { return NULL; }
   }
   
/* SET :: new message notification
********************************************************************/
   public function set_new_message_notification($friend_id)
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('notifications');
      //existing notification
      if ($query->num_rows() > 0)
      {
         $this->db->where('user_id', $friend_id);
         $this->db->where('friend_id', $this->session->user_id);
         $this->db->update('notifications', array('new_messages' => 1));
      }
      //set all notification
      else
      {
         //set user's notification
         $this->db->insert('notifications', array(
                                    'user_id'  => $this->session->user_id,
                                    'friend_id' => $friend_id,
         ));
         //set other's notification
         $this->db->insert('notifications', array(
                                    'user_id'  => $friend_id,
                                    'friend_id' => $this->session->user_id,
         ));
      }
   }
   
/* UNSET :: message notification
********************************************************************/
   public function unset_message_notification()
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('friend_id', $this->input->get('id'));
      $this->db->where('new_messages', 1);
      $this->db->update('notifications', array('new_messages' => 0));
   }
}
?>