@extends('layouts.default')

@section('main')
	{{-- <header>
		<a href="{{ route('home') }}">WHAT WATCH?</a>
		<nav>
			<a href="{{ route('home') }}" class="{{ url()->current() == route('home') ? 'is-active' : '' }}">U<small>PCOMING</small></a>
			<a href="{{ route('toprated') }}" class="{{ url()->current() == route('toprated') ? 'is-active' : '' }}">T<small>OP</small>R<small>ATED</small></a>
		</nav>
		<form action="{{ route('search') }}">
			<input name="q" placeholder="search..." value="{{ old('q') }}">
		</form>
	</header> --}}

	<div id="app">
		<example-component></example-component>
	</div>
	{{-- <div class="poster-list">
		@foreach ($movies as $movie)

		<div class="poster">
			<img class="poster__image" src="{{ $movie->poster }}">
			<div class="poster__details">
				<p>
					<strong>{{ $movie->title }}</strong>
					<br>
					<small>( {{ $movie->year }} )</small>
				</p>
			</div>
		</div>
		@endforeach
	</div> --}}
	{{-- {{ $movies->links() }} --}}
@stop
