@extends('layouts.bodyconexao')

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

    <section class="blog_area section_padding_0_80">
        <div class="container">
            <div class="row offset-1">
                @foreach (['danger','hollow','warning'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="alert alert-info col-md-4">
                        <h5>{{ Session::get('alert-' . $msg) }}</h5> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        @foreach ($articles as $article)
                        <div class="col-12">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{Storage::url('images/articles/capes/'.$article->img_capa_article)}}" alt="">
                                </div>
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <div class="post-author">
                                                <a href="#">By {{$article->userData->name}}</a>
                                            </div>
                                            <div class="post-date">
                                                <a href="#">{{$article->created_at->toFormattedDateString()}}</a>
                                            </div>
                                        </div>
                                        <div class="post-comment-share-area d-flex">
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h4 class="post-headline">{{$article->title}}</h4>
                                    </a>
                                    <p>{{$article->summary}}</p>
                                    <a href="{{route('readArticle', ['id' => $article->id]) }}" class="read-more">Continue Lendo..</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    @include('layouts.newsletter')
                </div>

                <div class="box-footer clearfix">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $articles->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                        <img src="{{Storage::url('images/articles/type/'.$typeArticles[$i]->img_type_article)}}" alt="">
                        <div class="catagory-title">
                            <a href="{{route('articlesForType', $typeArticles[$i]->id) }}">
                                <h5>{{$typeArticles[$i]->desc_type_article}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    @include('layouts.instagram')

    <div class="social_icon_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-social-area d-flex">
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('footer')
        @parent

    @endsection
@endsection
