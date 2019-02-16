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
        <div class="row justify-content-center">
            <h1 class="mb20">QUEM SOMOS</h1>
            <div>
                <p class="about_conexao">Então, o Conexão Nerd é uma idéia entre dois nerds viciados em games, bons filmes, super heróis, tecnologia.</br></br>
                    Nerds esses que começaram a muito tempo esse vislumbre por toda esse mundo. Vindo de Cavaleiros do Zodíaco,
                    passando por YuYu Hakusho, Naruto e continuando no mundo dos animes. Filmes sendo apresentados com verdadeiras
                    lendas e marcos como Senhor dos Anéis, Harry Potter e hoje totalmente maravilhado com todos os filmes de 
                    super heróis que temos. Em games meu amigos, são vários exemplos mas pra destacar, entre os dois criadores do 
                    Conexão Nerd, são mais de 10 mil horas jogadas de Dota2 (hoooo).</br></br>
                    É isso, o Conexão Nerd falará sobre esses assuntos em sua jornada ('Faça ou não faça. Tentativa não há.' Claro somos 
                    fãs de Star Wars) de uma maneira bem simples, comentando como você ao conversar com um amigo. E contamos com a conexão 
                    de todos para nos ajudar nessa jornada. 
                    Sinta-se a vontade para criticar, elogiar, opniar, nos dar ideias, o importante para nós é realmente a Conexão Nerd. 
                    Que a caminhada comece...
                </p>
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
