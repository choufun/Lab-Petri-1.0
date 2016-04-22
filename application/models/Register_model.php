<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
{
/* FIELD
****************************************************************************/ 
   private $options = "";
   private $schools = "";
   private $email_extension = "";

/* CONSTRUCTOR
****************************************************************************/ 
   public function __construct() { parent::__construct(); }

/****************************************************************************
- REGISTRATION - callback() for login.register()
  REGISTER USER
****************************************************************************/ 
   public function register($data)
   {
      $user_id;
      
      /* INSERT USER DATA AND CREATE USER ID
      **********************************************************************/
      $this->db->insert('users',$data);
      
      /* RETRIEVE USER ID
      **********************************************************************/
      //$this->db->where('firstname', $this->input->post('firstname'));
      //$this->db->where('lastname', $this->input->post('lastname'));
      //$this->db->where('email', $this->input->post('email'));
      $this->db->where('firstname', $data['firstname']);
      $this->db->where('lastname', $data['lastname']);
      $this->db->where('email', $data['email']);
      
      $query = $this->db->get('users');
      
      if ($query->num_rows() > 0) { $user_id = $query->row('user_id'); }
      
      /* INSERT USER EDUCATION RECORD
      **********************************************************************/
      $user_education = array (
         'user_id' => $user_id,
         'university' => $this->input->post('university'),
         'major' => $this->input->post('major'),
         'standing' => $this->standing(),
      );
      $this->db->insert('education', $user_education);
      
      /* INSERT USER CONTACT INFORMATION
      **********************************************************************/
      $user_contact = array (
         'user_id' => $user_id,
         'email' => $this->input->post('email'),
         'phone' => '(xxx) - xxx - xxxx',
         'linkedin' => 'N/A'
      );
      $this->db->insert('contact', $user_contact);
      
      /* CREATE USER FILESYSTEM
      **********************************************************************/
      mkdir("/var/www/html/users/".$user_id, 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/research", 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/pictures", 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/connections", 0777, TRUE);
   }
   
   private function standing()
   {
      if ($this->input->post('undergraduate') !== NULL) { return $this->input->post('undergraduate'); }
      if ($this->input->post('graduate') !== NULL) { return $this->input->post('graduate'); }
      if ($this->input->post('professor') !== NULL) { return $this->input->post('professor'); }
   }

/****************************************************************************
- VERIFYING EMAIL INPUT
  GET EMAIL EXTENSION
****************************************************************************/ 
   private function email_extension($email)
   {
      $i; 
      for ($i = (strlen($email)-1); $i >= 0; $i--)
      {
         if ($email[$i] == '@') break;
      }
      return substr($email, $i+1, strlen($email)-1);
   }
/* GET SCHOOL EXTENSION
****************************************************************************/ 
   private function school_extension($email)
   {
      $i;
      for ($i = 0; $i <= strlen($email)-1; $i++)
      {
         if ($email[$i] == ':') break;
      }
      return substr($email, 0, $i);
   }
/* CHECK SCHOOL EMAIL EXTENSION - callback() for login.verify_email()
****************************************************************************/   
   public function is_school_email ($email)
   {
      $query = $this->db->get('university_extensions');
      if ($query->num_rows() > 0)
      {
         foreach($query->result() as $row)
         {
            if ($this->school_extension($row->extension) == $this->email_extension($email))
            {
               $this->email_extension = $this->email_extension($email);
               return TRUE;
            }
         }
         return FALSE;
      }
      else { return FALSE; }
   }
   
/****************************************************************************
- UNIVERSITY MAJOR OPTIONS
  GET MAJORS
****************************************************************************/
   public function get_majors() { return $this->options; }
/* LOAD MAJORS
****************************************************************************/
   public function load_majors()
   {
      $query = $this->db->get('majors');
      
      if ($query->num_rows() > 0)
      {         
         foreach ($query->result() as $row)
         {
            $this->options.= '
               <option value="'.$row->major.'">'.$row->major.'</option>/n
            ';
         }
      }
   }

/****************************************************************************
- UNIVERSITY OPTIONS
  GET SCHOOLS
****************************************************************************/
   public function get_schools() { return $this->schools; }
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
   
/* LOAD SCHOOLS
****************************************************************************/
   public function load_schools()
   {
      $query = $this->db->get('universities');
      if($query->num_rows() > 0)
      {
         foreach($query->result() as $row)
         {
            $this->schools.= '
               <option value="'.$row->university.'">'
                  .$this->remove_extension($row->university).
               '</option>/n
            ';
         }
      }
   }

/****************************************************************************
- MATCHING EMAIL AND SCHOOL
  GET UNIVERSITY EXTENSION
****************************************************************************/ 
   private function extension($school)
   {
      $i;
      for ($i = (strlen($school)-1); $i >= 0; $i--)
      {
         if ($school[$i] == '(') break;
      }
      return substr($school, $i+1, -1);
   }
/* MATCHING EMAIL AND SCHOOL - callback() for login.verify_school()
****************************************************************************/
   public function school_match($school)
   {
      if ($this->extension($school) == $this->email_extension)
      {
         unset($this->email_extension);
         return TRUE;
      }
      else { return FALSE; }
   }

/****************************************************************************
- USERNAME
  IS USERNAME UNIQUE
****************************************************************************/
   public function username_unique($email)
   {
      $this->db->where('email', $email);
      $query = $this->db->get('users');
      
      if ($query->num_rows() == 0)
         return TRUE;
      else
         return FALSE;
   }
}
?>