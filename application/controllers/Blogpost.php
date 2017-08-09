<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

class Blogpost extends CI_Controller
{
   /* CONSTRUCTOR
   ************************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('blogpost_model');
      $this->blogpost_model->increment_post_views();
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));
      //$this->load->helper('simple_html_dom');
   }
   
   public function index()
   {
      
/* FORM VALIDATIONS :: new comment
****************************************************************************/
      if ($this->input->post('new_comment') == 'new_comment') { $this->form_validation->set_rules('comments','comments','trim|required'); }
      
/* FORM VALIDATIONS :: new subcomment
****************************************************************************/
      if ($this->input->post('new_subcomment') == 'new_subcomment') { $this->form_validation->set_rules('subcomments','subcomments','trim|required'); }
      
/* PROCESS :: form
****************************************************************************/
      if ($this->form_validation->run() === FALSE)
      {
         $this->load->view('templates/header');
         $this->load->view('/labcast/blog/post');
         $this->load->view('templates/footer');
      }
      else
      {
         if ($this->input->post('new_comment')    == 'new_comment')    $this->creates_comment();
         if ($this->input->post('new_subcomment') == 'new_subcomment') $this->creates_subcomment();
         $key = $this->input->post('key');
         redirect('blogpost?key='.$key);
      }      
   }
   
/* ADD :: bookmark
****************************************************************************/
   public function add_bookmark()
   {  
      $this->blogpost_model->bookmarks( array(
                     'post_id' => $this->input->get('id'),
                     'user_id' => $this->session->user_id,
      ));     
      $key = $this->input->post('key');
      redirect('blogpost?key='.$key);
   }
   
/* DELETE :: post
****************************************************************************/
   public function delete_post()
   {
      $this->blogpost_model->delete_post( array(
                     'post_id' => $this->input->post('post'),
                     'comment_id' => $this->input->post('comment'),
                     'user_id' => $this->session->user_id,
      ));
      $key = $this->input->post('key');
      redirect('blogpost?key='.$key);
   }
   
   
/* CREATE :: subcomment
****************************************************************************/
   public function creates_subcomment()
   {
      $this->blogpost_model->insert_comment( array (
                     'type' => $this->input->post('new_subcomment'),
                     'comment_id' => $this->input->post('comment_id'),
                     'comments' => $this->input->post('subcomments'),
                     'order_id' => $this->input->post('order_id'),
      ));
   }
   
/* CREATE :: comment
****************************************************************************/
   public function creates_comment()
   {
      $this->blogpost_model->insert_comment( array(
                     'type' => $this->input->post('new_comment'),
                     'comment_id' => $this->input->post('comment_id'),
                     'comments' => $this->input->post('comments'),
      ));
   }
}