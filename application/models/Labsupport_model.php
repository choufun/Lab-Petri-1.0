<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labsupport_model extends CI_Model
{
   /* CONSTRUCTOR
   ****************************************************************************/ 
   public function __construct() { parent::__construct(); }
   
   public function get_user_id() {
      $this->db->where('user_id', $user_id);
      return $this->db->get('users');
   }
   
   /* INSERT $USER_ID & ISSUE_ID INTO DATABASE
   ****************************************************************************/
   public function insert_issue($user_id, $issue_id) {
      $this->db->insert('user_id', $user_id);
      $this->db->insert('issue_id', $issue_id);
   }
   
   /* RETRIEVES ISSUE_ID
   ****************************************************************************/
   public function search_issue($issue_id) {
      $query = $this->db->query(
         "
            SELECT issue_id
            FROM issues
            WHERE issue_id = '".$issue_id."'
            ;
         "
      );
      return $query->result();
   }
   
}
?>