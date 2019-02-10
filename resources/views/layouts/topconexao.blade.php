<div class="top_header_area">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-6">
                <div class="top_social_bar">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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
                            <div class="">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <div class="alert alert-{{ $msg }} alert-login col-md-12">

                                        {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <img class="topo-img" src="{{Storage::url('/images/profiles/').Session::get('userData.data')['img_user_link']}}" alt="" class="img-rounded img-responsive" />
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Session::get('userData.login')['type_user_id']==1)
                                    <a class="dropdown-item" href="{{ route('conexao') }}">
                                        {{ __('Admin') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Perfil') }}
                                    </a>
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