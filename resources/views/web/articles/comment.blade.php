@if(!$comments->isEmpty())
<div class="comment_area section_padding_50 clearfix col-6 col-sm-6">
    <h4 class="mb-30">{{$comments->count()}} comentário(s)</h4>
    <ol>
        @foreach ($comments as $comment)
            
        <li class="single_comment_area">
            <div class="comment-wrapper d-flex">
                <div class="comment-author">
                    <img src="{{Storage::url('images/profiles/').$comment->img_user_link}}" alt="">
                </div>
                <div class="comment-content">
                    <span class="comment-date text-muted">{{$comment->created_at->format('d M Y')}}</span>
                    <h5>{{$comment->name}}</h5>
                    <p>{{$comment->txt_message}}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ol>
</div>
@endif
@guest
<div class="leave-comment-area section_padding_50 clearfix col-6 col-sm-6">
    <div class="comment-form">
    <h4 class="mb-30">Faça login e Deixe seu comentário</h4>
    </div>
    <div class="comment-wrapper d-flex">
        <div class="comment-content">
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="active" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
        </div>
    </div>
</div>
@else
<div class="leave-comment-area section_padding_50 clearfix col-6 col-sm-6">
    <div class="comment-form">
        <h4 class="mb-30">Deixe seu comentário</h4>

        <form action="{{ route('newComment')}}" method="post">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="txt_message" id="txt_message" cols="30" rows="10" placeholder="Comentário"></textarea>
            </div>
            <button type="submit" class="btn contact-btn">Comentar</button>
        </form>
    </div>
</div>
@endguest