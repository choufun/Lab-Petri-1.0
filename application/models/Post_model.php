<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct() { parent:: __construct(); }
   
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
}
?>