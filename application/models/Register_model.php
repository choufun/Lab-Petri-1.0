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
****************************************************************************/
/* REGISTER USER
****************************************************************************/ 
   public function register($data) { $this->db->insert('users',$data); }

/****************************************************************************
- VERIFYING EMAIL INPUT
****************************************************************************/
/* GET EMAIL EXTENSION
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
****************************************************************************/
/* GET MAJORS
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
               <option value="'.$row->major.'">'
                  .$row->major.
               '</option>/n
            ';
         }
      }
   }

/****************************************************************************
- UNIVERSITY OPTIONS
****************************************************************************/
/* GET SCHOOLS
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
****************************************************************************/
/* GET UNIVERSITY EXTENSION
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
****************************************************************************/
/* IS USERNAME UNIQUE
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