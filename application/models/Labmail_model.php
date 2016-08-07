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
         $this->db->where('user_id', $this->session->user_id);
         $query = $this->db->get('messages');
         
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
      return $result;
   }
   
/* INSERT :: message
********************************************************************/
   public function inserts_message($data)
   {
      $group_id = implode (',', array ($data['user_id'], ($data['friend_id'])));
      $this->db->limit(1);
      $this->db->order_by('order_id', 'DESC');
      $this->db->where('group_id', $group_id);
      $query = $this->db->get('messages');
      
      if ($query->num_rows() > 0)
      {
         $this->db->insert('messages', 
                              array (
                                 'group_id' => $group_id,
                                 'order_id' => $query->row('order_id')+1,
                                 'user_id'  => $data['user_id'],
                                 'message'  => $data['message'], 
                              )
                          );
      }
      else
      {
         $this->db->insert('messages',
                              array (
                                    'group_id' => $group_id,
                                    'order_id' => 1,
                                    'user_id'  => $data['user_id'],
                                    'message'  => $data['message'], 
                              )
                          );
      }
   }
   
/* GET :: friend name
********************************************************************/
   public function get_name($friend_id)
   {
      $this->db->where('user_id', $friend_id);
      $query = $this->db->get('users');
      return $query->row('firstname')." ".$query->row('lastname');
   }
   
/* GET :: friend list
********************************************************************/
   public function get_friends()
   {
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      {
         /*
         $query = $this->db->query(
            '
               SELECT *
               FROM users
               INNER JOIN friends
               WHERE users.user_id = friends.friend_id
               AND friends.status = "accepted"
               AND friends.friend_id <> '.$this->session->user_id.';
            '
         );
         */
         $this->db->select('friend_id');
         $this->db->where('user_id', $this->session->user_id);
         $this->db->where('status', "accepted");
         $query = $this->db->get('friends');
         
         if ($query->num_rows() > 0) { return $query->result(); }
         else { return NULL; }
      }
      else { return NULL; }
   }
}
?>