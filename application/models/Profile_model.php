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
   private $degree;
   private $minor;
   private $certifications;
   private $phone_number;
   private $linkedin_account;
   //private $work_position;
   //private $work_company;
   //private $work_location;
   //private $work_details;
   //private $work_reference;

/* CONSTRUCTOR
************************************************************************************/
   public function __construct() { parent:: __construct(); }

/* USER PHONE NUMBER
************************************************************************************/
/* LOAD PHONE NUMBER
************************************************************************************/
   public function load_phone_number()
   {
      $this->db->select('phone');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('contact_informations');
      
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
      $query = $this->db->get('contact_informations');
      
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
   
/* GET WORK POSITION
************************************************************************************/
   //public function get_work_position() { return $this->work_position; }

/* GET WORK COMPANY
************************************************************************************/
   //public function get_work_company() { return $this->work_company; }
   
/* GET WORK LOCATION
************************************************************************************/
   //public function get_work_location() { return $this->work_location; }
   
/* GET WORK DETAILS
************************************************************************************/
   //public function get_work_details() { return $this->work_details; }
   
/* GET WORK REFERENCE
************************************************************************************/
   //public function get_work_reference() { return $this->work_reference; }

/* RESEARCH FILES
************************************************************************************/
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
      else { return FALSE; }
   }
/* DELETE FILE
************************************************************************************/
   public function delete_filename($file)
   {
      $this->db->where('filename', $file);
      $this->db->delete('files');
   }        

/* USER UNIVERSITY
************************************************************************************/
/* LOAD UNIVERSITY
************************************************************************************/
   public function load_university()
   {
      $this->db->select('university');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education_records');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('university') == NULL) $this->university = "No Specified University";
         else $this->university = $query->row('university');
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
      $query = $this->db->get('education_records');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('degree') == NULL) $this->degree = "No Specified Degree";
         else $this->degree = $query->row('degree');
      }
      else { $this->degree = "No Specified Degree"; }
   }
/* GET DEGREE
************************************************************************************/
   public function get_degree() { return $this->degree; }
   
/* USER MAJOR
************************************************************************************/
/* LOAD MAJOR
************************************************************************************/
   public function load_major()
   {
      $this->db->select('major');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education_records');
      
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
   public function load_minor()
   {
      $this->db->select('minor');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education_records');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('minor') == NULL) $this->minor = "No Specified Minor";
         else $this->minor = $query->row('minor');
      }
      else { $this->minor = "No Specified Minor"; }
   }
/* GET MINOR
************************************************************************************/
   public function get_minor() { return $this->minor; }

/* USER CERTIFICATIONS
************************************************************************************/
/* LOAD CERTIFICATIONS
************************************************************************************/
   public function load_certifications()
   {
      $this->db->select('certifications');
      $this->db->where('user_id', $this->session->user_id);
      $query = $this->db->get('education_records');
      
      if ($query->num_rows() == 1)
      {  
         if ($query->row('certifications') == NULL) $this->certifications = "No Specified Certifications";
         else $this->certifications = $query->row('certifications');
      }
      else { $this->certifications = "No Specified Certifications"; }
   }
/* GET CERTIFICATIONS
************************************************************************************/
   public function get_certifications() { return $this->certifications; }
   
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