<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Produto::All();

         return view('produto.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
         $data = $request->all();

         Produto::create($data);

         return redirect('Produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        // dd($dado);
         $dado = Produto::findOrFail($produto);

         return view(
             'Produto.form',
             [
                 'dado' => $dado,
             ]
         );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {

         //dd($request->all());
         $this->validateRequest($request);
         $data = $request->all();

         Produto::updateOrCreate(['id' => $produto], $data);

         return redirect('Produto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {

        $dado = Produto::findOrFail($produto);

        $dado->delete();

        return redirect('Produto');
    }
}
