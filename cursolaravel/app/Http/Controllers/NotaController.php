<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Matdisciplina;
use App\Disciplina;
use App\Matricula;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Requests\NotaRequest;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matdisciplinas = Matdisciplina::all(); 
        $notas = Nota::all();

        return view('nota.index', compact('matdisciplinas', 'notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $matdisciplinas = Matdisciplina::all(); 
        $matriculas = Matricula::all();
        $nome = 'Lançar';
        return view('nota.cadastrar', compact( 'nome', 'matriculas','matdisciplinas'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotaRequest $request)
    {
        $notas = array(
            'idmatdisciplinas' => $request->idmatdisciplinas,
            'nota'             => $request->nota,
            'referencia'       => $request->referencia,
        );

        $users = DB::table('notas')
        ->join('matdisciplinas', 'matdisciplinas.id', '=', 'notas.idmatdisciplinas')
        ->where('matdisciplinas.id','=', $request->idmatdisciplinas)
        ->where('notas.referencia','=', $request->referencia)
        ->count();

        if($users == 0){

        $insert = Nota::create($notas);
        return redirect()
        ->route('notas.create')
        ->with('success',' A nota foi lançada com sucesso !');

        }else{
        return redirect()
        ->route('notas.create')
        ->with('error','Erro, essa nota ja foi Lançada !');
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
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $notaid = Nota::find($id);


        $notas = Nota::all();
        $matdisciplinas = Matdisciplina::all(); 
        $matriculas = Matricula::all();
        $nome = 'Editar';
        return view('nota.cadastrar', compact( 'nome', 'matriculas','matdisciplinas', 'notaid','notas'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('notas.index');
    }

}
