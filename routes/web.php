<?php

use App\Http\Controllers\alunoController;
use App\Http\Controllers\classeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\disciplinaController;
use App\Http\Controllers\matriculasController;
use App\Http\Controllers\pagamentosController;
use App\Http\Controllers\pautaController;
use App\Http\Controllers\professorController;
use App\Http\Controllers\turmaController;


use App\Models\classe;
use App\Models\estudante;
use App\Models\pauta;
use App\Models\professor;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
          $aluno=estudante::count();
          $professor=professor::count();
          $user=User::count();

          $sql="SELECT turmas.id,turmas.nome, turmas.periodo,turmas.classe as 'idclasse',classes.nome as 'nclasse'
          FROM turmas JOIN classes on(classes.id=turmas.classe);";
  
          $turma=DB::select($sql);
              $classe=classe::get();
        return view('dashboard',compact('aluno','professor','user','turma','classe'));
    })->name('dashboard');



    Route::get('/definicoes', function () {
        $usuarios=User::get();
        return view('definicoes',compact('usuarios'));
    })->name('v-definicoes');
    
    //user
        Route::get('/user/{id}',[Controller::class, 'userPermission'])->name('user.permission');
        Route::get('/ver/funcionarios', [Controller::class, 'index'])->name('funcionario.index');
        Route::post('/salvar/funcionario',[Controller::class, 'store'])->name('funcionario.store');
        Route::delete('/apagar/funcionario/{id}',[Controller::class, 'destroy'])->name('funcionario.delete');
        Route::put('/actualizar/funcioonario/{id}',[Controller::class, 'update'])->name('funcionario.update');
        Route::get('/pesquisar/funcionario',[Controller::class, 'pesquisar'])->name('funcionario.pesquisar');
        Route::get('/livro/ponto',[Controller::class,'presencaIndex'])->name('ponto.ver');
        Route::post('/ponto/salvar',[Controller::class,'storePonto'])->name('ponto.storePonto');
        Route::delete('/ponto/apagar/{id}',[Controller::class ,'destroyPonto'])->name('ponto.destroyPonto');
        Route::put('/ponto/actualiza/{id}',[Controller::class,'pontoUpdate'])->name('ponto.pontoUpdate');
    
    //alunos
    
    Route::get('/cadastro/aluno',[alunoController::class,'index'])->name('v-aluno')->middleware('adimin');
    Route::post('/aluno/salvar',[alunoController::class, 'store'])->name('aluno.store')->middleware('adimin');
    Route::get('/aluno/buscar',[alunoController::class,'show'])->name('aluno.pesquisar')->middleware('adimin');
    Route::get('/aluno/{id}',[alunoController::class,'destroy'])->name('aluno.destroy')->middleware('adimin');
    
    //matricula
    
    Route::get('/matricula',[matriculasController::class,'index'])->name('matricula.index')->middleware('adimin');
    Route::post('/fazer/matricula',[matriculasController::class,'store'])->name('aluno.matricular')->middleware('adimin');
    Route::get('/matricula/{id}',[matriculasController::class,'destroy'])->name('matricula.destroy')->middleware('adimin');
    Route::get('/buscar/aluno/{id}',[matriculasController::class,'show'])->name('aluno.ver');
    
    //pagamento
    
    Route::get('aluno/recibo/{id}',[alunoController::class, 'recibo'])->name('recibo.show');
    Route::get('/comparticipar',[pagamentosController::class,'index'])->name('comparticipar.index')->middleware('adimin');
    Route::get('/buscar/utente',[pagamentosController::class,'show'])->name('comparticipar.buscar')->middleware('adimin');
    Route::POST('/salvar/pagamento',[pagamentosController::class,'store'])->name('comparticipar.pagar')->middleware('adimin');

    
    //professores
    
    Route::get('/cadastro/prof', [professorController::class,'index'])->name('v-Prof')->middleware('adimin');
    Route::post('/professor/salvar', [professorController::class,'store'])->name('professor.store')->middleware('adimin');
    Route::get('/professor/buscar', [professorController::class,'show'])->name('professor.pesquisar')->middleware('adimin');
    Route::get('/professor/{id}', [professorController::class,'destroy'])->name('professor.destroy')->middleware('adimin');
    Route::get('/professor/disciplina/{id}',[professorController::class ,'ProfessorDisciplina'])->name('professor.ver')->middleware('adimin');

    //Avaliacao professor
    Route::get('/avaliar/docente',[professorController::class,'avaliarIndex'])->name('avaliar.avaliarIndex');
    Route::post('/avaliar/docente/salvar',[professorController::class,'avaliarStore'])->name('avaliar.storep');
    Route::put('/avaliacao/actualizar/{id}',[professorController::class,'avaliarUpdate'])->name('avaliar.update');
    Route::delete('/avaliacao/apagar/{id}',[professorController::class,'avaliarDestroy'])->name('avaliar.destroy');
    Route::get('/avaliacao/pesquisar',[professorController::class,'avaliarPesquisar'])->name('avaliar.pesquisar');
    
    //classe
    
    Route::get('/cadastro/classe',[classeController::class, 'index'])->name('classe.index')->middleware('adimin');
    Route::post('/cadastro/salvar',[classeController::class, 'store'])->name('classe.store')->middleware('adimin');
    Route::get('/classe/{id}',[classeController::class, 'destroy'])->name('classe.destroy')->middleware('adimin');
    Route::get('/classe/disciplina/{id}',[classeController::class,'classeDisciplina'])->name('classe.ver')->middleware('adimin');
    
    
    //turmas
    
    Route::get('/cadastro/turma',[turmaController::class, 'index'])->name('turma.index')->middleware('adimin');
    Route::post('/turma/salvar',[turmaController::class, 'store'])->name('turma.store')->middleware('adimin');
    Route::get('/turma/{id}',[turmaController::class, 'destroy'])->name('turma.destroy')->middleware('adimin');
    Route::get('turma/aluno/{id}',[turmaController::class ,'turmaAluno'])->name('turma.ver')->middleware('adimin');
    
    //disciplina
    Route::get('/cadastrar/disciplina',[disciplinaController::class, 'index'])->name('disciplina.index')->middleware('adimin');
    Route::post('/disciplina/salvar',[disciplinaController::class, 'store'])->name('disciplina.store')->middleware('adimin');
    Route::get('/disciplina/{id}',[disciplinaController::class, 'destroy'])->name('disciplina.destroy')->middleware('adimin');
    Route::post('/disciplina/class',[disciplinaController::class,'selecionar'])->name('disciplina.classe')->middleware('adimin');
    Route::post('/disciplina/professor',[disciplinaController::class,'lecionar'])->name('disciplina.lecionar')->middleware('adimin');
    Route::get('/disciplina/professores/{id}',[disciplinaController::class,'disciplinaProfessor'])->name('disciplina.ver')->middleware('adimin');
    
    
    //Pauta
    Route::get('/pauta',[pautaController::class, 'index'])->name('pauta.index');
    Route::post('/pauta/elaborar',[pautaController::class, 'elaborar'])->name('pauta.elaborar')->middleware('professor');
    Route::post('/pauta/salvar',[pautaController::class, 'store'])->name('pauta.store')->middleware('professor');
    Route::post('/pauta/aluno',[pautaController::class, 'Store2'])->name('pauta.aluno')->middleware('professor');
    Route::get('/pauta/geral',[pautaController::class, 'consultarPauta'])->name('pauta.geral');
    Route::get('/Ver/pauta',[pautaController::class,'VerPauta'])->name('ver.pauta');
    Route::get('/pauta/apagar/{id}',[pautaController::class,'destroy'])->name('pauta.destroy');
    Route::get('/Pauta/alunos/{id}',[pautaController::class, 'verPautaAluuno'])->name('pauta.alunos');


});
