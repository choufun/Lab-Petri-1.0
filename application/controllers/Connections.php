<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* CONNECTIONS CONTROLLER
************************************************************************************/
class Connections extends CI_Controller
{
   private $undergraduates = array();
   private $graduates = array();
   private $professors = array();
   
   function __construct()
   {
      parent:: __construct();
      $this->load->model('connections_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation'); 
      $this->connections_model->load_users();
      $this->load->library('binarysearch');
   }

/* INDEX
************************************************************************************/
   public function index()
   {
      $this->form_validation->set_rules('search', 'Search', 'callback_search_check');
      
      if ($this->form_validation->run() === FALSE)
      {
         $this->default_search();
         
         $data = array(
            'undergraduates' => $this->undergraduates,
            'graduates' => $this->graduates,
            'professors' => $this->professors,
         );
         
         $this->load->view('templates/header');
         $this->load->view('connections', $data);
         $this->load->view('templates/footer'); 
      }
      else
      {
         $results = $this->new_search();
         // CALL SEARCH ENGINE
         
         $this->session->set_flashdata('search', array('HI' => 'BYE', 'This' => 'Works'));
         //$this->session->set_flashdata('search', $results);
         redirect('connections');
      }
   }
   
/* SEARCH
************************************************************************************/
   public function search_check($search)
   {
      if ($search == NULL || !(isset($search)))
      {
         $this->form_validation->set_message('search_check', 'Search is empty.');
         return FALSE;
      }
      else { return TRUE; }
   }
   
/* DEFAULT SEARCH
************************************************************************************/
   public function default_search()
   {
      $data = array();
      $undergraduates = "undergraduate";
      $graduates = "graduate";
      $professors = "professor";
      
      /* SET UNDERGRADUATES
      ******************************************************************************/
      $u_data = $this->connections_model->get_registered_universities($undergraduates);
      foreach($u_data as $university)
      {
         $data[$university->university] =
            $this->connections_model->get_registered_users($university, $undergraduates);
      }
      $this->undergraduates = $data;
      
      /* SET GRADUATES
      ******************************************************************************/
      $u_data = $this->connections_model->get_registered_universities($graduates);
      $data = array();
      foreach($u_data as $university)
      {
         $data[$university->university] =
            $this->connections_model->get_registered_users($university, $graduates);
      }
      $this->graduates = $data;
      
      /* SET PROFESSORS
      ******************************************************************************/
      $u_data = $this->connections_model->get_registered_universities($professors);
      $data = array();
      foreach($u_data as $university)
      {
         $data[$university->university] =
            $this->connections_model->get_registered_users($university, $professors);
      }
      $this->professors = $data;
   }

/* NEW SEARCH
************************************************************************************/
   public function new_search()
   {  
      return $this;
   }
}
?>