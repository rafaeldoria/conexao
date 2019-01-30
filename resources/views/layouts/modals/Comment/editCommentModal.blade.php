<div class="modal fade editCommentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editCommentModal">Editar Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="editComment" method="POST" action="" aria-label="{{ __('EditComments') }}">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group row">
                                        <label for="txt_mensagemEdit" class="col-md-4 col-form-label text-md-right">{{ __('Mensagem') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="txt_mensagemEdit" type="text" class="form-control{{ $errors->has('txt_mensagemEdit') ? ' is-invalid' : '' }}" name="txt_mensagemEdit" value="{{ old('txt_mensagemEdit') }}" required autofocus></textarea>

                                            @if ($errors->has('txt_mensagemEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('txt_mensagemEdit') }}</strong>
                                                </span>
                                            @endif
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

