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
		
		<div class="col-md-10">
			<section class="form-gradient mb-5">
				<div class="card">
					<div class="header peach-gradient">
						<div class="row d-flex justify-content-center">
							<h3 class="white-text mb-0 py-5 font-weight-bold">Editar/Escrever Artigo</h3>
						</div>
					</div>

					<div class="card-body mx-4">
						<div class="md-form">
							<i class="fas fa-signature prefix grey-text"></i>
							<input type="text" id="title" class="form-control" value="{{$article->title}}">
						</div>
					</div>	

					<div class="card-body mx-4">
						<div class="md-form">
							<i class="fas fa-bars prefix grey-text"></i>
							<select name="type_articleEdit" id="type_articleEdit" class="form-control">
								@foreach ($typeArticle as $value)
									<option value="{{$value->id}}">{{$value->desc_type_article}}</option>
								@endforeach
							</select>
						</div>
					</div>	

					<div id="editor-container">
						<p>Hello World!</p>
						<p>Some initial <strong>bold</strong> text</p>
						<p><br></p>
						</div>
					</div>
			</section>
		</div>
	</div>
</div>

@endsection