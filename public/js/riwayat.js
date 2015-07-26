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
    $( "#tgl_lahir" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
    $( "#tgl_nikah" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
    $( "#tgl_pisah" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
  });
});
