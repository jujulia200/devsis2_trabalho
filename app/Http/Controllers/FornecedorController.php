<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Lista todos os fornecedores.
     */
    public function index()
    {
        $dados = Fornecedor::all();

        return view('fornecedor.list', ['dados' => $dados]);
    }

    /**
     * Exibe o formulário de cadastro.
     */
    public function create()
    {
        return view('fornecedor.form');
    }

    /**
     * Valida os dados enviados pelo formulário.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'produto' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'email.required' => 'O :attribute é obrigatório',
            'telefone.required' => 'O :attribute é obrigatório',
            'endereco.required' => 'O :attribute é obrigatório',
            'produto.required' => 'O :attribute é obrigatório',
        ]);
    }

    /**
     * Armazena um novo fornecedor.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        Fornecedor::create($request->all());

        return redirect()->route('fornecedor.index');
    }

    /**
     * Carrega dados para edição.
     */
    public function edit($id)
    {
        $dado = Fornecedor::findOrFail($id);

        return view('fornecedor.form', ['dado' => $dado]);
    }

    /**
     * Atualiza um fornecedor.
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $dado = Fornecedor::findOrFail($id);
        $dado->update($request->all());

        return redirect()->route('fornecedor.index');
    }

    /**
     * Apaga um fornecedor.
     */
    public function destroy($id)
    {
        $dado = Fornecedor::findOrFail($id);
        $dado->delete();

        return redirect()->route('fornecedor.index');
    }

    /**
     * Pesquisa fornecedores.
     */
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Fornecedor::all();
        }

        return view('fornecedor.list', ['dados' => $dados]);
    }
}
