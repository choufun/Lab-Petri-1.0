<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This model will handle all incoming data requests from the User controller.
 *
 * @package Application/Model
 * @subpackage Home_model
 * @author Steven Chou <schou@labpetri.org>
 * @copyright 2015 - 2017 Lab Petri
 * @version 1.0.0
 */
class Home_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('quicksort');
   }

/**
 * Get user's first name and last name.
 * @param $user_id
 * @return string
 */
   public function userName($user_id) {
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('users');
      return $query->row('firstname').' '.$query->row('lastname');
   }

/**
 * Inserts a project
 * 1. Inserts a project
 * 2. Get project post_id
 * 3. Update project with new comment_id
 * 4. Create initial comment with comment_id
 * 5. Record user ip_address
 * @return void
 */
   public function insert_project($data, $ip_address)
   {
      $this->db->insert('projects', $data);
      $this->db->where('title', $data['title']);
      $query = $this->db->get('projects');
      $this->db->where('post_id', $query->row('post_id'));
      $this->db->update('projects', array('comment_id' => $query->row('post_id') . "." . $query->row('user_id')));
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('year', 'YEAR(NOW())',FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);
      $this->db->insert('project_comments', array (
            'comment_id' => $query->row('post_id').".".$query->row('user_id'),
            'order_id' => "0.0",
            'user_id' => $this->session->user_id,
      ));
      $this->db->insert('project_views', array(
            'post_id' => $query->row('post_id'),
            'ip_address' => $ip_address,
      ));
   }

/**
 * Inserts an answer
 * Checks for existing answers and increments order_id
 */
   public function insert_answer($data, $ip_address) {
      $temp = $data;
      $this->db->order_by('order_id', 'desc');
      $this->db->where('question_id', $data['question_id']);
      $query = $this->db->get('answers');
      if ($query->num_rows() > 0) {
         foreach ($query as $answer) {
            $temp['order_id'] = ($answer->row('order_id') + 1);
            break;
         }
      }
      $this->db->insert('answers', $temp);
      $this->db->insert('question_views', array(
         'question_id' => $data['question_id'],
         'ip_address' => $ip_address,
      ));
   }

/**
 * Inserts a question
 * 1. Inserts a question
 * 2. Get question question_id
 * 3. Increment and record user ip_address
 * @return void
 */
   public function insertQuestion($data, $ip_address) {
      $this->db->insert('questions', $data);
      $this->db->where('question', $data['question']);
      $query = $this->db->get('questions');
      $this->db->insert('question_views', array(
          'question_id' => $query->row('question_id'),
          'ip_address' => $ip_address,
      ));
   }

/**
 * Get all questions
 * @return array|null
 */
   public function getQuestions() {
      $query = $this->db->get('questions');
      if ($query->num_rows() > 0) return array_reverse($query->result());
      else return NULL;
   }

/**
 * Inserts a comment
 * 1. Get post last order_id
 * 2. If new_comment then inserts new_comment
 *    a. If first new_comment then update existing placeholder
 *    b. Else insert as new_comment with order_id incremented
 * 3. If new_subcomment then inserts new_subcomment
 *    a. Get last order_id and inserts new_subcomment with order_id incremented
 * @return void
 */
   public function insert_comment($data) {
      $order_ids = $this->get_order_ids($data['comment_id']);
      $last_order_id = $order_ids[count($order_ids)-1];

      if ($data['type'] === 'new_comment') {
         if($last_order_id == '0.0') {
            $new_comment = array(
               'order_id' => strval(intval($last_order_id) + 1.0),
               'comments' => $data['comments']
            );
            $this->db->where('comment_id', $data['comment_id']);
            $this->db->where('order_id', $last_order_id);
            $this->db->where('comments', NULL);
            $this->db->update('project_comments', $new_comment);
         } else {
            $new_comment = array(
               'comment_id' => $data['comment_id'],
               'order_id' => strval(intval($last_order_id) + 1.0),
               'user_id' => $this->session->user_id,
               'comments' => $data['comments'],
            );
            $this->db->set('month','MONTHNAME(NOW())',FALSE);
            $this->db->set('day', 'DAY(NOW())',FALSE);
            $this->db->set('year', 'YEAR(NOW())',FALSE);
            $this->db->set('time', 'CURRENT_TIME', FALSE);
            $this->db->insert('project_comments', $new_comment);
         }
      }
      if ($data['type'] === 'new_subcomment') {
         $order_id = $this->get_last_subcomment_order_id($data['comment_id'], $data['order_id']);
         $new_comment = array(
               'comment_id' => $data['comment_id'],
               'order_id' => strval(floatval($order_id) + 0.1),
               'user_id' => $this->session->user_id,
               'comments' => $data['comments']
         );
         $this->db->set('month','MONTHNAME(NOW())',FALSE);
         $this->db->set('day', 'DAY(NOW())',FALSE);
         $this->db->set('year', 'YEAR(NOW())',FALSE);
         $this->db->set('time', 'CURRENT_TIME', FALSE);
         $this->db->insert('project_comments', $new_comment);
      }
   }

