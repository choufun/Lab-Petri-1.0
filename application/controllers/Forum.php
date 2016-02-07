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
      /* NEW POST FORM VALIDATIONS
      *************************************************************************/
      if ($this->input->post('new_post') == 'new_post')
      {
         $this->form_validation->set_rules('title','title','trim|required');
         $this->form_validation->set_rules('abstract','abstract','trim|required');
      }
      
      /* NEW COMMENT FORM VALIDATIONS
      *************************************************************************/
      if ($this->input->post('new_comment') == 'new_comment')
      {
         $this->form_validation->set_rules('comments','comments','trim|required');
      }
      
      /* NEW SUBCOMMENT FORM VALIDATIONS
      *************************************************************************/
      if ($this->input->post('new_subcomment') == 'new_subcomment')
      {
         $this->form_validation->set_rules('subcomments','subcomments','trim|required');
      }
      
      /* RUN FORM
      *************************************************************************/
      if ($this->form_validation->run() === FALSE)
      {
         $data = array(
            'posts' => $this->forum_model->get_posts(),
            //'ids' => $this->forum_model->get_ids(),
         );
         $this->load->view('templates/header');
         $this->load->view('forum', $data);
         $this->load->view('templates/footer');
      }
      else
      {
         if ($this->input->post('new_post') == 'new_post') { $this->creates_post(); }
         if ($this->input->post('new_comment') == 'new_comment') { $this->creates_comment(); }
         if ($this->input->post('new_subcomment') == 'new_subcomment') { $this->creates_subcomment(); }
         
         redirect('');
      }
   }   

   /* SUBCOMMENT CALLBACK
   ****************************************************************************/
   public function creates_subcomment()
   {
      $data = array(
         'type' => $this->input->post('new_subcomment'),
         'comment_id' => $this->input->post('comment_id'),
         'comments' => $this->input->post('subcomments'),
         'order_id' => $this->input->post('order_id'),
      );
      $this->forum_model->insert_comment($data);
   }
   
   /* COMMENT CALLBACK
   ****************************************************************************/
   public function creates_comment()
   {
      $data = array(
         'type' => $this->input->post('new_comment'),
         'comment_id' => $this->input->post('comment_id'),
         'comments' => $this->input->post('comments'),
      );
      $this->forum_model->insert_comment($data);
   }
   
   /* POST CALLBACK
   ****************************************************************************/
   public function creates_post()
   {
      $data = array(
         'user_id' => $this->session->user_id,
         'title' => $this->input->post('title'),
         'abstract' => $this->input->post('abstract'),
         'comment_id' => '0.0'
      );
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      
      $this->forum_model->insert_post($data);
   }
}
?>