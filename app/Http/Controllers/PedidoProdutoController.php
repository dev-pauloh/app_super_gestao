<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' =>'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

//        PedidoProduto::create([
//            'pedido_id' => $pedido->id,
//            'produto_id' => $request->produto_id,
//            'quantidade' => $request->quantidade
//        ]);

        //Gravando o registro utilizando o relacionamento
        $pedido->produtos()->attach($request->produto_id, ['quantidade' => $request->quantidade]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pedido $pedido, Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {
       //convencional
//        PedidoProduto::where([
//           'pedido_id' => $pedido->id,
//           'produto_id' => $produto->id
//       ])->delete();

        //detach (delete pelo relacionamento)
        $pedido->produtos()->detach($produto->id);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }
}
