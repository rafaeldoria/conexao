@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.min.css') }}" rel="stylesheet">

<div class="container">
	<div class="row justify-content-center">
		@include('layouts.menu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Home</div>
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
            </div>
		</div>
	</div>
</div>
@endsection
