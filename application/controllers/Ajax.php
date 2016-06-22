<?php
class Ajax extends CI_Controller
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

   public function index()
   {
      $data = array (
            'messages' => $this->message_model->get_messages(),
            'ajax' => FALSE,
      );
      $this->load->view('ajax', $data);
   }
}
?>