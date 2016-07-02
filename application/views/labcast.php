<div class="container">
   <div class="card">
      <div class="card-content"><h4 align="center"><strong>Lab Cast</strong></h4></div>
      <div class="divider"></div>
      <div class="card-content">
         <h5>Community Activities:</h5>
      </div>   
      <div class="divider"></div>
         <?php
            foreach ($news as $cast)
            { ?>
               <div class="card-content">
         <?php echo $cast->activity; ?>
               </div>
         <?php if ($cast !== end($news)) { ?> <div class="divider"></div> <?php } ?>
      <?php } ?>

   </div>
</div>
