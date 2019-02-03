<header class="header_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo_area text-center">
                    <a href="{{route('home')}}" class="yummy-logo">ConexaoNerd</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li @if ($active == 'home') class="nav-item active" @else class="nav-item"  @endif>
                                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menus</a>
                                <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                @foreach ($typeArticles as $value)
                                    <a class="dropdown-item" href="{{route('getTypeArticle', ['id' => $value->id])}}">{{$value->desc_type_article}}</a>
                                @endforeach
                                </div>
                            </li>
                            <li @if ($active == 'allArticles') class="nav-item active" @else class="nav-item"  @endif>
                                <a class="nav-link" href="{{route('allArticles')}}">Geral</a>
                            </li>
                            <li @if ($active == 'contact') class="nav-item active" @else class="nav-item"  @endif>
                                <a class="nav-link" href="{{route('contact')}}">Contato</a>
                            </li>
                            <li @if ($active == 'about') class="nav-item active" @else class="nav-item"  @endif>
                                <a class="nav-link" href="{{route('about')}}">O ConexãoNerd</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>