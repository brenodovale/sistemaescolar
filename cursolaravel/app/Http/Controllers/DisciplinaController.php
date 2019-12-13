<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Professor;
use App\Matdisciplina;

use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest;
use App\Http\Requests\DisciplinaRequestUpdate;


use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class DisciplinaController extends Controller
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
        $disciplinas = Disciplina::all();


        return view('disciplina.index', compact('disciplinas'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $professores = Professor::all();
        $nome = 'Cadastrar';

        return view('disciplina.cadastrar', compact('nome', 'professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        $disciplina = array
        (
            'nomedisciplina'  =>  strtoupper($request->nomedisciplina),
            'idprofessor'     => $request->idprofessor,
            'valordisciplina' => $request->valordisciplina


        );

        $insert = Disciplina::create($disciplina);

         if ($insert){
           return redirect()-> route('disciplinas.index');
        }else{
            return redirect()-> route('disciplinas.cadastrar');
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
        $professores = Professor::all();
        $disciplinaid = Disciplina::find($id);
        $nome = 'Editar';

        return view('disciplina/cadastrar', compact('disciplinaid', 'nome', 'professores')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequestUpdate $request, $id)
    {
        $disciplina = array
        (
            'nomedisciplina'  =>  strtoupper($request->nomedisciplina),
            'idprofessor'     => $request->idprofessor,
            'valordisciplina' => $request->valordisciplina


        );

        $disciplinaid = Disciplina::find($id);

        $update = $disciplinaid->update($disciplina);

        if ($update){
            return redirect()-> route('disciplinas.index');
        }else{
            return redirect()-> route('disciplinas.cadastrar');
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
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();

        return redirect()->route('disciplinas.index');
    }


 
}
