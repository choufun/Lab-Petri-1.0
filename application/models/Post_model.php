<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();      
      $this->load->library('quicksort');
   }
   
/* INCREMENT POST VIEWS
****************************************************************************/
   public function increment_post_views()
   {
      $this->db->set('views', '`views`+1', FALSE);
      $this->db->where('post_id', $this->input->get('key'));
      $this->db->update('post_views');
   }
   
/* GET POST
************************************************************************************/
   public function get_post($post_id)
   {
      $this->db->where('post_id', $post_id);
      $query = $this->db->get('posts');
      return $query->row();
   }
   
/* GET POST COMMENTS : QUICKSORT : RETURN SORTED STACK
************************************************************************************/
   public function get_order_ids($comment_id)
   {
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');

      $this->quicksort->_sort($query->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();
      return $stack;
   }
   
/* INSERT BOOKMARKS
************************************************************************************/
   public function bookmarks($data)
   {
      $this->db->insert('bookmarks', $data);
   }
   
/* GET COMMENTS
************************************************************************************/
   public function get_comments($comment_id)
   {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');
      
      if ($query->num_rows() == 0) { return NULL; }
      else
      {
         if ($query->num_rows() > 1)
         {
            $sorted_order_ids = $this->get_order_ids($comment_id);
            return $sorted_order_ids;
         }
         else
         {
            if ($query->row('comments') == NULL) { return NULL; }
            else
            {
               $sorted_order_ids = $this->get_order_ids($comment_id);
               return $sorted_order_ids;
            }
         }
      }
   }
   
/* GET COMMENT INFORMATION
************************************************************************************/
   public function get_comment_info($comment_id, $order_id)
   {
      $this->db->where('comment_id', $comment_id);
      $this->db->where('order_id', $order_id);
      $query = $this->db->get('comments');
      
      if ($query->num_rows() > 0) { return $query->row(); }
      else { return NULL; }
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
   
/* CHECK COMMENT TYPE
************************************************************************************/
   public function comment_type($order_id)
   {
      $type;
      $i;      
      for ($i = 0; $i <= count($order_id)-1; ++$i) { if ($order_id[$i] == '.') { break; } }
      if (intval(substr($order_id, -((count($order_id)-1)-($i+1)))) == 0) { $type = "comment"; }
      else { $type = "subcomment"; }
      return $type;
   }
   
/* GET NUMBER OF POST VIEWS
************************************************************************************/
   public function get_num_views($post_id)
   {
      $this->db->where('post_id', $post_id);
      $query = $this->db->get('post_views');
      return $query->row('views');
   }
   
/* GET USERNAME
************************************************************************************/
   public function get_username($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      $name = $query->row('firstname')." ".$query->row('lastname');      
      return $name;
   }
   
/* INSERT COMMENT
************************************************************************************/
   public function insert_comment($data)
   {
      
/* GETS POST_ID LAST ORDER_ID
************************************************************************************/
      $order_ids = $this->get_order_ids($data['comment_id']); 
      $last_order_id = $order_ids[count($order_ids)-1];
      
/* INSERTS NEW COMMENT
************************************************************************************/
      if ($data['type'] == 'new_comment')
      {         
         if($last_order_id == '0.0')
         {
            $new_comment = array(
               'order_id' => strval(intval($last_order_id) + 1.0),
               'comments' => $data['comments']
            );
            $this->db->where('comment_id', $data['comment_id']);
            $this->db->where('order_id', $last_order_id);
            $this->db->where('comments', NULL);
            $this->db->update('comments', $new_comment);
         }
         else
         {
            $new_comment = array(
               'comment_id' => $data['comment_id'],
               'order_id' => strval(intval($last_order_id) + 1.0),
               'user_id' => $this->session->user_id,
               'comments' => $data['comments'],
            );
            $this->db->set('month','MONTHNAME(NOW())',FALSE);
            $this->db->set('day', 'DAY(NOW())',FALSE);
            $this->db->set('yr', 'YEAR(NOW())',FALSE);
            $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
            $this->db->insert('comments', $new_comment);
         }
      }
      
/* INSERTS NEW SUBCOMMENT
************************************************************************************/
      if ($data['type'] == 'new_subcomment')
      {
         $order_id = $this->get_last_subcomment_order_id($data['comment_id'], $data['order_id']);
         
         $new_comment = array(
               'comment_id' => $data['comment_id'],
               //'order_id' => strval(floatval($data['order_id']) + 0.1),
               'order_id' => strval(floatval($order_id) + 0.1),
               'user_id' => $this->session->user_id,
               'comments' => $data['comments']
         );
         $this->db->set('month','MONTHNAME(NOW())',FALSE);
         $this->db->set('day', 'DAY(NOW())',FALSE);
         $this->db->set('yr', 'YEAR(NOW())',FALSE);
         $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
         $this->db->insert('comments', $new_comment);
      }
   }
   
/* VERIFY:: subcomments if same
************************************************************************************/
   public function same_subcomment($comment_id, $order_id)
   {  
      $this->db->select('order_id');
      $this->db->like( array(
                              'comment_id' => $comment_id,
                              'order_id' => explode('.', $order_id)[0].'.'
      ));
      $this->quicksort->_sort($this->db->get('comments')->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();

      if ($order_id == end($stack)) return TRUE;
      else return FALSE;      
   }
   
/* GET LAST SUBCOMMENT ORDER_ID
************************************************************************************/
   public function get_last_subcomment_order_id($comment_id, $order_id)
   {
      
/* GET ALL COMMENT_ID ORDER_IDS
************************************************************************************/
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');

/* SORT AND LIST ALL COMMENT_ID ORDER_IDS
************************************************************************************/
      $this->quicksort->_sort($query->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();
      
/* IDENTIFY SUBCOMMENT LOCATION
************************************************************************************/
      $temp = (intval($order_id)+1);
      $new_order_id = NULL;
      for ($i = 0; $i <= count($stack)-1; ++$i)
      {
         if ($temp == $stack[$i]) { $new_order_id = $stack[$i-1]; }
      }      
      if (is_null($new_order_id)) { return $stack[count($stack)-1]; }
      else { return $new_order_id; }     
   }
   
/* DELETE POST
************************************************************************************/
   public function delete_post($data)
   {
      // DELETE POST
      $this->db->where('post_id', $data['post_id']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->where('comment_id', $data['comment_id']);
      $this->db->delete('posts');
      
      // DELETE POST VIEWS
      $this->db->where('post_id');
      $this->db->delete('post_views');
      
      // DELETE POST COMMENTS
      $this->db->where('comment_id', $data['comment_id']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->delete('comments');
      
      // DELETE POST ACTIVITES
      //$this->db->where('user_id', $user_id);
      //$this->db->delete('activities');
   }
}