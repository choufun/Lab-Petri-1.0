<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register_model extends CI_Model
{ 
   private $options = "";
   private $schools = "";
   private $email_extension = "";

/* CONSTRUCTOR
************************************************************************/
   public function __construct() { parent::__construct(); }
   
/* REGISTER :: user
************************************************************************/ 
   public function register($data)
   {
      $user_id;
      
/* INSERT :: user data
************************************************************************/
      $this->db->insert('users',$data);
      
/* GET :: user id
************************************************************************/
      $this->db->where('firstname', $data['firstname']);
      $this->db->where('lastname', $data['lastname']);
      $this->db->where('email', $data['email']);
      $query = $this->db->get('users');
      if ($query->num_rows() == 1) $user_id = $query->row('user_id');
      
/* INSERT :: user education
****************************************************************************/ 
      $this->db->insert('education', 
                           array (
                              'user_id' => $user_id,
                              'university' => $this->input->post('university'),
                              'major' => $this->input->post('major'),
                              'standing' => $this->standing(),
                           )
                        );
      
/* INSERT :: user contact
****************************************************************************/       
      $this->db->insert('contact',
                           array (
                              'user_id' => $user_id,
                              'email' => $this->input->post('email'),
                              'phone' => 'Add your number.',
                              'linkedin' => 'Add your link.'
                           )
                        );
      
/* RECORD :: user activity
****************************************************************************/ 
      $this->record_activity(
         array(
            'user_id' => $user_id,
            'type' => "registration",
         )
      );
      
/* CREATE :: user filesytem
****************************************************************************/
      mkdir("/var/www/html/users/".$user_id, 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/research", 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/pictures", 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/connections", 0777, TRUE);
      mkdir("/var/www/html/users/".$user_id."/attachments", 0777, TRUE);
   }

/* GET :: standing
****************************************************************************/ 
   private function standing()
   {
      if ($this->input->post('undergraduate') !== NULL) return $this->input->post('undergraduate');
      if ($this->input->post('graduate') !== NULL)      return $this->input->post('graduate');
      if ($this->input->post('professor') !== NULL)     return $this->input->post('professor');
   }
   
/* GET :: majors
****************************************************************************/
   public function get_majors() { return $this->options; }
   
/* LOAD :: majors
****************************************************************************/
   public function load_majors()
   {   
      if ($this->db->get('majors')->num_rows() > 0)
         foreach ($this->db->get('majors')->result() as $row)
            $this->options.= '<option value="'.$row->major.'">'.$row->major.'</option>';
   }

/* GET :: universities
****************************************************************************/
   public function get_schools() { return $this->schools; }
   
/* LOAD :: universities
****************************************************************************/
   public function load_schools()
   {
      if($this->db->get('universities')->num_rows() > 0)
         foreach($this->db->get('universities')->result() as $row)
            $this->schools.= '<option value="'.$row->university.'">'.$row->university.'</option>';
   }
   
/* VALIDATE :: unique email
****************************************************************************/
   public function username_unique($email)
   {
      $this->db->where('email', $email);      
      if ($this->db->get('users')->num_rows() == 0) return TRUE;
      else return FALSE;
   }
   
/* GET :: user firstname and lastname
****************************************************************************/
   public function get_username($user_id)
   {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname')." ".$query->row('lastname');
   }
   
/* RECORD :: activity
****************************************************************************/
   public function record_activity($data)
   {                       
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);
      $this->db->insert('activities',
                           array (
                              'user_id' => $data['user_id'],
                              'type' => $data['type'],
                              'activity' => $this->get_username($data['user_id'])." is now part of Lab Petri community.",
                           )
                       );
   }
}