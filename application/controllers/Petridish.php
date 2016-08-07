<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petridish extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   public function __construct()
   {      
      parent::__construct();
      $this->load->model('petridish_model');
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));
   }

/* INDEX
****************************************************************************/
   public function index()
   {      
      
/* FORM VALIDATIONS :: new post
****************************************************************************/
      if ($this->input->post('new_post') == 'new_post')
      {
         $this->form_validation->set_rules('title','title','trim|required');
         $this->form_validation->set_rules('abstract','abstract','trim|required');
         $this->form_validation->set_rules('post_file','post_file','callback_do_upload');
      }
      
/* FORM VALIDATIONS :: new comment
****************************************************************************/
      if ($this->input->post('new_comment') == 'new_comment')
      { $this->form_validation->set_rules('comments','comments','trim|required'); }
      
/* FORM VALIDATIONS :: new subcomment
****************************************************************************/
      if ($this->input->post('new_subcomment') == 'new_subcomment')
      { $this->form_validation->set_rules('subcomments','subcomments','trim|required'); }
      
/* PROCESS :: form
****************************************************************************/
      if ($this->form_validation->run() === FALSE)
      {
         $this->load->view('templates/header');
         $this->load->view('petridish', array(
                                                'research' => $this->petridish_model->get_posts(0),
                                                'project'  => $this->petridish_model->get_posts(1),
                                                'job'      => $this->petridish_model->get_posts(2),
                                                'teams'    => "1",
                           ));
         $this->load->view('templates/footer');
      }
      else
      {
         
/* SUCCESS :: form
****************************************************************************/
         if ($this->input->post('new_post') == 'new_post')
         {
            if ($this->input->post('research') == 'research')
            {
               $this->creates_post(0);
            }
            if ($this->input->post('project')  == 'project')  $this->creates_post(1);
            if ($this->input->post('job')      == 'job')      $this->creates_post(2);
         }
         
         if ($this->input->post('new_comment')    == 'new_comment')    $this->creates_comment();
         if ($this->input->post('new_subcomment') == 'new_subcomment') $this->creates_subcomment();
         redirect('');
      }
   }

/* CREATE :: subcomment
****************************************************************************/
   public function creates_subcomment()
   {
      $this->petridish_model->insert_comment( array (
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
      $this->petridish_model->insert_comment( array(
                     'type' => $this->input->post('new_comment'),
                     'comment_id' => $this->input->post('comment_id'),
                     'comments' => $this->input->post('comments'),
      ));
   }
   
/* CREATE ::  research | project | job : post
****************************************************************************/
   public function creates_post($type)
   {
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      
      $this->petridish_model->insert_post( array(
                     'user_id' => $this->session->user_id,
                     'title' => $this->input->post('title'),
                     'abstract' => $this->input->post('abstract'),
                     'topic' => $this->input->post('topic'),
                     'comment_id' => '0.0',
                     'type' => $type,
      ));
   }
   
/* ADD :: bookmark
****************************************************************************/
   public function add_bookmark()
   {  
      $this->petridish_model->bookmarks( array(
                     'post_id' => $this->input->get('id'),
                     'user_id' => $this->session->user_id,
      ));      
      redirect('');
   }
   
/* DO UPLOAD
****************************************************************************/
   public function do_upload()
   {
      $config['upload_path'] = './users/'.$this->session->user_id.'/research/';
      $config['allowed_types'] = 'pdf';
      $config['max_size']	= '1000';
      $config['max_width']  = '1024';
      $config['max_height']  = '768';

      //$this->load->helper('file');
      $this->load->library('upload', $config);

      if ( !$this->upload->do_upload('post_file'))
      {
         $error = array('error' => $this->upload->display_errors());
         //return FALSE;
         return TRUE;
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         $this->petridish_model->insert_research_file($this->upload->data('file_name'));
         return TRUE;
      }
   }
   
/* DELETE :: post
****************************************************************************/
   public function delete_post()
   {
      $this->petridish_model->delete_post( array(
                     'post_id' => $this->input->post('post'),
                     'comment_id' => $this->input->post('comment'),
                     'user_id' => $this->session->user_id,
      ));
      redirect('petridish');
   }
}