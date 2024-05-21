<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\disciplina;
use App\Models\estudante;
use App\Models\pauta;
use App\Models\pauta_estudante;
use App\Models\turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pautaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function VerPauta(){

        $sql="SELECT turmas.id,turmas.nome, turmas.periodo
        ,classes.nome as 'classe'
      FROM turmas JOIN classes on(turmas.classe=classes.id);";

        $turmas=DB::select($sql);

        $sql="SELECT pautas.id,pautas.anoLectivo,pautas.trimestre,date(pautas.created_at) as 'data',
        turmas.nome, turmas.periodo,turmas.id as 'turmaId',
        classes.nome as 'classe', classes.id as 'classeId'
        
     FROM pautas JOIN turmas on(pautas.turma=turmas.id)
                     JOIN classes on(classes.id=turmas.classe);";

        $pautas=DB::select($sql);

        return view('cadastro.Verpautas', compact('pautas','turmas'));
    }
    public function index()
    {
       

                   

        $turma=estudante::get();
            $classe=classe::get();
        return view('cadastro.pauta',compact('turma','classe'));
    }
    public function consultarPauta(Request $request){

       $sql=" SELECT 
		classes.nome as 'classe', turmas.nome as 'turma',turmas.periodo,estudantes.nome,
    	 pautas.nota,disciplinas.nome as 'disciplina', pautas.classificacao
        FROM estudantes JOIN pautas on(pautas.estudante=estudantes.id)
        				JOIN disciplinas on(pautas.disciplina=disciplinas.id)
                        JOIN matriculas on(estudantes.id=matriculas.estudante)
                        JOIN turmas on(turmas.id=matriculas.turma)
                        JOIN classes on(classes.id=turmas.classe)
             
                        JOIN professors on(pautas.professor=professors.id)
                 WHERE (pautas.estudante=$request->id) AND (pautas.anoLectivo='$request->anoLectivo') and classes.id=$request->classe;";

                 $pauta=DB::select($sql);
                 $classe='';
                 $periodo='';
                 $turma='';
                 $estudante='';
                 $anoLectivo=$request->anoLectivo;
                 foreach($pauta as $lista){
                        $classe=$lista->classe;
                        $periodo=$lista->periodo;
                        $turma=$lista->turma;
                        $estudante=$lista->nome;
                 }
             
                 return view('cadastro.pautaGeral',compact('pauta','classe','periodo','turma','anoLectivo','estudante'));
        			
    }


    /**
     * Show the form for creating a new resource.
     */
    public function elaborar(Request $request)
    {
        //
        $lectivo=$request->anoLectivo;
        $classe1=classe::find($request->classe);
        $sql="SELECT turmas.id,turmas.nome, turmas.periodo,turmas.classe as 'idclasse',classes.nome as 'nclasse'
		FROM turmas JOIN classes on(classes.id=turmas.classe);";

        $turma=DB::select($sql);
            $classe=classe::get();

            $sql="SELECT estudantes.id,estudantes.nome,estudantes.bi,estudantes.sexo,
            estudantes.idade,estudantes.datanascimento,turmas.id as 'idturma'
            FROM matriculas JOIN estudantes on(estudantes.id=matriculas.estudante)
                            JOIN turmas on(turmas.id=matriculas.turma)
                         WHERE matriculas.anoLectivo='$request->anoLectivo' AND matriculas.turma=$request->turma;";

                      $estudante=DB::select($sql);   

        $sql="SELECT professors.id, professors.nome,
        disciplinas.nome as 'disciplina',disciplinas.id as 'iddisc',
        turmas.nome as 'turma',turmas.periodo,classes.nome 'classe'
        
        FROM professors JOIN professor_disciplinas on(professors.id=professor_disciplinas.professor)
                   JOIN disciplinas on(disciplinas.id=professor_disciplinas.disciplina)
                   JOIN classe_disciplinas on(disciplinas.id=classe_disciplinas.disciplina)
                   JOIN classes on(classes.id=classe_disciplinas.classe)
                   JOIN turmas on(turmas.classe=classes.id)
              WHERE turmas.id=$request->turma;";

              $professor=DB::select($sql);
                $nomeCl=$classe1['nome'];

                $pauta=$request->pauta;

            
                
        return view('cadastro.pauta1', compact('turma','classe','estudante','nomeCl','lectivo','professor','pauta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
       
            pauta::create([
                'anoLectivo'=>$request->anoLectivo,
                'trimestre'=>$request->trimestre,
                'turma'=>$request->turma,
                'funcionario'=>$request->funcionario,
               
             ]);

     
                /*
                  */

                     return redirect()->route('ver.pauta');  
    }
    public function Store2(Request $request){

          
            $mediad=($request->avaliacao1 +$request->avaliacao2+ $request->avaliacao3)/3;

            if($mediad>=10){
                pauta_estudante::create([
                    'pauta'=>$request->pauta,
                    'disciplina'=>$request->disciplina,
                    'aluno'=>$request->estudante,
                    'falta'=>0,
                    'avaliacao1'=>$request->avaliacao1,
                    'avaliacao2'=>$request->avaliacao2,
                    'avaliacao3'=>$request->avaliacao3,
                    'media'=>$mediad,
                    'classificacao'=>'Apto'
                ]);

            }else{
                pauta_estudante::create([
                    'pauta'=>$request->pauta,
                    'disciplina'=>$request->disciplina,
                    'aluno'=>$request->estudante,
                    'falta'=>0,
                    'avaliacao1'=>$request->avaliacao1,
                    'avaliacao2'=>$request->avaliacao2,
                    'avaliacao3'=>$request->avaliacao3,
                    'media'=>$mediad,
                    'classificacao'=>'N/Apto'
                ]);
                

            }

            $estudante=estudante::findorfail($request->estudante);
            $disc=disciplina::find($request->disciplina);
                 alert()->success($estudante['nome'],$disc['nome']);
             
        return redirect()->route('ver.pauta');
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
             $pauta=pauta::findorfail($id);
               
                $pauta->delete();
                alert()->success($pauta['id'],'Apagado com sucesso');

                return redirect()->route('ver.pauta');
    }
}
