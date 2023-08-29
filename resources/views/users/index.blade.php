@extends('layout.app')
@section('title', 'Список пользователей')
@section('content')
	<div class="container py-4">
		<div class="d-flex justify-content-center align-items-center flex-column">
			<div class="row p-lg-5 p-md-4 p-2 mb-3 block-wrapper">
				<h2 class="title mb-3">Список пользователей</h2>
				<div class="wrap-table">
					<table class="table table-striped">
						<thead class="table table-primary">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Фамилия</th>
								<th scope="col">Имя</th>
								<th scope="col">Отчество</th>
								<th scope="col">E-mail</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $user->surname }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->middlename }}</td>
									<td>{{ $user->email }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	
@endsection
