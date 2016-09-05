<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($labpetri_news !== NULL) { ?>
      <div class="divider"></div>
      <div class="card-content">Lab Cast News:</div>
<?php foreach ($labpetri_news as $cast) { ?>
      <div class="card-content">
         <a href="<?php echo $cast->url;?>" target="_blank"><strong><?php echo $cast->title; ?></strong></a><br>
         <?php echo $cast->day." ".$cast->month." ".$cast->yr." ".$cast->time; ?><br>
         <?php echo $cast->description; ?><br>         
      </div>      
      <?php if ($cast !== end($labpetri_news)) { ?><div class="divider"></div><?php }
      } ?>
<?php
   } ?>