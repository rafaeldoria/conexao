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

    Entre em contato

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
