<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************
   POST MODEL
   ----------
      function construct()
            : constructs model
            
      function inserts_into_forum()
            : packages received object into a query statment
                  for insertion
            
      function check_unique_email()
            : validates email and if is successful, calls sets_user_id
      
**********************************************************************/
class Post_model extends CI_Model
{
   private $user_id;
   
   function __construct()
   {
      parent::__construct();
   }
   
   public function inserts_into_forum()
   {
      $data = array (
         'user_id' => $this->session->user_id,
         'title'=> $this->input->post('title'),
         'summary'=> $this->input->post('summary'),
      );
      
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      $this->db->insert('posts',$data);
   }
   
}
?>