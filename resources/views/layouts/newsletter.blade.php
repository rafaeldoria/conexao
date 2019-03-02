<div class="row offset-1">
    @foreach (['new'] as $msg)
    @if(Session::has('alert-' . $msg))
        <div class="alert alert-success col-md-4">
            {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        @endif
    @endforeach
</div>
<div class="blog-sidebar mt-5 mt-lg-0">

    <div class="single-widget-area newsletter-widget">
        <div class="widget-title text-center">
            <h6>Newsletter</h6>
        </div>
        <p>Faça essa Conexão para receber notificações sobre novas atualizações, discussões, novos post, etc.</p>
        <div class="newsletter-form">
            <form action="{{route('addNewsletter')}}" method="post">
                @csrf
                <input type="email" name="email" id="email" placeholder="Seu email">
                <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</div>
