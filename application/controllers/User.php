<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This controller will handle all incoming requests and interactions and inputs from the User view and update the
 * database using User model.
 *
 * @package Application/Controller
 * @subpackage User
 * @author Steven Chou <schou@labpetri.org>
 * @copyright 2015 - 2017 Lab Petri
 * @version 1.0.0
 */
class User extends CI_Controller
{
/**
 * Assembles User tools for User functionality.
 * @return void
 */
   function __construct()
   {
      parent:: __construct();
      $this->load->model('user_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      //$this->load->helper('simple_html_dom');
   }
   
/**
 * Loads the User interface.
 * @return void
 */
   public function index()
   {
      $this->load->view('templates/header');
      $this->load->view('user', $this->user_model->get_profile());
      $this->load->view('templates/footer');
   }

/**
 * Updates User contact, education and posts' information.
 * @return void
 */
	public function update()
    {
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

/**
 * Deletes users' bookmarked posts.
 * @return void
 */
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

/**
 *
 */
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
	
/**
 * Function to upload user profile picture.
 * @return void
 */
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
	
/**
 * Access Other User Profile
 * @param $user_id
 * @return int
 */
   public function view_user($user_id)
   {      
      return $this->user_model->get_user_profile($user_id);
   }
}
?>