<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
/* CONNECTIONS CONTROLLER
****************************************************************************/
class Labmate extends CI_Controller
{
   private $undergraduates = array();
   private $graduates = array();
   private $professors = array();
   
   function __construct()
   {
      parent:: __construct();
      $this->load->model('labmate_model');
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
         $this->load->view('labmate', array(
                                       'undergraduates' => $this->undergraduates,
                                       'graduates' => $this->graduates,
                                       'professors' => $this->professors,
         ));
         $this->load->view('templates/footer'); 
      }
      else
      {
         redirect('labmate');
      }
   }

/* CONNECT :: user_id
****************************************************************************/
   public function connect()
   {
      $this->labmate_model->set_pending_status( array(
                     'user_id' => $this->session->user_id,
                     'friend_id' => $this->input->get('id'),
      ));
      redirect('labmate');
   }
   
/* SEARCH :: default
****************************************************************************/
   public function default_search()
   { 
      $this->labmate_model->load_users();
/* SET :: undergraduates
****************************************************************************/
      foreach($this->labmate_model->get_registered_universities($undergraduates = "undergraduate") as $university)
      {
         $this->undergraduates[$university->university] = $this->labmate_model->get_registered_users($university, $undergraduates = "undergraduate");
      }      
/* SET :: graduates
****************************************************************************/
      foreach($this->labmate_model->get_registered_universities($graduates = "graduate") as $university)
      {
         $this->graduates[$university->university] = $this->labmate_model->get_registered_users($university, $graduates = "graduate");
      }      
/* SET :: professors
****************************************************************************/
      foreach($this->labmate_model->get_registered_universities($professors = "professor") as $university)
      {
         $this->professors[$university->university] = $this->labmate_model->get_registered_users($university, $professors = "professor");
      }
   }
}
?>