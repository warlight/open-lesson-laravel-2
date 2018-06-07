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
				<td>@if($cat->withoutHouse()) Бездомный @else {{ $cat->house->name }} @endif</td>
				<td>@if($cat->withoutBreed()) Беспородный @else {{ $cat->breed->name }} @endif</td>
			</tr>
		@endforeach
	</table>
@endsection