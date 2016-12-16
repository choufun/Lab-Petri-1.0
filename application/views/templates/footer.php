<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
/*
$(document).keydown(function(event) {
if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
        event.preventDefault();
     }
    // 107 Num Key  +
    // 109 Num Key  -
    // 173 Min Key  hyphen/underscor Hey
    // 61 Plus key  +/= key
});

$(window).bind('mousewheel DOMMouseScroll', function (event) {
       if (event.ctrlKey == true) {
       event.preventDefault();
       }
});
*/

$(document).ready(function(){
   var keyCodes = [61, 107, 173, 109, 187, 189];

   $(document).keydown(function(event) {   
      if (event.ctrlKey==true && (keyCodes.indexOf(event.which) != -1)) {
       //alert('disabling zooming');
       event.preventDefault();
       }
   });

   $(window).bind('mousewheel DOMMouseScroll', function (event) {
      if (event.ctrlKey == true) {
        //alert('disabling zooming'); 
        event.preventDefault();
      }
   });
});
</script>

<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
     <script src="assets/js/materialize.js"></script>
     <script src="assets/js/materialize.min.js"></script>    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
     <script src="assets/js/custom.js"></script>

     <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script> -->
      
   </body>
   <footer>
      <!-- <p class="center"> Lab Petri &copy; 2015-<?php echo date("Y"); ?>, All Rights Reserved</p> -->
      <p class="center"> Lab Petri 2015-<?php echo date("Y"); ?>, All Rights Reserved.</p>
   </footer>
</html>