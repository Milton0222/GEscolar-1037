<?php

namespace App\Http\Controllers;

use App\Models\professor;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    //metodo principal que carrega apagina funcionarios

    public function index(){

           $funcionarios=User::get();

      return view('cadastro.funcionarios',compact('funcionarios'));
    }

//metodo para dar permissao aos funcionarios

    public function userPermission(Request $request, string $id){

          if($userr=User::findorfail($id)){

              if($request->adimin){
                     $userr->update([
                        'adimin'=>1
                     ]);
              }
              if($request->aluno){
                $userr->update([
                    'aluno'=>1
                 ]);

              }
              if($request->professor){
                $userr->update([
                    'professor'=>1
                 ]);

              }
              if($request->secretaria){
                $userr->update([
                    'secretaria'=>1
                 ]);

              }
              alert()->success($userr['name'],'Nivel de acesso atribuido');
          }
              
          
        return redirect()->back();
    }

    //metodo inserir funcionario store
    public function store(Request $request){

          User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make(123456789),
             'Nagente'=>$request->Nagente,
             'data_engreco'=>$request->data_engreco,
             'sexo'=>$request->sexo,
             'habilitacao'=>$request->habilitacao
          ]);

            alert()->success($request->name,'Dados registados');

      return redirect()->route('funcionario.index');
    }

    //metodo apaagar funcionario destroy
  public function destroy($id){
         if($user=User::findorfail($id)){

             $user->delete();
             alert()->success($user['name'],'Dados apagados');
         }

  
      return redirect()->route('funcionario.index');

  }
  //metodo actualizar funcionario update

  public function update(Request $request, $id){

          if($user=User::findorfail($id)){

            $user->update([
              'name'=>$request->name,
              'email'=>$request->email,
               'Nagente'=>$request->Nagente,
               'data_engreco'=>$request->data_engreco,
               'sexo'=>$request->sexo,
               'habilitacao'=>$request->habilitacao

            ]);
            alert()->success($user['name'],'Dados actualizados');
        }


    return redirect()->route('funcionario.index');
  }
  //metodo buscar funcionario

  public function pesquisar(Request $request){

        $funcionarios=User::where('name','LIKE','%'.$request->pesquisar.'%')->get();

    return view('cadastro.funcionarios',compact('funcionarios'));
  }

  public function presencaIndex(Request $request){
        $sql="SELECT professors.id,professors.nome,professors.bi,professors.sexo,professors.datanascimento
        ,professors.grauacademico, professors.contacto,
        presenca_professors.id as 'presencaID',presenca_professors.data_entrada,
        presenca_professors.hora_entrada,presenca_professors.obs
        
      FROM professors JOIN presenca_professors on(professors.id=presenca_professors.professor);";

          $funcionario=DB::select($sql);

          $professor=professor::get();
          $funcionarios=User::get();
       
     return view('cadastro.livrodeponto',compact('funcionario','professor','funcionarios'));
  }
}
