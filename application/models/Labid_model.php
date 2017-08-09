<?php defined('BASEPATH') OR exit('No direct script access allowed');

class labid_model extends CI_Model
{
   private $profile;

/* CONSTRUCTOR
****************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      
      if ($this->input->get('view') === NULL)
      {
         $this->profile = array(
                                 'university' => $this->load_university(),
                                 'profile_picture' => $this->get_profile_picture(),
                                 'major' => $this->load_major(),
                                 'phone' => $this->load_phone_number(),
                                 'linkedin' => $this->load_linkedin_account(),
                                 'education' => $this->load_standing(),
                                 'posts' => $this->load_posts(),
                                 'bookmarks' => $this->load_bookmarks(),
                                 'blog_posts' => $this->load_blog_posts(),
                              );
      }
      else
      {
         $this->profile = array(
                                 'profile_picture' => $this->load_user_profile_picture($this->input->get('view')),
                                 'name' => $this->load_user_name($this->input->get('view')),
                                 'email' => $this->load_user_email($this->input->get('view')),
                                 'university' => $this->load_user_university($this->input->get('view')),
                                 'profile_picture' => $this->get_user_profile_picture($this->input->get('view')),
                                 'major' => $this->load_user_major($this->input->get('view')),
                                 'phone' => $this->load_user_phone_number($this->input->get('view')),
                                 'linkedin' => $this->load_user_linkedin_account($this->input->get('view')),
                                 'education' => $this->load_user_education($this->input->get('view')),
                              );
      }
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
   
/* LOAD ::  petri dish posts
****************************************************************************/
   public function load_posts()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('posts');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }
   
/* LOAD ::  lab cast blog posts
****************************************************************************/
   public function load_blog_posts()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('blog_posts');
      
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
   
/* LOAD :: user name
************************************************************************************/
   public function load_user_name($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname')."&nbsp;".$query->row('lastname');
   }
   
/* LOAD :: user profile picture
****************************************************************************/
   public function load_user_profile_picture($user_id)
   {
      $this->db->where('user_id', $user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return NULL;} //return "default.png"; }  
   }
   
/* GET :: user email
****************************************************************************/
   public function load_user_email($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('email');
   }
   
/* GET :: user major
****************************************************************************/
   public function load_user_major($user_id)
   {
      $this->db->select('major');
      $this->db->where('user_id', $user_id);
      return $this->db->get('education')->row('major');
   }
   
/* GET :: user education
****************************************************************************/
   public function load_user_education($user_id)
   {
      $this->db->select('standing');
      $this->db->where('user_id', $user_id);
      return $this->db->get('education')->row('standing');
   }
   
/* LOAD :: user university
****************************************************************************/
   private function load_user_university($user_id)
   {
      $this->db->select('university');
      $this->db->where('user_id', $user_id);
      return $this->db->get('education')->row('university');
   }
   
/* LOAD :: user phone number
****************************************************************************/
   public function load_user_phone_number($user_id)
   {
      $this->db->select('phone');
      $this->db->where('user_id', $user_id);
      return $this->db->get('contact')->row('phone');
   }
   
/* LOAD :: user linkedin account
****************************************************************************/
   public function load_user_linkedin_account($user_id)
   {
      $this->db->select('linkedin');
      $this->db->where('user_id', $user_id);
      return $this->db->get('contact')->row('linkedin');
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
   
/* UPDATE :: petri dish research, project
****************************************************************************/
   public function update_petridish($data, $post_id)
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('post_id', $post_id);
      $this->db->update('posts', $data);
   }
   
/* UPDATE :: blog post
****************************************************************************/
   public function update_labcast_blog_post($data, $post_id)
   {
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('post_id', $post_id);
      $this->db->update('blog_posts', $data);
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
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return NULL;} //return "default.png"; }
   }
   
/* GET :: user name
************************************************************************************/
   public function get_username($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname')."&nbsp;".$query->row('lastname');
   }
   
/* GET :: user profile picture
****************************************************************************/
   public function get_user_profile_picture($user_id)
   {
      $this->db->where('user_id', $user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return NULL;} //return "default.png"; }  
   }
   
/* GET :: user major
****************************************************************************/
   public function get_user_major($user_id)
   {
      $this->db->select('major');
      $this->db->where('user_id', $user_id);
      return $this->db->get('education')->row('major');
   }
   
/* GET :: education
****************************************************************************/
   public function get_user_education($user_id)
   {
      $this->db->select('standing');
      $this->db->where('user_id', $user_id);
      return $this->db->get('education')->row('standing');
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
   
/* GET :: user profile
****************************************************************************/
   public function get_user_profile($user_id)
   {
      return array();
   }
   
}