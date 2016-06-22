<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
class Profile_model extends CI_Model
{
/* FIELD
************************************************************************************/
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
************************************************************************************/
   public function __construct() { parent:: __construct(); }
   
/* UPDATE CONTACTS
************************************************************************************/
   public function update_contacts($data)
   {
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('contact', $data);
   }

/* UPDATE EDUCATION
************************************************************************************/
   public function update_education($data)
   {
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('education', $data);  
   }
   
/* GET BOOKMARK TITLE
************************************************************************************/
   public function get_bookmark_title($post_id)
   {
      $this->db->where('post_id', $post_id);
      $query = $this->db->get('posts');
      return $query->row('title');
   }
   
/* LOAD BOOKMARKS
************************************************************************************/
   public function load_bookmarks()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('bookmarks');
      
      if ($query->num_rows() > 0) { $this->bookmarks = $query->result(); }
      else { $this->bookmarks = NULL; }
   }
   
/* GET BOOKMARKS
************************************************************************************/
   public function get_bookmarks() { return $this->bookmarks; }   
   
/* LOAD POSTS
************************************************************************************/
   public function load_posts()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('posts');
      
      if ($query->num_rows() > 0) { $this->posts = $query->result(); }
      else { $this->posts = NULL; }
   }
   
/* GET POSTS
************************************************************************************/
   public function get_posts() { return $this->posts; }

/* USER PHONE NUMBER
************************************************************************************/
/* LOAD PHONE NUMBER
************************************************************************************/
   public function load_phone_number()
   {
      $this->db->select('phone');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('contact');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('phone') == NULL) $this->phone_number = "No Specified Phone Number";
         else $this->phone_number = $query->row('phone');
      }
      else { $this->phone_number = "No Specified Phone Number"; }
   }
   
/* GET PHONE NUMBER
************************************************************************************/
   public function get_phone_number() { return $this->phone_number; }

/* USER LINKEDIN ACCOUNT
************************************************************************************/
/* LOAD LINKEDIN ACCOUNT
************************************************************************************/
   public function load_linkedin_account()
   {
      $this->db->select('linkedin');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('contact');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('linkedin') == NULL) $this->linkedin_account = "No Specified Account";
         else $this->linkedin_account = $query->row('linkedin');
      }
      else { $this->linkedin_account = "No Specified Account"; }
   }
/* GET LINKEDIN ACCOUNT
************************************************************************************/
   public function get_linkedin_account() { return $this->linkedin_account; }

/* RESEARCH FILES
************************************************************************************/
/* UPLOAD FILE
************************************************************************************/
   public function upload_filename($file)
   {
      //$this->db->where('user_id', $this->session->user_id);
      $this->db->where('filename', $file);
      $query = $this->db->get('research_files');
      
      if ($query->num_rows() >= 1) { return; }
      else
      {
         $this->db->set('filename', $file);
         $this->db->set('user_id', $this->session->user_id);
         $this->db->insert('research_files');
      }
   }
/* HAS USER FILE
************************************************************************************/
   public function has_userfile()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('research_files');
      
      if ($query->num_rows() >= 1) return TRUE;
      else return TRUE;
   }
   
/* IS USER FILE
************************************************************************************/
   public function is_userfile($filename)
   {
      $this->db->where('filename', $filename);
      $query = $this->db->get('research_files');
      
      if ($query->num_rows() >= 1)
      {
         if ($query->row('user_id') == $this->session->user_id) return TRUE;
         else return FALSE;
      }
      else { return FALSE; }
   }
/* DELETE FILE
************************************************************************************/
   public function delete_filename($file)
   {
      $this->db->where('filename', $file);
      $this->db->delete('research_files');
   }

/* USER UNIVERSITY
************************************************************************************/
/* REMOVE EXTENSION
****************************************************************************/
   private function remove_extension($school)
   {
      $i;
      for ($i = (strlen($school)-1); $i >= 0; $i--)
      {
         if ($school[$i] == '(') break;
      }
      return substr($school, 0, $i-1);
   }
/* LOAD UNIVERSITY
************************************************************************************/
   public function load_university()
   {
      $this->db->select('university');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('university') == NULL) $this->university = "No Specified University";
         else $this->university = $this->remove_extension($query->row('university'));
      }
      else { $this->university = "No Specified University"; }
   }
/* GET UNIVERSITY
************************************************************************************/
   public function get_university() { return $this->university; }
   
/* USER DEGREE
************************************************************************************/
/* LOAD DEGREE
************************************************************************************/
   public function load_degree()
   {
      $this->db->select('degree');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('degree') == NULL) $this->degree = "No Specified Degree";
         else $this->degree = $query->row('degree');
      }
      else { $this->degree = "No Specified Degree"; }
   }
   
/* USER MAJOR
************************************************************************************/
/* LOAD MAJOR
************************************************************************************/
   public function load_major()
   {
      $this->db->select('major');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('major') == NULL) $this->major = "No Specified Major";
         else $this->major = $query->row('major');
      }
      else { $this->major = "No Specified Major"; }
   }
/* GET MAJOR
************************************************************************************/
   public function get_major() { return $this->major; }

/* USER MINOR
************************************************************************************/
/* LOAD MINOR
************************************************************************************/
   public function load_standing()
   {
      $this->db->select('standing');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('standing') == NULL) $this->minor = "No Specified Standing-ERROR!";
         else $this->standing = $query->row('standing');
      }
      else { $this->standing = "No Specified Standing-ERROR!"; }
   }
/* GET MINOR
************************************************************************************/
   public function get_standing() { return $this->standing; }

/* PROFILE PICTURE
************************************************************************************/
/* INSERT PROFILE PICTURE
************************************************************************************/
   public function insert_profile_picture($picture)
   {
      $this->db->set('default_picture', 0);
      $this->db->where('user_id', $this->session->user_id);
      $this->db->where('default_picture', 1);
      $this->db->update('profile_picture');
      
      $data = array(
         'filename' => $picture,
         'user_id'  => $this->session->user_id,
         'default_picture' => 1,
      );
      
      $this->db->insert('profile_picture', $data);
   }
/* GET PROFILE PICTURE
************************************************************************************/
   public function get_profile_picture()
   {
      if ($this->session->logged_in == TRUE)
      {
         $this->db->where('user_id', $this->session->user_id);
         $this->db->where('default_picture', 1);
         $query = $this->db->get('profile_picture');

         if ($query->num_rows() == 1) { return $query->row('filename'); }
         else { return "default.png"; }
      }
      else { return "default.png"; }
   }
}
?>