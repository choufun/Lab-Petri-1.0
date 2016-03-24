<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron
{
/* CREATE USER DIRECTORY
************************************************************************************/
   public function create($user_id)
   {
      $command = "cd /home/labpetri/users/".PHP_EOL;
      exec($command);
      unset($command);
      $command = "mkdir /home/labpetri/users/{$user_id}".PHP_EOL;
      exec($command);
      unset($command);
      $command = "mkdir /home/labpetri/users/{$user_id}/research".PHP_EOL;
      exec($command);
   }
}