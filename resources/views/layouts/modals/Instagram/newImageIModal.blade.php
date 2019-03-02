<div class="modal fade newImageIModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="newImageIModal">Novo Article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('saveImageI') }}" aria-label="{{ __('saveImageI') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="desc_image" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                                        <div class="col-md-6">
                                            <input id="desc_image" type="text" class="form-control{{ $errors->has('desc_image') ? ' is-invalid' : '' }}" name="desc_image" value="{{ old('desc_image') }}" required autofocus>

                                            @if ($errors->has('desc_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('desc_image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="visibility" class="col-md-4 col-form-label text-md-right">{{ __('Visibilidade') }}</label>
                                        <div class="col-md-6">
                                            <select name="visibility" id="visibility" class="form-control">
                                                <option value="N">Não</option>
                                                <option value="S">Sim</option>
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

