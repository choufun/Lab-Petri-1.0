<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labcast_model extends CI_Model
{
/* FIELD
************************************************************************************/
   private $users;
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();
   } 
   
   /* COLLECT ACTIVITIES
   ****************************************************************************/
   public function collect_activities()
   {
      $this->db->order_by('time', "DESC");
      $query = $this->db->get('activities');
      return $query->result();
   }
   
}
?>