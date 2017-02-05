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
                        'description' => nl2br($this->input->post('description')),
                        'url' => $this->input->post('url'),
               ));
               redirect('labcast');
            }
         }
         else
         {
/* BLOG :: post :: regular post NO AJAX :: testing purposes
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
                        'comment' => nl2br($this->input->post('comment')),
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
      $this->labcast_model->insert_test();      
      echo '<div class="col s12 m4"><div class="card hoverable"><div class="card-content">';
      echo $this->input->post('title').'<br>';
      echo $this->input->post('quotes').'<br>';
      echo $this->input->post('blog').'<br>';
      echo '</div></div></div>';
      */
      
      $this->post_blog( array(
                        'title' => $this->input->post('title'),
                        'quotes' => $this->input->post('quotes'),
                        'user_id' => $this->session->user_id,
                        'blog' => nl2br($this->input->post('blog')),
      ));
      
      $post_id = $this->labcast_model->get_blog_post($this->input->post('title'), $this->input->post('quotes'), $this->input->post('blog'));
      $picture = $this->labcast_model->get_profile_picture($this->session->user_id);
      
         echo '<a href="blogpost?key='.$post_id.'" target="_blank">
                  <div class="col s12 m9">
                     <div class="card hoverable">
                        <div class="card-content">
                           <div class="row" align="center">';
         if ($picture === NULL) {
                        echo '<i class="large material-icons profile-image black-text">perm_identity</i>';
         } else {
         //IMAGE
                        echo '<img class="responsive-img z-depth-1 profile-image" src="users/'.$this->session->user_id.'/pictures/'.$picture.'">';
         }
                     echo '</div>
                           <div class="row blue-text" align="center">
                              <h5><strong>';
                                 echo $this->input->post('title');
                        echo '</strong></h5>
                           </div>
                           <div class="row">';
                        echo '<h5><small class="black-text"><strong>"';
                           echo $this->input->post('quotes');
                        echo '"</strong></small></h5>';
                     echo '</div>
                        </div>
                     </div>
                  </div>
               </a>';
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
   
/* ADD :: bookmark
****************************************************************************/
   public function add_bookmark()
   {  
      $this->labcast_model->bookmarks( array(
                     'post_id' => $this->input->get('id'),
                     'user_id' => $this->session->user_id,
                     'type'    => 'labcast',
      ));      
      redirect('labcast');
   }   
}
?>