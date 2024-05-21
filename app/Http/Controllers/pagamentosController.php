<?php

namespace App\Http\Controllers;

use App\Models\estudante;
use App\Models\propina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pagamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sql="SELECT estudantes.nome,estudantes.bi,estudantes.sexo, estudantes.idade, estudantes.id,
        classes.nome as 'classe', matriculas.anoLectivo,DATE(matriculas.created_at) as 'data'
     FROM estudantes JOIN matriculas on(matriculas.estudante=estudantes.id)
         JOIN classes on(classes.id=matriculas.classe)
          where estudantes.id=0
           order by matriculas.id DESC;";

            $matriculado=DB::select($sql);

            $sql="SELECT  estudantes.id,estudantes.nome, estudantes.sexo
            ,propinas.mes,propinas.anoLectivo,propinas.created_at
            FROM estudantes JOIN propinas on(estudantes.id=propinas.estudante)
                            JOIN matriculas on(estudantes.id=matriculas.estudante)";
                     $pago=DB::select($sql);       
        return view('cadastro.pagamentos',compact('matriculado','pago'));
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
        // dd($request->all());
        if($aluno=estudante::findorfail($request->estudante)){
            $data= explode('-',$request->mes);
            propina::create([
              'estudante'=>$request->estudante,
              'usuario'=>Auth::user()->id,
              'valor'=>$request->valor,
              'mes'=>$data[1],
              'anoLectivo'=>$request->anoLectivo
            ]);

            alert()->success($aluno['nome'],'Comparticipação paga');

        }else
        alert()->success($request->estudante,' Não consta na base de dado.');

        return redirect()->route('comparticipar.index');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
      
        $sql="SELECT estudantes.nome,estudantes.bi,estudantes.sexo, estudantes.idade, estudantes.id,
        classes.nome as 'classe', matriculas.anoLectivo,DATE(matriculas.created_at) as 'data'
     FROM estudantes JOIN matriculas on(matriculas.estudante=estudantes.id)
         JOIN classes on(classes.id=matriculas.classe)
         WHERE estudantes.bi LIKE '$request->pesquisar' OR estudantes.id=$request->pesquisar
           order by matriculas.id DESC;";

            $matriculado=DB::select($sql);

          if($matriculado)
              alert()->success($request->pesquuisar,'Encontrado');
            else
              alert()->error($request->pesquisar,'Não encontrado');


              $sql="SELECT  estudantes.id,estudantes.nome, estudantes.sexo
              ,propinas.mes,propinas.anoLectivo,propinas.created_at
              FROM estudantes JOIN propinas on(estudantes.id=propinas.estudante)
                              JOIN matriculas on(estudantes.id=matriculas.estudante)";
                       $pago=DB::select($sql);  

            return view('cadastro.pagamentos', compact('matriculado','pago'));
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
    }
}
