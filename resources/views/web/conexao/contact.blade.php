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
    <div class="container">
        <div class="row offset-1">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('email-' . $msg))
                <div class="alert alert-{{ $msg }} col-md-4">
                    {{ Session::get('email-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s">
                            <img src="{{Storage::url('images/contact/contact.jpg')}}"></img>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 item">
                        <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                            <h2 class="contact-form-title mb-30">Faça uma Conexão, entre em contato!</h2>
                            <form action="{{ route('sendContact')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="contact-name" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="contact-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="website" id="contact-website" placeholder="Website">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Mensagem"></textarea>
                                </div>
                                <button type="submit" class="btn contact-btn">Enviar Mensagem</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
