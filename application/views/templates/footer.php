<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <script>

        $( document ).ready(function(){
            $(".button-collapse").sideNav();
        });

        function show(current, hidden) {
            document.getElementById(current).style.display='block';
            document.getElementById(hidden).style.display='none';
            return false;
        }

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
        <script src="assets/js/materialize.js"></script>
        <script src="assets/js/materialize.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
    <footer><p class="center"> &copy; Lab Petri 2015-<?php echo date("Y"); ?>, All Rights Reserved.</p></footer>
</html>