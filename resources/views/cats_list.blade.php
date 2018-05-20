@extends('app')

@section('title', 'Список котиков')

@section('content')
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Возраст</th>
			<th>Дом</th>
			<th>Порода</th>
		</tr>

		@foreach($cats as $cat)
			<tr>
				<td>{{ $cat->id }}</td>
				<td>{{ $cat->name }}</td>
				<td>@if($cat->isKitten()) котёнок {{ $cat->age }} месяцев @else {{ $cat->years }} лет @endif</td>
				<td>@if(isset($cat->house_id)) {{ $cat->house->name }} @else Бездомный @endif</td>
				<td>@if(isset($cat->breed_id )) {{ $cat->breed->name }} @else Беспородный @endif</td>
			</tr>
		@endforeach
	</table>
@endsection