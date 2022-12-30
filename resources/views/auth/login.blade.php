@extends('layout.app')
@section('title', 'Авторизация')
@section('content')
	<form method="POST" action="/login">
		@csrf
		<input type="email" placeholder="E-Mail пользователя" name="email" id="email">
		<input type="password" name="password" id="password" placeholder="Пароль пользователя">
		<button type="submit">Сохранить</button>
	</form>
	@if ($errors->any())
		<ul>
			@foreach ($errors->all() as $error)
				<li> {{ $error }}</li>
			@endforeach
		</ul>
	@endif
@endsection
