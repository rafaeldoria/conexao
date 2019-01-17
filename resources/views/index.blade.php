@extends('layouts.layoutconexao')

@section('content')
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    @section('sidebar')
        @parent

    @endsection

    @section('header')
        @parent

    @endsection

    <section class="welcome-post-sliders owl-carousel">
        @foreach ($articles as $article)
        <div class="welcome-single-slide">
            <img src="{{Storage::url('images/articles/'.$article->capa_article_link)}}" alt="">
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">{{$article->created_at->format('d/m/Y')}}</a>
                    <a href="#">{{$article->userData->name}}</a>
                </div>
                <a href="#">
                    <h5>{{$article->title}}</h5>
                </a>
            </div>
        </div>
        @endforeach

    </section>

@endsection
