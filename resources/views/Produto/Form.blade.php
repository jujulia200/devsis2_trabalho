@extends('base')
@section('titulo', 'Formulário Produto')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('Produto.update', $dado->id);
        } else {
            $action = route('Produto.store');
        }
    @endphp

    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <h1 class="mb-4">Formulário do produto</h1>

        <div class="row">

            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>

            <div class="col">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" value="{{ old('preco', $dado->preco ?? '') }}">
            </div>

            <div class="col">
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" value="{{ old('categoria', $dado->categoria ?? '') }}">
            </div>

            <div class="col">
                <label for="Qtd_Estoque">Qtd_Estoque</label>
                <input type="text" name="Qtd_Estoque" id="Qtd_Estoque" value="{{ old('Qtd_Estoque', $dado->Qtd_Estoque ?? '') }}">
            </div>

            <div class="col">
                <label for="Estoque_Minimo">Estoque_Minimo</label>
                <input type="text" name="Estoque_Minimo" id="Estoque_Minimo" value="{{ old('Estoque_Minimo', $dado->Estoque_Minimo ?? '') }}">
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
