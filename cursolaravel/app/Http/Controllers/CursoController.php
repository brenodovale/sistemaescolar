<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests\CursoRequest;
use App\Http\Requests\CursoRequestUpdate;


class CursoController extends Controller
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

    public function index(Curso $curso)
    {
       
        $cursos = Curso::paginate(5);

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    { 
         $nome = 'Cadastrar';

        return view('curso/cadastrar', compact('nome'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        // pega os dados do formulario
        $curso = array
        (
            'nomecurso' =>  strtoupper($request->nomecurso),
            'valorcurso' => $request->valorcurso
        ); 

            // insere no banco
        $insert = Curso::create($curso);

        // verifica se foi inserido


    
        if ($insert){
           return redirect()-> route('cursos.index');
        }else{
            return redirect()-> route('cursos.cadastrar');
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

         return view('curso/cadastrar', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cursoid = Curso::find($id);
        $nome = 'Editar';

         return view('curso/cadastrar', compact('cursoid', 'nome'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequestUpdate $request, $id)
    {

        $curso = array
        (
            'nomecurso' =>  strtoupper($request->nomecurso),
            'valorcurso' => $request->valorcurso
        ); 


        $cursoid = Curso::find($id);

        $update = $cursoid->update($curso);

        //$update = $this->insta->update($cursoat);


        if ($update){
            return redirect()-> route('cursos.index');
        }else{
            return redirect()-> route('cursos.cadastrar');
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

        $curso = Curso::findOrFail($id);
        $curso->delete();

        

         return redirect()->route('cursos.index');
    }
}
