@extends('layout.app')
@section('title', 'Список')
@section('content')
 <div class="container-fluid py-2 d-flex justify-content-center align-items-center flex-column">
  <div class="row p-lg-5 p-md-4 p-2 mb-3 block-wrapper">
   <h2 class="title mb-3">Список</h2>
   <table class="table table-striped">
    <thead class="table table-primary">
     <tr>
      <th scope="col">Название</th>
      <th scope="col">Тип</th>
      <th scope="col">Статус</th>
      <th scope="col" colspan="3">Создан (Дата)</th>
     </tr>
    </thead>
    <tbody>
     @foreach ($votings as $voting)
      <tr data-voting-id={{ $voting->id }}>
       <td>{{ $voting->name }}</td>
       <td>{{ $voting->type }}</td>
       <td id="status">
        @if ($voting->checkClose())
         Закрыт
        @else
         Открыт
        @endif
       </td>
       <td>{{ $voting->created_at }}</td>
       <td><i class="uil uil-edit btn btn-primary"></i></td>
       <td>
        @if ($voting->checkClose())
         <i class="uil uil-unlock btn btn-status btn-primary"></i>
        @else
         <i class="uil uil-lock btn btn-status btn-primary"></i>
        @endif
       </td>
      </tr>
     @endforeach
    </tbody>
   </table>
  </div>
 </div>
 @vite(['resources/js/toggle-status.js'])
@endsection
