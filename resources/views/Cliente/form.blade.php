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
        <h1>Formulário Cliente</h1>

        <div class="row">
            <div class="col">
                <label for="">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="">CPF</label>
                <input type="text" name="cpf" value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
            <div class="col">
                <label for="">email</label>
                <input type="text" name="email" value="{{ old('email', $dado->email ?? '') }}">
            </div>
            <div class="col">
                <label for="">Telefone</label>
                <input type="text" name="telefone" value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>
            <div class="col">
                <label for="">Endereco</label>
                <input type="text" name="endereco" value="{{ old('endereco', $dado->endereco ?? '') }}">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('cliente') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
@stop
