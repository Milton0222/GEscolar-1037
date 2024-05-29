<x-app-layout>

<!-- Modal -->
<div  class="modal fade" id="cadastroProf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLabel">REGISTAR PROFESSOR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        
<br>
                      <form class="form" action="{{route('professor.store')}}" method="post">
                       @csrf
                       <div >
                       <label for="">Nome Completo</label>
                       <input type="text" name="nome" class="input"  required >
                       </div>

                       <div class="model-div">
                            <div class="div">
                              <label for="">Genero</label>
                              <select name="sexo" id="">
                                <option selected>Selecionar</option>
                                  <option value="M">Masculino</option>
                                  <option value="F">Feminino</option>
                              </select>
                            
                              </div>
                              
                            <div class="div">
                            <label for="">B. Identidade</label>
                            <input type="text" name="bi" class="input"  required >
                            </div>
                        </div>

                        <div class="model-div">
                       <div class="div">
                       <label for="">Grau academico</label>
                     
                       <select name="grauacademico" id="">
                          <option selected>Selecionar</option>
                            <option value="Phd">Phd</option>
                            <option value="Msc">Msc</option>
                            <option value="Lic">Lic</option>
                            <option value="Tecnico">Tecnico</option>
                            
                        </select>
                     
                       </div>

                       <div class="div">
                       <label for="">Data de Nascimento</label>
                       <input type="date" name="datanascimento" class="input"  required >
                       </div>
                    </div>
                       
                    <div class="model-div">
                       <div class="div">
                       <label for="">Municipio</label>
                       <input type="text" name="municipio" class="input"  required >
                       </div>

                       <div class="div">
                       <label for="">Morada</label>
                       <input type="text" name="morada" class="input"  required >
                       </div>
                    </div>
                       
                    <div class="model-div">
                        <div class="div">
                       <label for="">Contacto</label>
                       <input type="text" name="contacto" class="input"  required >
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
<!--  -->
  

    <div class="cliente-lista">
            <div class="titulo">
            <h1>PROFESSORES</h1>
        </div>
                <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroProf"><i class="fa-solid fa-plus"></i> Novo</a>
                 <form action="{{route('professor.pesquisar')}}" method="get" name="pesquisar">
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
            <th scope="col">CODIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">B.Identidade</th>
            <th scope="col">Sexo</th>
            <th scope="col">Grau Academico</th> 
            <th scope="col">Municipio</th>
            <th scope="col">Morada</th>
            <th scope="col">Contacto</th>
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
          
          </tr>
        </thead>
        <tbody>
      @foreach($professores as $lista)
            <tr>
            <td scope="row">{{$lista->id}}</td>
            <td>{{$lista->nome}}</td>
            <td>{{$lista->bi}}</td>
            <td>{{$lista->sexo}}</td>
            <td>{{$lista->grauacademico}}</td>
            <td>{{$lista->municipio}}</td>
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

              <form class="" method="DELETE" action="{{route('professor.destroy',$lista->id)}}">

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
              <!--botao actualiza-->
              <div class="tooltip-container">
                                
                      <button  class="text btn-histor" data-bs-toggle="modal" data-bs-target="#actualizar{{$lista->id}}"><i class="bi bi-person-fill-add"></i></button> 
                      <span class="tooltip">Actualizar</span>

                    </div>
                    <!-- Modal actualizar professor-->
<div  class="modal fade" id="actualizar{{$lista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
    <div class="modal-content" style="width:100%">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLabel">ACTUALIZAR PROFESSOR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        
<br>
                      <form class="form" action="{{route('professor.update',$lista->id)}}" method="post">

                       @csrf
                       @method('put')
                       <div >
                       <label for="">Nome Completo</label><br>
                       <input type="text" name="nome" class="input" value="{{$lista->nome}}"  required >
                       </div>

                       <div class="model-div">
                            <div class="div">
                              <label for="">Genero</label><br>
                              <select name="sexo" id="">
                                <option value="{{$lista->sexo}}" selected>{{$lista->sexo}}</option>
                                  <option value="M">Masculino</option>
                                  <option value="F">Feminino</option>
                              </select>
                            
                              </div>
                              
                            <div class="div">
                            <label for="">B. Identidade</label><br>
                            <input type="text" name="bi" class="input" value="{{$lista->bi}}"  required >
                            </div>
                        </div>

                        <div class="model-div">
                       <div class="div">
                       <label for="">Grau academico</label><br>
                     
                       <select name="grauacademico" id="">
                          <option value="{{$lista->grauacademico}}" selected>{{$lista->grauacademico}}</option>
                            <option value="Phd">Phd</option>
                            <option value="Msc">Msc</option>
                            <option value="Lic">Lic</option>
                            <option value="Tecnico">Tecnico</option>
                            
                        </select>
                     
                       </div>

                       <div class="div">
                       <label for="">Data de Nascimento</label><br>
                       <input type="date" name="datanascimento" class="input" value="{{$lista->datanascimento}}"  required >
                       </div>
                    </div>
                       
                    <div class="model-div">
                       <div class="div">
                       <label for="">Municipio</label><br>
                       <input type="text" name="municipio" class="input" value="{{$lista->municipio}}" required >
                       </div>

                       <div class="div">
                       <label for="">Morada</label><br>
                       <input type="text" name="morada" class="input" value="{{$lista->morada}}" required >
                       </div>
                    </div>
                       
                    <div class="model-div">
                        <div class="div">
                       <label for="">Contacto</label><br>
                       <input type="text" name="contacto" class="input" value="{{$lista->contacto}}"  required >
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
<!-- actualizar end -->


                  <a href="{{route('professor.ver',$lista->id)}}" class="classe-disc">Disciplina</a>
                 
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

