<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagens = Mensagem::all();
        return view('mensagem.list',['mensagens' => $mensagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atividade = Atividade::all();
        return view('mensagem.create',['atividades' => $atividades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // faço as validações dos campos

        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatório um texto para a mensagem',
            'autor.required' => 'É obrigatório o cadastro de data/hora para a mensagem',

        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:250',
            'texto' => 'required',
            'autor' => 'required|string',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $mensagem = new Mensagem();
        $mensagem->titulo = $request['titulo'];
        $mensagem->texto = $request['texto'];
        $mensagem->autor = $request['autor'];
        $mensagem->save();
        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = Mensagem::find($id);
        return view('mensagem.show',['mensagem' => $mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensagem = Mensagem::find($id);
        return view('mensagem.edit', ['mensagem' => $mensagem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //faço as validações dos campos

        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória uma tetxo para a mensagem',
            'autor.required' => 'É obrigatório um autor para a mensagem',
        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:300',
            'texto' => 'required',
            'autor' => 'required|string',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect("mensagem/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->titulo = $request['titulo']; 
        $mensagem->texto = $request['texto'];
        $mensagem->autor = $request['autor'];
        $mensagem->save();

        return redirect('/mensagens')->with('success', 'Mensagem alterada com sucesso!!');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        $mensagem = Mensagem::find($id);
        return view('mensagem.delete',['mensagem' => $mensagem]);

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete($id);
        return redirect('/mensagens')->with('success', 'Mensagem excluída com sucesso!!!');
    }
}
