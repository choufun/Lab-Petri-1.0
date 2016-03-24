<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
{   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {
      parent::__construct();
      $this->load->library('quicksort');
   }
   
   /* INSERT POST
   ****************************************************************************/
   public function insert_post($data)
   {
      /* CREATES EMPTY POST
      *************************************************************************/
      $this->db->insert('posts',$data);
      
      /* UPDATES POST : POST_ID
      *************************************************************************/
      $this->db->where('title', $data['title']);
      $query = $this->db->get('posts');
      $update = array(
        'comment_id' => $query->row('post_id').".".$query->row('user_id')
      );
      $this->db->where('post_id', $query->row('post_id'));
      $this->db->update('posts', $update);
      
      /* CREATES FIRST EMPTY COMMENT
      *************************************************************************/
      $comment = array (
         'comment_id' => $query->row('post_id').".".$query->row('user_id'),
         'order_id' => "0.0",
         'user_id' => $this->session->user_id,
      );
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      $this->db->insert('comments', $comment);
   }
   
   /* INSERT COMMENT
   ****************************************************************************/
   public function insert_comment($data)
   {
      /* GETS POST_ID LAST ORDER_ID
      *************************************************************************/
      $order_ids = $this->get_order_ids($data['comment_id']); 
      $last_order_id = $order_ids[count($order_ids)-1];
      
      /* INSERTS NEW COMMENT
      *************************************************************************/
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
      *************************************************************************/
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
   
   /* DEBUGGING PURPOSES
   ****************************************************************************/
   public function get_ids() { return $query = $this->get_order_ids('4.1'); }
   
   /* GET NUMBER OF COMMENTS
   ****************************************************************************/
   public function get_num_comments($comment_id)
   {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');
      return count($query->result());
   }
   
   /* GET LAST SUBCOMMENT ORDER_ID
   ****************************************************************************/
   public function get_last_subcomment_order_id($comment_id, $order_id)
   {
      /* GET ALL COMMENT_ID ORDER_IDS
      *************************************************************************/
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');

      /* SORT AND LIST ALL COMMENT_ID ORDER_IDS
      *************************************************************************/
      $this->quicksort->_sort($query->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();
      
      /* IDENTIFY SUBCOMMENT LOCATION
      *************************************************************************/
      $temp = (intval($order_id)+1);
      $new_order_id = NULL;
      for ($i = 0; $i <= count($stack)-1; ++$i)
      {
         if ($temp == $stack[$i]) { $new_order_id = $stack[$i-1]; }
      }
      
      if (is_null($new_order_id)) { return $stack[count($stack)-1]; }
      else { return $new_order_id; }     
   }
   
   /* GET POST COMMENTS : QUICKSORT : RETURN SORTED STACK
   ****************************************************************************/
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
   
   /* GET COMMENT INFORMATION
   ****************************************************************************/
   public function get_comment_info($comment_id, $order_id)
   {
      $this->db->where('comment_id', $comment_id);
      $this->db->where('order_id', $order_id);
      $query = $this->db->get('comments');
      
      if ($query->num_rows() > 0) { return $query->row(); }
      else { return NULL; }
   }
   
   /* GET POST COMMENTS: SORTED ORDER_ID
   ****************************************************************************/
   public function get_post_comments($comment_id)
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
   
   /* GET TOPICS
   ****************************************************************************/   
   public function get_topics()
   {      
      $query = $this->db->get('majors');
      
      if ($query->num_rows() > 0)
      {
         $options = array();
         foreach ($query->result() as $row)
         {
            array_push($options,'<option value="'.$row->major.'">'.$row->major.'</option>/n');
         }
         return $options;
      }
      else { return NULL; }
   }
   
   /* GET POSTS
   ****************************************************************************/
   public function get_posts()
   {
      $query = $this->db->get('posts');
      return array_reverse($query->result());
   }
   
   /* GET TIME
   ****************************************************************************/
   public function get_time($time) { return substr(strval($time), 0, -3); }
   
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
   
   /* CHECK COMMENT TYPE
   ****************************************************************************/
   public function comment_type($order_id)
   {
      $type;
      $i;      
      for ($i = 0; $i <= count($order_id)-1; ++$i) { if ($order_id[$i] == '.') { break; } }
      if (intval(substr($order_id, -((count($order_id)-1)-($i+1)))) == 0) { $type = "comment"; }
      else { $type = "subcomment"; }
      return $type;
   }
}
?>