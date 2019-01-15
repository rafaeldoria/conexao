<div class="modal fade editUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editUserModal">Editar Usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="editUser" method="POST" action="" aria-label="{{ __('EditUsers') }}">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group row">
                                        <label for="usernameEdit" class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>

                                        <div class="col-md-6">
                                            <input id="usernameEdit" type="text" class="form-control{{ $errors->has('usernameEdit') ? ' is-invalid' : '' }}" name="usernameEdit" value="{{ old('usernameEdit') }}" required autofocus>

                                            @if ($errors->has('usernameEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('usernameEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="emailEdit" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="emailEdit" type="emailEdit" class="form-control{{ $errors->has('emailEdit') ? ' is-invalid' : '' }}" name="emailEdit" value="{{ old('emailEdit') }}" required>

                                            @if ($errors->has('emailEdit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('emailEdit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type_userEdit" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Usuário') }}</label>
                                        <div class="col-md-6">
                                            <select name="type_userEdit" id="type_userEdit" class="form-control">
                                                @foreach ($typeUser as $value)
                                                    <option value="{{$value->id}}">{{$value->desc_type_user}}</option>
                                                @endforeach
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

