@extends('base')
@section('titulo', 'Listagem de Clientes')
@section('conteudo')

    <h3>Listagem de Clientes</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('cliente.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="email">Email</option>
                            <option value="telefone">Telefone</option>
                            <option value="endereco">Endereco</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-success" href="{{ url('/cliente/create') }}"> <i class="fa-solid fa-plus"></i>
                            Novo</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row">

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Endereco</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cpf }}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->endereco }}</td>
                        <td>
                            <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-outline-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('cliente.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Deseja Remover o registro?')"> <i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
