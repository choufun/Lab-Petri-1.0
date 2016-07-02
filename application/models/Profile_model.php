<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Profile_model extends CI_Model
{
/* fields
****************************************************************************/
   private $email;
   private $major;
   private $university;
   private $pictures;
   private $standing;
   private $phone_number;
   private $linkedin_account;
   private $posts;
   private $bookmarks;

/* CONSTRUCTOR
****************************************************************************/
   public function __construct() { parent:: __construct(); }
   
/* SET :: profile
****************************************************************************/
   public function set_profile()
   {
      $this->load_major();
      $this->load_university();
      $this->load_phone_number();
      $this->load_standing();
      $this->load_linkedin_account();      
      $this->load_posts();
      $this->load_bookmarks(); 
   }
   
/* LOAD :: phone number
****************************************************************************/
   public function load_phone_number()
   {
      $this->db->select('phone');
      $this->db->where('user_id', $this->session->user_id);
      $this->phone_number = $this->db->get('contact')->row('phone');
   }
   
/* LOAD :: linkedin account
****************************************************************************/
   public function load_linkedin_account()
   {
      $this->db->select('linkedin');
      $this->db->where('user_id', $this->session->user_id);
      $this->linkedin_account = $this->db->get('contact')->row('linkedin');
   }
   
/* LOAD :: bookmarks
****************************************************************************/
   private function load_bookmarks()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('bookmarks');
      
      if ($query->num_rows() > 0) { $this->bookmarks = $query->result(); }
      else { $this->bookmarks = NULL; }
   }
   
/* LOAD :: posts
****************************************************************************/
   public function load_posts()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('posts');
      
      if ($query->num_rows() > 0) { $this->posts = $query->result(); }
      else { $this->posts = NULL; }
   }

/* LOAD :: university
****************************************************************************/
   private function load_university()
   {
      $this->db->select('university');
      $this->db->where('user_id', $this->session->user_id);
      $this->university = $this->db->get('education')->row('university');
   }
   
/* LOAD :: major
****************************************************************************/
   public function load_major()
   {
      $this->db->select('major');
      $this->db->where('user_id', $this->session->user_id);
      $this->major = $this->db->get('education')->row('major');
   }
   
/* LOAD :: standing
****************************************************************************/
   public function load_standing()
   {
      $this->db->select('standing');
      $this->db->where('user_id', $this->session->user_id);
      $this->standing = $this->db->get('education')->row('standing');
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
   
/* GET :: bookmark title
****************************************************************************/
   public function get_bookmark_title($post_id)
   {
      $this->db->where('post_id', $post_id);
      return $this->db->get('posts')->row('title');
   }
   
/* GET :: bookmarks
****************************************************************************/
   public function get_bookmarks() { return $this->bookmarks; }     
   
/* GET :: posts
****************************************************************************/
   public function get_posts() { return $this->posts; }
   
/* GET :: phone number
****************************************************************************/
   public function get_phone_number() { return $this->phone_number; }
   
/* GET :: linkedin account
****************************************************************************/
   public function get_linkedin_account() { return $this->linkedin_account; }
   
/* GET :: university
****************************************************************************/
   public function get_university() { return $this->university; }

/* GET :: major
****************************************************************************/
   public function get_major() { return $this->major; }
   
/* GET :: standing
****************************************************************************/
   public function get_standing() { return $this->standing; }
   
/* GET PROFILE PICTURE
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
   
/* UPLOAD :: file
****************************************************************************/
   public function upload_filename($file)
   {
      $this->db->where('filename', $file);      
      if ($this->db->get('research_files')->num_rows() >= 1) return;
      else
      {
         $this->db->set('filename', $file);
         $this->db->set('user_id', $this->session->user_id);
         $this->db->insert('research_files');
      }
   }
   
/* HAS USER FILE
****************************************************************************/
   public function has_userfile()
   {
      $this->db->where('user_id', $this->session->user_id);
      if ($this->db->get('research_files')->num_rows() >= 1) return TRUE;
      else return TRUE;
   }
   
/* IS USER FILE
****************************************************************************/
   public function is_userfile($filename)
   {
      $this->db->where('filename', $filename);
      $query = $this->db->get('research_files');      
      if ($query->num_rows() >= 1)
      {
         if ($query->row('user_id') == $this->session->user_id) return TRUE;
         else return FALSE;
      }
      else return FALSE;
   }
   
/* DELETE FILE
****************************************************************************/
   public function delete_filename($file)
   {
      $this->db->where('filename', $file);
      $this->db->delete('research_files');
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
?>