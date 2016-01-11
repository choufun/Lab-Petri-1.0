<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->helper('url'); 
   }

   public function index()
   {
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      {
         redirect('forum');
      }         
      else
      {
         $this->load->view('templates/header');
         $this->load->view('home');
         $this->load->view('templates/footer');
      }
   }
}
