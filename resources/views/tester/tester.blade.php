<?php
session_start(); //start PHP session
session_regenerate_id(true); //Generated new session id
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Project</title>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<style type="text/css">
.locked_ct {
	width: 250px;
	height: 100px;
	float: left;
	margin-right: 10px;
	padding: 20px;
	text-align: center;
	background: #C1FF00;
	font: 14px "Trebuchet MS";;
	color: #949494;
margin-bottom: 50px;
}
.locked_ct h5 {
margin: -20px -20px 10px;
padding: 5px 0px 5px;
background: #67AD1B;
font: 16px "Trebuchet MS";
color: #CDFFB2;
}
</style>
</head>

<body>


<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>


<div id="tweet_content" class="locked_ct"><h5>Tweet to Unlock this Content</h5>
<a href="https://twitter.com/share" class="twitter-share-button" data-via="tutanews">Tweet</a>
</div>

<script type="text/javascript">
twttr.ready(function (twttr) {
	twttr.events.bind('tweet', function(event) {
		Tu= jQuery.noConflict();
var data = {unlock_key : 'xyz', _token: {{ csrf_token() }}};
Tu.post("{{url('send')}}",  data, function(data)
		{
			Tu('#tweet_content').html(data);
		}).error(function(xhr, ajaxOptions, thrownError) {
			alert( thrownError);
		});
	});

});
</script>





</bOdy>
</html>
