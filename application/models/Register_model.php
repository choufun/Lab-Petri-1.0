<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/************************************************************************
   REGISTRATION_MODEL
   ------------------
      function check_unique_email()
            : checks if email is unique
                  - traverses through all elements in users table
            query
                  - SELECT * FROM users WHERE email = 'email';
                  
      function register
            : register user registration form
                  - store form data into mysql
            object
                  - firstname, lastname, email, password
                  
************************************************************************/
class Register_model extends CI_Model
{
   private $options = "";
   private $schools = "";

   function __construct()
   {
      parent::__construct();
   }
/* REGISTER
****************************************************************************/  
    function register($data){
        $this->db->insert('users',$data);
    }
/* CHECK UNIQUE EMAIL
****************************************************************************/   
    public function check_unique_email ($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
       
        if($query->num_rows() == 1){
            return false;
        }
        else{
            return true;
        }
    }
/* LOAD MAJORS
****************************************************************************/
   public function load_majors()
   {
      $query = $this->db->get('majors');
      
      if ($query->num_rows() > 0)
      {         
         foreach ($query->result() as $row)
         {
            $this->options.= '<option value="'.$row->major.'">'.$row->major.'</option>/n';
         }
         return $this->options;
      }
      else
      {
         return $this->options;
      }
   }
/* LOAD UNIVERSITIES
****************************************************************************/
   public function load_schools()
   {
      $query = $this->db->get('schools');
      if($query->num_rows() > 0)
      {
         foreach($query->result() as $row)
         {
            $this->schools.= '<option value="'.$row->name.'">'.$row->name.'</option>/n';
         }
         return $this->schools;
      }
      else
      {
         return $this->schools;
      }
   }
}

?>