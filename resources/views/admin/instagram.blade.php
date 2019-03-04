@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.min.css') }}" rel="stylesheet">

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 offset-2">
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
	
    <div class="row offset-2">
		@foreach (['danger', 'warning', 'success', 'info', 'primary', 'primary'] as $msg)
		@if(Session::has('alert-' . $msg))
			<div class="alert alert-{{ $msg }} col-md-4">

				{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
			@endif
		@endforeach
	</div>
	<div class="row justify-content-center">
		@include('layouts.menu')
        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
				  <h3 class="box-title">Imagens Instagram</h3>
				  <h5 class="float-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".newImageIModal"><i class="far fa-plus-square"></i></button></h5>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover dataTable" role="grid">
                <tr>
					<th style="width: 10px">#</th>
					<th style="width: 40px">Descrição</th>
					<th style="width: 40px">Visibilidade</th>
					<th style="width: 40px">Açoes</th>
                </tr>
				@foreach ($instagrams as $instagram)
					<tr>
						<td>{{$instagram->id}}</td>
						<td>{{$instagram->desc_image}}</td>
						<td>{{$instagram->visibility}}</td>
						<td>
							<button class="btn btn-warning btn-xs edit_instagram" id="{{$instagram->id}}"><i class="far fa-edit"></i></button>
							<button class="btn btn-danger btn-xs delete_instagram" id="{{$instagram->id}}"><i class="far fa-trash-alt"></i></button>
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

@include('layouts.modals.Instagram.newImageIModal')
@include('layouts.modals.Instagram.editImageIModal')
@include('layouts.modals.Instagram.deleteImageIModal')

@endsection
