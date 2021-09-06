<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analisar requerimento') }}
        </h2>
    </x-slot>
    <div class="container" style="padding-top: 5rem; padding-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-8">
                                <h5 class="card-title">Requerimento de  
                                    @if($requerimento->tipo == \App\Models\Requerimento::TIPO_ENUM['primeira_licenca'])
                                        {{__('primeira licença')}}
                                    @elseif($requerimento->tipo == \App\Models\Requerimento::TIPO_ENUM['renovacao'])
                                        {{__('renovação')}}
                                    @elseif($requerimento->tipo == \App\Models\Requerimento::TIPO_ENUM['autorizacao'])
                                        {{__('autorização')}}
                                    @endif
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">Requerimentos > analisar requerimento</h6>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Informações do requerente
                                        </button>
                                    </h2>
                                </div>
                          
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input id="name" class="form-control apenas_letras @error('name') is-invalid @enderror" type="text" name="name" value="{{$requerimento->empresa->user->name}}" disabled autofocus autocomplete="name">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="email">{{ __('Email') }}</label>
                                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$requerimento->empresa->user->email}}" disabled autofocus autocomplete="email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="rg">{{ __('RG') }}</label>
                                                <input id="rg" class="form-control @error('rg') is-invalid @enderror" type="text" name="rg" value="{{$requerimento->empresa->user->requerente->rg}}" disabled autofocus autocomplete="rg">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="orgao_emissor">{{ __('Orgão emissor') }}</label>
                                                <input id="orgao_emissor" class="form-control @error('orgão_emissor') is-invalid @enderror" type="text" name="orgão_emissor" value="{{$requerimento->empresa->user->requerente->orgao_emissor}}" disabled autocomplete="orgão_emissor">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="cpf">{{ __('CPF') }}</label>
                                                <input id="cpf" class="form-control @error('cpf') is-invalid @enderror" type="text" name="cpf" value="{{$requerimento->empresa->user->requerente->cpf}}" disabled autofocus autocomplete="cpf">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="celular">{{ __('Contato') }}</label>
                                                <input id="celular" class="form-control celular @error('celular') is-invalid @enderror" type="text" name="celular" value="{{$requerimento->empresa->user->requerente->telefone->numero}}" disabled autocomplete="celular">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="cep">{{ __('CEP') }}</label>
                                                <input id="cep" class="form-control cep @error('cep') is-invalid @enderror" type="text" name="cep" value="{{$requerimento->empresa->user->requerente->endereco->cep}}" disabled autofocus autocomplete="cep" onblur="pesquisacep(this.value);">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="bairro">{{ __('Bairro') }}</label>
                                                <input id="bairro" class="form-control @error('bairro') is-invalid @enderror" type="text" name="bairro" value="{{$requerimento->empresa->user->requerente->endereco->bairro}}" disabled autofocus autocomplete="bairro">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="rua">{{ __('Rua') }}</label>
                                                <input id="rua" class="form-control @error('rua') is-invalid @enderror" type="text" name="rua" value="{{$requerimento->empresa->user->requerente->endereco->rua}}" disabled autocomplete="rua">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="numero">{{ __('Número') }}</label>
                                                <input id="numero" class="form-control  @error('número') is-invalid @enderror" type="text" name="número" value="{{$requerimento->empresa->user->requerente->endereco->numero}}" disabled autocomplete="número">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="cidade">{{ __('Cidade') }}</label>
                                                <input type="hidden" name="cidade" value="Garanhuns">
                                                <input id="cidade" class="form-control @error('cidade') is-invalid @enderror" type="text" value="Garanhuns" required disabled autofocus autocomplete="cidade">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="estado">{{ __('Estado') }}</label>
                                                <input type="hidden" name="estado" value="PE">
                                                <select id="estado" class="form-control @error('estado') is-invalid @enderror" type="text" required autocomplete="estado" disabled>
                                                    <option value=""  hidden>-- Selecione o UF --</option>
                                                    <option selected value="PE">Pernambuco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 form-group">
                                                <label for="complemento">{{ __('Complemento') }}</label>
                                                <textarea class="form-control @error('complemento') is-invalid @enderror" type="text" name="complemento" id="complemento" cols="30" rows="5" disabled>{{$requerimento->empresa->user->requerente->endereco->complemento}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Informações da empresa
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="nome_empresa">{{ __('Name') }}</label>
                                                <input id="nome_empresa" class="form-control apenas_letras @error('nome_da_empresa') is-invalid @enderror" type="text" name="nome_da_empresa" value="{{$requerimento->empresa->nome}}" disabled autofocus autocomplete="nome_empresa">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="cnpj">{{ __('CNPJ') }}</label>
                                                <input id="cnpj" class="form-control @error('cnpj') is-invalid @enderror" type="text" name="cnpj" value="{{$requerimento->empresa->cnpj}}" disabled autocomplete="cnpj">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="celular_da_empresa">{{ __('Contato') }}</label>
                                                <input id="celular_da_empresa" class="form-control celular @error('celular_da_empresa') is-invalid @enderror" type="text" name="celular_da_empresa" value="{{$requerimento->empresa->telefone->numero}}" disabled autocomplete="celular">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="setor">{{ __('Setor de atuação') }}</label>
                                                <select id="setor" class="form-control @error('setor') is-invalid @enderror" type="text" name="setor" required autofocus autocomplete="setor" disabled>
                                                    <option value="{{old('setor', 1)}}">Teste</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="cep_da_empresa">{{ __('CEP') }}</label>
                                                <input id="cep_da_empresa" class="form-control cep @error('cep_da_empresa') is-invalid @enderror" type="text" name="cep_da_empresa" value="{{$requerimento->empresa->endereco->cep}}" disabled autofocus autocomplete="cep_da_empresa" onblur="pesquisacepEmpresa(this.value);">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="bairro_da_empresa">{{ __('Bairro') }}</label>
                                                <input id="bairro_da_empresa" class="form-control @error('bairro_da_empresa') is-invalid @enderror" type="text" name="bairro_da_empresa" value="{{$requerimento->empresa->endereco->bairro}}" disabled autofocus autocomplete="bairro_da_empresa">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="rua_da_empresa">{{ __('Rua') }}</label>
                                                <input id="rua_da_empresa" class="form-control @error('rua_da_empresa') is-invalid @enderror" type="text" name="rua_da_empresa" value="{{$requerimento->empresa->endereco->rua}}" disabled autocomplete="rua_da_empresa">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="numero_da_empresa">{{ __('Número') }}</label>
                                                <input id="numero_da_empresa" class="form-control @error('número_da_empresa') is-invalid @enderror" type="text" name="número_da_empresa" value="{{$requerimento->empresa->endereco->numero}}" disabled autocomplete="número_da_empresa">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <label for="cidade_da_empresa">{{ __('Cidade') }}</label>
                                                <input type="hidden" name="cidade_da_empresa" value="Garanhuns">
                                                <input id="cidade_da_empresa" class="form-control @error('cidade_da_empresa') is-invalid @enderror" type="text" value="Garanhuns" required disabled autofocus autocomplete="cidade_da_empresa">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="estado_da_empresa">{{ __('Estado') }}</label>
                                                <input type="hidden" name="estado_da_empresa" value="PE">
                                                <select id="estado_da_empresa" class="form-control @error('estado_da_empresa') is-invalid @enderror" type="text" required autocomplete="estado_da_empresa" disabled>
                                                    <option value=""  hidden>-- Selecione o UF --</option>
                                                    <option selected value="PE">Pernambuco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 form-group">
                                                <label for="complemento_da_empresa">{{ __('Complemento') }}</label>
                                                <textarea class="form-control @error('complemento_da_empresa') is-invalid @enderror" type="text" name="complemento_da_empresa" id="complemento_da_empresa" cols="30" rows="5" disabled>{{$requerimento->empresa->endereco->complemento}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Collapsible Group Item #3
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                        <br>
                        <form method="POST" action="{{route('requerimentos.atribuir.analista')}}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="hidden" name="requerimento" value="{{$requerimento->id}}">
                                    <label for="analista">{{__('Selecione um analista')}}</label>
                                    <select name="analista" id="analista" class="form-control @error('analista') is-invalid @enderror" required>
                                        <option value="">-- {{__('Selecione um analista')}} --</option>
                                        @foreach ($analistas as $analista)
                                            <option value="{{$analista->id}}">{{$analista->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success" style="width: 100%;">Atribuir ao analista</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>