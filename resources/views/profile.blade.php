@extends('layouts.layoutconexao')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
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
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center col-md-6 offset-3">
            <div class="box box-primary">
                <div class="well">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sobre mim</h3>
                    </div>
                    <div class="box-header with-border">
                        <p class="box-title">{{$user['desc_user']}}</p>
                    </div>
                </div>
            <button class="btn btn-warning btn-xs edit_data_user right" id="{{$user['id']}}" title="Editar"><i class="far fa-edit"></i></button>
            </div>
        </div>
    </div>
@include('layouts.modals.User.editUserDataModal')
@endsection