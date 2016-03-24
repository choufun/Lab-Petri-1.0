<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

/* BINARYSEARCH CLASS
      - 
*******************************************************************************/
class Binarysearch
{
   private $stack = array();
   
   /* CONSTRUCTOR
   ****************************************************************************/
   public function __construct() { ; }
   
   /* DO BINARYSEARCH
      - returns value index
   ****************************************************************************/
   public function binarysearch($stack)
   {
      $this->stack = $stack;
      $index = $this->search();
      return $index;
   }
   
   /* PERFORM BINARYSEARCH
      - returns value index
   ****************************************************************************/
   public function search($value, $left, $right)
   {
      if ($left > $right) return -1;
      $middle = ($left+$right)/2;
      
      if ($this->stack[$middle] == $value) return $middle;
      else if ($this->stack[$middle] > $value) return $this->search($value, $left, $middle-1);
      else return $this->seach($value, $middle+1, $right);
   }
}