@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.min.css') }}" rel="stylesheet">

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
	
    <div class="row offset-1">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has('alert-' . $msg))
			<div class="alert alert-{{ $msg }} col-md-4">

				{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
			@endif
		@endforeach
	</div>
	<div class="row justify-content-center">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
				  <h3 class="box-title">Usuários</h3>
				  <!-- <h5 class="float-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".newCommentModal"><i class="far fa-plus-square"></i></button></h5> -->
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover dataTable" role="grid">
                <tr>
					<th style="width: 10px">#</th>
					<th style="width: 40px">Mensagem</th>
					<th style="width: 40px">Artigo</th>
					<th style="width: 40px">usuário</th>
					<th style="width: 40px">Desde</th>
					<th style="width: 40px">Açoes</th>
                </tr>
				@foreach ($comments as $comment)
					<tr>
						<td>{{$comment->id}}</td>
						<td style="width:50px;height:349px; overflow:hidden;">{{$comment->txt_mensagem}}</td>
						<td>{{$comment->article->title}}</td>
						<td>{{$comment->typeUser->desc_type_user}}</td>
						<td>{{$comment->created_at->format('d/m/Y')}}</td>
						<td>
							<button class="btn btn-success btn-xs view_comment" id="{{$comment->id}}"><i class="far fa-eye"></i></button>
							<button class="btn btn-warning btn-xs edit_comment" id="{{$comment->id}}"><i class="far fa-edit"></i></button>
							<button class="btn btn-danger btn-xs delete_comment" id="{{$comment->id}}"><i class="far fa-trash-alt"></i></button>
						</td>
					</tr>
				@endforeach
              </table>
            </div>
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
