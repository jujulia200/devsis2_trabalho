<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Lista todos os fornecedores
     */
    public function index()
    {
        $dados = Fornecedor::all();
        return view('fornecedor.list', ['dados' => $dados]);
    }

    /**
     * Exibe o formulário
     */
    public function create()
    {
        return view('fornecedor.form', ['dado' => new Fornecedor()]);
    }

    /**
     * Valida os dados
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome'     => 'required',
            'cpf'      => 'required',
            'email'    => 'required|email',
            'telefone' => 'required',
            'endereco' => 'required',
            'produto'  => 'required',
        ], [
            'nome.required'     => 'O :attribute é obrigatório',
            'cpf.required'      => 'O :attribute é obrigatório',
            'email.required'    => 'O :attribute é obrigatório',
            'telefone.required' => 'O :attribute é obrigatório',
            'endereco.required' => 'O :attribute é obrigatório',
            'produto.required'  => 'O :attribute é obrigatório',
        ]);
    }

    /**
     * Armazena novo fornecedor
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        Fornecedor::create($request->all());
        return redirect('fornecedor');
    }

    /**
     * Exibe formulário para edição
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.form', ['dado' => $fornecedor]);
    }

    /**
     * Atualiza fornecedor
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $this->validateRequest($request);
        $fornecedor->update($request->all());

        return redirect('fornecedor');
    }

    /**
     * Deleta fornecedor
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect('fornecedor');
    }

    /**
     * Pesquisa fornecedores
     */
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::where(
                $request->tipo,
                'like',
                "%{$request->valor}%"
            )->get();
        } else {
            $dados = Fornecedor::all();
        }

        return view('fornecedor.list', ['dados' => $dados]);
    }
}
