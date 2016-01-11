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
      $this->peer_model->load_users();
   }

   public function index()
   {
      $data = array(
         'users' => $this->user_list()
      );
      $this->load->view('templates/header');
      $this->load->view('peer', $data);
      $this->load->view('templates/footer');
   }
   
   public function user_list()
   {
      $users = $this->peer_model->get_users();
      $result = "";
      $result .= '<ul>';
      foreach ($users as $user)
      {
         $result.= '
            <li>
               <div class="card index-content">
                  <div align="center" class="card-content">
                     <div>
                        PROFILE PICTURE
                     </div>
                     <div>
                        '.$user->firstname.' '.$user->lastname.'
                     </div>
                     <div>
                        email : '.$user->email.'
                     </div>
                     <div>
                        research: '.$user->major.'
                     </div>
                  </div>
               </div>
            </li>
         ';
      }
      $result.= '</ul>';
      return $result;
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