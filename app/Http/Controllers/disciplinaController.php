<?php

namespace App\Http\Controllers;

use App\Models\classe_disciplina;
use App\Models\disciplina;
use App\Models\professor;
use App\Models\Professor_disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class disciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $disciplinas=disciplina::paginate(10);
        $professor=professor::get();

        return view('cadastro.disciplina',compact('disciplinas','professor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lecionar(Request $request)
    {
        //
                if($prof=professor::findorfail($request->professor)){
                         Professor_disciplina::create([
                            'professor'=>$request->professor,
                            'disciplina'=>$request->disciplina
                         ]);

                         Alert()->success($prof['nome'],'Discplina atribuida.');
                }else{
                    alert()->error($request->professor,'Não encontrado...');
                }

                return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $disciplina=disciplina::where('nome',$request->nome)->first();
        if($disciplina){ 
            alert()->error($request->nome,'Já existe.');
        }else{
            disciplina::create($request->all());
            alert()->success($request->nome,'Registado.');
        }
        

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function selecionar(Request $request)
    {
        //
      
              if($disciplina=disciplina::findorfail($request->disciplina)){
                        classe_disciplina::create([
                            'disciplina'=>$request->disciplina,
                            'classe'=>$request->classe
                        ]);
                       Alert()->success($disciplina['nome'],'Atribuida á classe selecinada.'); 
              }else{
                Alert()->error($request->disciplina,' Não atribuida á classe selecinada.');
              }

              return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function disciplinaProfessor(string $id)
    {
        //
        $sql="SELECT professors.id,professors.nome,professors.bi,professors.grauacademico,professors.sexo,
		professors.contacto,professors.municipio,professors.morada
      
      FROM professors JOIN professor_disciplinas  on(professors.id=professor_disciplinas.professor)
                      JOIN disciplinas on(disciplinas.id=professor_disciplinas.disciplina)
        WHERE disciplinas.id=$id";

        $professores=DB::select($sql);

        return view('cadastro.professor',compact('professores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        if($disc=disciplina::find($id)){
            $disc->update([
                'nome'=>$request->nome
            ]);

            alert()->success($disc['nome'],'Actualizado');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

       if( $disciplinas=disciplina::findorfail($id)){
                $disciplinas->delete();
                alert()->success($disciplinas['nome'],'Apagado.');

                return redirect()->back();
       }else{
        alert()->error($id,'Não encontrado');
        return redirect()->back();
           }
    }
}
