<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
}
