<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

class Forum extends CI_Controller
{   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct()
   {      
      parent::__construct();
      $this->load->model('forum_model');
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));
   }
   
   /* FORUM PAGE
   ****************************************************************************/
   public function index()
   {
      //$ids = array('1.2','1.1');
      //$this->load->library('comment', $ids);
      
      /* NEW POST FORM VALIDATIONS
      *************************************************************************/
      if ($this->input->post('new_post') == 'new_post')
      {
         $this->form_validation->set_rules('title','title','trim|required');
         $this->form_validation->set_rules('abstract','abstract','trim|required');
      }
      
      /* COMMENT FORM VALIDATIONS
      *************************************************************************/
      if ($this->input->post('comment') == 'comment')
      {
         continue;
      }
      
      /* RUN FORM
      *************************************************************************/
      if ($this->form_validation->run() === FALSE)
      {
         $data = array(
            'posts' => $this->forum_model->get_posts()
         );
         $this->load->view('templates/header');
         $this->load->view('forum', $data);
         $this->load->view('templates/footer');
      }
      else
      {
         $this->post();
         $data = array(
            'posts' => $this->forum_model->get_posts()
         );
         $this->load->view('templates/header');
         $this->load->view('forum', $data);
         $this->load->view('templates/footer');
      }
   }
   
   /* POST CALLBACK
   ****************************************************************************/
   public function post()
   {
      $data = array(
         'user_id' => $this->session->user_id,
         'title' => $this->input->post('title'),
         'abstract' => $this->input->post('abstract'),
         'comment_id' => '0'
      );
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      
      $this->forum_model->insert_post($data);
   }
}
?>