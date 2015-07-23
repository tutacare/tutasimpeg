$.noConflict();
jQuery( document ).ready(function( $ ) {

  $(function() {
    $( "#tgl_lahir" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
    $( "#tgl_masuk_pegawai" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
    $( "#tmt_pangkat" ).datepicker(
      { dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true});
  });

});

(function(){
	var app = angular.module('tutasim',  []);

	app.controller('KartuPegawaiCtrl', [ '$scope', '$http', function($scope, $http) {

    $scope.getTglPensiun = function(tgl_lahir) {
      var dt1 = tgl_lahir.split('-'),
          md = parseInt(dt1[2]) + 55;
      $scope.tgl_pensiun_model = dt1[0] + '-' + dt1[1] + '-' + md;
    };



    }]);

})();
