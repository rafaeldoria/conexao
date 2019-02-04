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
        @foreach (['danger', 'warning', 'success', 'info', 'primary'] as $msg)
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
                  <h3 class="box-title">Artigos</h3>
                  <h5 class="float-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".newArticleModal"><i class="far fa-plus-square"></i></button></h5>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover dataTable" role="grid">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 40px">Título</th>
                    <th style="width: 40px">Autor</th>
                    <th style="width: 40px">Acessos</th>
                    <th style="width: 40px">Menu</th>
                    <th style="width: 40px">Visibilidade</th>
                    <th style="width: 40px">Desde</th>
                    <th style="width: 110px">Ações</th>
                </tr>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->userData->name}}</td>
                        <td>{{$article->total_hits}}</td>
                        <td>{{$article->typeArticle->desc_type_article}}</td>
                        <td>
                            @if($article->visibility=='S')Exibindo
                            @else Desativado
                            @endif
                        </td> 
                        <td>{{$article->created_at->format('d/m/Y')}}</td>
                        <td>
                            <button class="btn btn-success btn-xs view_article" id="{{$article->id}}" title="Visualizar"><i class="far fa-eye"></i></button>
                            <button class="btn btn-warning btn-xs edit_article" id="{{$article->id}}" title="Editar"><i class="far fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete_article" id="{{$article->id}}" title="Excluir"><i class="far fa-trash-alt"></i></button>
                            <button class="btn btn-info btn-xs write_article" id="{{$article->id}}" title="Escrever"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-primary btn-xs alter_visibility" id="{{$article->id}}" title="Alterar Exibição"><i class="fas fa-sync-alt"></i></button>
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
    
@include('layouts.modals.Article.newArticleModal')
{{-- @include('layouts.modals.Article.viewArticleModal') --}}
@include('layouts.modals.Article.editArticleModal')
@include('layouts.modals.Article.deleteArticleModal')

@endsection
