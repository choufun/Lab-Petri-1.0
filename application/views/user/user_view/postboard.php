<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<div class="card-content">
    <div class="container-fluid">
        <div id="post-border" class="col s12">
<?php if ($posts !== NULL || $blog_posts !== NULL) {
            include 'application/views/user/user_view/postboard/petridish/posts.php';
            echo "<br>";
            include 'application/views/user/user_view/postboard/labcast/posts.php';
      } else { ?>
            <div class="card-content" align="center">
                <h5><small><strong>Start posting at <a href="petridish">Petri Dish</a> or <a href="labcast">Lab Cast</a>.</strong></small></h5>
            </div>
<?php } ?>
        </div>
    </div>
</div>
<?php
}