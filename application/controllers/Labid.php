<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
/* USER PROFILE CONTROLLER
****************************************************************************/
class User extends CI_Controller
{
   
/* CONSTRUCTOR
****************************************************************************/
   function __construct()
   {
      parent:: __construct();
      $this->load->model('user_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      //$this->load->helper('simple_html_dom');
   }
   
/* INDEX
****************************************************************************/
   public function index()
   {
/* VIEW :: profile
****************************************************************************/    
      $this->load->view('templates/header');
      $this->load->view('user', $this->user_model->get_profile());
      $this->load->view('templates/footer');
   }

/* UPDATE :: contacts, petri dish posts, lab cast posts
****************************************************************************/
	public function update()
	{
      
/* CONTACTS
****************************************************************************/
      if ($this->input->post('contacts') == 'contacts')
      {
         $this->form_validation->set_rules('email','email','trim|required');
         $this->form_validation->set_rules('phone','phone','trim|required');
         $this->form_validation->set_rules('linkedin','linkedin','trim|required');
         $this->form_validation->set_rules('university','university','trim|required');
         $this->form_validation->set_rules('major','major','trim|required');
         $this->form_validation->set_rules('standing','standing','trim|required'); 

         $this->user_model->update_contacts( array(
                                                      'user_id' => $this->session->user_id,
                                                      'email' => $this->input->post('email'),
                                                      'phone' => $this->input->post('phone'),
                                                      'linkedin' => $this->input->post('linkedin'),
         ));
         
         $this->user_model->update_education( array(
                                                      'user_id' => $this->session->user_id,
                                                      'university' => $this->input->post('university'),
                                                      'major' => $this->input->post('major'),
                                                      'standing' => $this->input->post('standing'),
         ));
      }
      
/* PETRI DISH :: research
****************************************************************************/
      if ($this->input->post() !== NULL)
      {
         if ($this->input->post('petridish') == 'research')
         {
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('topic', 'topic', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
            $this->form_validation->set_rules('gpa', 'gpa', 'trim|required');
            $this->form_validation->set_rules('major', 'major', 'trim|required');
            $this->form_validation->set_rules('courses', 'courses', 'trim|required');
            $this->form_validation->set_rules('extra', 'extra', 'trim|required');
            
            $this->user_model->update_petridish( array (
                                                         'title' => $this->input->post('title'),
                                                         'topic' => $this->input->post('topic'),
                                                         'abstract' => nl2br($this->input->post('description')),
                                                         'gpa' => $this->input->post('gpa'),
                                                         'major' => $this->input->post('major'),
                                                         'courses' => nl2br($this->input->post('courses')),
                                                         'extra' => nl2br($this->input->post('extra')),
                                                ), $this->input->post('id')
            );
         }

/* PETRI DISH :: research
****************************************************************************/
         if ($this->input->post('petridish') == 'project')
         {
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('topic', 'topic', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
            $this->form_validation->set_rules('major', 'major', 'trim|required');
            $this->form_validation->set_rules('extra', 'extra', 'trim|required');
            
            $this->user_model->update_petridish( array (
                                                         'title' => $this->input->post('title'),
                                                         'topic' => $this->input->post('topic'),
                                                         'abstract' => nl2br($this->input->post('description')),
                                                         'major' => $this->input->post('major'),
                                                         'extra' => nl2br($this->input->post('extra')),
                                                ), $this->input->post('id')
            );
         }
         
/* LAB CAST :: blog
****************************************************************************/
         if ($this->input->post('labcast') == 'blog')
         {
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('blog', 'blog', 'trim|required');
            $this->form_validation->set_rules('quotes', 'quotes', 'trim|required');
         }
         
         $this->user_model->update_labcast_blog_post( array (
                                                         'title' => $this->input->post('title'),
                                                         'blog' => nl2br($this->input->post('blog')),
                                                         'quotes' => nl2br($this->input->post('quotes')),
                                                ), $this->input->post('id')
         );
      }
      redirect('user');
   }
   
/* DELETE :: bookmarks
****************************************************************************/ 
   public function delete_bookmark()
   {
      $this->user_model->delete_bookmark(
                  array(
                     'bookmark_id' => $this->input->post('bookmark'),
                     'user_id' => $this->session->user_id,
                  )
      );
      redirect('user');
   }
	
/* DELETE :: posts
****************************************************************************/
   public function delete_post()
   {
      $this->user_model->delete_post(
                  array (
                     'post_id' => $this->input->post('post'),
                     'comment_id' => $this->input->post('comment'),
                     'user_id' => $this->session->user_id,
                  )
      );
      redirect('user');
   }
	
/* UPLOAD :: user profile picture
****************************************************************************/
	public function do_upload_pic()
	{
      $config['upload_path'] = './users/'.$this->session->user_id.'/pictures/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size']	= '1000';
      $config['max_width']  = '10240';
      $config['max_height']  = '7680';

      $this->load->library('upload', $config);

      if ( !$this->upload->do_upload())
      {
         $error = array('error' => $this->upload->display_errors());
         redirect('user');
      }
      else
      {
         $data = array('upload_data' => $this->upload->data());
         $this->user_model->insert_profile_picture($this->upload->data('file_name'));
         redirect('user');
      }
	}
	
/* VIEW :: user profile
****************************************************************************/
   public function view_user($user_id)
   {      
      return $this->user_model->get_user_profile($user_id);
   }
}
?>