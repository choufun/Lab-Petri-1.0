<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<link href="../../assets/css/user.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<div class="container">
   <div class="col s12 m12 l12">
        <div class="card z-depth-1">
        <?php
            if ($this->input->get('view') !== NULL) {
                include 'application/views/user/other_view/header.php';
            } else {
                if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) {
                   include 'application/views/user/user_view/header.php';
                   include 'application/views/user/user_view/postboard.php';
                   include 'application/views/user/user_view/bookmarks.php';
                }
                else { redirect(''); }
            } ?>
        </div>
   </div>
</div>