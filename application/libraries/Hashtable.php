<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

/* Hashtable CLASS:
      - builds dictionary for user search.
      - utilizes multiple queries for ranking.
*******************************************************************************/
class Hashtable
{
   private $dictionary = array();
   private $size = 1000;
   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct($size=0)
   {
      $size = (int)$size;
      if ($size > 0)
      {
         $this->size = $size;
      }
   }
   
   /* SET
   ****************************************************************************/
   public function set($key, $value)
   {
      $current_index = $original_index =  $this->get_index($key);
      
      $node = new Search_Node($key, $value);
      
      while(TRUE)
      {
         if (!isset($this->dictionary[$current_index]) || $key == $this->dictionary[$current_index]->key)
         {
            $this->dictionary[$current_index] = $node;
            break;
         }
         
         // increment current index
         $i = (++$current_index%$this->size);
         
         // loop complete -- recursion
         if ($current_index == $original_index)
         {
            $this->double_dictionary_size();
            
            return $this->set($key, $value);
         }
      }
      
      return $this;
   }
   
   /* GET
   ****************************************************************************/
   public function get($key)
   {
      $current_index = $original_index = $this->get_index($key);
      
      while(TRUE)
      {
         if (!isset($this->dictionary[$current_index]))
         {
            return NULL;
         }
         
         $node = $this->dictionary[$current_index];
         
         if ($key == $node->key)
         {
            return $node->value;
         }
         
         $current_index = (++$current_index%$this->size);
         
         if ($current_index = $original_index)
         {
            return NULL;
         }
      }
   }
   
   /* GET INDEX
   ****************************************************************************/
   private function get_index($key)
   {
      return crc32($key)%$this->size;
   }
}

/* SEARCH NODE CLASS:
      - builds dictionary for user search.
      - utilizes multiple queries for ranking.
*******************************************************************************/
class Hashtable_Node
{
   public $key;
   public $value;
   
   public function __construct($key, $value)
   {
      $this->key = $key;
      $this->value = $value;
   }
}