<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="divider"></div><div class="divider"></div>
<div class="divider"></div><div class="divider"></div>

<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12">
         <div class="row">
            <div align="center" class="row">
               <h5 class="blue-text text-darken-2">
                  <strong>Bookmarks</strong>
               </h5>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
}
?>