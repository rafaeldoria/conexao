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

    <section class="welcome-post-sliders owl-carousel">
        @foreach ($articles as $article)
        <div class="welcome-single-slide">
            <img src="{{Storage::url('images/articles/carousel/'.$article->img_carousel_article)}}" alt="">
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="{{route('readArticle', ['id' => $article->id]) }}">{{$article->created_at->format('d/m/Y')}}</a>
                    <a href="#">{{$article->userData->name}}</a>
                </div>
                <a href="{{route('readArticle', ['id' => $article->id]) }}">
                    <h5>{{$article->title}}</h5>
                </a>
            </div>
        </div>
        @endforeach
    </section>

    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                @for ($i = 3; $i > 0; $i--)
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

    <section class="blog_area section_padding_0_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        @foreach ($fourArticles as $article)
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
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
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
                    <div class="blog-sidebar mt-5 mt-lg-0">

                        <div class="single-widget-area newsletter-widget">
                            <div class="widget-title text-center">
                                <h6>Newsletter</h6>
                            </div>
                            <p>Faça essa Conexão para receber notificações sobre novas atualizações, discussões, novos post, etc.</p>
                            <div class="newsletter-form">
                                <form action="#" method="post">
                                    <input type="email" name="newsletter-email" id="email" placeholder="Seu email">
                                    <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">
        @foreach ($imagesInstagram as $image)
        <div class="instagram_gallery_item">
            <img src="{{Storage::url('images/instagram/'.$image->img_instagram)}}" alt="">
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Siga-nos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

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
