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
      $this->form_validation->set_rules('quotes','quotes','required');
      $this->form_validation->set_rules('blog','blog','required');
      
      if ($this->form_validation->run() === FALSE)
      {          
         $this->load->view('templates/header');
         $this->load->view('labcast', array (
                                              'activities' => $this->labcast_model->collect_activities(),
                                              'labpetri_news' => $this->labcast_model->collect_news(),
                                              'blog' => $this->labcast_model->get_blog_posts(),
         ));
         $this->load->view('templates/footer');
      }
      else
      {
         
/* ADMIN :: post
****************************************************************************/ 
         if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE) && ($this->session->lastname == "Admin"))
         {
            if ($this->input->post('admin_post') == 'admin_post')
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
         else
         {
/* BLOG :: post
****************************************************************************/            
            if ($this->input->post('new_blog_post') == 'new_blog_post')
            {
               $this->post_blog( array(
                        'title' => $this->input->post('title'),
                        'quotes' => $this->input->post('quotes'),
                        'user_id' => $this->session->user_id,
                        'blog' => nl2br($this->input->post('blog')),
               ));
               redirect('labcast');
            }
 /* BLOG :: comment
****************************************************************************/           
            if ($this->input->post('new_blog_comment') == 'new_blog_comment')
            {
               $this->comment_blog( array(
                        'post_id' => $this->input->post('post_id'),
                        'comment_id' => $this->input->post('comment_id'),
                        'user_id' => $this->session->user_id,
                        'comment' => $this->input->post('comment'),
               ));
               redirect('labcast');
            }
         }
      }
   }
   
/* TEST :: testing AJAX
************************************************************************************/
   public function postblog()
   {
      /*
      echo json_encode(
         array(
                  'title' => $this->input->post('title'),
                  'qutoes' => $this->input->post('quotes'),
                  'blog' => $this->input->post('blog'),
         )
      );
      */
      
      $this->labcast_model->insert_test();
      
      echo '<div class="col s12 m4"><div class="card hoverable"><div class="card-content">';
      echo $this->input->post('title').'<br>';
      echo $this->input->post('quotes').'<br>';
      echo $this->input->post('blog').'<br>';
      echo '</div></div></div>';
   }
   
/* POST :: news
****************************************************************************/
   private function post_news($data) { $this->labcast_model->insert_news($data); }
   
/* POST :: blog
****************************************************************************/
   private function post_blog($data) { $this->labcast_model->insert_blog_post($data); }
   
/* COMMENT :: blog
****************************************************************************/
   private function comment_blog($data) { $this->labcast_model->insert_blog_comment($data); }
   
}
?>