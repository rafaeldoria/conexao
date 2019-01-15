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
					<div class="card-body">
						<a href="{{route('users')}}" class="btn btn-info"><i class="fas fa-users"></i>Usuários<a/>
					<div>
				<div>
            </div>

		</div>
	</div>
</div>
@endsection
