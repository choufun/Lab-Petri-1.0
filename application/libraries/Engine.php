<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

/* Engine CLASS:
      - user search interface controller.
      - utilizes multiple queries for ranking.
*******************************************************************************/
class Engine
{
   private $search = array();
   
   /* CONSTRUCTOR
      - sets search type and query
   ****************************************************************************/
   public function __construct($user_search, $type)
   {
      if ($user_search == NULL || $type == NULL) { return $this; }
      else
      {
         $this->search['type'] = $type;
         $this->search['query'] = $user_search;
      }
   }
   
   /* SEARCH
      - initiates engine to search
   ****************************************************************************/
   public function search()
   {
      if ($this->search['type'] == 'connection') { $this->search_connection(); }
      if ($this->search['type'] == 'forum') { $this->search_forum(); }
      if ($this->search['type'] == NULL) { return $this; }
   }
   
   /* FILTER
      - filtrate user input
      
      delimiters:
      {
         majors => majors,
         university => university,
         undergraduate => undergraduate,
         graduate => graduate,
         professor => professor
      }
   ****************************************************************************/
   private function filter($user_input)
   {
      $filter_words = array(
         "major" => "major",
         "majors" => "majors"
         "university" => "university",
         "universities" => "universities",
         "undergraduate" => "undergraduate",
         "undergraduates" => "undergraduates",
         "graduate" => "graduate",
         "graduates" => "graduates",
         "professor" => "professor",
         "professors" => "professors",
      );
      
      
      if (in_array($user_input, $filter_words, TRUE))
      {
         
      }
   }
   
   /* SEARCH CONNECTION
   ****************************************************************************/
   private function search_connection()
   {
      /*
         Array
         (
             [0] => This
             [1] => is
             [2] => a
             [3] => search
         )
      */
      
      $stack = array();
      
      //$user_input = explode(' ', $this->search['query']);
      $user_input = preg_split( '/(\s|&|,)/', 'This is a string' );

      
      foreach ($user_input as $sample_space)
      {
         
      }
      
   }
   
   /* SEARCH FORUM
   ****************************************************************************/
   private function search_forum()
   {
      return $this;
   }
   
   /* RANK SAMPLE SPACES
   ****************************************************************************/
   private function rank()
   {
      return $this;
   }
}

/* Search Node CLASS:
      - user search interface controller.
      - utilizes multiple queries for ranking.
*******************************************************************************/
class Stack_Node
{
   public $rank;
   public $count;
   
   public function __construct()
   {
      ;
   }
   
}