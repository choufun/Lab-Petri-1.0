  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
class Message extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('message_model');
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
         
         $data = array(
            'messages' => $this->message_model->get_messages(),
            'friends' => $this->message_model->get_friends(),
         );
         
         $this->load->view('templates/header');
         $this->load->view('message', $data);
         $this->load->view('templates/footer');
      }
      else
      {
         $this->sends_message();
      } 
   }
   
/* SENDS MESSAGE
****************************************************************************/   
   public function sends_message()
   {  
      /* FOR TESTING PURPOSES
      *****************************************************************/
      /*
      $data = array (
         'message' => $this->input->post('message'),         
      );
      */
      $data = array(
         'user_id' => $this->session->user_id,
         'message' => $this->input->post('message'),
         'friend_id' => $this->input->post('id'),         
      );
      $this->message_model->inserts_message($data);
      redirect('message?id='.$this->input->post('id'));
      //redirect('message');
   }
}
?>