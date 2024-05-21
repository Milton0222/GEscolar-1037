<?php

namespace App\Http\Controllers;

use App\Models\professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class professorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $professores=professor::paginate(10);
        return view('cadastro.professor',compact('professores'));
    }


    public function pauta_index()
    {
        return view('professor.pauta');
    }
    public function ProfessorDisciplina(string $id){

        $sql="SELECT professors.id as 'professor',professors.nome as 'professor',professors.bi,professors.grauacademico,
        disciplinas.nome ,disciplinas.id
      FROM professors JOIN professor_disciplinas  on(professors.id=professor_disciplinas.professor)
                      JOIN disciplinas on(disciplinas.id=professor_disciplinas.disciplina)
        WHERE professors.id=$id";

        $disciplinas=DB::select($sql);
        $professor=professor::get();

        return view('cadastro.disciplina',compact('disciplinas','professor'));

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
    
       professor::create($request->all());
              alert()->success($request->nome,'Registado.');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //

        $professores=professor::where('bi','LIKE',$request->pesquisar)->orWhere('id',$request->pesquisar)->paginate(10);

        return view('cadastro.professor',compact('professores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
          if($professore=professor::findorfail($id)){
                $professore->delete();

                alert()->success($professore['nome'],'Apagado.');

                return redirect()->back();
          }else{
            alert()->error($id,'Não encontrando.');
            return redirect()->back();
          }
    }
}
