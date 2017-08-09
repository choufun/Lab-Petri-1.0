<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
/* CONNECTIONS CONTROLLER
****************************************************************************/
class Labmates extends CI_Controller
{
   private $undergraduates = array();
   private $graduates = array();
   private $professors = array();
   
   function __construct()
   {
      parent:: __construct();
      $this->load->model('labmates_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');      
   }

/* INDEX
****************************************************************************/
   public function index()
   {    
      if ($this->form_validation->run() === FALSE)
      {
         $this->default_search();         
         $this->load->view('templates/header');
         $this->load->view('labmates', array(
                                       'undergraduates' => $this->undergraduates,
                                       'graduates' => $this->graduates,
                                       'professors' => $this->professors,
         ));
         $this->load->view('templates/footer'); 
      }
      else
      {
         redirect('labmates');
      }
   }

/* CONNECT :: user_id
****************************************************************************/
   public function connect()
   {
      $this->labmates_model->set_pending_status( array(
                     'user_id' => $this->session->user_id,
                     'friend_id' => $this->input->get('id'),
      ));
      redirect('labmates');
   }
   
/* SEARCH :: default
****************************************************************************/
   public function default_search()
   { 
      $this->labmates_model->load_users();
/* SET :: undergraduates
****************************************************************************/
      foreach($this->labmates_model->get_registered_universities($undergraduates = "undergraduate") as $university)
      {
         $this->undergraduates[$university->university] = $this->labmates_model->get_registered_users($university, $undergraduates = "undergraduate");
      }      
/* SET :: graduates
****************************************************************************/
      foreach($this->labmates_model->get_registered_universities($graduates = "graduate") as $university)
      {
         $this->graduates[$university->university] = $this->labmates_model->get_registered_users($university, $graduates = "graduate");
      }      
/* SET :: professors
****************************************************************************/
      foreach($this->labmates_model->get_registered_universities($professors = "professor") as $university)
      {
         $this->professors[$university->university] = $this->labmates_model->get_registered_users($university, $professors = "professor");
      }
   }
}
?>