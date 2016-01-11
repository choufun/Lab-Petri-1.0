<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

/* COMMENT CLASS
      - manages the nestings of comments for a single Forum post.
****************************************************************************/
class Comment
{
   private $stack;
   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct($ids)
   {
      $this->stack = $ids;
      $this->quicksort($this->stack, 0, count($this->stack)-1);
   }
   
   /* PARTITION
         - pushes smallest to left and largest to right
   ****************************************************************************/
   private function partition($stack, $left, $right)
   {
      $i = $left;
      $j = $right;
      $temp;
      $pivot = $stack[($left+$right)/2];

      while ($i <= $j)
      {
         while ($stack[$i] < $pivot) $i++;
         while ($stack[$j] > $pivot) $j--;
         
         if ($i <= $j)
         {
            $temp = $stack[$i];
            $stack[$i] = $stack[$j];
            $stack[$j] = $stack[$i];
            $i++;
            $j--;
         }
      }
      return $i;
   }
   
   /* QUICKSORT
   ****************************************************************************/
   private function quicksort($stack, $left, $right)
   {
      $index = $this->partition($stack, $left, $right);
      if ($left < $index-1) $this->quicksort($stack, $left, $index-1);
      if ($index < $right) $this->quicksort($stack, $index, $right);
   }
   
   /* GET STACK
   ****************************************************************************/
   public function get_stack(){ return $this->stack; }
   
   /* UNSET STACK
   ****************************************************************************/
   public function free_stack()
   {
      unset($this->stack);
   }
}