@extends('layout.app')
@section('title', 'Тайное голосование')
@section('content')
	<div class="container py-4 d-flex justify-content-center align-items-center flex-column">
		<div class="row py-4 p-lg-5 p-md-4 p-2 mb-3 block-wrapper">
			<div class="col-12">
				@foreach ($voting as $data)
					<h1 class="title mb-3 fw-bold">{{ $data->type }}</h1>
					<p class="desc mb-3">{{ $data->name }}</p>
					<time data={{ $data->created_at }} class="d-block mb-3 text-secondary font-monospace">{{ $data->created_at }}</time>
				@endforeach
				<div class="questions">
					@foreach ($questions as $question)
						<div class="question alert alert-primary mb-3 text-dark" data-question-id={{ $question->id }}>
							<h5 class="question__title mb-1 mb-lg-3"><span class="question__loop">{{ $loop->iteration }} )</span> <span
								class="badge bg-secondary">
								{{ $question->full_name }}</span>  </h5>
							<p class="question__desc mb-1 mb-lg-3">{{ $question->description }}</p>
							<div class="form-check mb-1 mb-lg-3">
								<label class="form-check-label" for="radio-for-{{ $question->id }}">
									За
								</label>
								<input type="radio" name="vote-{{ $question->id }}" data-vote="for" id="radio-for-{{ $question->id }}" value=0 class="form-check-input">
							</div>
							<div class="form-check">
								<label class="form-check-label" for="radio-against-{{ $question->id }}">
									Против
								</label>
								<input type="radio" name="vote-{{ $question->id }}" data-vote="against" id="radio-against-{{ $question->id }}" value=0 class="form-check-input">
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-12 text-center">
				<button class="btn btn-primary btn-post-voting">Отправить</button>
			</div>
		</div>
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
						<a class="btn btn-primary" href="/">На главную</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@vite(['resources/js/post-voting.js'])
@endsection
