<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class turmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sql="SELECT turmas.id,turmas.nome,turmas.periodo,turmas.quantidade,
        classes.nome as 'classe'
        FROM turmas JOIN classes on(turmas.classe=classes.id)";
        $classe=classe::get();
        $turmas=DB::select($sql);

        return view('cadastro.turma',compact('classe','turmas'));
    }
    public function turmaAluno(string $id){

        $sql="SELECT matriculas.id,estudantes.nome,estudantes.sexo,estudantes.idade,estudantes.bi,estudantes.datanascimento,
	    classes.nome as 'classe',matriculas.anoLectivo
        FROM estudantes
         JOIN matriculas on(estudantes.id=matriculas.estudante)
         JOIN turmas on(matriculas.turma=turmas.id)
         JOIN classes on(classes.id=turmas.classe)
       WHERE turmas.id=$id";

       $matriculados=DB::select($sql);

       return view('cadastro.matricula',compact('matriculados'));
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
        turma::create($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        if($turma=turma::findorfail($id)){
              $turma->delete();
              alert()->success($turma['nome'],'Apagado.');

              return redirect()->back();
        }else{
            alert()->error($id,'Não encontrado.');

            return redirect()->back();
        }
    }
}
