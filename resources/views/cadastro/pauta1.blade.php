<x-app-layout>


<div class="pauta-index" style="background-image: url('/assetes/img/01.jpg')">
    
<div class="pauta-sub">
        <div class="titulo">
            <h1>Elaborar <span>Pauta...</span></h1>
            <p>Elaboração de Pauta do ano academico {{$lectivo}}...</p>
        </div>
        <form action="{{route('pauta.aluno')}}" method="post">
            @csrf
              <div class="dados-aluno">

                  <div class="um">
                        <div class="nome">
                            <label for="">Nome do Estudante</label>
                            <select name="estudante" id="" required>
                                <option >Selecionar</option>
                                @foreach($estudante as $aux)
                                <option value="{{$aux->id}}">{{$aux->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Professor</label>
                            <select name="professor" id="" required>
                                <option >Selecionar</option>
                                @foreach($professor as $auxp)
                                <option value="{{$auxp->id}}">{{$auxp->nome}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="nome">
                            <label for="">Disciplina</label>
                            <select name="disciplina" id="" required>
                                <option >Selecionar</option>
                              @foreach($professor as $auxp)
                                <option value="{{$auxp->iddisc}}">{{$auxp->disciplina}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Classe</label>
                            <select name="classe" id="" disabled>
                                <option value="1">{{$nomeCl}}Classe</option>
                            </select>
                        </div>
                        <div class="nome">
                            <label for="">Pauta</label>
                            <select name="pauta" id="" required>
                                <option value="{{$pauta}}">{{$pauta}}</option>
                        
                            </select>
                        </div>
                  </div>


                  <div class="dois">
                       
                         <div class="nome">
                            <label for="">Avaliação 1</label>
                           <input type="number" name='avaliacao1' required>
                        </div>
                        <div class="nome">
                            <label for="">Avaliação 2</label>
                           <input type="number" name='avaliacao2' required>
                        </div>
                        <div class="nome">
                            <label for="">Avaliação 3</label>
                           <input type="number" name='avaliacao3' required>
                        </div>

                        <div class="nome">
                            <label for="">Ano lectivo</label>
                           <input type="text" name='anoLectivo' value="{{$lectivo}}">
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