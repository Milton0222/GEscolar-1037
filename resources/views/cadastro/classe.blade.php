<x-app-layout>

<!-- Modal -->
<div  class="modal fade" id="cadastroProf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLabel">REGISTAR CLASSE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
<br>
                      <form class="form" action="{{route('classe.store')}}" method="post">
                       @csrf
                      
                       <div>
                         <label for="">Nome</label>
                        <select name="nome" id="">
                          <option selected>Selecionar</option>
                      
                            <option value="1ª">1ªClasse</option>
                            <option value="2ª">2ªClasse</option>
                            <option value="3ª">3ªClasse</option>
                             <option value="4ª">4ªClasse</option>
                            <option value="5ª">5ªClasse</option>
                            <option value="6ª">6ªClasse</option>
                            <option value="7ª">7ªClasse</option>
                            <option value="8ª">8ªClasse</option>
                            <option value="9ª">9ªClasse</option>
                            
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
            <h1>CLASSES</h1>
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
           
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th >
          
          </tr>
        </thead>
        <tbody>
      @foreach($classe as $lista)
            <tr>
            <td scope="row">{{$lista->id}}</td>
            <td>{{$lista->nome}}Classe</td>
           
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

              <form class="" method="DELETE" action="{{route('classe.destroy',$lista->id)}}">

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
                      <a  href="{{route('classe.ver',$lista->id)}}" class="classe-disc" style="color:red">Disciplina</a>
                      <button type="" class="classe-select" data-bs-toggle="modal" data-bs-target="#lecionar{{$lista->id}}"> <i class='bx bx-select-multiple'></i> Selecionar </button>
        
        <!-- Modal lecionar-->
        <div class="modal fade" id="lecionar{{$lista->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #003d06;">
          <div class="modal-dialog" >
            <div class="modal-content" style="background-color: black; color: white;">
              <div class="modal-header" >
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> {{$lista->nome}}</h1>
                <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: black; color: black;">
        
                      <form class="form" method="post" action="{{route('disciplina.classe')}}">
        
                      @csrf
                               
                               <div>
                                 <label for="">Classe</label><br>
                                <select name="classe" id="" >
                                  <option selected value="{{$lista->id}}">{{$lista->nome}}</option>
                                </select>
                              
                                </div>
                                <div>
                                 <label for="">Disciplina</label><br>
                                <select name="disciplina" id="" >
                                <option selected>Selecionar</option>
                                  @foreach($disciplina as $plista)
                                      <option value="{{$plista->id}}">{{$plista->nome}}</option>
                                  @endforeach
                                </select>
                              
                                </div>
                               
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Canselar</button>
                              <button type="submit" class="btn btn-primary">Salvar</button>
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
{{$classe->links()}}

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
                                                    <li class="icon-nome">
                                                             <a href="{{route('ver.pauta')}}"><i class="fa-solid fa-layer-group"></i> Pauta</a>
                                                    </li>



                                                
                             </div>
      </x-app-layout>

