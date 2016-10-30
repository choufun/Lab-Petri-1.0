<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labcast_model extends CI_Model
{
   
/* CONSTRUCTOR
************************************************************************************/
   public function __construct()
   {
      parent:: __construct();
      $this->load->library('quicksort');
   } 
   
/* COLLECT :: activities
************************************************************************************/
   public function collect_activities()
   {
      $this->db->order_by('time', "DESC");
      $query = $this->db->get('activities');
      return $query->result();
   }
   
/* COLLECT :: labpetri news
************************************************************************************/
   public function collect_news()
   {
      $this->db->order_by('time', "DESC");
      $query = $this->db->get('news');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }
   
/* INSERT :: news
************************************************************************************/
   public function insert_news($data)
   {
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('time', 'CURRENT_TIME', FALSE);
      $this->db->insert('news', $data);
   }
   
/* INSERT :: blog post
************************************************************************************/
   public function insert_blog_post($data)
   {
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      
      $this->db->insert('blog_posts',$data);      

      $this->db->where('title', $data['title']);
      $query = $this->db->get('blog_posts');
      
      $post_id = $query->row('post_id');
      
      $this->db->where('post_id', $query->row('post_id'));
      $this->db->update('blog_posts', array('comment_id' => $query->row('post_id').".".$query->row('user_id')));

      /*
      $this->db->where('post_id');
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('research_files', array ('post_id' => $post_id));
      */
      
      $this->db->insert('blog_post_views', array(
                                             'post_id' => $post_id,
                                             'views' => 0,
      ));
      
      $this->db->set('month','MONTHNAME(NOW())',FALSE);
      $this->db->set('day', 'DAY(NOW())',FALSE);
      $this->db->set('yr', 'YEAR(NOW())',FALSE);
      $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
      $this->db->insert('blog_comments', array (
                                             'comment_id' => $query->row('post_id').".".$query->row('user_id'),
                                             'order_id' => "0.0",
                                             'user_id' => $this->session->user_id,
      ));
/*
      $this->record_activity( array(
                                       'user_id' => $this->session->user_id,
                                       'type' => "forum_post",
                                       'post_title' => $data['title'],
      ));
*/
      /*
      $this->creates_team( array(
                                    'post_id' => $post_id,
                                    'team_members' => $this->session->user_id,
      ));
*/
   }
   
/* INSERT :: blog comment
************************************************************************************/
   public function insert_blog_comment($data)
   {
      $order_ids = $this->get_order_ids($data['comment_id']); 
      $last_order_id = $order_ids[count($order_ids)-1];
      
      if ($data['type'] == 'new_comment')
      {         
         if($last_order_id == '0.0')
         {
            $this->db->where('comment_id', $data['comment_id']);
            $this->db->where('order_id', $last_order_id);
            $this->db->where('comments', NULL);
            $this->db->update('blog_comments', array(
                                 'order_id' => strval(intval($last_order_id) + 1.0),
                                 'comments' => $data['comments']
            ));
         }
         else
         {
            $this->db->set('month','MONTHNAME(NOW())',FALSE);
            $this->db->set('day', 'DAY(NOW())',FALSE);
            $this->db->set('yr', 'YEAR(NOW())',FALSE);
            $this->db->set('initial_time', 'CURRENT_TIME', FALSE);
            $this->db->insert('blog_comments', array(
                                 'comment_id' => $data['comment_id'],
                                 'order_id' => strval(intval($last_order_id) + 1.0),
                                 'user_id' => $this->session->user_id,
                                 'comments' => $data['comments'],
            ));
         }
      }
   }
   
/* GET :: blog posts
************************************************************************************/
   public function get_blog_posts()
   {
      $query = $this->db->get('blog_posts');
      
      if ($query->num_rows() > 0) return $query->result();
      else return NULL;
   }
   
/* GET :: blog post
************************************************************************************/
   public function get_blog_post($title, $quotes, $blog)
   {
      $this->db->where('title', $title);
      $this->db->where('quotes', $quotes);
      $this->db->where('blog', $blog);
      $this->db->where('user_id', $this->session->user_id);      
      $query = $this->db->get('blog_posts');
      
      if ($query->num_rows() > 0) return $query->row('post_id');
      else return NULL;
   }
   
   
/* GET :: profile pictures
************************************************************************************/
   public function get_profile_picture($user_id)
   {
      $this->db->where('user_id', $user_id);
      $this->db->where('default_picture', 1);
      $query = $this->db->get('profile_picture');
      if ($query->num_rows() == 1) { return $query->row('filename'); }
      else { return NULL;} //return "default.png"; }      
   }   

/* SET :: bookmarks
*****************************************************************************/
   public function bookmarks($data)
   {
      $this->db->insert('bookmarks', $data);
   }
   
/* TEST :: testing AJAX
************************************************************************************/
   public function insert_test()
   {
      $this->db->insert('test', array('message'=>"IT WORKS"));
   }
}
?>