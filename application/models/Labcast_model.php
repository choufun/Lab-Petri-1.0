<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labcast_model extends CI_Model
{
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();
   } 
   
/* COLLECT :: activities
************************************************************************************/
   public function collect_activities()
   {
      $this->db->order_by('time', "DESC");
      $query = $this->db->get('activities');
      return $query->result();
   }
   
/* COLLECT :: labpetri news
************************************************************************************/
   public function collect_news()
   {
      $this->db->order_by('time', "DESC");
      $query = $this->db->get('news');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }
   
/* INSERT :: news
************************************************************************************/
   public function insert_news($data)
   {
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);
      $this->db->insert('news', $data);
   }
   
}
?>