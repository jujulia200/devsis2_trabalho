@extends('base')
@section('titulo', 'Tela Principal')
@section('conteudo')

<div class="container mt-5 rounded-3 py-4 px-5 border border-3">
    <h2 class="text-center mb-4">Mercado</h2>

    <div class="d-flex justify-content-center gap-3 flex-wrap">

        <a href="{{ url('cliente') }}" class="btn btn-primary btn-lg shadow rounded-4 px-4 py-3">
            <i class="bi bi-people-fill me-2"></i>
            Clientes
        </a>

        <a href="{{ url('fornecedor') }}" class="btn btn-success btn-lg shadow rounded-4 px-4 py-3">
            <i class="bi bi-truck me-2"></i>
            Fornecedores
        </a>

        <a href="{{ url('produto') }}" class="btn btn-warning btn-lg shadow rounded-4 px-4 py-3 text-dark fw-bold">
            <i class="bi bi-box-seam me-2"></i>
            Produtos
        </a>

    </div>
</div>

@endsection
