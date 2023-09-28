@extends('layout.app')
@section('title', 'Список избирателей')
@section('content')
<div class="container py-4">

        <div class="row block-wrapper py-4">
            <div class="col-12">
                <a href="{{route('voting.index')}}" class="btn btn-primary mb-2">Назад</a>
                <h4 class="title mb-3 text-center">Список избирателей</h4>
                <div class="wrap-table">
                    <table class="table table-striped">
                        <thead class="table table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->user[0]['surname'] . " " . $user->user[0]['name'] . " " . $user->user[0]['middlename'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</div>
@endsection