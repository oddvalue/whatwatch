<!DOCTYPE html>
<html>
<head>
	<title>WHAT WATCH?</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<link href='http://fonts.googleapis.com/css?family=Flamenco|Unica+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="jquery.toast.min.css" />
<link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.toast.min.js"></script>
<script type="text/javascript" src="block.js"></script>
<script type="text/javascript" src="script.js"></script>
<body>
<div id="content_wrapper">
<div style="display:none;" id="eztv_search">
	<form action="http://eztv.it/search/" target="_blank" method="POST">
		<input name="SearchString1">
	</form>
</div>
	<header>
		<a href="{{ url('/') }}">WHAT WATCH?</a>
		<nav>
			<a href="{{ url('/') }}">TV</a>
			<a href="{{ url('movies') }}">M<small>OVIES</small></a>
		</nav>
		<form>
			<input name="search" placeholder="search..." value="{{ old('search') }}">
		</form>
	</header>
<?
<!-- 	display_errors();
	
	if ($movies)
	{
		include('movies.inc');
	}
	elseif ($results)
	{
		include('search_results.inc');
	}
	else
	{
		include('calendar.inc');
	} -->
?>
</div>
</body>
</html>