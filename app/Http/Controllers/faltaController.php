<?php

namespace App\Http\Controllers;

use App\Models\estudante;
use App\Models\presenca;
use App\Models\turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class faltaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
              $faltas=presenca::get();

              return view('cadastro.faltas',compact('faltas'));
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
       if($estudante=estudante::find($request->estudante)) {
        if($request->tipo=='F'){
            presenca::create([
                'data'=>$request->data,
                'estudante'=>$request->estudante,
                'turma'=>$request->turma,
                'tipo'=>'F'
              ]);

        }elseif($request->tipo=='P'){
            presenca::create([
                'data'=>$request->data,
                'estudante'=>$request->estudante,
                'turma'=>$request->turma,
                'tipo'=>'P'
              ]);
    
        }

       }
    
          Alert::info($estudante['nome'],'Presença registada.');
          return redirect()->route('turma.aluno',$request->turma);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
  $turma="";
  $anoLectivo="";
  $turmaid="";

        $sql="SELECT estudantes.id,estudantes.nome,estudantes.bi,
       matriculas.anoLectivo, turmas.nome as 'turma',turmas.periodo, turmas.id as 'turmaid'
      FROM estudantes JOIN matriculas on(estudantes.id=matriculas.estudante)
      				JOIN turmas on(turmas.id=matriculas.turma)
     WHERE turmas.id=$id";

            $estudantes=DB::select($sql);

                $turmas=turma::find($id);

            foreach($estudantes as $lista){
                   $turma=$lista->turma;
                   $anoLectivo=$lista->anoLectivo;
                   $turmaid=$lista->turmaid;

            }
                     

            return view('cadastro.presencaAluno', compact('estudantes','turmas','turma','anoLectivo','id','turmaid'));


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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
