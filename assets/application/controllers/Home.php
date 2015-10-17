<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/******************************************************************
   HOME CONTROLLER
   ---------------------------------------------------------------
      function index() - renders the home page
      
******************************************************************/
class Home extends CI_Controller
{
    function __construct()
    {
      parent:: __construct();
      $this->load->helper('url'); 
    }
    
    public function index()
    {
       // temporary, needs to be set automatically
         //$this->load->library('session');
		if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)){
			redirect('forum');
		}
               
		else{
			
         $this->load->view('templates/header');
         $this->load->view('home');
         //$this->load->view('header');
		}
		               


    }
}
