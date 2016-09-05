<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content">
   Google News:
</div>
<div class="divider"></div>
<div class="card">  
<?php
$google_news = simplexml_load_file('https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&csid=bd58310c33d988d4&output=rss');
  
//var_dump($google_news);
foreach($google_news->channel->item as $news) { ?>

   

   <div class="card-content">
      <a href="<?php echo strip_tags($news->link); ?>" target="_blank"><strong><?php echo $news->title; ?></strong></a><br>
      <?php echo strip_tags($news->pubDate); ?><br>
      <?php echo strip_tags($news->description); ?><br>
   </div>

   <div class="divider"></div>
<?php } ?>
</div>