<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
{
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {
      parent::__construct();
   }
   
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
   }
   
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
}
?>
