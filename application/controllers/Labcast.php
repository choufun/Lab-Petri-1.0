<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Labcast extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('labcast_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
   }

/* INDEX
****************************************************************************/
   public function index()
   {
      $this->form_validation->set_rules('title','title','trim|required');
      $this->form_validation->set_rules('description','description','required');
      $this->form_validation->set_rules('url','url','required');
      
      if ($this->form_validation->run() === FALSE)
      {          
         $this->load->view('templates/header');
         $this->load->view('labcast', array (
                                              'activities' => $this->labcast_model->collect_activities(),
                                              'labpetri_news' => $this->labcast_model->collect_news(),
                                      ));
         $this->load->view('templates/footer');
      }
      else
      {
         
/* POST :: success
****************************************************************************/
         $this->post_news( array(
                  'title' => $this->input->post('title'),
                  'description' => $this->input->post('description'),
                  'url' => $this->input->post('url'),
         ));
         redirect('labcast');
      }
      
   }
   
/* POST :: news
****************************************************************************/
   private function post_news($data) { $this->labcast_model->insert_news($data); }
}
?>