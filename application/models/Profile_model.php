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

/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   { 
     parent:: __construct();
   }
   
/* GET MAJOR
************************************************************************************/
   public function get_major() { return $this->major; }
   
/* GET UNIVERSITY
************************************************************************************/
   public function get_university() { return $this->university; }

/* HAS USER FILE
************************************************************************************/
   public function has_userfile()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('files');
      
      if ($query->num_rows() >= 1) return TRUE;
      else return TRUE;
   }
   
/* IS USER FILE
************************************************************************************/
   public function is_userfile($filename)
   {
      $this->db->where('filename', $filename);
      $query = $this->db->get('files');
      
      if ($query->num_rows() >= 1)
      {
         if ($query->row('user_id') == $this->session->user_id) return TRUE;
         else return FALSE;
      }
      else
      {
         return FALSE;
      }
   }
   
/* UPLOAD FILE
************************************************************************************/
   public function upload_filename($file)
   {
      //$this->db->where('user_id', $this->session->user_id);
      $this->db->where('filename', $file);
      $query = $this->db->get('files');
      
      if ($query->num_rows() >= 1)
      {
         return;
      }
      else
      {
         $this->db->set('filename', $file);
         $this->db->set('user_id', $this->session->user_id);
         $this->db->insert('files');
      }
   }
   
/* DELETE FILE
************************************************************************************/
   public function delete_filename($file)
   {
      $this->db->where('filename', $file);
      $this->db->delete('files');
   }        
   
/* LOAD UNIVERSITY
************************************************************************************/   
   public function load_university()
   {
      $this->db->select('school');
      $this->db->where('email', $this->session->email);
      $query = $this->db->get('users');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('school') == NULL) $this->university = "No Specified University";
         else $this->university = $query->row('school');
      }
      else
      {
         $this->university = "No Specified University";
      }
   }
   
/* LOAD MAJOR
************************************************************************************/
   public function load_major()
   {
      $this->db->select('major');
      $this->db->where('email', $this->session->email);
      $query = $this->db->get('users');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('major') == NULL) $this->major = "No Specified Major";
         else $this->major = $query->row('major');
      }
      else
      {
         $this->major = "No Specified Major";
      }
   }
   
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

         if ($query->num_rows() == 1)
         {
            return $query->row('filename');
         }
         else
         {
            return "default.png";
         }
      }
      else { return "default.png"; }
   }

/* GET PICTURES
************************************************************************************/
   public function get_pictures() { return $this->pictures; }
   
/* LOAD PICTURES
************************************************************************************/
   public function load_pictures()
   {
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('profile_picture');
      
      if ($query->num_rows() >= 1)
      {
         $this->pictures = $query->result();
      }
      else
      {
         $this->pictures = "no pictures";
      }
   }
}
?>