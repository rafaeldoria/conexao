@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminLte.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/writeArticle.css') }}" rel="stylesheet">
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
							<h3 class="subtitle-text mb-0 py-5 font-weight-bold">Hora de Conexão</h3>
						</div>
					</div>

					<div class="card-body mx-4">
						<div class="md-form">
							<i class="fas fa-signature prefix grey-text" title="Título"></i>
							<input type="text" id="title" class="form-control" value="{{$article->title}}">
						</div>
					</div>	

					<div class="card-body mx-4">
						<div class="md-form">
							<i class="fas fa-text-height prefix grey-text" title="Sumário"></i>
							<input type="text" id="summary" class="form-control" value="{{$article->summary}}">
						</div>
					</div>	

					<div class="card-body mx-4">
						<div class="md-form">
							<i class="fas fa-bars prefix grey-text" title="Menu"></i>
							<select name="type_articleEdit" id="type_articleEdit" class="form-control">
								@foreach ($typeArticle as $value)
									<option value="{{$value->id}}">{{$value->desc_type_article}}</option>
								@endforeach
							</select>
						</div>
					</div>	

					<div class="class-body mx-4">
						<textarea name="details_article" id="details_article" rows="10" cols="80">
							@if($article->details_article)
								{{$article->details_article}}
							@else
								Comece aqui a digitar seu artigo...
							@endif
						</textarea>
					</div>

					<div class="class-body mx-4">
						<div class="col-md-3 offset-md-9 no-padding-right">
							<button type="submit" class="btn btn-primary save_article">
								{{ __('Salvar') }}
							</button>
						</div>
					</div>
			</section>
		</div>
	</div>
</div>
@include('layouts.ckeditor.ckeditor')
@endsection