<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Matdisciplina;
use App\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\MatdisciplinaRequest;


use Illuminate\Support\Facades\DB;

class MatdisciplinaController extends Controller
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
        $matdisciplinas = Matdisciplina::all();

        return view('matdisciplina.index', compact('matdisciplinas'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matriculas =Matricula::all();
        
        $disciplinas = Disciplina::all();


        $nome = "Cadastrar";

        return view('matdisciplina.cadastrar', compact('matriculas','nome', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatdisciplinaRequest $request)
    {
        $matdisciplina = array
        (
            'idmatricula'      => $request->idmatricula,
            'iddisciplina'     => $request->iddisciplina,
            'valor'            => $request->valor,
        );


        $users = DB::table('matdisciplinas')
            ->join('matriculas', 'matriculas.id', '=', 'matdisciplinas.idmatricula')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idaluno')
            ->join('disciplinas', 'disciplinas.id', '=', 'matdisciplinas.iddisciplina')
            ->where('matriculas.id','=', $request->idmatricula)
            ->where('disciplinas.id','=', $request->iddisciplina)
            ->count();

        if($users == 0){    

            $insert = Matdisciplina::create($matdisciplina);
            return redirect()
            ->route('matdisciplinas.create')
            ->with('success', 'O aluno foi matriculado na Disciplina !');
        }else{
            return redirect()
            ->route('matdisciplinas.create')
            ->with('error', 'O aluno ja esta matriculado nessa Disciplina !');
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
        $matriculas =Matricula::all();
        $disciplinas = Disciplina::all();
        $matdisciplinaid = Matdisciplina::find($id);
        $nome = 'Editar';

        return view('matdisciplina/cadastrar', compact('matdisciplinaid', 'nome', 'matriculas','disciplinas'));
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
        
        $matdisciplina = array
        (
            'idmatricula'      => $request->idmatricula,
            'iddisciplina'     => $request->iddisciplina,
            'valor'            => $request->valor,
        );

        $matdisciplinaid = Matdisciplina::find($id);

        $users = DB::table('matdisciplinas')
        /* ->where('idmatricula','=', $request->idmatricula) */
        ->where('iddisciplina','=', $request->iddisciplina)
        /* ->where('id', '=!', $id) */
        ->count();
        
           
       if($users == 0){ 



            
           $update = $matdisciplinaid->update($matdisciplina);
            return redirect()
            ->route('matdisciplinas.edit', $matdisciplinaid)
            ->with('success', 'A Disciplina do aluno foi atualizada com Sucesso !');
        }else{
           
              
         
           
           
           
             return redirect()
            ->route('matdisciplinas.edit', $matdisciplinaid)
            ->with('error', 'O aluno ja esta matriculado nessa Disciplina !');
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
        $matdisciplina = Matdisciplina::findOrFail($id);
        $matdisciplina->delete();

        return redirect()->route('matdisciplinas.index');
    }
}
