@extends('adminlte::page')

@section('title', 'Unidades - Centrum')

@section('content_header')
    <h1 class="text-bold">Inserir Unidade</h1>
@stop

@section('content')
    <div class="callout callout-success">
        <form id="cadastroUnidade" role="form" action="{{url('unidades')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-3" style="max-width: 310px !important;">
                        <label for="foto">Foto de Perfil</label><br/>
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
                                <label for="tipo">Tipo de Unidade</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value=""> - SELECIONE -</option>
                                    <option value="E" {{ old('tipo') == 'E' ? 'selected' : null }}>ETEC</option>
                                    <option value="F" {{ old('tipo') == 'F' ? 'selected' : null }}>FATEC</option>
                                </select>
                                @if($errors->has('tipo'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group offset-sm-5 col-sm-3">
                                <label for="unidade">Unidade</label><br/>
                                <input id="unidade" name="unidade" type="number"
                                       class="form-control {{ $errors->has('unidade') ? 'is-invalid' : '' }}"
                                       placeholder="Nº. da Unidade" value="{{ old('unidade') }}">
                                @if($errors->has('unidade'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('unidade') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nome">Nome da Unidade</label>
                                <input id="nome" name="nome" type="text" required
                                       class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                                       placeholder="Nome da Unidade" value="{{ old('nome') }}">
                                @if($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="email">E-mail para Contato</label>
                                <input id="email" name="email" type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       placeholder="E-mail institucional para contato" required
                                       value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="site">Site da Unidade</label>
                                <input id="site" name="site" type="url"
                                       class="form-control {{ $errors->has('site') ? 'is-invalid' : '' }}"
                                       placeholder="Site da Unidade" required
                                       value="{{ old('site') }}">
                                @if($errors->has('site'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('site') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="telefone1">Telefone 1</label>
                                <input id="telefone1" name="telefone1" type="text"
                                       class="form-control {{ $errors->has('telefone1') ? 'is-invalid' : '' }}"
                                       placeholder="(XX) XXXX-XXXX" required>
                                @if($errors->has('telefone1'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone1') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="telefone2">Telefone 2</label>
                                <input id="telefone2" name="telefone2" type="text"
                                       class="form-control {{ $errors->has('telefone2') ? 'is-invalid' : '' }}"
                                       placeholder="(XX) XXXX-XXXX" required>
                                @if($errors->has('telefone2'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone2') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="cep">CEP</label>
                        <input id="cep" name="cep" type="text" minlength="10"
                               class="form-control text-center {{ $errors->has('cep') ? 'is-invalid' : '' }}"
                               placeholder="XX.XXX-XXX" required>
                        @if($errors->has('cep'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label for="rua">Logradouro</label>
                        <input id="rua" name="rua" type="text"
                               class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}"
                               placeholder="Logradouro" required>
                        @if($errors->has('rua'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('rua') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="numero">Número</label>
                        <input id="numero" name="numero" type="text" maxlength="10"
                               class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}"
                               placeholder="Número" required>
                        @if($errors->has('numero'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="complemento">Complemento</label>
                        <input id="complemento" name="complemento" type="text"
                               class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}"
                               placeholder="Complemento" required>
                        @if($errors->has('complemento'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('complemento') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" name="bairro" type="text"
                               class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}"
                               placeholder="Bairro" required>
                        @if($errors->has('bairro'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" name="cidade" type="text"
                               class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                               placeholder="Cidade" required>
                        @if($errors->has('cidade'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="display: none">
                        <label for="uf">UF</label>
                        <select name="uf" id="uf" class="form-control">
                            <option value="SP" {{ old('uf') == 'SP' ? 'selected' : null }}>São Paulo (SP)</option>
                            <option value="AC" {{ old('uf') == 'AC' ? 'selected' : null }}>Acre (AC)</option>
                            <option value="AL" {{ old('uf') == 'AL' ? 'selected' : null }}>Alagoas (AL)</option>
                            <option value="AM" {{ old('uf') == 'AM' ? 'selected' : null }}>Amazonas (AM)</option>
                            <option value="AP" {{ old('uf') == 'AP' ? 'selected' : null }}>Amapá (AP)</option>
                            <option value="BA" {{ old('uf') == 'BA' ? 'selected' : null }}>Bahia (BA)</option>
                            <option value="CE" {{ old('uf') == 'CE' ? 'selected' : null }}>Ceará (CE)</option>
                            <option value="DF" {{ old('uf') == 'DF' ? 'selected' : null }}>Distrito Federal (DF)
                            </option>
                            <option value="ES" {{ old('uf') == 'ES' ? 'selected' : null }}>Espírito Santo (ES)</option>
                            <option value="GO" {{ old('uf') == 'GO' ? 'selected' : null }}>Goiás (GO)</option>
                            <option value="MA" {{ old('uf') == 'MA' ? 'selected' : null }}>Maranhão (MA)</option>
                            <option value="MT" {{ old('uf') == 'MT' ? 'selected' : null }}>Mato Grosso (MT)</option>
                            <option value="MS" {{ old('uf') == 'MS' ? 'selected' : null }}>Mato Grosso do Sul (MS)
                            </option>
                            <option value="MG" {{ old('uf') == 'MG' ? 'selected' : null }}>Minas Gerais (MG)</option>
                            <option value="PA" {{ old('uf') == 'PA' ? 'selected' : null }}>Pará (PA)</option>
                            <option value="PB" {{ old('uf') == 'PB' ? 'selected' : null }}>Paraíba (PB)</option>
                            <option value="PR" {{ old('uf') == 'PR' ? 'selected' : null }}>Paraná (PR)</option>
                            <option value="PE" {{ old('uf') == 'PE' ? 'selected' : null }}>Pernambuco (PE)</option>
                            <option value="PI" {{ old('uf') == 'PI' ? 'selected' : null }}>Piauí (PI)</option>
                            <option value="RJ" {{ old('uf') == 'RJ' ? 'selected' : null }}>Rio de Janeiro (RJ)</option>
                            <option value="RN" {{ old('uf') == 'RN' ? 'selected' : null }}>Rio Grande do Norte (RN)
                            </option>
                            <option value="RS" {{ old('uf') == 'RS' ? 'selected' : null }}>Rio Grande do Sul (RS)
                            </option>
                            <option value="RO" {{ old('uf') == 'RO' ? 'selected' : null }}>Rondônia (RO)</option>
                            <option value="RR" {{ old('uf') == 'RR' ? 'selected' : null }}>Roraima (RR)</option>
                            <option value="SC" {{ old('uf') == 'SC' ? 'selected' : null }}>Santa Catarina (SC)</option>
                            <option value="SE" {{ old('uf') == 'SE' ? 'selected' : null }}>Sergipe (SE)</option>
                            <option value="TO" {{ old('uf') == 'TO' ? 'selected' : null }}>Tocantins (TO)</option>
                            s
                        </select>
                        @if($errors->has('uf'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('uf') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="descricao">Descrição da Unidade</label>
                        <textarea name="descricao" id="descricao"
                                  class="form-control summernote">{{ old('descricao') }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{route('unidades.index')}}" class="btn btn-default btn-lg float-left">VOLTAR</a>
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

        $('#cadastroUnidade').validate({
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
        $('#cadastroUnidade').data('validator').settings.ignore = ".note-editor *";

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
