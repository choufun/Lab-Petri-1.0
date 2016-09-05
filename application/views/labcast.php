<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>   
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
   
/* AJAX :: posting blog
****************************************************************************/
   function ajax(){
      $.ajax({
         url: "<?php echo base_url().'labcast/postblog'; ?>",
         type: "POST",
         cache: false,
         data: $('#form').serialize(),
         success: function(json)
         {
            $('#blog_post').prepend(json);            
         },
         error: function(XMLHttpRequest, status, errorThrown)
         {
            alert("STATUS: " + status + "Error: " + errorThrown);
         },
      });
   }
</script>

<div class="container-fluid">
<!-- Lab Cast :: tabs
---------------------------------------------------------------------------->
   <div class="row">
      <div class="col s12">
         <ul class="tabs">
<!-- TAB :: news
---------------------------------------------------------------------------->
            <li class="tab col s4"><a href="#news" class="black-text"><strong>News</strong></a></li>            
<!-- TAB :: Blogs
---------------------------------------------------------------------------->
            <li class="tab col s4"><a href="#blogs" class="active black-text"><strong>Blogs</strong></a></li>             
<!-- TAB :: Community
---------------------------------------------------------------------------->
            <li class="tab col s4"><a href="#community" class="black-text"><strong>Community</strong></a></li> 
         </ul>
      </div>
   </div>
   <div id="news">
      <div class="card-content"><h4 align="center"><strong>Lab Cast</strong></h4></div>
      <?php include 'application/views/labcast/admin_new_post.php';?>
      <?php include 'application/views/labcast/admin_posts.php';?>
      <?php include 'application/views/labcast/google_news.php';?>
<!--var_dump(simplexml_load_file('https://www.ed.gov/feed')) -->
   </div>
   
   <div id="blogs">
      <?php include 'application/views/labcast/new_blog_post.php';?>      
      <?php if ($blog !== NULL) { ?>
      <?php include 'application/views/labcast/blog_posts.php';?>      
      <?php } ?>
   </div>
   
   <div id="community">
      <?php include 'application/views/labcast/community_activities.php';?>
   </div>      
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