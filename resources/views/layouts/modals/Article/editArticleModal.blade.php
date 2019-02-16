<div class="modal fade editArticleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editArticleModal">Editar Artigo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="editArticle" method="POST" action="" enctype="multipart/form-data" aria-label="{{ __('EditArticles') }}">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="type_articleEdit" class="col-md-4 col-form-label text-md-right">{{ __('Menu') }}</label>
                                        <div class="col-md-6">
                                            <select name="type_articleEdit" id="type_articleEdit" class="form-control">
                                                @foreach ($typeArticle as $value)
                                                    <option value="{{$value->id}}">{{$value->desc_type_article}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="visibility" class="col-md-4 col-form-label text-md-right">{{ __('Visibilidade') }}</label>
                                        <div class="col-md-6">
                                            <select name="visibility" id="visibility" class="form-control">
                                                <option value="S">Libeardo</option>
                                                <option value="N">Fechado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imageCape" class="col-md-4 col-form-label text-md-right">{{ __('Imagem Capa') }}</label>

                                        <div class="col-md-6">
                                            <input id="imageCape" type="file" class="form-control{{ $errors->has('imageCape') ? ' is-invalid' : '' }} filestyle" data-input="false" name="imageCape" value="{{ old('imageCape') }}" data-text="Adicionar Imagem (1100x733)" data-btnClass="btn-success" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imageCarousel" class="col-md-4 col-form-label text-md-right">{{ __('Imagem Carousel') }}</label>

                                        <div class="col-md-6">
                                            <input id="imageCarousel" type="file" class="form-control{{ $errors->has('imageCarousel') ? ' is-invalid' : '' }} filestyle" data-input="false" name="imageCarousel" value="{{ old('imageCarousel') }}" data-text="Adicionar Imagem (405x600)" data-btnClass="btn-success" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Salvar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/bootstrap-filestyle.min.js"> </script>
