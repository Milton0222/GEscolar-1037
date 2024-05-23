<x--app-layout>

      <!-- Modal inserir funcionario -->
<div  class="modal fade" id="cadastroAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTAR <span></span>Funcionario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
<br>
                      <form class="form" action="{{route('funcionario.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div>
                               <label for="">Nome Completo</label>
                            <input type="text" name="name" class="input"  required >
                                 
                       </div>  
                       <div>
                       <label for="">Correio Electronico</label>
                       <input type="email" name="email" class="input"   required >
                       </div>

                       <div class="model-div">

                              <div class="div">
                                <label for="">Genero</label>
                                <select name="sexo" id="" required>
                                  <option selected>Selecionar</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select> 
                                               
                                </div>
                               
                              <div class="div">
                              <label for="">Habilitacão</label>
                              <input type="text" name="habilitacao" class="input" maxlength="6">
                              </div>
                        </div>
                      

                            <div class="model-div">
                               <div class="div">
                              <label for="">Nº de agente</label>
                              <input type="numeric" name="Nagente" class="input" >
                               </div>

                            <div class="div">
                            <label for="">Data de engreço</label>
                            <input type="date" name="data_engreco" class="input">
                            </div>
                         </div>

                          
                         
                        <div class="model-div">
                            <div class="div">
                            <label for="">Contacto</label>
                            <input type="number" name="contacto" class="input" maxlength="9" >
                           </div> 
                        
                          <div class="div">
                            <button class="form-btn" id="btn-id">Salvar</button>
                          </div>
                       </div> 
                       <br>
                    
                   </form>
   

      </div>
     
    </div>
  </div>
</div>
<!-- fim modal funcionario -->


<div class="cliente-lista">
            <div class="titulo">
            <h1>Funcionarios</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="{{route('funcionario.pesquisar')}}" method="get" >
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
            <th scope="col">Email</th>
            <th scope="col">Sexo</th>
           
            <th scope="col">Data de engreço</th>
            <th scope="col">Nº de agente</th>
            <th scope="col">Habilitação</th>
           
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($funcionarios as $lista)
            <tr>
    
            <td scope="row">{{$lista->name}}</td>
            <td>{{$lista->email}}</td>
            <td>{{$lista->sexo}}</td>
          
            <td>{{$lista->data_engreco}}</td>
            <td>{{$lista->Nagente}}</td>
            <td>{{$lista->habilitacao}}</td>
           
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

                   <!--Modal actualizar-->
<div  class="modal fade" id="actualizar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR <span></span>DADOS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
<br>
                      <form class="form"   action="{{route('funcionario.update',$lista->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                       <div>
                               <label for="">Nome Completo</label><br>
                            <input type="text" name="name" class="input"  required value="{{$lista->name}}" >
                                 
                       </div>  
                       <div>
                       <label for="">Correio Electronico</label><br>
                       <input type="email" name="email" class="input"   required value="{{$lista->email}}" >
                       </div>

                       <div class="model-div">

                              <div class="div">
                                <label for="">Genero</label><br>
                                <select name="sexo" id="" required>
                                  <option value="{{$lista->sexo}}" selected>{{$lista->sexo}}</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select> 
                                               
                                </div>
                               
                              <div class="div">
                              <label for="">Habilitacão</label><br>
                              <input type="text" name="habilitacao" class="input" maxlength="6" value="{{$lista->habilitacao}}">
                              </div>
                        </div>
                      

                            <div class="model-div">
                               <div class="div">
                              <label for="">Nº de agente</label><br>
                              <input type="numeric" name="Nagente" class="input" value="{{$lista->Nagente}}" >
                               </div>

                            <div class="div">
                            <label for="">Data de engreço</label><br>
                            <input type="date" name="data_engreco" class="input" value="{{$lista->data_engreco}}">
                            </div>
                         </div>

                          
                         
                        <div class="model-div">
                            
                        
                          <div class="div">
                            <button class="form-btn" id="btn-id">Salvar</button>
                          </div>
                       </div> 
                       <br>
                    
                   </form>
   

      </div>
     
    </div>
  </div>
</div>



                   <!--End modall actualizar-->
                
                 
                </div>
            </td>
            
              
          
          </tr>
     @endforeach
        </tbody>
      </table>
    
      </div>




</x--app-layout>