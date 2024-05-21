<x-app-layout>


<div class="matricula-index" style="background-image: url('/assetes/img/1_Photo.jpg')">
    
<div class="sub-matricula">
        <div class="titulo">
            <h1>Confirmar Matricula..</h1>
        </div>
        <form action="{{route('aluno.matricular')}}" method="POST">
            @csrf
              <div class="dados-aluno">

                  <div class="um">
                        <div class="nome">
                            <label for="">Nome Completo</label>
                            <select name="nome" id="" disabled>
                                <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">B. Identidade</label>
                            <select name="bi" id="" disabled>
                                <option value="{{$aluno->bi}}">{{$aluno->bi}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Genero</label>
                            <select name="sexo" id="" disabled>
                                <option value="1">{{$aluno->sexo}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Idade</label>
                            <select name="idade" id="" disabled>
                                <option value="1">{{$aluno->idade}}</option>
                            </select>
                        </div>
                  </div>


                  <div class="dois">
                        <div class="nome">
                            <label for="">Nome do Pai</label>
                            <select name="nomepai" id="" disabled>
                                <option value="1">{{$aluno->nomepai}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Nome da Mãe</label>
                            <select name="nomemae" id="" disabled>
                                <option value="1">{{$aluno->nomemae}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Data de nascimento</label>
                            <select name="datanascimento" id="" disabled>
                                <option value="1">{{$aluno->datanascimento}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Morada</label>
                            <select name="idade" id=""  disabled>
                                <option value="1">{{$aluno->morada}}</option>
                            </select>
                        </div>
                  </div>
              
               
              </div>
<hr>
              <div class="tres">
                        <div class="nome">
                            <label for="">Estudante</label>
                            <select name="estudante" id="">
                                <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Classe</label>
                            <select name="classe" id="">
                                <option selected>Selecionar</option>
                                @foreach($classe as $class)
                                <option value="{{$class->id}}">{{$class->nome}}Classe</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Turma</label>
                            <select name="turma" id="">
                                <option selected>Selecionnar</option>
                                @foreach($turma as $listt)
                                <option value="{{$listt->id}}">{{$listt->nome}}- {{$listt->classe}}Classe</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="nome">
                            <label for="">Ano Lectivo</label>
                           <input type="text" name='anoLectivo'>
                        </div>
                  </div>


                  <button class="form-btn">Salvar</button>
        </form>
    </div>
</div>

</x-app-layout>