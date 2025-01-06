<x-app-layout>


<div class="pauta-index" style="background-image: url('/assetes/img/01.jpg')">
    
<div class="pauta-sub">
        <div class="titulo">
            <h1>Registar <span>Presença...</span></h1>
            <p>Da turma {{$turma}} ano lectivo {{$anoLectivo}}...</p>
        </div>
        <form action="{{route('aluno.presenca')}}" method="post">
            @csrf
              <div class="dados-aluno">

                  <div class="um">
                     

                        <div class="nome">
                            <label for="">Ano lectivo</label>
                           <input type="text" name='anoLectivo' value="{{$anoLectivo}}">
                        </div>

                        <div class="nome">
                            <label for="">Turma</label>
                            <select name="turma" id="" required>
                              
                                <option value="{{$turmaid}}">{{$turma}}</option>
                            
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Classe</label>
                            <select name="classe" id="" disabled>
                                <option value="1">{{App\Models\classe::find($turmas->classe)->nome}}Classe</option>
                            </select>
                        </div>
                    
                  </div>


                  <div class="dois">
                       
                  <div class="nome">
                            <label for="">Nome do Estudante</label>
                            <select name="estudante" id="" required>
                                <option >Selecionar</option>
                                @foreach($estudantes as $aux)
                                <option value="{{$aux->id}}">{{$aux->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="nome">
                            <label for="">Turma</label>
                           <input type="number" name='turma' value="{{$turmaid}}" required>
                        </div>
                        <div class="nome">
                            <label for="">Tipo de presença</label>
                            <select name="tipo" id="" required>
                                <option >Selecionar</option>
                                <option value="F">F</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                     
                        <div class="nome">
                            <label for="">Data</label>
                           <input type="date" name='data'  required>
                        </div>

                        

                       
                        <div class="nome">
                         <button type="submit" class="xxxx">Salvar</button>
                      </div>
                 </div>

              
               
              </div>

              


                 
        </form>
    </div>
</div>

</x-app-layout>