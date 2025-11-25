<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**

   * função vai listar todos os fornecedors e passar os dados para a blender list
      **/
    public function index()
     {
        $dados = Fornecedor::All();

        return view('fornecedor.list', ['dados' => $dados]);
    }

    /**
    *função chama o formulario fornecedor
     */
    public function create()
    {
        return view('fornecedor.form');
    }

    /** função valida as informações e verifica se há erros */
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
            'telefone.required' => 'O :atribute é obrigatório',
            'endereco.required' => 'O :atribute é obrigatório',
            'produto.required' => 'O :atribute é obrigatório',
        ]);
    }
    /**
    *função que armezana as informações do formulario fornecedor
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Fornecedor::create($data);

        return redirect('fornecedor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
   *  função edita e recebe o id, carrega os dados do fornecedor e passa os dados para o formulario
     */
    public function edit($id)
    {
        // dd($dado);
        $dado = Fornecedor::findOrFail($id);

        return view(
            'fornecedor.form',
            [
                'dado' => $dado,
            ]
        );
    }

    /**
     *função que valida e atualiza os dados do formulario
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateRequest($request);
        $data = $request->all();

        Fornecedor::updateOrCreate(['id' => $id], $data);

        return redirect('fornecedor');
    }

    /**
     *função que destroi os dados do formulario
     */
    public function destroy($id)
    {
        $dado = Fornecedor::findOrFail($id);

        $dado->delete();

        return redirect('fornecedor');
    }

    /**
   * função que pesquisa os dados de um formulario
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
            $dados = Fornecedor::All();
        }

        return view('fornecedor.list', ["dados" => $dados]);
    }
}
