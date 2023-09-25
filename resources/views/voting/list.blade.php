@extends('layout.app')
@section('title', 'Список')
@section('content')
<div class="container py-4">
    <div class="py-2 d-flex justify-content-center align-items-center flex-column">
        <div class="row p-lg-5 p-4 block-wrapper">
            <h2 class="title mb-4">Список записей</h2>
            <div class="wrap-table mb-3">
                <table class="table  table-light">
                    <thead class="table table-primary">
                        <tr>
                            <th scope="col text-center">Название</th>
                            <th scope="col">Тип</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Создан (Дата)</th>
                            <th scope="col" colspan="3">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($votings as $voting)
                            <tr data-voting-id={{ $voting->id }}>
                                <td>{{ $voting->name }}</td>
                                <td>{{ $voting->type }}</td>
                                <td class="table__status">
                                    @if ($voting->checkClose())
                                        Закрыт
                                    @else
                                        Открыт
                                    @endif
                                </td>
                                <td>{{ $voting->created_at }}</td>
                                <td class="table__toggle-status">
                                    @if ($voting->checkClose())
                                        <i class="uil uil-unlock btn btn-status btn-primary"></i>
                                    @else
                                        <i class="uil uil-lock btn btn-status btn-primary"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="votings/{{$voting->id}}/users" class="table__link">
                                        <i class="uil uil-users-alt btn btn-primary"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="votings/{{$voting->id}}/edit" class="table__link">
                                        <i class="uil uil-edit-alt  btn btn-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="{{route('votings.create')}}" class="btn btn-primary">Создать</a>
            </div>
        </div>
    </div>
</div>
    @vite(['resources/js/toggle-status.js'])
@endsection
