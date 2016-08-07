<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Labid_model extends CI_Model
{
   private $profile;

/* CONSTRUCTOR
****************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      $this->profile = array(
                              'university' => $this->load_university(),
                              'profile_picture' => $this->get_profile_picture(),
                              'major' => $this->load_major(),
                              'phone' => $this->load_phone_number(),
                              'linkedin' => $this->load_linkedin_account(),
                              'education' => $this->load_standing(),
                              'posts' => $this->load_posts(),
                              'bookmarks' => $this->load_bookmarks()
                           );
   }
   
/* LOAD :: phone number
****************************************************************************/
   public function load_phone_number()
   {
      $this->db->select('phone');
      $this->db->where('user_id', $this->session->user_id);
      return $this->db->get('contact')->row('phone');
   }
   
/* LOAD :: linkedin account
****************************************************************************/
   public function load_linkedin_account()
   {
      $this->db->select('linkedin');
      $this->db->where('user_id', $this->session->user_id);
      return $this->db->get('contact')->row('linkedin');
   }
   
/* LOAD :: bookmarks
****************************************************************************/
   private function load_bookmarks()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('bookmarks');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }
   
/* LOAD :: posts
****************************************************************************/
   public function load_posts()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('posts');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }

/* LOAD :: university
****************************************************************************/
   private function load_university()
   {
      $this->db->select('university');
      $this->db->where('user_id', $this->session->user_id);
      return $this->db->get('education')->row('university');
   }
   
/* LOAD :: major
****************************************************************************/
   public function load_major()
   {
      $this->db->select('major');
      $this->db->where('user_id', $this->session->user_id);
      return $this->db->get('education')->row('major');
   }
   
/* LOAD :: standing
****************************************************************************/
   public function load_standing()
   {
      $this->db->select('standing');
      $this->db->where('user_id', $this->session->user_id);
      return $this->db->get('education')->row('standing');
   }
   
/* UPDATE :: contacts
****************************************************************************/
   public function update_contacts($data)
   {
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('contact', $data);
   }

/* UPDATE :: education
****************************************************************************/
   public function update_education($data)
   {
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('education', $data);
   }
   
/* GET :: profile
****************************************************************************/
   public function get_profile() { return $this->profile; }
   
/* GET :: education
****************************************************************************/
   public function get_university() { return $this->profile['university']; }
   
/* GET :: contacts
****************************************************************************/
   public function get_phone() { return $this->profile['phone']; }
   
/* GET :: major
****************************************************************************/
   public function get_major() { return $this->profile['major']; }
   
/* GET :: bookmark title
****************************************************************************/
   public function get_bookmark_title($post_id)
   {
      $this->db->where('post_id', $post_id);
      return $this->db->get('posts')->row('title');
   }
   
/* GET :: profile picture
****************************************************************************/
   public function get_profile_picture()
   {
      if ($this->session->logged_in == TRUE)
      {
         $this->db->where('user_id', $this->session->user_id);
         $this->db->where('default_picture', 1);
         $query = $this->db->get('profile_picture');

         if ($query->num_rows() == 1) return $query->row('filename');
         else return "default.png";
      }
      else return "default.png";
   }
   
/* SET :: profile picture
****************************************************************************/
   public function insert_profile_picture($picture)
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->update('profile_picture',
                           array(
                              'filename' => $picture,
                              'user_id'  => $this->session->user_id,
                              'default_picture' => 1,
                           )
                       );
   }
   
/* DELETE :: bookmarks
****************************************************************************/
   public function delete_bookmark($data)
   {
      $this->db->where('bookmark_id', $data['bookmark_id']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->delete('bookmarks');
   }
   
/* DELETE :: posts
****************************************************************************/
   public function delete_post()
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