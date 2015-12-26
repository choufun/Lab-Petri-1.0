<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
   var $filename = "";
   public function __construct()
   {
      parent::__construct();
      $this->load->model('forum_model');
      $this->load->model('register_model');
   }
   
   public function index()
   {
	          $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
	  $this->form_validation->set_rules('title','title','trim|required');
      $this->form_validation->set_rules('abstract','abstract','trim|required');
      $this->form_validation->set_rules('topic','topic','required|trim');
	  if(!empty($this->input->post('filepaths'))){
	 	 $this->form_validation->set_rules('research_paper','research documents','callback_upload');
	  }
	  if ($this->form_validation->run() === FALSE)
       {
            $data['forum'] = $this->forum_model->load_forum();
      		//$data['options'] = $this->register_model->load_majors();
            //'profile_picture' => $this->profile_model->get_profile_picture()
            //$data['pic'] = $this->forum_model->get_profile_picture();
      		$this->load->view('templates/header');
      		$this->load->view('forum', $data);
       }
       else
       {
		   $this->post();
            $data['forum'] = $this->forum_model->load_forum();
      		//$data['options'] = $this->register_model->load_majors();
            //$data['pic'] = $this->forum_model->get_profile_picture();
      		$this->load->view('templates/header');
      		$this->load->view('forum', $data);
       }

   }
	
	public function upload(){
		$this->load->helper('string');
		$config['upload_path'] = 'files/research_paper';
      	$config['allowed_types'] = 'docx|doc|pdf';
		$config['file_name'] = random_string('unique');
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('research_paper'))
         {
			$this->form_validation->set_message('upload',$this->upload->display_errors());
			return false;
         }
         else
          {
            $fileUploaded = $this->upload->data();
			$this->filename = $fileUploaded['file_name'];
			return true;
          }
        }
	
	public function post(){
		$data = array(
			'user_id' => $this->session->user_id,
			'title' => $this->input->post('title'),
			'abstract' => $this->input->post('abstract'),
			'additional_info' => $this->input->post('additionalinfo'),
			'topic' => $this->input->post('topic'),
			'file_path' => $this->filename,
		);
		
		$this->forum_model->post($data);
	}
	
	public function comments($post_id){
			$this->load->helper('form');

			$data['post'] = $this->forum_model->load_forum_post($post_id);
			$data['comments'] = $this->forum_model->load_comments($post_id);
			$data['replies'] = $this->forum_model->load_replies($post_id);
      		$this->load->view('templates/header');
      		$this->load->view('comments', $data);
			
	}
	
	public function new_comment_post($forum_post_id){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('new_parent_comment','comment','trim|required');
		if ($this->form_validation->run() === FALSE)
       	{
            $data['post'] = $this->forum_model->load_forum_post($forum_post_id);
			$data['comments'] = $this->forum_model->load_comments($forum_post_id);
      		$this->load->view('templates/header');
      		$this->load->view('comments', $data);
       }
       else
       {
		    $this->post_comment($forum_post_id);
            $data['post'] = $this->forum_model->load_forum_post($forum_post_id);
		   	$data['comments'] = $this->forum_model->load_comments($forum_post_id);
      		$this->load->view('templates/header');
      		$this->load->view('comments', $data);
       }

	}
	
	public function post_comment($forum_post_id){
		$data = array(
			'message' => $this->input->post('new_parent_comment'),
			'user_id' => $this->session->user_id,
			'post_id' => $forum_post_id,
		);
		$this->forum_model->comment($data);

	}
	
	public function post_replies($comment_id){
		$data = array(
			'reply_message' => $this->input->post('reply_message'),
			'user_id' => $this->session->user_id,
			'comment_id'=> $comment_id,
		);
		$this->forum_model->reply($data);
	}

	}

	

?>