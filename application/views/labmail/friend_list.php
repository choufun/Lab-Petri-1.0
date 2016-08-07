<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
      if ($friends !== NULL)
      {
         foreach($friends as $friend)
         { ?>
                  <?php //echo $friend->friend_id; ?>
                  <a href="labmail?id=<?php echo $friend->friend_id;?>">
                     <div class="card z-depth-1 hoverable">
                        <div class="card-content">
                           <?php echo $this->labmail_model->get_name($friend->friend_id); ?>
                        </div>
                     </div>
                  </a>
   <?php }
      }
      else
      { ?>
                  <h6>
                     Search and start building connections <a href="labteam"><strong>here</strong></a>.
                  </h6>
   <?php 
      } ?>