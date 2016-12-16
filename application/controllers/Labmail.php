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
                                    'friends' => $this->labmail_model->get_friends_list(),
                                    'requests' => $this->labmail_model->get_pending_requests(),
                                    'new_messages' => $this->labmail_model->get_new_message_notifications(),
                                 )
                           );
         $this->load->view('templates/footer');
      }
      else
      {
         $this->send_messages();
         redirect('labmail?id='.$this->input->post('id'));
      } 
   }
   
/* SENDS :: message
****************************************************************************/
/*   
   public function sends_message()
   {
      $this->labmail_model->inserts_message(
            array(
                     'user_id' => $this->session->user_id,
                     'message' => $this->input->post('message'),
                     'friend_id' => $this->input->post('id'),         
            )
      );
      
      $this->labmail_model->set_new_message_notification($this->input->post('id'));
   }
*/   
/* SEND :: ajax messages
****************************************************************************/
   public function send_messages()
   {      
      $this->labmail_model->inserts_message(
            array(
                     'user_id' => $this->session->user_id,
                     'message' => $this->input->post('message'),
                     'friend_id' => $this->input->post('id'),         
            )
      );      
      $this->labmail_model->set_new_message_notification($this->input->post('id'));
      
      echo '<div class="row">';
         echo '<div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6" align="right">';
            echo '<small><strong>'.$this->input->post('message').'</strong></small>';
         echo '</div>';
      echo '</div>';
   }
   
/* ACCEPTS :: connection
****************************************************************************/
   public function accepts()
   {
      $this->labmail_model->accepts_pending_request($this->session->user_id, $this->input->get('id'));
      redirect('labmail');
   }   
}
?>