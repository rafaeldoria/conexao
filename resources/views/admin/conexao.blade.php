@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Home</li>
			</ol>
			</nav>
		</div>
	</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
				<div class="col-md-12">
					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
						conexaonerd.com.br
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="card-body col-md-3">
							<a href="{{route('users')}}" class="btn btn-primary"><i class="fas fa-users"></i>Usuários</a>
						</div>
						<div class="card-body col-md-3">
							<a href="{{route('typesusers')}}" class="btn btn-primary"><i class="fas fa-users"></i>Tipos Usuários</a>
						</div>
						<div class="card-body col-md-3">
							<a href="{{route('articles')}}" class="btn btn-warning"><i class="fas fa-book-reader"></i>Artigos</a>
						</div>
						<div class="card-body col-md-3">
							<a href="{{route('typesarticles')}}" class="btn btn-warning"><i class="fas fa-book-reader"></i>Menus</a>
						</div>
						<div class="card-body col-md-3">
							<a href="{{route('comments')}}" class="btn btn-info"><i class="fas fa-comments"></i>Comentários</a>
						</div>
						<div class="card-body col-md-3">
							<a href="{{route('logs')}}" class="btn btn-danger"><i class="fas fa-list-alt"></i>Logs</a>
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>
@endsection
