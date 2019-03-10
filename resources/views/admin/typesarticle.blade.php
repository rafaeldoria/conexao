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
		@foreach (['danger', 'warning', 'success', 'info', 'primary'] as $msg)
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
                        <h3 class="box-title">Menus de Artigos</h3>
                        <h5 class="float-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".newTypeArticleModal"><i class="far fa-plus-square"></i></button></h5>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover dataTable" role="grid">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 40px">Descrição</th>
                        <th style="width: 40px">Status</th>
                        <th style="width: 40px">Ações</th>
                    </tr>
                    @foreach ($typeArticle as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{$type->desc_type_article}}</td>
                            <td>
                                @if($type->status_type_article=='A')Exibindo
                                @else Desativado
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning btn-xs edit_type_article" id="{{$type->id}}"><i class="far fa-edit"></i></button>
                                <button class="btn btn-danger btn-xs delete_type_article" id="{{$type->id}}"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $typeArticle->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>	
</div>	

@include('layouts.modals.article.newTypeArticleModal')
@include('layouts.modals.article.editTypeArticleModal')
@include('layouts.modals.article.deleteTypeArticleModal')

@endsection
