@extends('layout.app')
@section('title', 'Результат голосования')
@section('content')
<div class="container-fluid py-2 d-flex justify-content-center align-items-center flex-column">
    <div class="row p-lg-5 p-md-4 p-2 mb-3 block-wrapper">
        <h2 class="title mb-3">Результат голосования</h2>
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
                    <td>{{$question->full_name}}</td>
                    <td>{{$question->description}}</td>
                    <td>{{$question->for}}</td>
                    <td>{{$question->against}}</td>
                </tr>
                @endforeach        
            </tbody>
        </table>
    </div>
</div>
@endsection