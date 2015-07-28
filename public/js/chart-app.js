(function(){
var app = angular.module('tutasim', ['chart.js']);

app.config(function (ChartJsProvider) {
  // Configure all charts
  ChartJsProvider.setOptions({
    colours: ['#97BBCD', '#DCDCDC', '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'],
    responsive: true
  });
  // Configure all doughnut charts
  ChartJsProvider.setOptions('Doughnut', {
    animateScale: true
  });
});

app.controller("BarCtrl", [ '$scope', '$http', function($scope, $http) {

  $http.get('api/chart-pegawai-usia').success(function(data) {
    $scope.labels = data;
  });


  $scope.series = ['Pegawai'];

  $http.get('api/chart-pegawai-usia-count').success(function(data) {
    $scope.data = [data];
  });


}]);

  })();
