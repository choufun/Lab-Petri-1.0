<!--
   - SHOW HIDE
   
   - USER ACCOUNT INFORMATION => SHOWN
   - ACCOUNT INFORMATION FORM => HIDDEN

   - SIDE BUTTON ACTIVATES (SWITCHES) THE TWO
      - ALLOWING USER TO SUBMIT A QUERY TO CHANGE THE INFORMATION SHOWN ON PROFILE
      - USE AJAX TO REFRESH INFORMATION SECTION

   - ADD FUNCTIONS IN MODEL FOR QUERY SUBMISSION
   - ADD FUNCTIONS TO MANAGE THE DISPLAY AFTER QUERY
   - UPDATE DATABASE
-->

<div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
   <a class="btn-floating btn-large red">
      <i class="large mdi-navigation-menu"></i>
   </a>
   <ul>
      <li>
         <a class="btn-floating red">
            <i class="material-icons">insert_chart</i>
         </a>
      </li>
      <li>
         <a class="btn-floating yellow darken-1">
            <i class="material-icons">format_quote</i>
         </a>
      </li>
      <li>
         <a class="btn-floating green">
            <i class="material-icons">publish</i>
         </a>
      </li>
      <li>
         <a class="btn-floating blue">
            <i class="material-icons">attach_file</i>
         </a>
      </li>
   </ul>
</div>
        