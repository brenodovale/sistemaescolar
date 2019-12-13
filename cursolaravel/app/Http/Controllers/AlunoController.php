<?php

namespace App\Http\Controllers;

use App\Aluno;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Http\Requests\AlunoRequestUpdate;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
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
      
        $alunos = Aluno::paginate(10);

        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nome = 'Cadastrar';
        $string = null;

        return view('aluno/cadastrar', compact('nome', 'string'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $aluno = array
        (
            'nomealuno' => strtoupper($request->nomealuno),
            'nmatricula' => $request->nmatricula,
            'status' => $request->status,

            
        ); 

            // insere no banco
        $insert = Aluno::create($aluno);

        // verifica se foi inserido

        
    
        if ($insert){
           //return redirect()-> route('alunos.index');
           return redirect()
           ->action('AlunoController@create')
           ->with('success', 'Aluno cadastrado com sucesso!');
        }else{
            return redirect()
           ->action('AlunoController@create')
           ->with('danger', 'Erro ao cadastrar Aluno!');
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
        $show = Aluno::find($id);

         return view('aluno/cadastrar', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alunoid = Aluno::find($id);
        $string = "readonly"; 
        $nome = 'Editar';

         return view('aluno/cadastrar', compact('alunoid', 'nome', 'string'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequestUpdate $request, $id)
    {
         $aluno = array
        (
            'nomealuno' =>  strtoupper($request->nomealuno),
            'nmatricula' => $request->nmatricula,
            'status' => $request->status

            
        ); 

        $alunoid = Aluno::find($id);
      
        

        $update = $alunoid->update($aluno);
       
    
        if ($update){
            return redirect()->route('alunos.edit', $id)
            ->with('successupdate', 'Aluno atualizado com sucesso!');
        }else{
            return redirect('alunos/'. $alunoid['id'] .'/edit')
            ->with('danger-update', 'Erro ao atualizar Aluno!');
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
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();


        if($aluno){
            return redirect()
            ->action('AlunoController@index')
            ->with('success', 'Aluno excluido com sucesso!');
        }

        

        // return redirect()->route('alunos.index');
    }
}
