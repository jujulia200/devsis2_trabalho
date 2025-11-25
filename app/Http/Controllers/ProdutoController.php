<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**

   * função vai listar todos os produtos e passar os dados para a blender list
      **/
    public function index()
     {
        $dados = Produto::All();

        return view('produto.list', ['dados' => $dados]);
    }

    /**
    *função chama o formulario produto
     */
    public function create()
    {
        return view('produto.form');
    }

    /** função valida as informações e verifica se há erros */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'categoria' => 'required',
            'qtd_estoque' => 'required',
            'estoque_minimo' => 'required',

        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'preco.required' => 'O :attribute é obrigatório',
            'categoria.required' => 'O :attribute é obrigatório',
            'qtd_estoque.required' => 'O :atribute é obrigatório',
            'estoque_minimo.required' => 'O :atribute é obrigatório',
        ]);
    }
    /**
    *função que armezana as informações do formulario produto
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Produto::create($data);

        return redirect('produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
   *  função edita e recebe o id, carrega os dados do produto e passa os dados para o formulario
     */
    public function edit($id)
    {
        // dd($dado);
        $dado = Produto::findOrFail($id);

        return view(
            'produto.form',
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

        Produto::updateOrCreate(['id' => $id], $data);

        return redirect('produto');
    }

    /**
     *função que destroi os dados do formulario
     */
    public function destroy($id)
    {
        $dado = Produto::findOrFail($id);

        $dado->delete();

        return redirect('produto');
    }

    /**
   * função que pesquisa os dados de um formulario
     */
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Produto::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Produto::All();
        }

        return view('produto.list', ["dados" => $dados]);
    }
}
