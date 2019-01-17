<div class="top_header_area">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-6">
                <div class="top_social_bar">
                    {{-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> --}}
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Siga-nos</a>
                    {{-- <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> --}}
                    {{-- <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a> --}}
                    {{-- <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a> --}}
                </div>
            </div>

            <div class="col-7 col-sm-6">
                <div class="signup-search-area d-flex align-items-center justify-content-end">
                    <div class="login_register_area d-flex">
                        @guest
                            <div class="login">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                            <div class="register">
                                <a href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                            </div>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>