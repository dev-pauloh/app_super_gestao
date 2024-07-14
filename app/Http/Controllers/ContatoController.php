<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use \App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato Controller', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40', //min 3 caracteres, max 40 caracteres
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'nome.required' => 'O campo nome precisa ser preenchido',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'telefone.required' => 'O campo telefone precisa ser preenchido',
                'email.email' => 'Digite um email válido',
                'mensagem.max' => 'A mensagem precisa ter no máximo 2000 caracteres',
                
                'required' => 'O campo :attribute precisa ser preenchido' // aplica para todos os required. :attribute retorna o nome do campo
            ]
        );
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
