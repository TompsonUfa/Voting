@extends('layout.app')
@section('title', 'Редактировать голосование')
@section('content')
<div class="container py-4">
	<div class="create-voting d-flex justify-content-center align-items-center flex-column" data-voting-id="{{$voting->id}}">
		<div class="row px-2 py-4 p-lg-5 mb-3 block-wrapper">
			<h2 class="title mb-3">Голосование</h2>
			@csrf
			<div class="mb-3">
				<input type="text" placeholder="Название голосования" id="name" name="name" class="form-control"
					value="{{$voting->name}}" required>
			</div>
		</div>
		@foreach($questions as $question)
			<div class="row px-2 py-4 p-lg-5 mb-3 block-wrapper choice" data-question-id = "{{$question->id}}" data-choice-number="{{$loop->index + 1}}">
				<h2 class="title mb-3">Выбор № {{$loop->index + 1}}</h2>
				<div class="mb-3">
					<input type="text" placeholder="Претендент" id="challenger" name="challenger" class="form-control"
						   value="{{$question->full_name}}" required>
				</div>
				<div>
					<input type="text" placeholder="Описание выбора" id="desc" name="desc" class="form-control"
						   value="{{$question->description}}" required>
				</div>
				@if($loop->index + 1 != 1)
					<div class="btn-delete">
						<img src="/images/delete.png" alt="Удалить">
					</div>
				@endif

			</div>
		@endforeach
		<div class="row">
			<div class="col12 d-flex mb-3 gap-3">
				<button class="btn btn-primary btn-add-choice">Добавить выбор</button>
				<button class="btn btn-primary btn-create-voting">Сохранить</button>
			</div>
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
	@vite(['resources/js/add-choice.js', 'resources/js/delete-choice.js', 'resources/js/create-voting.js'])
@endsection
