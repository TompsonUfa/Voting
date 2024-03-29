@extends('layout.app')
@section('title', 'Редактирование пользователя')
@section('content')
<div class="container py-4">
	<div class="d-flex justify-content-center align-items-center flex-column">
		<div class="px-4 py-4 p-lg-5 p-md-4 block-wrapper">
			<form method="POST" data-attr="{{ route('users.update', $user->id) }}"  class="form post-form">
				<h2 class="title mb-4">Редактирование пользователя</h2>
				@csrf
				<div class="mb-3">
					<input type="text" placeholder="Фамилия пользователя" name="surname" id="surname" class="form-control"
							value="{{$user->surname}}" required>
				</div>
				<div class="mb-3">
					<input type="text" placeholder="Имя пользователя" name="name" id="name" class="form-control"
						   value="{{$user->name}}" required>
				</div>
				<div class="mb-3">
					<input type="text" placeholder="Отчество пользователя" name="middlename" id="middlename" class="form-control"
						   value="{{$user->middlename}}" required>
				</div>
				<div class="mb-3 form-check">
					<label class="form-check-label" for="flexCheckDefault">
						Пользователь Администратор?
					</label>
					@if($user->admin)
						<input type="checkbox" name="admin" id="admin" value=1 class="form-check-input" checked>
					@else
						<input type="checkbox" name="admin" id="admin" value=1 class="form-check-input">
					@endif
				</div>
				<div class="mb-3 form-check">
					<label class="form-check-label" for="flexCheckDefault">
						Пользователь Модератор?
					</label>
					@if($user->moderator)
						<input type="checkbox" name="moderator" id="moderator" value=1 class="form-check-input" checked>
					@else
						<input type="checkbox" name="moderator" id="moderator" value=1 class="form-check-input">
					@endif
				</div>
				<div class="mb-3">
					<input type="email" placeholder="E-Mail пользователя" name="email" id="email" class="form-control"
						   value="{{$user->email}}" required>
				</div>
				<div class="mb-3">
					<input type="password" name="password" id="password" placeholder="Пароль пользователя" class="form-control">
				</div>
				<div class="mb-3">
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль"
						class="form-control">
				</div>
				<button type="submit" class="btn btn-primary btn-post">Сохранить</button>
			</form>
		</div>
	</div>
</div>
	
	<!-- Модальное окно -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Внимание</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
				</div>
			</div>
		</div>
	</div>
	@vite(['resources/js/post-form.js'])
@endsection
