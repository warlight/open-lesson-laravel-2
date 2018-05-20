@extends('app')

@section('title', 'Список пород')

@section('content')
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Порода</th>
			<th>Колличество</th>
		</tr>

		@foreach($cats_by_breed as $breed)
			<tr>
				<td>{{ $breed->id }}</td>
				<td>{{ $breed->breed }}</td>
				<td>{{ $breed->cats_count }}</td>
			</tr>
		@endforeach
	</table>
@endsection