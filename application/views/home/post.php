<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        .profile-image { border-radius: 50%; width: 75px; height: 75px; }

        .profile-image_2 { border-radius: 50%; width: 75px; height: 75px; }
    </style>
<?php
if ($this->input->get('key') !== NULL)
{
   $post = $this->post_model->get_post($_GET['key']);
   ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <div class="card z-depth-1">
                   <?php include 'application/views/home/post/top.php';?>
                   <?php include 'application/views/home/post/middle.php';?>
                    <div class="divider"></div>
                   <?php include 'application/views/home/post/bottom.php';?>
                    <div class="divider"></div>
                   <?php include 'application/views/home/post/comments.php';?>
                </div>
            </div>
        </div>
    </div>
   <?php
}
else
{
   redirect('');
}
?>