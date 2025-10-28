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

        <div class="row">
            <div class="col">
                <label for="">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="">Preço</label>
                <input type="text" name="preço" value="{{ old('preço', $dado->Preço ?? '') }}">
            </div>
            <div class="col">
                <label for="">Categoria</label>
                <input type="text" name="categoria" value="{{ old('categoria', $dado->categoria ?? '') }}">
            </div>

        </div>
        <div class="col">
            <label for="">Qtd_Estoque</label>
            <input type="text" name="Qtd_Estoque" value="{{ old('Qtd_Estoque', $dado->Qtd_Estoque ?? '') }}">
        </div>

    <div class="col">
        <label for="">Estoque_Minimo</label>
        <input type="text" name="Estoque_Minimo" value="{{ old('Estoque_Minimo', $dado->Estoque_Minimo ?? '') }}">
    </div>

            <div class="col">
                <label for="">Categoria</label>
                <select name="categoria_id">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}"
                            {{ old('categoria_id', $dado->categoria_id ?? '')
                                    == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

