@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Pedido Produto - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        <p>ID do Pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente->nome }}</p>
        <div style="width: 30%; margin-left:auto; margin-right:auto">
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])                
            @endcomponent
            <h4>Itens do Pedido</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Produto</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection