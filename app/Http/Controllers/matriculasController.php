<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\estudante;
use App\Models\matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class matriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //buscar lista de matriculado

        $sql="SELECT estudantes.nome,estudantes.bi,estudantes.sexo, estudantes.idade, estudantes.id  as 'eestudante',estudantes.datanascimento,
        classes.nome as 'classe', matriculas.anoLectivo,DATE(matriculas.created_at) as 'data',matriculas.id
     FROM estudantes JOIN matriculas on(matriculas.estudante=estudantes.id)
         JOIN classes on(classes.id=matriculas.classe) ;";

        $matriculados=DB::select($sql);

        $classe=classe::get();

        return view('cadastro.matricula', compact('matriculados','classe'));
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
       
          $aluno=estudante::findorfail($request->estudante);
          if($aluno){
            matricula::create([
                'estudante'=>$request->estudante
                ,'classe'=>$request->classe
                ,'anoLectivo'=>$request->anoLectivo
                ,'turma'=>$request->turma
            ]);
            alert()->success($aluno['nome'],'Matricula confirmada');

          }else{
               alert()->error('Matricula','Não confirmada estudante não foi inscrito');
          }

     

        return redirect()->route('matricula.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
           $aluno=estudante::findorfail($id);

               $classe=classe::get();
               $sql="SELECT turmas.id,turmas.nome, classes.nome as 'classe'
               FROM turmas JOIN classes on(classes.id=turmas.classe);";

               $turma=DB::select($sql);

           return view('cadastro.matricula1', compact('aluno','classe','turma'));
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
        if($matricula=matricula::findorfail($id)){
              $matricula->delete();
              Alert()->success($id,'Matricula apagada.');
        }
        return redirect()->back();
    }
}
