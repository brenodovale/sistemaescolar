<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Http\Requests\TurmaRequest;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $turmas = Turma::paginate(5);

        return view('turma.index', compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nome = 'Cadastrar';

        return view('turma/cadastrar', compact('nome')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest $request)
    {
       $turma = array
        (
            'nometurma' =>  strtoupper($request->nometurma),
            
        ); 

            // insere no banco
        $insert = Turma::create($turma);

       


     // verifica se foi inserido
        if ($insert){
           return redirect()-> route('turmas.index');
        }else{
            return redirect()-> route('turmas.cadastrar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $show = Turma::find($id);

         return view('turma/cadastrar', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nometurmaid = Turma::find($id);
        $nome = 'Editar';

         return view('turma/cadastrar', compact('nometurmaid', 'nome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TurmaRequest $request, $id)
    {
        $turma = array
        (
            'nometurma' =>  strtoupper($request->nometurma),
            
        ); 


        $nometurmaid = Turma::find($id);

          
        $update = $nometurmaid->update($turma);

      


    
        if ($update){
           return redirect()-> route('turmas.index');
        }else{
            return redirect()-> route('turmas.cadastrar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        

         return redirect()->route('turmas.index');
    }
}
