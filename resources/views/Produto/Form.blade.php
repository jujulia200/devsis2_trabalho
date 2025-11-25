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



    <div class="rounded-3 py-4 px-5 shadow-lg border border-3 bg-dark">
      <h1 class="mb-4 text-white">Formulário de Cliente</h1>
        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="preco" class="form-label">Preco</label>
                <input type="text" id="preco" name="preco" class="form-control" value="{{ old('preco', $dado->preco ?? '') }}">
            </div>
        </div>

        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" id="categoria" name="categoria" class="form-control" value="{{ old('categoria', $dado->categoria ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="qtd_estoque" class="form-label">Qtd_Estoque</label>
                <input type="float" id="qtd_estoque" name="qtd_estoque" class="form-control" value="{{ old('qtd_estoque', $dado->qtd_estoque ?? '') }}">
            </div>
        </div>

        <div class="row mb-4 text-white">
            <div class="col-md-12">
                <label for="estoque_minimo" class="form-label">Estoque_Minimo</label>
                <input type="float" id="estoque_minimo" name="estoque_minimo" class="form-control" value="{{ old('estoque_minimo', $dado->estoque_minimo ?? '') }}">
            </div>
        </div>

        <div class="col">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}"
                            {{ old('categoria_id', $dado->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    {{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}
                </button>
                <a href="{{ url('produto') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>

@stop
