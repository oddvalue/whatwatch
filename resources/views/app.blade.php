@extends('layouts.default')

@section('main')
	<div id="app"></div>
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
