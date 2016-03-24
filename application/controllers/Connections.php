<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* PEER CONTROLLER
************************************************************************************/
class Connections extends CI_Controller
{
   function __construct()
   {
      parent:: __construct();
      $this->load->model('connections_model');
      $this->connections_model->load_users();
   }

   public function index()
   {
      $data = array(
         'users' => $this->connections_model->get_users(),
         'directory' => $this->load_directory(),
      );
      $this->load->view('templates/header');
      $this->load->view('connections', $data);
      $this->load->view('templates/footer');
   }
   
   public function load_directory()
   {
      $path = "/var/www/html/users";
      $directory = scandir($path);
      
      if (sizeof($directory) <= 2) { return "No Users"; }
      else { return $directory; }
   }
}
?>