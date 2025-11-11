@extends('base')
@section('titulo', 'Formulário Cliente')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('cliente.update', $dado->id);
        } else {
            $action = route('cliente.store');
        }
    @endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

    <h1 class="mb-4">Formulário de Cliente</h1>

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="cpf" value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" id="email" name="email" class="email" value="{{ old('email', $dado->email ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="telefone

        </div>



        <div class="row mb-4">
            <div class="col-md-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" value="{{ old('endereco', $dado->endereco ?? '') }}">
            </div>
        </div>

        <div class="col-md-12">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" id="endereco" name="produto" class="form-control" value="{{ old('endereco', $dado->endereco ?? '') }}">
        </div>
    </div>
        <div class="row">
            <div class="col d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    {{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}
                </button>
                <a href="{{ url('fornecedor') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</form>

@stop
