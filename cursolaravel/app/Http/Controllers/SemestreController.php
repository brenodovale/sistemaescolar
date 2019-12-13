<?php

namespace App\Http\Controllers;

use App\Semestre;

use Illuminate\Http\Request;
use App\Http\Requests\SemestreRequest;

class SemestreController extends Controller
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
        $semestres = Semestre::paginate(5);

        return view('semestre.index', compact('semestres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $nome = 'Cadastrar';

        return view('semestre/cadastrar', compact('nome')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemestreRequest $request)
    {
        
        $semestre = array
        (
            'ano' => $request->ano,
            
        ); 

            // insere no banco
        $insert = Semestre::create($semestre);

        // verifica se foi inserido


    
        if ($insert){
           return redirect()-> route('semestres.index');
        }else{
            return redirect()-> route('semestres.cadastrar');
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
        $show = Semestre::find($id);

         return view('semestre/cadastrar', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anoid = Semestre::find($id);
        $nome = 'Editar';

         return view('semestre/cadastrar', compact('anoid', 'nome'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SemestreRequest $request, $id)
    {
        $semestre = array
        (
            'ano' => $request->ano,
            
        ); 


        $anoid = Semestre::find($id);

          
        $update = $anoid->update($semestre);

      


    
        if ($update){
           return redirect()-> route('semestres.index');
        }else{
            return redirect()-> route('semestres.cadastrar');
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
        $semestre = Semestre::findOrFail($id);
        $semestre->delete();

        

         return redirect()->route('semestres.index');
    }
}
