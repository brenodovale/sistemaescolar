<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Aluno;
use App\Curso;
use App\Semestre;
use App\Turma;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\MatriculaRequest;


class MatriculaController extends Controller
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
         $matriculas = Matricula::paginate(5);

        return view('matricula.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all();

        $cursos = Curso::all();

        $semestres = Semestre::all();

        $turmas = Turma::all();

    
        $nome = 'Matricular';
        return view('matricula.cadastrar', compact('alunos', 'cursos','semestres', 'turmas', 'nome'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaRequest $request)
    {

       



        $matricula = array
        (
            'nomeprofessor'  => $request->nomeprofessor,
            'idcurso'        => $request->idcurso,
            'idaluno'        => $request->idaluno,
            'idsemestre'     => $request->idsemestre,
            'idturma'        => $request->idturma,
            'valormatricula' => $request->valormatricula,
            
        );
        
        $users = DB::table('matriculas')
        ->join('alunos', 'alunos.id', '=', 'matriculas.idaluno')
        ->join('semestres', 'semestres.id', '=', 'matriculas.idsemestre')
        ->where('alunos.id', '=',$request->idaluno)
        ->where('semestres.id','=', $request->idsemestre)
        ->count();
        
        if($users == 0){


            // insere no banco
        $insert = Matricula::create($matricula);
        return redirect()
        ->route('matriculas.create')
        ->with('success',' O Aluno foi matriculado com Sucesso !');
        
    
    }

    else{
            return redirect()
            ->route('matriculas.create')
            ->with('error','Erro, o aluno já está matriculado nesse Curso/Semestre !');
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
        $aluno = Aluno::where('id', $id)->first();

        echo "<p> Nome: {$aluno->nomealuno} </p>";
        echo "<p> Staus: {$aluno->status} </p>";

        $matricula = $aluno->matricula()->first();
       


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alunos = Aluno::all();

        $cursos = Curso::all();

        $semestres = Semestre::all();

        $turmas = Turma::all();
        
        $matriculaid = Matricula::find($id);
        $nome = 'Editar';

        return view('matricula/cadastrar', compact('matriculaid', 'nome', 'alunos', 'cursos','semestres', 'turmas'));  
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
        $matricula = array
        (
            'nomeprofessor'  => $request->nomeprofessor,
            'idcurso'        => $request->idcurso,
            'idaluno'        => $request->idaluno,
            'idsemestre'     => $request->idsemestre,
            'idturma'        => $request->idturma,
            'valormatricula' => $request->valormatricula,
            
        );

        $matriculaid = Matricula::find($id);

        $users = DB::table('matriculas')
        ->join('alunos', 'alunos.id', '=', 'matriculas.idaluno')
        ->join('semestres', 'semestres.id', '=', 'matriculas.idsemestre')
        ->where('alunos.id', '=',$request->idaluno)
        ->where('semestres.id','=', $request->idsemestre)
        ->where('matriculas.id','=!', $id)
        ->count();

        if($users == 0){
            
            $update = $matriculaid->update($matricula);
        
            return redirect()
            ->route('matriculas.edit', $matriculaid)
            ->with('success',' O Aluno foi atualizado com Sucesso !');

        }else{
            return redirect()
            ->route('matriculas.edit', $matriculaid)
            ->with('error','Erro, o aluno já está matriculado nesse Curso/Semestre !');
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
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('matriculas.index');
    }
}
