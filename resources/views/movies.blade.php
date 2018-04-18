@extends('layouts.default')

@section('main')
	<div class="poster-list">
		@foreach ($movies as $movie)

		<div class="poster">
			<img class="poster__image" src="{{ $movie->poster }}">
			<div class="poster__details">
				<p>
					<strong>{{ $movie->title }}</strong>
					<br>
					<small>( {{ $movie->year }} )</small>
				</p>
				{{-- <a class="tooltip" title="{{ $movie->synopsis }}">overview</a> --}}
			</div>
		</div>
		@endforeach
	</div>
	{{ $movies->links() }}
@stop