@extends('base')
@section('titulo', 'Formulário fornecedor')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('fornecedor.update', $dado->id);
        } else {
            $action = route('fornecedor.store');
        }
    @endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">



    <div class="rounded-3 py-4 px-5 shadow-lg border border-3 bg-success">
      <h1 class="mb-4 text-white">Formulário de fornecedor</h1>
        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
        </div>

        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $dado->email ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>
        </div>

        <div class="row mb-4 text-white">
            <div class="col-md-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" value="{{ old('endereco', $dado->endereco ?? '') }}">
            </div>
        </div>

        <div class="row mb-4 text-white">
            <div class="col-md-12">
                <label for="produto" class="form-label">Produto</label>
                <input type="text" id="produto" name="produto" class="form-control" value="{{ old('produto', $dado->produto ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    {{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}
                </button>
                <a href="{{ url('fornecedor') }}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
    </div>
</form>

@stop
