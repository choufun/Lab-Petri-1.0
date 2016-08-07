  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
class Labmail extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('labmail_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
   }

/* INDEX
****************************************************************************/
   public function index()
   {
      $this->form_validation->set_rules('message','Message','trim|required');
      
      if ($this->form_validation->run() === FALSE)
      {                
         $this->load->view('templates/header');
         $this->load->view('labmail',
                                 array(
                                    'messages' => $this->labmail_model->get_messages(),
                                    'friends' => $this->labmail_model->get_friends(),
                                 )
                           );
         $this->load->view('templates/footer');
      }
      else
      {
         $this->sends_message();
      } 
   }

/* AJAX CALL FOR SENDING MESSAGE
****************************************************************************/
   public function ajax()
   {
      $this->labmail_model->inserts_message(
         array(
               'user_id' => $this->session->user_id,
               'message' => $this->input->post('message'),
               'friend_id' => $this->input->post('id'),         
            )
      );
      
      echo $this->load->view('labmail/new_message',
                             array(
                                    'user_id' => $this->session->user_id,
                                    'message' => $this->input->post('message'),
                                    'friend_id' => $this->input->post('id'),         
                                 ),
                             TRUE
                            );
   }
   
   
/* SENDS MESSAGE
****************************************************************************/   
   public function sends_message()
   {  
      $this->labmail_model->inserts_message(
            array(
               'user_id' => $this->session->user_id,
               'message' => $this->input->post('message'),
               'friend_id' => $this->input->post('id'),         
            )
      );
      redirect('labmail?id='.$this->input->post('id'));
   }
}
?>