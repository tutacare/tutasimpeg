<!DOCTYPE html>
<html ng-app="tutasim">
<head>
	<title>Guest Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    <div class="content" ng-controller="KartuPegawaiCtrl">



        <div ng-repeat="guestbook in kartupegawais">
            <p>@{{guestbook.nip}}</p>
        </div>

    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>

<script>
(function(){
	var app = angular.module('tutasim',  []);

	app.controller('KartuPegawaiCtrl', [ '$scope', '$http', function($scope, $http) {

			$http.get('/api/kartu-induk-pegawai').success(function(data) {
	    	$scope.kartupegawais = data;
	    });



    }]);

})();
</script>
</body>
</html>
