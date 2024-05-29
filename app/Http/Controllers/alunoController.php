<?php

namespace App\Http\Controllers;

use App\Models\{classe,estudante};
use Illuminate\Http\Request;


class alunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $alunos=estudante::paginate(10);
        $classe=classe::get();
return view('cadastro.aluno', compact('alunos','classe'));

    }
    public function recibo(string $id){

        return view('cadastro.recibo');
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

        $anoAActual=date('Y');
        $anoNascimento= explode('-',$request->datanascimento);

        if($request->foto !=null){
            $estensao=$request->foto->extension();
            $nomeFoto=strtotime('now').'.'.$estensao;
            $request->foto->move(public_path('assetes/FotoAluno'),$nomeFoto);

            estudante::create([
                'nome'=>$request->nome,
                                'bi'=>$request->bi,
                                'sexo'=>$request->sexo,
                                'idade'=>$anoAActual-$anoNascimento[0],
                                'nomemae'=>$request->nomemae,
                                'nomepai'=>$request->nomepai,
                                'datanascimento'=>$request->datanascimento,
                                'contacto'=>$request->contacto,
                                'municipio'=>$request->municipio,
                                'morada'=>$request->morada,
                                'naturalidade'=>$request->naturalidade,
                                'foto'=>$nomeFoto
             ]);

        }else{   
     
         estudante::create([
            'nome'=>$request->nome,
                            'bi'=>$request->bi,
                            'sexo'=>$request->sexo,
                            'idade'=>$anoAActual-$anoNascimento[0],
                            'nomemae'=>$request->nomemae,
                            'nomepai'=>$request->nomepai,
                            'datanascimento'=>$request->datanascimento,
                            'contacto'=>$request->contacto,
                            'municipio'=>$request->municipio,
                            'morada'=>$request->morada,
                            'naturalidade'=>$request->naturalidade
         ]);
        }
                Alert()->success($request->nome,'Registado');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //

        $alunos=estudante::where('bi','LIKE','%'.$request->pesquisar.'%')->orWhere('id',$request->pesquisar)->paginate(10);

        $classe=classe::get();

        return view('cadastro.aluno',compact('alunos','classe'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    

        $anoAActual=date('Y');
        $anoNascimento= explode('-',$request->datanascimento);


        if($aluno=estudante::find($id)){
            $aluno->update([
                'nome'=>$request->nome,
                'bi'=>$request->bi,
                'sexo'=>$request->sexo,
                'nomepai'=>$request->nomepai,
                'nomemae'=>$request->nomemae,
                'morada'=>$request->morada,
                'naturalidade'=>$request->naturalidade,
                'contacto'=>$request->contacto,
                'datanascimento'=>$request->datanascimento,
                'idade'=>$anoAActual-$anoNascimento[0],
            ]);

            Alert()->success($request->nome,'Dados Actualizados');
        
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
           if($aluno=estudante::findorfail($id)){
                    $aluno->delete();

                   alert()->success($aluno['nome'],'Apagado');

                   return redirect()->back();
           }
    }
}
