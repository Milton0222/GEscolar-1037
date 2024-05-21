<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\disciplina;
use App\Models\professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class classeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classe=classe::paginate(10);
        $disciplina=disciplina::get();

        return view('cadastro.classe', compact('classe','disciplina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
  

        classe::create(['nome'=>$request->nome]);
            Alert()->success($request->nome,'Registado.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function classeDisciplina(string $id)
    {
        //
        $sql="SELECT disciplinas.id, disciplinas.nome, classes.nome as 'classe'
        FROM disciplinas JOIN classe_disciplinas  on(disciplinas.id=classe_disciplinas.disciplina)
                        JOIN classes on(classes.id=classe_disciplinas.classe)
          WHERE classes.id=$id";

          $disciplinas=DB::select($sql);
          $professor=professor::get();

          return view('cadastro..disciplina', compact('disciplinas','professor'));
    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if($classe=classe::findorfail($id)){
                    $classe->delete();

            alert()->success($classe['nome'],'Apagado.');

            return redirect()->back();

        }else{
            alert()->error($id,'Não encontrado.');
            return redirect()->back();
        }
    }
}
