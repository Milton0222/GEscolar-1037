<x-app-layout>

<!-- Modal -->
<div  class="modal fade" id="cadastroAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTAR <span></span>ALUNO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" >
<br>
                      <form class="form" action="{{route('aluno.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div>
                               <label for="">Nome Completo</label>
                            <input type="text" name="nome" class="input"  required >
                                 
                       </div>  
                       <div>
                       <label for="">Nº de Identidade</label>
                       <input type="text" name="bi" class="input" maxlength="14"  required >
                       </div>

                       <div class="model-div">

                              <div class="div">
                                <label for="">Genero</label>
                                <select name="sexo" id="" required>
                                  <option selected>Selecionar</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Feminino</option>
                                </select> 
                                               
                                </div>
                               
                              <div class="div">
                              <label for="">Nome do Pai</label>
                              <input type="text" name="nomepai" class="input"  required >
                              </div>
                        </div>
                      

                            <div class="model-div">
                               <div class="div">
                              <label for="">Nome da Mae</label>
                              <input type="text" name="nomemae" class="input"  required >
                               </div>

                            <div class="div">
                            <label for="">Municipio</label>
                            <input type="text" name="municipio" class="input"  required >
                            </div>
                         </div>

                             <div class="model-div">
                                <div class="div">
                                    <label for="">Morada</label>
                                    <input type="text" name="morada" class="input"  required >
                                  </div>
                                  <div class="div">
                                    <label for="">Naturalidade</label>
                                    <input type="text" name="naturalidade" class="input"  required >
                                  </div>
                                
                                    
                                <div class="div">
                                <label for="">Data de nascimento</label>
                                <input type="date" name="datanascimento" class="input"  required >
                                </div>

                              
                        </div>
                         
                        <div class="model-div">
                            <div class="div">
                            <label for="">Contacto</label>
                            <input type="number" name="contacto" class="input" maxlength="9"  required >
                           </div> 
                           <div class="div">
                                          <label for="">Foto</label> 
                                    <input type="file" name="foto" id="" class="input" requered>

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
<!--  -->
  

    <div class="cliente-lista">
            <div class="titulo">
            <h1>ALUNOS</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="{{route('aluno.pesquisar')}}" method="get" >
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
             <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">B.Identidade</th>
            <th scope="col">Sexo</th>
           
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Idade</th>
            <th scope="col">Municipio</th>
            <th scope="col">Morada</th>
            <th scope="col">Contacto</th>
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($alunos as $lista)
            <tr>
              <td><img src="/assetes/FotoAluno/{{$lista->foto}}" alt="Foto não carregada" style="width: 60px; height: 60px; border-radius: 30%; box-shadow: 0px 2px 10px black;"></td>
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->bi}}</td>
            <td>{{$lista->sexo}}</td>
          
            <td>{{$lista->datanascimento}}</td>
            <td>{{$lista->idade}}</td>
            <td>{{$lista->naturalidade}}</td>
            <td>{{$lista->morada}}</td>
            <td>{{$lista->contacto}}</td>
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

              <form class="" method="DELETE" action="{{route('aluno.destroy',$lista->id)}}">

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
                  
                    <a href="{{route('aluno.ver',$lista->id)}}" class="text btn-histor"><i id="his" class='bx bxs-calendar-event'></i></a> 
                    <span class="tooltip">Confirmar Matricula</span>

                    </a>
                
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
                                                    <li class="icon-nome">
                                                             <a href="{{route('ver.pauta')}}"><i class="fa-solid fa-layer-group"></i> Pauta</a>
                                                    </li>



                                                
                             </div>
      </x-app-layout>

