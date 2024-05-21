<x-app-layout>
<div class="cliente-lista">
            <div class="titulo">
            <h1>Alunos-Matriculados</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="{{route('aluno.pesquisar')}}" method="get">
                    <div class="search">
                      <input placeholder="Search..." type="text" name="pesquisar">
                      <button type="submit">Ir</button>
                    </div>
                     
                 </form>
                   
                </div>
    </div>
    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
            <th>Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col">B.Identidade</th>
            <th scope="col">Sexo</th>
           
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Idade</th>
            <th scope="col">Classe</th>
            <th scope="col">Ano Lectivo</th>
          
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($matriculados as $lista)
            <tr>
            <td scope="row">{{$lista->id}}</td>
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->bi}}</td>
            <td>{{$lista->sexo}}</td>
          
            <td>{{$lista->datanascimento}}</td>
            <td>{{$lista->idade}}</td>
            <td>{{$lista->classe}}classe</td>
            <td>{{$lista->anoLectivo}}</td>
         
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <div class="tooltip-container"> 
                    <button type="" class="btn-apagar" data-bs-toggle="modal" data-bs-target="#apagar{{$lista->id}}"> <i class='bx bx-trash'></i></button>
                    <span class="tooltip" style="background-color: rgb(237, 102, 102)">Apagar</span>
                  </div>


<!-- Modal -->
<div class="modal fade" id="apagar{{$lista->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(89, 4, 4);">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color: black; color: red;">
      <div class="modal-header" >
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagar {{$lista->nome}}</h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black;">

              <form class="" method="DELETE" action="{{route('matricula.destroy',$lista->id)}}">

                <h1>Comfirmar á operação selecionada!</h1>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Não</button>
                      <button type="submit" class="btn btn-danger">Sim</button>
                  </div>
              </form>
      </div>
      
    </div>
  </div>
</div>
                   
                 
                </div>
            </td>
            
              
          
          </tr>
     @endforeach
        </tbody>
      </table>
      </div>

      
      <div  id="lista-fornece" >



                                 
      <li class="icon-nome">
                                       <a href="{{route('v-aluno')}}"><i class="fa fa-user "></i> Aluno</a>
                                   </li>

                                        <li class="icon-nome">
                                            <a href="{{route('v-Prof')}}"class pri><i class="fa-solid fa-user-tie"></i>Professor</a>
                                        </li>

                                            <li class="icon-nome">
                                                  <a href="{{route('turma.index')}}"><i class="fa-solid fa-users"></i>Turma</a>
                                            </li>          

                                               <li class="icon-nome">
                                                <a href="{{route('disciplina.index')}}"><i class="fa-solid fa-layer-group"></i> Disciplina</a>
                                               </li>

                                                    <li class="icon-nome">
                                                            <a href="{{route('classe.index')}}"><i class="fa-solid fa-school"></i> Classe</a>
                                                    </li>


                                                
                             </div>
</x-app-layout>