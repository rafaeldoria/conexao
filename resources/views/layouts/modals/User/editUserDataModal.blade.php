<div class="modal fade editUserDataModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editUserDataModal">Editar Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="editDataUser" method="POST" action="" enctype="multipart/form-data" aria-label="{{ __('EditDataUsers') }}">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group row">
                                        <label for="imageDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('Imagem') }}</label>

                                        <div class="col-md-6">
                                            <input id="imageDataEdit" type="file" class="form-control{{ $errors->has('imageDataEdit') ? ' is-invalid' : '' }} filestyle" data-input="false" name="imageDataEdit" value="{{ old('imageDataEdit') }}" data-text="Adicionar Imagem" data-btnClass="btn-success" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="usernameDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>

                                        <div class="col-md-6">
                                            <input id="usernameDataEdit" type="text" class="form-control{{ $errors->has('usernameDataEdit') ? ' is-invalid' : '' }}" name="usernameDataEdit" value="{{ old('usernameDataEdit') }}" required autofocus>

                                            @if ($errors->has('usernameDataEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('usernameDataEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nameDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                        <div class="col-md-6">
                                            <input id="nameDataEdit" type="text" class="form-control{{ $errors->has('nameDataEdit') ? ' is-invalid' : '' }}" name="nameDataEdit" value="{{ old('nameDataEdit') }}" required autofocus>

                                            @if ($errors->has('nameDataEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nameDataEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="emailDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="emailDataEdit" type="email" class="form-control{{ $errors->has('emailDataEdit') ? ' is-invalid' : '' }}" name="emailDataEdit" value="{{ old('emailDataEdit') }}" required>

                                            @if ($errors->has('emailDataEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('emailDataEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dt_birthDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('Data Aniversário') }}</label>

                                        <div class="col-md-6">
                                            <input id="dt_birthDataEdit" type="text" class="form-control{{ $errors->has('dt_birthDataEdit') ? ' is-invalid' : '' }}" name="dt_birthDataEdit" value="{{ old('dt_birthDataEdit') }}" required>

                                            @if ($errors->has('dt_birthDataEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dt_birthDataEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="desc_userDataEdit" class="col-md-4 col-form-label text-md-right">{{ __('Sobre mim') }}</label>

                                        <div class="col-md-6">
                                            <textarea rows="8" cols="50" id="desc_userDataEdit" type="date" class="form-control{{ $errors->has('desc_userDataEdit') ? ' is-invalid' : '' }}" name="desc_userDataEdit" value="{{ old('desc_userDataEdit') }}" required></textarea>

                                            @if ($errors->has('desc_userDataEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('desc_userDataEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-4">
                                            <button type="submit" id="refresh" class="btn btn-primary">
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
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

