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

<div class="container-fluid">
<!-- Lab Cast :: tabs
---------------------------------------------------------------------------->
   <div class="row">
      <div class="col s12">
         <ul class="tabs">
<!-- TAB :: news, blogs, community
---------------------------------------------------------------------------->
            <li class="tab col s4"><a href="#news" class="black-text"><strong>News</strong></a></li>
            <li class="tab col s4"><a href="#blogs" class="active black-text"><strong>Blogs</strong></a></li>
            <li class="tab col s4"><a href="#community" class="black-text"><strong>Community</strong></a></li> 
         </ul>
      </div>
   </div>
   
   <?php include 'application/views/labcast/news/rssfeed.php';?>
   <?php include 'application/views/labcast/blog/postboard.php';?>
   <?php include 'application/views/labcast/community/activityfeed.php';?>

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