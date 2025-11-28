@extends('base')
@section('titulo', 'Listagem de Produtos')
@section('conteudo')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<h1 class="mb-4 text-center bg-warning text-white rounded-3 py-4 px-5 shadow-lg border border-3">
    <i class="fa-solid fa-cart-shopping"></i> Listagem de Produtos
</h1>


<div class="container mb-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('produto.search') }}" method="post">
                @csrf

                <div class="row align-items-end g-3">
                    <div class="col-md-3">
                        <label for="tipo" class="form-label fw-semibold">
                            <h4>Tipo</h4>
                        </label>
                        <select name="tipo" id="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="preco">Preco</option>
                            <option value="categoria">Categoria</option>
                            <option value="qtd_estoque">Qtd_Estoque</option>
                            <option value="estoque_minimo">Estoque_Minimo</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="valor" class="form-label fw-semibold">
                            <h4>Valor</h4>
                        </label>
                        <input type="text" id="valor" name="valor" class="form-control" placeholder="Digite para pesquisar...">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> Buscar
                        </button>
                    </div>

                    <div class="col-md-2 d-grid">
                        <a href="{{ url('/produto/create') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus me-1"></i> Novo
                        </a>
                    </div>
                    <div class="col-md-2 d-grid">
                        <a href="{{ url('/produto/chart') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus me-1"></i> Gráfico
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body bg-dark text-white rounded-3">
                <h4 class="mb-3 text-center">Produtos Cadastrados</h4>

                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle text-center">
                        <thead class="table-light text-dark">
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>Preco</th>
                                <th>Categoria</th>
                                <th>Qtd_Estoque</th>
                                <th>Estoque_Minimo</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dados as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ $item->preco }}</td>
                                    <td>{{ $item->categoria }}</td>
                                    <td>{{ $item->qtd_estoque }}</td>
                                    <td>{{ $item->estoque_minimo }}</td>
                                    <td>
                                        <a href="{{ route('produto.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning text-dark fw-semibold">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Editar
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('produto.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fw-semibold"
                                                onclick="return confirm('Deseja remover o registro?')">
                                                <i class="fa-solid fa-trash-can me-1"></i> Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4  text-white">
                                        Nenhum produto encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
