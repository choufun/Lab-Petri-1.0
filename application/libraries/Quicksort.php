<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* Quicksort CLASS
      - quicksorts the nestings of comments for a single Forum post.
****************************************************************************/
class Quicksort
{
   private $stack = array();
   
/* CONSTRUCTOR
****************************************************************************/
   public function __construct() { ; }
   
   public function _sort($ids)
   {
      foreach($ids as $id) { array_push($this->stack, $id->order_id); }
      $this->quicksort(0, count($this->stack)-1);
   }
   
/* PARTITION
- pushes smallest value to left and largest value to right
****************************************************************************/
   private function partition($left, $right)
   {
      $i = $left;
      $j = $right;
      $temp;
      $pivot = $this->stack[($left+$right)/2];

      while ($i <= $j)
      {
         while ($this->stack[$i] < $pivot) $i++;
         while ($this->stack[$j] > $pivot) $j--;
         
         if ($i <= $j)
         {
            $temp = $this->stack[$i];
            $this->stack[$i] = $this->stack[$j];
            $this->stack[$j] = $temp;
            $i++;
            $j--;
         }
      }
      return $i;
   }
   
/* QUICKSORT
****************************************************************************/
   private function quicksort($left, $right)
   {
      $index = $this->partition($left, $right);
      
      if ($left < $index-1) $this->quicksort($left, $index-1);
      if ($index < $right) $this->quicksort($index, $right);
   }
   
/* GET STACK
****************************************************************************/
   public function get_stack() { return $this->stack; }
   
/* GET LAST ELEMENT
****************************************************************************/
   public function get_last_element() { return $this->stack[count($this->stack)-1]; }
   
/* UNSET STACK : EMPTIES STACK
****************************************************************************/
   public function free_stack()
   {
      unset($this->stack);
      $this->stack = array();
   }
}