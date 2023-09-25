@extends('layout.app')
@section('title', 'Результат голосования')
@section('content')
 <div class="container py-4 d-flex justify-content-center align-items-center flex-column">
  <div class="p-lg-5 p-3  block-wrapper">
   <h2 class="title mb-3">Результат голосования</h2>
   <div class="wrap-table mb-3">
    <table class="table table-striped">
        <thead class="table table-primary">
            <th>ФИО</th>
            <th>Описание</th>
            <th>За</th>
            <th>Против</th>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr>
            <td>{{ $question->full_name }}</td>
            <td>{{ $question->description }}</td>
            <td>{{ $question->for }}</td>
            <td>{{ $question->against }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
   </div>
   <div class="counter">
    Проголосовали: {{ $numberOfVotes }} чел.
   </div>
  </div>
 </div>
@endsection
