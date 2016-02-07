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
         'users' => $this->peer_model->get_users(),
      );
      $this->load->view('templates/header');
      $this->load->view('peer', $data);
      $this->load->view('templates/footer');
   }
}
?>