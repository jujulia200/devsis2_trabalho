@extends('base')
@section('titulo', 'Tela Principal')
@section('conteudo')

<div class="container mt-5 rounded-4 py-4 px-5 border shadow-lg bg-light">
    <h1 class="text-center mb-5 text-primary">
        <i class="fa-solid fa-basket-shopping"></i> Mercado
    </h1>

    <div class="d-flex justify-content-center gap-4 flex-wrap">

        <a href="{{ url('cliente') }}" class="btn btn-primary btn-lg shadow-lg rounded-5 px-5 py-4 fw-bold d-flex align-items-center justify-content-center gap-3 transition-all hover:scale-105">
            <i class="bi bi-people-fill fs-3"></i>
            <span class="fs-4">Clientes</span>
        </a>

        <a href="{{ url('fornecedor') }}" class="btn btn-success btn-lg shadow-lg rounded-5 px-5 py-4 fw-bold d-flex align-items-center justify-content-center gap-3 transition-all hover:scale-105">
            <i class="bi bi-truck fs-3"></i>
            <span class="fs-4">Fornecedores</span>
        </a>

        <a href="{{ url('produto') }}" class="btn btn-warning btn-lg shadow-lg rounded-5 px-5 py-4 fw-bold d-flex align-items-center justify-content-center gap-3 transition-all hover:scale-105">
            <i class="bi bi-box-seam fs-3"></i>
            <span class="fs-4 text-white">Produtos</span>
        </a>

    </div>
</div>

@endsection
