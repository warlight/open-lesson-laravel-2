@extends('app')

@section('title', 'Статистика')

@section('content')
	<table class="table">
		<tr>
			<td>Кол-во всех котиков:</td>
			<td><b>{{ $catsCount }}</b></td>
		</tr>
		<tr>
			<td>Кол-во всех котят:</td>
			<td><b>{{ $kittensCount }}</b></td>
		</tr>
		<tr>
			<td>Кол-во бездомных котиков:</td>
			<td><b>{{ $catsWithoutHouse }}</b></td>
		</tr>
		<tr>
			<td>Кол-во беспородных котиков:</td>
			<td><b>{{ $catsWithoutBreed }}</b></td>
		</tr>
		<tr>
			<td>Кол-во бездомных беспородных котиков:</td>
			<td><b>{{ $catsWithoutBreedAndHouse }}</b></td>
		</tr>
		<tr>
			<td>Кол-во бездомных беспородных котят:</td>
			<td><b>{{ $catsKittensWithoutBreedAndHouse }}</b></td>
		</tr>
	</table>
@endsection