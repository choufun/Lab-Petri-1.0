<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* PEER CONTROLLER
************************************************************************************/
class Peer extends CI_Controller
{
    function __construct()
    {
      parent:: __construct();
       $this->load->model('peer_model');
    }
    
    public function index()
    {
         $this->load->view('templates/header');
         $this->load->view('peer');
         $this->load->view('templates/footer');
    }
/* PEER PSEUDO FUNCTIONS
************************************************************************************/
/*
   function gather_all_connection()
      - list available connections
      
      - function display_connection()
   
      - function add_connection()
   
      - function remove_connection()
   
      - function view_connection()
   
   function show_my_connections()
      - lists existing connections
      
      - function display_connection()
      
      - function filter_connection()
   
*/
}
?>