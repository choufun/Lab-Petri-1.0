<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labfaq_model extends CI_Model
{
   /* CONSTRUCTOR
   ****************************************************************************/ 
   public function __construct() { parent::__construct(); }
   
   /* RETRIEVES USER_ID OF CURRENT USER
   ****************************************************************************/
   public function get_user_id()
   {
      return $this->session->user_id;
   }
   
   /* RETRIEVES THE MAX ISSUE_ID OF THE TABLE AND RETURN RESULT + 1
   ****************************************************************************/
   public function get_max()
   {
      $this->db->select_max('issue_id');
      $query = $this->db->get('issues');
      $result = $query->row()->issue_id;
      if($result == NULL)
      {
         return 1;
      }
      else
      {
         return $result + 1;
      }
   }
   
   /* INSERT $USER_ID & ISSUE_ID INTO DATABASE
   ****************************************************************************/
   public function insert_issue($user_id, $issue_id)
   {
      $this->db->insert('issues', 
                           array(
                              'issue_id' => $issue_id,
                              'user_id' => $user_id,
                           )
                       );
   }
   
}
?>