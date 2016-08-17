<div class="container">
   <div class="card">
      <div class="card-content"><h4 align="center"><strong>Lab Cast</strong></h4></div>
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE) && ($this->session->lastname == "Admin"))
      { ?>
      
      <div class="divider"></div>
      <div class="card-content">
         Admin Interface
         
         <?php echo form_open('Labcast');?>
            <div class="input-field col s12">
               <input name="title" type="text" class="validate">
               <label class="blue-text" for="title">Title:</label>
            </div>
            <div class="input-field col s12">
               <textarea name="description" type="text" class="materialize-textarea"></textarea>
               <label class="blue-text" for="abstract">Description:</label>
            </div>
            <div class="input-field col s12">
               <input name="url" type="text" class="materialize-textarea" placeholder="Must include http://">
               <label class="blue-text" for="url">Found News URL:</label>
            </div>
            <div class="col s12 right-align">
               <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">mode_edit</i>
               </button>
            </div>
         <?php echo form_close(); ?>
         
      </div>
      
<?php } ?>
<?php
   if ($labpetri_news !== NULL) { ?>
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
      <div class="divider"></div>
      <div class="card-content">
         Google News:
      </div>
      <div class="divider"></div>      
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
      
<div class="card-content">
   Gov News:
</div>
<div class="divider"></div>   
<?php
$gov_news = simplexml_load_file('https://www.ed.gov/feed');
  
//var_dump($google_news);
      
foreach($gov_news->channel->item as $news) { ?>
   <div class="card-content">
      <a href="<?php echo strip_tags($news->link); ?>" target="_blank"><strong><?php echo $news->title; ?></strong></a><br>
      <?php echo strip_tags($news->pubDate); ?><br>
      <?php echo strip_tags($news->description); ?><br>
   </div>
   <div class="divider"></div>
<?php } ?>
      <div class="divider"></div>
      <div class="card-content">
         <h5>Community Activities:</h5>
      </div>   
      <div class="divider"></div>
      
<?php foreach ($activities as $cast) { ?>
      <div class="card-content">
<?php echo $cast->activity; ?>
      </div>
      <?php if ($cast !== end($activities)) { ?><div class="divider"></div><?php }
      } ?>
      
   </div>
</div>
