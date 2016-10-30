<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card" style="margin-right:40px; margin-left: 40px;">
   <div class="card-content">
      <center><h4><strong>Google News</strong></h4></center>
   </div>
   <div class="divider"></div>
<?php
foreach(simplexml_load_file('https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&csid=bd58310c33d988d4&output=rss')->channel->item as $news) { ?>
   <div class="card-content">
      <div class="flow-text">
         <div class="col s12 m12 l12">
            <div class="row">                  
               <div class="col s12 blue-text text-darken-1">                  
                  <strong><a href="<?php echo strip_tags($news->link); ?>" target="_blank"><strong><?php echo $news->title;?></a></strong>
               </div>
               <div class="col 12 grey-text text-darken-2">
                  <small><small><?php echo strip_tags($news->pubDate); ?></small></small>
               </div>
               <div class="col s12 grey-text text-darken-3">
                  <strong><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strip_tags($news->description);?></small></strong>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="divider"></div>
<?php } ?>
</div>