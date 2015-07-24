$.noConflict();
jQuery( document ).ready(function( $ ) {
  $(function() {
    $( "#tgl_sk" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
    $( "#tmt_sk" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
  });
});
