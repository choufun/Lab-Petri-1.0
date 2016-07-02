<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Confirmaccount extends CI_Controller
{
   public function __construct() { parent:: __construct(); }
   
   public function index()
   {
      $this->load->view('templates/header');
      $this->load->view('login/confirmaccount');
      $this->load->view('templates/footer');
   }
}