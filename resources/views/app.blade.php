<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Открытое занятие модели Eloquent</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="flex-center position-ref full-height">
	<div class="container bs-docs-container">
		<h1>@yield('title')</h1>

		<nav class="navbar navbar-default">
			<div class="container">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('index') }}">Все котики</a></li>
						<li><a href="{{ route('breeds') }}">Породы котиков</a></li>
						<li><a href="{{ route('statistics') }}">Статистика</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="row">

			@yield('content')
		</div>
	</div>
</div>
</body>
</html>
