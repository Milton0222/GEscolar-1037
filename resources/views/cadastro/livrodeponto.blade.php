<x-app-layout>


   <!--Registar presenca-->
   <div class="modal-content" style="padding: 10px; box-shadow: 0px 2px 10px black;">
   <div class="modal-body" >
   <form class="form" action="{{route('funcionario.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                    
                       <div class="model-div">

                              <div class="div">
                                <label for="">Funcionario</label>
                                <select name="professor" id="" required>
                                  <option selected>Selecionar funcionaario</option>
                                    @foreach($professor as $plista)
                                    <option value="{{$plista->id}}">{{$plista->nome}}</option>
                                    @endforeach
                                  
                                </select> 
                                               
                                </div>
                               
                              <div class="div">
                              <label for="">Data de Entrada</label>
                              <input type="date" name="data_entrada" class="input" requested>
                              </div>
                              
                        </div>
                      

                            <div class="model-div">
                            <div class="div">
                              <label for="">Hora de entrada</label>
                              <input type="time" name="hora_entrada" class="input" requeest >
                               </div>
                          
                                    <div class="div">
                                        <button class="form-btn" id="btn-id">Salvar</button>
                                    </div>
                         </div>

                    
                   </form>


   </div>
   </div>
   
      
   <!---->


   <div class="cliente-lista">
            <div class="titulo">
            <h1>Livro de Ponto</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="" method="get" >
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
            
            <th scope="col">Nome</th>
            <th scope="col">Data de Entrda</th>
            <th scope="col">Hora de Entrada</th>
            <th scope="col">Obs</th>
          
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($funcionario as $lista)
            <tr>
    
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->data_entrada}}</td>
            <td>{{$lista->hora_entrada}}</td>
          
            <td>{{$lista->obs}}</td>
           
           
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagando o funcionario {{$lista->name}}</h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black;">

              <form class="" method="post" action="{{route('funcionario.delete',$lista->id)}}">
                        @csrf
                        @method('DELETE')
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
                   <div class="tooltip-container">
                  
                    <button class="text btn-histor" data-bs-toggle="modal" data-bs-target="#actualizar{{$lista->id}}"><i id="his" class='bx bxs-calendar-event'></i></button> 
                    <span class="tooltip">Actualizar dados</span>
                  </div>
       
              </td>
            </div>
            </tr>
        </tbody>
    </table>
    </div>
    @endforeach 
                

</x-app-layout>