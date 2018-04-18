@extends('layouts.default')

@section('main')
	<form action="" class="calendar_limits">
		<ul>
			<li class="head">
				 Recent Episodes&nbsp;
			</li>
			<li>
				from:&nbsp;<input type="text" name="from" value="{{ old('from') }}" class="datepicker">
			</li>
			<li>
				to:&nbsp;<input type="text" name="to" value="{{ old('to', date('Y-m-d')) }}" class="datepicker">
			</li>
			<li>
				days:&nbsp;
				<input type="number" name="days" value="{{ old('days', 7) }}" max="50" size="2">
			</li>
			<li>
				<label>
					watched: <input type="checkbox" name="show_watched" @if(old('show_watched')) checked @endif>
				</label>
			</li>
			<li>
				<button class="submit" value="Go">GO</button>
			</li>
			<li class="refresh">
				<a href="{{ route('home', array_merge(request()->input(), ['skip_cache' => 1])) }}">
					<img src="images/refresh.png">
				</a>
			</li>
		</ul>
	</form>

	foreach ([]/*$calendar*/ as $day)
	{
		echo '<h1 style="clear:both;">'.date('D &\n\b\s\p; <\s\m\a\l\l>Y-m-d</\s\m\a\l\l>', strtotime($day->date)).'</h1><div class="day">';
		$counter = 0;
		foreach ([]/*$day->episodes*/ as $key => $episode)
		{

			$s_e_ = $trakt->format_episode_string($episode->episode->season, $episode->episode->number);
		
		<div class="show"
			data-search-term="{{-- $episode->show->title }} {{ $s_e_ }} 720p"
			data-show-title="{{ $episode->show->title }}"
			data-imdb-id="{{ $episode->show->imdb_id }}"
			data-tvdb-id="{{ $episode->show->tvdb_id }}"
			data-year="{{ $episode->show->year }}"
			data-season="{{ $episode->episode->season }}"
			data-episode="{{ $episode->episode->number }}"
			data-watched="<?if( $episode->watched ): }}1<?else: }}0<?endif; }}"
			data-mode="mark_watched"
		>
			<img class="screen" src="{{ $episode->episode->images->screen }}">
			<?if( $episode->watched ): }}<div class="watched"><img src="images/eye.png"></div><?endif; }}

			<ul class="actions">
				<li><a href="http://publichd.se/index.php?page=torrents&search={{ $episode->show->title }}" class="publichd" target="_blank">publicHD</a></li>
				<li><a href="#" class="eztv">eztv</a></li>
				<li><a href="#" class="watch"><?if( $episode->watched ): }}unwatch<?else: }}watch<?endif; }}</a></li>
			</ul>

			<div class="episode">
				<p>
					<strong>
						<a href="{{ $episode->show->url }}" target="_blank">{{ $episode->show->title }}</a>
					</strong>
					<br>
					<small>
						{{ $episode->episode->title }}
						<br>
						{{ $s_e_ }}
					</small>
				</p>
				<a class="overview" title="{{ $episode->episode->overview }}">overview</a>
			</div>
		</div>
		$counter++;
		}
		fill_row($counter);
		 --}}
		</div>
	}

@stop