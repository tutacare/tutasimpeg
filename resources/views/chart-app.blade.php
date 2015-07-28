<!DOCTYPE html>
<html ng-app="tutasim">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TutaSIMPEG</title>
  <link rel="stylesheet" href="{{ asset('/css/angular-chart.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="{{ asset('/images/tutasimpeg/tutaico.png') }}" type="image/x-icon" />
</head>
<body>

	@include('menu')
	@yield('content')

	<footer class="footer hidden-print">
      <div class="container">
        <p class="text-muted">You are using <a href="http://mytuta.com">TutaSIMPEG</a> v0.1-alpha by <a href="https://twitter.com/tutacare">Irfan Mahfudz Guntur</a>.
        </p>
      </div>
    </footer>
	<!-- Scripts -->

  <script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/angular.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/Chart.min.js') }}"></script>
  <script src="{{ asset('/js/angular-chart.min.js') }}"></script>
  <script src="{{ asset('/js/chart-app.js') }}"></script>
</body>
</html>
