<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();
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
   
/* GET COMMENTS
************************************************************************************/
   public function get_comments($comment_id)
   {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('comments');
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
}
?>