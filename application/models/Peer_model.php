<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peer_model extends CI_Model
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
   
/* GET USERS
************************************************************************************/
   public function get_users() { return $this->users; }

/* LOAD USERS
************************************************************************************/
   public function load_users()
   {      
      $query = $this->db->get('users');
      //$this->users = $query->result();
      $result = $query->result();
      $this->users = $result;
   }
}