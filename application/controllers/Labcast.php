<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Labcast extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->helper('url');
      $this->load->model('labcast_model');
   }

/* INDEX
****************************************************************************/
   public function index()
   {
      /**
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      {
         redirect('forum');
      }         
      else
      {
         //$this->load->view('templates/header');
         $this->load->view('home');
         //$this->load->view('templates/footer');
      }
      */
      
      $data = array(
         'news' => $this->labcast_model->collect_activities(),
      );
      
      $this->load->view('templates/header');
      $this->load->view('labcast', $data);
      $this->load->view('templates/footer');
   }
}
?>