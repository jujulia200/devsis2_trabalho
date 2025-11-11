@extends('base')
@section('titulo', 'Listagem de Produto')
@section('conteudo')

<h3>Listagem de Produto</h3>

<div class="row">
    <div class="col">
        <form action="{{ route('Produto.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="preco">Preço</option>
                        <option value="categoria">Categoria</option>
                        <option value="qtd_estoque">Qtd_Estoque</option>
                        <option value="estoque_minimo">Estoque_Minimo</option>
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="valor" class="form-label fw-semibold">Valor</label>
                    <input type="text" id="valor" name="valor" class="form-control" placeholder="Digite para pesquisar...">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </form>
    </div>
</div>

<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Qtd_Estoque</th>
            <th>Estoque_Minimo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->preco }}</td>
            <td>{{ $item->categoria->nome }}</td>
            <td>{{ $item->qtd_estoque }}</td>
            <td>{{ $item->estoque_minimo }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
