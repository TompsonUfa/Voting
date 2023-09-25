@extends('layout.app')
@section('title', 'Главная страница')
@section('content')
<div class="container p-4">
    <div class="d-flex flex-column justify-content-around h-100">
        <div class="row justify-content-center list-card gap-3">
            @foreach ($allVoting as $voting)
                <div class="col-xxl-8 col-lg-8 col-12 p-0 card list-card__card">
                    <div class="card__header">
                        <img src="/images/voting.jpeg" alt="Тайное голосование">
                    </div>
                    <div class="card__content">
                        <h3 class="card__title mb-3">{{ $voting->name }}</h3>
                        <p class="card__desc mb-3">{{ $voting->type }}</p>
                        <time class="card__date mb-3" date={{ $voting->created_at }}>{{ $voting->created_at }}</time>
                        @if (!$voting->checkVote() || $voting->close)
                            @if ($voting->close)
                                <a href="votings/{{ $voting->encrypted_id }}/result" class="btn btn-primary">Результаты</a>
                            @else
                                <a href="votings/{{ $voting->encrypted_id }}" class="btn btn-primary">Голосовать</a>
                            @endif
                        @else
                            <p>Вы уже прошли голосование</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection
