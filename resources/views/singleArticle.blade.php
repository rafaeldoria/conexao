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
    
        <div class="breadcumb-area" style="background-image: url(../storage/images/articles/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>{{$article->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @foreach ($breadcrumb as $value)
                                <li @if ($loop->last) class="breadcrumb-item active" aria-current="page" @else class="breadcrumb-item" @endif>
                                    @if ($value["title"]=="Home") <i class="fa fa-home" aria-hidden="true"></i> @endif
                                    @if ($loop->last) {{$value["title"]}}
                                    @else <a href="{{$value["route"]}}">{{$value["title"]}}</a>@endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">

                        <div class="col-10 col-sm-11">
                            <div class="single-post">

                                <div class="post-thumb">
                                    <img src="{{Storage::url('images/articles/'.$article->img_capa_article)}}" alt="">
                                </div>

                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <div class="post-date">
                                                <a href="#">{{$article->created_at->format('d M Y H:i')}}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#">
                                        <h2 class="post-headline">{{$article->summary}}</h2>
                                    </a>
                                    <div class="details-article">{!! $article->details_article!!}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="blog-sidebar mt-5 mt-lg-0">
                        <div class="single-widget-area about-me-widget text-center">
                            <div class="widget-title">
                                <h6>Publicado por</h6>
                            </div>
                            <div class="about-me-widget-thumb">
                                <img src="{{Storage::url('images/profiles/'.$userData->img_user_link)}}" alt="">
                            </div>
                            <h4 class="font-shadow-into-light">{{$userData->name}}</h4>
                            <p>{{$userData->desc_user}}</p>
                        </div>
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
