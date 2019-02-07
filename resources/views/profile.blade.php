@extends('layouts.layoutconexao')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@section('body')
    @section('sidebar')
        @include('layouts.topconexao')
    @show
    @section('header')
        @include('layouts.headerconexao')
    @show
    <body>
        <div id="preloader">
            <div class="yummy-load"></div>
        </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img class="profile-user-img img-responsive img-circle" src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            {{$user['name']}}
                        </h4>
                        <small>
                            <cite title="">{{$user['desc_type_user']}}<i class="glyphicon glyphicon-map-marker"></i></cite>
                        </small>
                        <p>
                            <i class="fas fa-envelope"></i> {{$user['email']}}
                            <br/>
                            <i class="fas fa-gift"></i> {{$user['dt_birth']}}
                        </p>
                    </div>
                    <div class="box box-primary col-sm-6 col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <p>
                            Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.
                        </p>
                    </div>
                        {{-- <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
            {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                
            </div> --}}