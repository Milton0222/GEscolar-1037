<?php

namespace App\Http\Controllers;

use App\Models\avaliacao_professor;
use App\Models\professor;
use App\Models\User;
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

    //metodo visualizar avaliacao docente

    public function avaliarIndex(){

        $sql="SELECT professors.id,professors.nome,
		users.name,users.id as 'userID',
        avaliacao_professors.id as 'avaliacaoID',
        avaliacao_professors.avaliacao1,avaliacao_professors.avaliacao2
        ,avaliacao_professors.avaliacao3,avaliacao_professors.avaliacao4,
        avaliacao_professors.resultado,date(avaliacao_professors.created_at) as 'data'
     FROM professors JOIN avaliacao_professors on(professors.id=avaliacao_professors.professor)
     				 JOIN users on(users.id=avaliacao_professors.avaliador)	;";

          $avaliador=User::where('secretaria',1)->get();
          $professor=professor::get();


          $avaliacao=DB::select($sql);

        return view('cadastro.avaliacaodocente',compact('avaliador','professor','avaliacao'));
    }

    //metodo salvar avaliacao

    public function avaliarStore(Request $request){
        $professor=professor::find($request->professor);

              avaliacao_professor::create([
                'professor'=>$request->professor,
                'avaliador'=>$request->avaliador,
                'avaliacao1'=>$request->avaliacao1,
                'avaliacao2'=>$request->avaliacao2,
                'avaliacao3'=>$request->avaliacao3,
                'avaliacao4'=>$request->avaliacao4,
                'resultado'=>'Bom'
              ]);
           
              alert()->success('Avaliação registada do professor/a.',$professor['nome']);

        return redirect()->route('avaliar.avaliarIndex');
    }
    //metodo actualizar avaliacao

    public function avaliarUpdate(Request $request,$id){

          if($avaliar=avaliacao_professor::find($id)){
              $professor=professor::find($request->professor);

                        $avaliar->update([
                                'professor'=>$request->professor,
                                'avaliador'=>$request->avaliador,
                                'avaliacao1'=>$request->avaliacao1,
                                'avaliacao2'=>$request->avaliacao2,
                                'avaliacao3'=>$request->avaliacao3,
                                'avaliacao4'=>$request->avaliacao4,
                                'resultado'=>'Suficiente'
                        ]);
                        alert()->success('Dados da Avaliação  do professor/a actualizado.',$professor['nome']);

          }

        return redirect()->route('avaliar.avaliarIndex');
    }

    //metodo apagar avaliacao

    public function avaliarDestroy($id){
        if($avaliar=avaliacao_professor::find($id)){
            $avaliar->delete();
            alert()->success('Dados apagados da Avaliação nº',$avaliar['id']);
        }
        return redirect()->route('avaliar.avaliarIndex');
    }
    public function pauta_index()
    {
        return view('professor.pauta');
    }

    //metodo buscar avaliacao de um docente.

    public function avaliarPesquisar(Request $request){

           
        $sql="SELECT professors.id,professors.nome,
		users.name,users.id as 'userID',
        avaliacao_professors.id as 'avaliacaoID',
        avaliacao_professors.avaliacao1,avaliacao_professors.avaliacao2
        ,avaliacao_professors.avaliacao3,avaliacao_professors.avaliacao4,
        avaliacao_professors.resultado,date(avaliacao_professors.created_at) as 'data'
     FROM professors JOIN avaliacao_professors on(professors.id=avaliacao_professors.professor)
     				 JOIN users on(users.id=avaliacao_professors.avaliador)	
    WHERE avaliacao_professors.id=$request->pesquisar;";

          $avaliador=User::where('secretaria',1)->get();
          $professor=professor::get();


          $avaliacao=DB::select($sql);
        
             
          if($buscar=avaliacao_professor::find($request->pesquisar)){

             return view('cadastro.avaliacaodocente',compact('avaliador','professor','avaliacao'));     
          }else{

            alert()->error('Dados não encontrado',$request->pesquisar);
            return redirect()->route('avaliar.avaliarIndex');
          }
       

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
