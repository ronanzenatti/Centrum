@extends('adminlte::page')

@section('title', 'Docentes - Centrum')

@section('content_header')
    <h1 class="text-bold">Inserir Docente</h1>
@stop

@section('content')
    <div class="callout callout-success">
        <form id="cadastroDocente" role="form" action="{{url('docentes')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3" style="max-width: 310px !important;">
                        <label for="matricula">Foto de Perfil</label><br/>
                        <img class="profile-img" id="preview"
                             src="https://via.placeholder.com/300?text=Foto+de+Perfil"
                             alt="Profile">
                        <button class="btn btn-lg btn-danger btn-float browse" type="button">
                            <i class="fas fa-camera"></i>
                        </button>
                        <input type="file" name="foto" id="foto" style="display: none" accept="image/*">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="matricula">Matrícula</label>
                                <input id="matricula" name="matricula" type="number" required
                                       class="form-control text-center {{ $errors->has('matricula') ? 'is-invalid' : '' }}"
                                       placeholder="Número de Matricula" required value="{{ old('matricula') }}">
                                @if($errors->has('matricula'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('matricula') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group offset-sm-5 col-sm-3 text-right">
                                <label for="admin">Administrador</label><br/>
                                <input type="checkbox" class="bootstrapSwitch" name="admin" id="admin"
                                    {{ old('admin') ? 'checked' : null }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Nome</label>
                                <input id="name" name="name" type="text" required
                                       class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       placeholder="Nome do Docente" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email">E-mail Institucional</label>
                                <input id="email" name="email" type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       placeholder="E-mail Institucional" required value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label for="password">Senha</label>
                                <input id="password" name="password" type="password" minlength="8"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="Senha" required>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="confirmarSenha">Confirmar Senha</label>
                                <input id="confirmarSenha" name="confirmarSenha" type="password" minlength="8"
                                       class="form-control {{ $errors->has('confirmarSenha') ? 'is-invalid' : '' }}"
                                       placeholder="Confirmar Senha" required>
                                @if($errors->has('confirmarSenha'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('confirmarSenha') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="lattes">Curriculo Lattes</label>
                        <input id="lattes" name="lattes" type="text"
                               class="form-control {{ $errors->has('lattes') ? 'is-invalid' : '' }}"
                               placeholder="Link para o Currículo Lattes" value="{{ old('lattes') }}">
                        @if($errors->has('lattes'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('lattes') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="site">Site particular</label>
                        <input id="site" name="site" type="text"
                               class="form-control {{ $errors->has('site') ? 'is-invalid' : '' }}"
                               placeholder="Link para o Site Particular" value="{{ old('site') }}">
                        @if($errors->has('site'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('site') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="biografia">Biografia</label>
                        <textarea name="biografia" id="biografia"
                                  class="form-control summernote">{{ old('biografia') }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{route('docentes.index')}}" class="btn btn-default btn-lg float-left">VOLTAR</a>
                    </div>
                    <div class="col-sm-4">
                        <button type="reset" class="btn btn-default btn-lg">LIMPAR</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-lg float-right">SALVAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright © 2020 <a href="http://www.ronanzenatti.com">Ronan Adriel
            Zenatti</a>.</strong> Todos os direitos reservados.
@stop

@section('css')

@stop

@section('plugins.Validar', true)
@section('plugins.Summernote', true)
@section('plugins.BootstrapSwitch', true)

@section('js')
    <script>
        $(document).on("click", ".browse", function () {
            var file = $(this).parents().find("#foto");
            file.trigger("click");
        });
        $('#foto').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $.validator.addMethod("emailz", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@etec.sp.gov.br$/i.test(value) || /^[a-zA-Z0-9._-]+@cps.sp.gov.br$/i.test(value);
        }, "Use um e-mail institucional válido: @cps.sp.gov.br ou @etec.sp.gov.br");

        $('#cadastroDocente').validate({
            rules: {
                email: {
                    emailz: true,
                },
                confirmarSenha: {
                    equalTo: "#password"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }
        });
        $('#cadastroDocente').data('validator').settings.ignore = ".note-editor *";

        $('.summernote').summernote({
            lang: 'pt-BR',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'help']]
            ]
        });
        $('.summernote').summernote('fontSize', 14);
        $('.summernote').summernote('fontName', 'Roboto');

        $(".bootstrapSwitch").bootstrapSwitch({
            onColor: 'success',
            offColor: 'danger',
            onText: 'SIM',
            offText: 'NÂO'
        });
    </script>
@stop
