@extends('layout.app')
@section('title', 'Список пользователей')
@section('content')
	<div class="container py-4">
		<div class="d-flex justify-content-center align-items-center flex-column">
			<div class="row p-lg-5 p-4 block-wrapper">
				<h2 class="title mb-4">Список пользователей</h2>
				<div class="wrap-table mb-3">
					<table class="table table-striped">
						<thead class="table table-primary">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Фамилия</th>
								<th scope="col">Имя</th>
								<th scope="col">Отчество</th>
								<th scope="col" colspan="2">E-mail</th>
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
									<td>
										<a href="users/{{$user->id}}/edit" class="table__link">
											<i class="uil uil-edit-alt  btn btn-primary"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-12">
					{{ $users->links() }}
				</div>
				<div class="col-12">
					<a href="{{route('register')}}" class="btn btn-primary">Регистрация</a>
				</div>
			</div>
		</div>
	</div>
	
@endsection
