<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link href="assets/css/projects.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
    #profile-image {
        border-radius: 50%;
        border: 1px solid #fbc02d;
        width: 150px;
        height: 150px;
    }
    #profile-card {
        //position: fixed;
        height: 100%;
    }
</style>

<script>
    /* AJAX :: closes submission form after submitting
     ****************************************************************************/
    function collapseAll() {
        $(".collapsible-header").removeClass(function(){ return "active"; });
        $(".collapsible").collapsible({accordion: true});
        $(".collapsible").collapsible({accordion: false});
    }

    /* AJAX :: posting blog
     ****************************************************************************/
    function ajax(){
        $.ajax({
            url: "<?php echo base_url().'creates_question'; ?>",
            type: "POST",
            cache: false,
            data: $('#newQuestion').serialize(),
            success: function(html) {
                $('#questions').prepend(html);
            },
            error: function(XMLHttpRequest, status, errorThrown) {
                alert("STATUS: " + status + "Error: " + errorThrown);
            },
        });
        // closes submission form after submitting
        collapseAll();
    }
</script>

<div class="container-fluid blue-grey lighten-5">
    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large blue">
            <i class="material-icons">menu</i>
        </a>
        <ul class="blue tabs container-fluid">
            <li class="tab col s4 btn-flat blue darken-1"><a href="#projects" class="white-text"><strong>Projects</strong></a></li>
            <li class="tab col s4 btn-flat blue darken-1"><a href="#careers" class="white-text"><strong>Careers</strong></a></li>
            <li class="tab col s4 btn-flat blue darken-1"><a href="#qnas" class="active white-text"><strong>Q & A</strong></a></li>
        </ul>
    </div>
<!--
Profile Card
-->
    <div class="row col s12">
        <div class="col s3" id="profile-card">
            <div class="card">
                <div class="card-image blue" align="center">
                    <div class="card-content">
                        <img id="profile-image" class="responsive-img z-depth-2" src="users/1/pictures/profile.jpg">
                    </div>
                </div>
                <div class="card-content">
                    <div class="row"><?php echo $name; ?></div>
                    <div class="row">Recent Activity</div>
                    <div class="row">Contact</div>
                    <div class="row">Network</div>
                </div>
            </div>
        </div>
<!--
Questions and Answers Section
-->
        <div class="col s7" id="qnas">
            <div>
                <div class="container-fluid"><?php include 'application/views/home/qnas/newQuestion.php';?></div>
                <span id="questions"></span>
               <?php include 'application/views/home/qnas/questions.php';?>
            </div>
        </div>
<!--
Projects
-->
        <div class="col s7" id="projects">
            <div class="container-fluid"><?php include 'application/views/home/projects/new_post.php';?></div>
           <?php include 'application/views/home/projects/posts.php';?>
        </div>
        <div class="col s7" id="careers">
            <div class="container-fluid"><?php include 'application/views/home/careers/new_post.php';?></div>
            <?php include 'application/views/home/careers/opportunities.php';?>
            <div class="card"><div class="card-content"><strong>strong</strong></div></div>
        </div>
<!--
Notifications
-->
        <div class="col s2">
            <div class="card">
                <div class="card-content">
                    <div class="row">Notification 1</div>
                    <div class="row">Notification 2</div>
                    <div class="row">Notification 3</div>
                    <div class="row">Notification 4</div>
                    <div class="row">Notification 5</div>
                    <div class="row">Notification 6</div>
                    <div class="row">Notification 7</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/projects.js"></script>