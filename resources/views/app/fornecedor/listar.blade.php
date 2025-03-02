@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedores - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left:auto; margin-right:auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-Mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->site }}</td>
                        <td>{{ $fornecedor->uf }}</td>
                        <td>{{ $fornecedor->email }}</td>
                        <td><a href="{{ route('app.fornecedor.excluir', ['id' => $fornecedor->id]) }}">Excluir</a></td>
                        <td><a href="{{ route('app.fornecedor.editar', ['id' => $fornecedor->id]) }}">Editar</a></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>Lista de Produtos</p>
                            <table border="1" style="margin: 20px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fornecedor->produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td> 
                                        <td>{{ $produto->nome }}</td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $fornecedores->appends($request)->links() }}
            <br>
            Exibindo {{ $fornecedores->count() }} fornecedores {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
        </div>
    </div>
</div>
@endsection