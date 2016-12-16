<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
   public function __construct()
   {
      parent:: __construct();
      $this->load->helper('url'); 
   }

   public function index()
   {
      //if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) redirect('petridish');
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) redirect('labcast');
      else $this->load->view('home');
      //else $this->load->view('home_temp');
   }
}
