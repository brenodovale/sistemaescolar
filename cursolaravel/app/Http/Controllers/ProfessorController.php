<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Http\Requests\ProfessorRequest;

class ProfessorController extends Controller
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
        $professors = Professor::paginate(5);

        return view('professor.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nome = 'Cadastrar';

        return view('professor/cadastrar', compact('nome'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $professor = array
        (
            'nomeprofessor' =>  strtoupper($request->nomeprofessor),
            
        ); 

            // insere no banco
        $insert = Professor::create($professor);

        // verifica se foi inserido


    
        if ($insert){
           return redirect()-> route('professores.index');
        }else{
            return redirect()-> route('professores.cadastrar');
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
      $show = Curso::find($id);

         return view('professor/cadastrar', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professorid = Professor::find($id);
        $nome = 'Editar';

         return view('professor/cadastrar', compact('professorid', 'nome'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, $id)
    {
        $professor = array
        (
            'nomeprofessor' =>  strtoupper($request->nomeprofessor),
            
        ); 


        $professorid = Professor::find($id);

            // insere no banco
        $update = $professorid->update($professor);

        // verifica se foi inserido


    
        if ($update){
           return redirect()-> route('professores.index');
        }else{
            return redirect()-> route('professores.cadastrar');
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
        
        $professor = Professor::findOrFail($id);
        $professor->delete();

        

         return redirect()->route('professores.index');
    }
}
