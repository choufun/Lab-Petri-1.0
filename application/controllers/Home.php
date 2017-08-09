<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This controller will handle all incoming requests and interactions and inputs from the User view and update the
 * database using User model.
 *
 * @package Application/Controller
 * @subpackage Home
 * @author Steven Chou <schou@labpetri.org>
 * @copyright 2015 - 2017 Lab Petri
 * @version 1.0.0
 */
class Home extends CI_Controller {
/**
 * Assembles tools for Home.
 * @return void
 */
   public $data = array();

   public function __construct()
   {
      parent::__construct();
      $this->load->model('home_model');
      $this->load->library('form_validation');
      $this->load->helper(array('form', 'url'));

   }
/**
 * Index page for Home.
 * Form Validations: New Project, New Comment, New Subcomment
 * Run Form Validations
 * @return void
 */
   public function index() {
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) {
         if ($this->input->post('new_project') === 'new_project') {
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('topic', 'topic', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
         }
         if ($this->input->post('new_comment') === 'new_comment') {
            $this->form_validation->set_rules('comments', 'comments', 'trim|required');
         }
         if ($this->input->post('new_subcomment') === 'new_subcomment') {
            $this->form_validation->set_rules('subcomments', 'subcomments', 'trim|required');
         }
         if ($this->input->post('new_question') === 'new_question') {
            $this->form_validation->set_rules('question', 'question', 'trim|required');
         }
         if ($this->input->post('new_opportunity') === 'new_opportunity') {
            $this->form_validation->set_rules('position', 'position', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
         }
         if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('home2', array(
               'name' => $this->home_model->userName($this->session->user_id),
               'projects' => $this->home_model->get_projects(),
               'questions' => $this->home_model->getQuestions(),
               'ckeditor', $this->data,
            ));
            $this->load->view('templates/footer');
         } else {
            if ($this->input->post('new_project') === 'new_project') $this->creates_project();
            if ($this->input->post('new_question') === 'new_question') $this->creates_question();
            if ($this->input->post('new_opportunity') === 'new_opportunity') $this->creates_opportunity();
            if ($this->input->post('new_comment') === 'new_comment') $this->creates_comment();
            if ($this->input->post('new_subcomment') === 'new_subcomment') $this->creates_subcomment();
            redirect('');
         }
      } else {
         $this->load->view('home');
      }
   }
/**
 * Create user subcomment.
 * @return void
 */
   public function creates_subcomment() {
      $this->home_model->insert_comment( array(
         'type' => $this->input->post('new_subcomment'),
         'comment_id' => $this->input->post('comment_id'),
         'comments' => nl2br($this->input->post('subcomments')),
         'order_id' => $this->input->post('order_id'),
      ));
   }
/**
 * Create user comment.
 * @return void
 */
   public function creates_comment() {
      $this->home_model->insert_comment( array(
         'type' => $this->input->post('new_comment'),
         'comment_id' => $this->input->post('comment_id'),
         'comments' => nl2br($this->input->post('comments')),
      ));
   }
/**
 * Create user project.
 * @return void
 */
   public function creates_project() {
      $this->db->set('month', 'MONTHNAME(NOW())', FALSE);
      $this->db->set('day', 'DAY(NOW())', FALSE);
      $this->db->set('year', 'YEAR(NOW())', FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);

      $this->home_model->insert_project( array(
         'user_id' => $this->session->user_id,
         'title' => $this->input->post('title'),
         'topic' => $this->input->post('topic'),
         'description' => nl2br($this->input->post('description')),
         'comment_id' => '0.0',
         'views' => 0,
         'members' => $this->session->user_id . ','
      ), $this->input->ip_address());
   }

/**
 * Create user project.
 * @return void
 */
   public function update_project()
   {
      ;
   }

/**
 * Deletes user project.
 * @return void
 */
   public function delete_project() {
      $this->home_model->delete_post( array(
          'post_id' => $this->input->post('post'),
          'comment_id' => $this->input->post('comment'),
          'user_id' => $this->session->user_id,
      ));
      redirect('');
   }

/**
 * Creates user question.
 * @return void
 */
   public function creates_question() {
      $this->db->set('month', 'MONTHNAME(NOW())', FALSE);
      $this->db->set('day', 'DAY(NOW())', FALSE);
      $this->db->set('year', 'YEAR(NOW())', FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);

      $this->home_model->insertQuestion( array(
         'user_id' => $this->session->user_id,
         'question' => nl2br($this->input->post('question')),
         'topic' => nl2br($this->input->post('topic')),
         'views' => 0,
      ), $this->input->ip_address());
   }

/**
 * Creates user answer.
 * @return void
 */
   public function creates_answer() {
      $this->db->set('month', 'MONTHNAME(NOW())', FALSE);
      $this->db->set('day', 'DAY(NOW())', FALSE);
      $this->db->set('year', 'YEAR(NOW())', FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);

      $this->home_model->insert_answer( array(
          'question_id' => $this->input->post('question_id'),
          'user_id' => $this->session->user_id,
          'answer' => nl2br($this->input->post('answer')),
          'views' => 0,
      ), $this->input->ip_address());

   }
/**
 * Creates user bookmark.
 * @return void
 */
   public function add_bookmark() {
      $this->home_model->bookmarks( array(
          'post_id' => $this->input->get('id'),
          'user_id' => $this->session->user_id,
          'type'    => 'petridish',
      ));
      redirect('');
   }
}
