<x-app-layout>
        <!--Inicio do formulario de avaliacao docente-->


                <div class="modal-content" style="padding: 10px; box-shadow: 0px 2px 10px black;">
        <div class="modal-body" >
                    <form class="form" action="{{route('avaliar.storep')}}" method="post" >
                                        @csrf
                                        
                                        <div class="model-div">

                                                <div class="div">
                                                    <label for="">Professor</label>
                                                    <select name="professor" id="" required>
                                                    <option selected>Selecionar funcionaario</option>
                                                        @foreach($professor as $plista)
                                                        <option value="{{$plista->id}}">{{$plista->nome}}</option>
                                                        @endforeach 
                                                    </select>               
                                                    </div>
                                                    <div class="div">
                                                    <label for="">Avaliador</label>
                                                    <select name="avaliador" id="" required>
                                                    <option selected>Selecionar funcionaario</option>
                                                        @foreach($avaliador as $plista)
                                                        <option value="{{$plista->id}}">{{$plista->name}}</option>
                                                        @endforeach 
                                                    </select>               
                                                    </div>
                                                
                                            </div>
                                        

                                                <div class="model-div">
                                                        <div class="div">
                                                        <label for="">Ensino</label><br>
                                                        <input type="number" name="avaliacao1" class="input" required >
                                                        </div>

                                                        <div class="div">
                                                        <label for="">Investigação cientifica</label><br>
                                                        <input type="number" name="avaliacao2" class="input" required >
                                                        </div>
                                                        <div class="div">
                                                        <label for="">Extensão</label><br>
                                                        <input type="number" name="avaliacao3" class="input" required >
                                                        </div>
                                                        <div class="div">
                                                        <label for="">Gestão</label><br>
                                                        <input type="number" name="avaliacao4" class="input" required >
                                                        </div>
                                                    
                                                        <div class="div">
                                                            <button class="form-btn" id="btn-id">Salvar</button>
                                                        </div>
                                            </div>         
                        </form>
        </div>
        </div> 

                <!--fim form docente-->

                <div class="cliente-lista">
            <div class="titulo">
            <h1>Avaliacão dos Docente</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="{{route('avaliar.pesquisar')}}" method="get" >
                     @csrf
                    <div class="search">
                      <input placeholder="Pesquisar..." type="text" name="pesquisar">
                      <button type="submit">Ir</button>
                    </div>
                     
                 </form>
                   
                </div>
    </div>
         
    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
            
            <th scope="col">Professor</th>
            <th scope="col">Resultado</th>
            <th scope="col">Avaliador</th>
            <th scope="col">Data</th>
          
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($avaliacao as $lista)
            <tr>
    
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->resultado}}</td>
            <td>{{$lista->name}}</td>
            <td>{{$lista->data}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="tooltip-container"> 
                            <button type="" class="btn-apagar" data-bs-toggle="modal" data-bs-target="#apagar{{$lista->avaliacaoID}}"> <i class='bx bx-trash'></i></button>
                            <span class="tooltip" style="background-color: rgb(237, 102, 102)">Apagar</span>
                        </div>


<!-- Modal -->
<div class="modal fade" id="apagar{{$lista->avaliacaoID}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(89, 4, 4);">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color: black; color: red;">
      <div class="modal-header" >
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Avaliação do professor {{$lista->nome}} nº {{$lista->avaliacaoID}}</h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black;">

              <form class="" method="post" action="{{route('avaliar.destroy',$lista->avaliacaoID)}}">
                        @csrf
                        @method('DELETE')
                <h1>Comfirmar á operação selecionada!, {{$lista->nome}}</h1>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Não</button>
                      <button type="submit" class="btn btn-danger">Sim</button>
                  </div>
              </form>
      </div>
      
    </div>
  </div>
</div>
                   <div class="tooltip-container">
                  
                    <button class="text btn-histor" data-bs-toggle="modal" data-bs-target="#actualizar{{$lista->avaliacaoID}}"><i id="his" class='bx bxs-calendar-event'></i></button> 
                    <span class="tooltip">Actualizar dados</span>
                  </div>

                  <!--Actualizar ponto-->
            <div  class="modal fade" id="actualizar{{$lista->avaliacaoID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
                <div class="modal-content" style="width:100%">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR <span></span>AVALIAÇÃO  Nº {{$lista->avaliacaoID}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                      <div class="modal-body" >
                        <br>
                        <form class="form" action="{{route('avaliar.update',$lista->avaliacaoID)}}" method="post" >
                              @csrf
                              @method('PUT')

                              <div class="model-div">

                                                <div class="div">
                                                    <label for="">Professor</label><br>
                                                    <select name="professor" id="" required>
                                                    <option value="{{$lista->id}}" selected>{{$lista->nome}}</option>
                                                        @foreach($professor as $plista)
                                                        <option value="{{$plista->id}}">{{$plista->nome}}</option>
                                                        @endforeach 
                                                    </select>               
                                                    </div>
                                                    <div class="div">
                                                    <label for="">Avaliador</label><br>
                                                    <select name="avaliador" id="" required>
                                                    <option value="{{$lista->userID}}" selected>{{$lista->name}}</option>
                                                        @foreach($avaliador as $plista)
                                                        <option value="{{$plista->id}}">{{$plista->name}}</option>
                                                        @endforeach 
                                                    </select>               
                                                    </div>
                                                
                                            </div>
                                        

                                                <div class="model-div">
                                                        <div class="div">
                                                        <label for="">Avalição1</label><br>
                                                        <input type="number" name="avaliacao1" class="input" required value="{{$lista->avaliacao1}}" >
                                                        </div>

                                                        <div class="div">
                                                        <label for="">Avalição2</label><br>
                                                        <input type="number" name="avaliacao2" class="input" required value="{{$lista->avaliacao2}}">
                                                        </div>
                                                        <div class="div">
                                                        <label for="">Avalição3</label><br>
                                                        <input type="number" name="avaliacao3" class="input" required value="{{$lista->avaliacao3}}" >
                                                        </div>
                                                        <div class="div">
                                                        <label for="">Avalição4</label><br>
                                                        <input type="number" name="avaliacao4" class="input" required value="{{$lista->avaliacao4}}" >
                                                        </div>
                                                    
                                                        <div class="div">
                                                            <button class="form-btn" id="btn-id">Salvar</button>
                                                        </div>
                                            </div>
                    
                        </form>

                        </div>
                
                </div>
              </div>
            </div>
                




       
              </td>
            </div>
            </tr>
            @endforeach 
        </tbody>
    </table>
    </div>



</x-app-layout>