<div class="container">
   <div class="card">
      <div class="card-content">
         
         <h4 align="center"><strong>Lab Cast</strong></h4>
      </div>
      <div class="divider"></div>
      <div class="card-content">
      
         <h5>Community Activities:</h5>
   
         <?php
            foreach ($news as $cast)
            {
               echo $cast->activity."<br>";
            }
         ?>
         
      </div>
   </div>
</div>
