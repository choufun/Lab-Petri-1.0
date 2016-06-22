<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labsupport_model extends CI_Model
{
   /* CONSTRUCTOR
   ****************************************************************************/ 
   public function __construct() { parent::__construct(); }
   
   /* INSERT $USER_ID & ISSUE_ID INTO DATABASE
   ****************************************************************************/
   public function insert_issue($user_id, $issue_id) {
      $this->db->insert('user_id', $user_id);
      $this->db->insert('issue_id', $issue_id);
   }
}
?>