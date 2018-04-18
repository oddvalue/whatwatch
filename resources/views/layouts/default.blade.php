<!DOCTYPE html>
<html>
<head>
	<title>WHAT WATCH?</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link href='http://fonts.googleapis.com/css?family=Flamenco|Unica+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" />
<body>
	<header>
		<a href="{{ route('home') }}">WHAT WATCH?</a>
		<nav>
			<a href="{{ route('home') }}" class="{{ url()->current() == route('home') ? 'is-active' : '' }}">U<small>PCOMING</small></a>
			<a href="{{ route('toprated') }}" class="{{ url()->current() == route('toprated') ? 'is-active' : '' }}">T<small>OP</small>R<small>ATED</small></a>
		</nav>
		<form action="{{ route('search') }}">
			<input name="q" placeholder="search..." value="{{ old('q') }}">
		</form>
	</header>
	<main>
		@yield('main')
	</main>
</body>
</html>