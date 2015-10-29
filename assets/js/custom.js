/* SIDE NAV : MODAL
************************************************************************************/
$(document).ready(function() {
   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
   $('.modal-trigger').leanModal();
});

function close_side_nav()
{
   // forces the side nav to close upon clicking a side nav element
   $('.button-collapse').sideNav('hide');
}

function open_side_nam()
{
   // forces the side nav to upon upon clicking a side nav element
   $('.button-collapse').sideNav('show');
}