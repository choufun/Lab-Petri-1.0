<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
   
   .tabs .indicator { background-color: #2196f3; }  
   
   h1, h2, h3, h4, h5, h6 { display: inline; }
   
   .summary-container { margin: 0px 35px; }
   
   .description-container
   {
      -o-text-overflow: ellipsis;   /* Opera */
      text-overflow:    ellipsis;   /* IE, Safari (WebKit) */
      overflow:hidden;              /* don't show excess chars */
      white-space:nowrap;           /* force single line */
      width: 1100px;                /* fixed width */
   }
   
   .post-container { padding: -20px 0px; }
   
   .profile-image { border-radius: 50%; width: 100px; height: 100px; border: 1px solid #ffff8d; }
   
   .profile-image_2 { border-radius: 50%; width: 75px; height: 75px; }
   
   .mobile-profile-image { border-radius: 50%; width: 75px; height: 75px; }
   
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
         url: "<?php echo base_url().'labcast/postblog'; ?>",
         type: "POST",
         cache: false,
         data: $('#form').serialize(),
         success: function(html)
         {
            $('#blog_post').prepend(html);
         },
         error: function(XMLHttpRequest, status, errorThrown)
         {
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
            <li class="tab col s4 btn-flat blue darken-1"><a href="#news" class="white-text"><strong>News</strong></a></li>
            <li class="tab col s4 btn-flat blue darken-1"><a href="#blogs" class="active white-text"><strong>Blogs</strong></a></li>
        </ul>
    </div>

    <div class="row col s12">

        <!--
        Questions and Answers Section
        -->
        <div class="col s9" id="news">
            <div class="">
                <div class="container-fluid"><?php //include 'application/views/home/qnas/new_post.php';?></div>
                <div class="card">
                    <div class="card-content">
                        <strong>Questions</strong>



                    </div>
                </div>
            </div>
           <?php //include 'application/views/home/qnas/questions.php';?>
        </div>
        <!--
        Projects
        -->
        <div class="col s9" id="blogs">
            <div class="">
                <div class="container-fluid"><?php //include 'application/views/home/qnas/new_post.php';?></div>
                <div class="card">
                    <div class="card-content">
                        <strong>Questions</strong>



                    </div>
                </div>
            </div>
            <div class="container-fluid"><?php //include 'application/views/home/projects/new_post.php';?></div>
           <?php //include 'application/views/home/projects/posts.php';?>
        </div>
        <!--
        Notifications
        -->
        <div class="col s3">
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
   
    <?php //include 'application/views/labcast/news/rssfeed.php';?>
    <?php //include 'application/views/labcast/blog/postboard.php';?>

</div>


<!-- JAVASCRIPT ---------------------------------------------------------------------->
<script type="text/javascript">
   /*
   $(document).ready(function(){
      $('#submit_blog').focus(function() {
         this.className = inactive;
      });
   });
   */
   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }

   function toggle(comments)
   {
      var all = document.getElementById(comments);
      if ( all.style.display != 'none' ) { all.style.display = 'none'; }
      else { all.style.display = ''; }
      return false;
   }
   
</script>