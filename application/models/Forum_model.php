<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }
   
/* GET PROFILE PICTURE
************************************************************************************/
   public function get_profile_picture()
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      
      if ($query->num_rows() == 1)
      {
         return $query->row('filename');
      }
      else
      {
         return "no default profile picture";
      }
   }
 /**********************************************************************************/
   
   public function load_forum()
   {
      $query = $this->db->query("SELECT * FROM  posts INNER JOIN users ON posts.user_id=users.user_id;");
      return $query->result();
   }

	public function load_forum_post($post_id)
   {
      $query = $this->db->query("SELECT * FROM  posts INNER JOIN users ON posts.user_id=users.user_id WHERE posts.post_id=" . $post_id." LIMIT 1;");
      return $query->row();
   }
	
	public function post($data){
		$this->db->set('month','MONTHNAME(NOW())',FALSE);
      	$this->db->set('day', 'DAY(NOW())',FALSE);
      	$this->db->set('yr', 'YEAR(NOW())',FALSE);
      	$this->db->set('initial_time', 'CURRENT_TIME', FALSE);
		$this->db->insert('posts', $data);
	}
	
	public function comment($data){
		$this->db->insert('comment_data', $data);
	}
	
	public function load_comments($post_id){
		return $this->db->query("SELECT * FROM comment_data INNER JOIN users ON comment_data.user_id=users.user_id WHERE post_id=" . $post_id.";");
	}
	
	public function reply($data){
		$this->db->insert('reply_to_comment', $data);
	}
	
	public function load_replies($post_id){
		return $this->db->query("SELECT * FROM reply_to_comment 
									INNER JOIN users ON reply_to_comment.user_id=users.user_id 
									INNER JOIN comment_data ON reply_to_comment.comment_id=comment_data.comment_id
									WHERE comment_data.post_id=" . $post_id.";");
	}
}
?>