/**
 * Gets stack of order_id
 * 1. Query all order_id from project_comments
 * 2. Return order_id stack
 * @return array
 */
   public function get_order_ids($comment_id) {
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('project_comments');
      //$query = $this->db->get('comments');
      $this->quicksort->_sort($query->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();
      return $stack;
   }

/**
 * Get number of comments
 * @return int
 */
   public function get_num_comments($comment_id) {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('project_comments');
      if ($query->num_rows() < 2) {
         if ($query->row('comments') === NULL) {
            return 0;
         } else {
            return 1;
         }
      } else {
         return count($query->result());
      }
   }

/**
 * Get last sub_comment order_id
 * 1. Get comments all order_id
 * 2. Sort the order_ids
 * 3. Identify the current highest order_id placement
 * 4. Locate the last sub_comment
 * @param $comment_id
 * @param $order_id
 * @return int
 */
   public function get_last_subcomment_order_id($comment_id, $order_id) {
      $this->db->select('order_id');
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('project_comments');
      $this->quicksort->_sort($query->result());
      $stack = $this->quicksort->get_stack();
      $this->quicksort->free_stack();
      $temp = (intval($order_id)+1);
      $new_order_id = NULL;
      for ($i = 0; $i <= count($stack)-1; ++$i) {
         if ($temp == $stack[$i]) {
            $new_order_id = $stack[$i-1];
         }
      }      
      if (is_null($new_order_id)) {
         return $stack[count($stack)-1];
      } else {
         return $new_order_id;
      }
   }

/**
 * Query comment information
 * @param $comment_id
 * @param $order_id
 * @return array
 */
   public function get_comment_info($comment_id, $order_id) {
      $this->db->where('comment_id', $comment_id);
      $this->db->where('order_id', $order_id);
      $query = $this->db->get('project_comments');
      if ($query->num_rows() > 0) {
         return $query->row();
      } else {
         return NULL;
      }
   }

/**
 * Get sorted post comments
 * 1. If there are more than one comment, sort order_ids
 * 2. If there is only one comment (Else)
 *    a. If Null then return Null
 *    b. Else return single order_id
 * @param $comment_id
 * @return null
 */
   public function get_post_comments($comment_id) {
      $this->db->where('comment_id', $comment_id);
      $query = $this->db->get('project_comments');
      
      if ($query->num_rows() == 0) {
         return NULL;
      } else {
         if ($query->num_rows() > 1) {
            $sorted_order_ids = $this->get_order_ids($comment_id);
            return $sorted_order_ids;
         } else {
            if ($query->row('comments') == NULL) {
               return NULL;
            } else {
               $sorted_order_ids = $this->get_order_ids($comment_id);
               return $sorted_order_ids;
            }
         }
      }
   }

/**
 * Get all projects
 * @return array|null
 */
   public function get_projects() {
      $query = $this->db->get('projects');
      if ($query->num_rows() > 0) return array_reverse($query->result());
      else return NULL;
   }

   /* GET TIME
   *****************************************************************************/
   public function get_time($time) {
      return substr(strval($time), 0, -3);
   }
   
/* GET PROFILE PICTURE
*****************************************************************************/
   public function get_profile_picture($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return NULL;} //return "default.png"; }      
   }
   
/* CHECK COMMENT TYPE
*****************************************************************************/
   public function comment_type($order_id) {
      $i;      
      for ($i = 0; $i <= count($order_id)-1; ++$i) {
         if ($order_id[$i] == '.') {
            break;
         }
      }
      if (intval(substr($order_id, -((count($order_id)-1)-($i+1)))) == 0) {
         return "comment";
      } else {
         return "subcomment";
      }
   }
   
/* GET NUMBER OF POST VIEWS
*****************************************************************************/
   public function get_num_views($post_id) {
      $this->db->where('post_id', $post_id);
      $query = $this->db->get('projects');
      return $query->row('views');
   }
   
/* INCREMENT POST VIEWS
*****************************************************************************/
   public function increment_post_views() {
      $post_id = $this->input->get('id');
      $this->db->where('post_id', $post_id);
      $query = $this->db->get('post_views');
      
      $data = array ('views' => ($query->row('views')+1));
      $this->db->where('post_id', $post_id);
      $this->db->update('post_views', $data);
   }
   
/* DELETE POST
*****************************************************************************/
   public function delete_post($data) {
      // DELETE POST
      $this->db->where('post_id', $data['post_id']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->where('comment_id', $data['comment_id']);
      $this->db->delete('projects');
      
      // DELETE POST VIEWS
      $this->db->where('post_id');
      $this->db->delete('project_views');
      
      // DELETE POST COMMENTS
      $this->db->where('comment_id', $data['comment_id']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->delete('project_comments');
      
      // DELETE POST ACTIVITES
      //$this->db->where('user_id', $user_id);
      //$this->db->delete('activities');
   }
   
/* GET :: current time
*****************************************************************************/
   public function current_time($data) {
      $time = explode(":", $data);
      return strval(intval($time[0]) - 12).":".$time[1];
   }

   public function bookmarks($data) {
      $this->db->insert('bookmarks', $data);
   }

}