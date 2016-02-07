<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
{   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct() { parent::__construct(); }
   
   /* INSERT POST
   ****************************************************************************/
   public function insert_post($data)
   {
      $this->db->insert('posts',$data);

      $this->db->where('title', $data['title']);
      $query = $this->db->get('posts');

      $update = array(
        'comment_id' => $query->row('post_id').".".$query->row('user_id')
      );
      $this->db->where('post_id', $query->row('post_id'));
      $this->db->update('posts', $update);
      
      // initialize comment stack
      $comment = array (
         'comment_id' => $query->row('post_id').".".$query->row('user_id'),
         'order_id' => "0.0"
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
      $order_ids = $this->get_order_ids($data['comment_id']); 
      $last_order_id = $order_ids[count($order_ids)-1];
      
      if ($data['type'] == 'new_comment')
      {         
         if($last_order_id == '0.0')
         {
            $new_comment = array(
               'order_id' => strval(floatval($last_order_id) + 1.0),
               'comments' => $data['comments']
            );
            $this->db->where('comment_id', $data['comment_id']);
            $this->db->where('order_id', $last_order_id);
            $this->db->where('comments', NULL);
            $this->db->update('comments', $new_comment);
         }
         else
         {
            $i;
            for ($i = 0; $i <= count($last_order_id); ++$i) { if ($last_order_id[$i] == '.') { break; } }
            
            $new_comment = array(
               'comment_id' => $data['comment_id'],
               'order_id' => strval(floatval(substr($last_order_id, 0, -($i+1))) + 1.0),
               'comments' => $data['comments']
            );
            $this->db->set('month','MONTHNAME(NOW())',FALSE);
            $this->db->set('day', 'DAY(NOW())',FALSE);
            $this->db->set('yr', 'YEAR(NOW())',FALSE);
            $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
            $this->db->insert('comments', $new_comment);
         }
      }
      if ($data['type'] == 'new_subcomment')
      {
         $new_comment = array(
               'comment_id' => $data['comment_id'],
               'order_id' => strval(floatval($data['order_id']) + 0.1),
               'comments' => $data['comments']
         );
         $this->db->set('month','MONTHNAME(NOW())',FALSE);
         $this->db->set('day', 'DAY(NOW())',FALSE);
         $this->db->set('yr', 'YEAR(NOW())',FALSE);
         $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
         $this->db->insert('comments', $new_comment);
      }
      
      $this->quicksort->free_stack();
      unset($this->quicksort);
   }
   
   /****************************************************************************
      DEBUGGING PURPOSES
   ****************************************************************************/
   public function get_ids()
   {
      return $query = $this->get_order_ids('1.1');
      //$query = $this->db->query("SELECT order_id FROM comments WHERE comment_id = 1.1;");
      //return $query->result();
   }
   
   /* GET POST COMMENTS -> QUICKSORT -> RETURN SORTED STACK
   ****************************************************************************/
   public function get_order_ids($comment_id)
   {
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');
      
      $this->load->library('quicksort', $query->result());
      return $this->quicksort->get_stack();
   }
   
   /* GET COMMENT INFORMATION
   ****************************************************************************/
   public function get_comment_info($comment_id, $order_id)
   {
      $this->db->where('comment_id', $comment_id);
      $this->db->where('order_id', $order_id);
      $query = $this->db->get('comments');
      return $query->row();
   }
   
   /* GET POST COMMENTS: sorted order ids
   ****************************************************************************/
   public function get_post_comments($comment_id)
   {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');
      
      if ($query->row('comments') == NULL) { return NULL; }
      else
      {
         $sorted_order_ids = $this->get_order_ids($query->row('comment_id'));
         unset($this->quicksort);
         return $sorted_order_ids;
      }
   }
   
   /* GET POSTS
   ****************************************************************************/
   public function get_posts()
   {
      $query = $this->db->get('posts');
      return $query->result();
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
