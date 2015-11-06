<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
class Company extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }
   
   public function index()
   {
      $this->load->view('templates/header');
      $this->load->view('company');
      $this->load->view('templates/footer');
	}
}
?>