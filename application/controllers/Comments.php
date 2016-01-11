<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
class Comments extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('forum_model');
      $this->load->model('register_model');
   }
   
   public function index()
   {
	}
}
?>