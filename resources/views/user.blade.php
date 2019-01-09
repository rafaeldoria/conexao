@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.css') }}" rel="stylesheet">

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					@foreach ($breadcrumb as $value)
						<li @if ($loop->last) class="breadcrumb-item active" aria-current="page" @else class="breadcrumb-item" @endif>
							@if ($loop->last) {{$value["title"]}}
							@else <a href="{{$value["route"]}}">{{$value["title"]}}</a>@endif
						</li>
					@endforeach
				</ol>
			</nav>
		</div>
	</div>
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
				  <h3 class="box-title">Usuários</h3>
				  <h5 class="float-right"><button class="btn btn-primary btn-xs"><i class="far fa-plus-square"></i></button></h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover dataTable" role="grid">
                <tr>
					<th style="width: 10px">#</th>
					<th style="width: 40px">Usuário</th>
					<th style="width: 40px">Email</th>
					<th style="width: 40px">Tipo</th>
					<th style="width: 40px">Desde</th>
					<th style="width: 40px">Açoes</th>
                </tr>
				@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->username}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->typeUser->desc_type_user}}</td>
						<td>{{$user->created_at->format('d/m/Y')}}</td>
						<td>
							<button class="btn btn-success btn-xs"><i class="far fa-eye"></i></button>
							<button class="btn btn-warning btn-xs"><i class="far fa-edit"></i></button>
							<button class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>
						</td>
					</tr>
				@endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              	<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
						<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">&laquo;</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
						<a class="page-link" href="#">&raquo;</a>
						</li>
					</ul>
				</nav>
			</div>
          <!-- /.box -->
    </div>
</div>
@endsection
