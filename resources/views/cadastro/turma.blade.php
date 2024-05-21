<x-app-layout>

<!-- Modal -->
<div  class="modal fade" id="cadastroProf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLabel">REGISTAR TURMA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
<br>
                      <form class="form" action="{{route('turma.store')}}" method="post">
                       @csrf
                       <div>
                       <label for="">Nome Completo</label>
                       <input type="text" name="nome" class="input"  required >
                       </div>
                       <div>
                       <label for="">Capacidade</label>
                       <input type="text" name="quantidade" class="input"  required >
                       </div>
                       <div>
                       <label for="">Periodo</label>
                        <select name="periodo" id="">
                          <option selected>Selecionar</option>
                        
                            <option value="Tarde">Tarde</option>
                            <option value="Manhã">Manhã</option>   
                        </select>
                       </div>
                       
                      
                       <div>

                         <label for="">Classe</label>
                        <select name="classe" id="">
                          <option selected>Selecionar</option>
                      @foreach($classe as $cl)
                            <option value="{{$cl->id}}">{{$cl->nome}}Classe</option>
                         @endforeach
                            
                        </select>
                      
                        </div>
                        
                      
                   
                     
                  
                
                    

                       <br>
                     <button class="form-btn">Salvar</button>
                   </form>
   

      </div>
     
    </div>
  </div>
</div>
<!--  -->
  

    <div class="cliente-lista">
            <div class="titulo">
            <h1>TURMAS</h1>
        </div>
                <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroProf"><i class="fa-solid fa-plus"></i> Novo</a>
                 <form action="{{route('professor.pesquisar')}}" method="get" name="pesquisar">
                 <div class="search">
                      <input placeholder="Search..." type="text">
                      <button type="submit">Ir</button>
                    </div>
                 </form>
                    
                </div>
    </div>
       
    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
            <th scope="col">CODIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">Periodo</th>
            <th scope="col">Capacidade</th>
            <th scope="col">Classe</th>
            <th style="text-align: center;" colspan="1" scope="col">Métodos</th >
          
          </tr>
        </thead>
        <tbody>
      @foreach($turmas as $lista)
            <tr>
            <td scope="row">{{$lista->id}}</td>
            <td>{{$lista->nome}}</td>
            <td>{{$lista->periodo}}</td>
            <td>{{$lista->quantidade}}</td>
            <td>{{$lista->classe}} Classe</td>
            <td style="text-align: center;">
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

              <form class="" method="DELETE" action="{{route('turma.destroy',$lista->id)}}">

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
                      <a href="{{route('turma.ver',$lista->id)}}" class="turma-alun"> <i class="fa fa-user "></i> Alunos</a>
                    
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