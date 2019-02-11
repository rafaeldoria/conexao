<div class="modal fade newTypeUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="newTypeUserModal">Novo Tipo de Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('newTypeUser') }}" aria-label="{{ __('NewTypeUser') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="desc_type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuário') }}</label>

                                        <div class="col-md-6">
                                            <input id="desc_type" type="text" class="form-control{{ $errors->has('desc_type') ? ' is-invalid' : '' }}" name="desc_type" value="{{ old('desc_type') }}" required autofocus>

                                            @if ($errors->has('desc_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('desc_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="status_type" class="col-md-4 col-form-label text-md-right">{{ __('Visibilidade') }}</label>
                                        <div class="col-md-6">
                                            <select name="status_type" id="status_type" class="form-control">
                                                <option value="D">Desativado</option>
                                                <option value="A">Ativado</option>
                                            </select>
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

