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
                            <option value="preço">Preço</option>
                            <option value="categoria">Categoria</option>
                            <option value="Qtd_Estoque">Qtd_Estoque</option>
                            <option value="Estoque_Minimo">Estoque_Minimo</option>
                        </select>



        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Preço</td>
                    <td>Categoria</td>
                    <td>Qtd_Estoque</td>
                    <td>Estoque_Minimo</td>
                </tr>
            </thead>
            <tbody>
                  <td>{{ $item->Nome }}</td>
                  <td>{{ $item->Preço }}</td>
                  <td>{{ $item->Qtd_Estoque }}</td>
                  <td>{{ $item->Estoque_Minimo }}</td>
                  <td>{{ $item->categoria->nome }}</td>
                   <td>


                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
