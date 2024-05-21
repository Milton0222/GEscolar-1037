<x-app-layout>
            <!-- Modal -->
        <div  class="modal fade" id="cadastroProf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div  class="modal-dialog modal-dialog-centered modal-lg"  style="width:2000px">
            <div class="modal-content" style="width:100%">
            <div class="modal-header">
                <h5  class="modal-title" id="exampleModalLabel">Criar pauta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
        <br>
                            <form class="form" action="{{route('pauta.store')}}" method="post">
                            @csrf
                            
                            <div>
                                 <label for="">Ano Lectivo</label>
                                <input type="text" name="anoLectivo" class="input"  required >

                                  <label for="">Turma</label>
                                <select name="turma" id="">
                                  <option selected>Selecionar</option>
                                    @foreach($turmas as $lista)
                                    <option value="{{$lista->id}}"> {{$lista->nome}}-{{$lista->periodo}}-{{$lista->classe}} Classe</option>
                                    @endforeach
                                    
                                </select>
                                <label for="">Trimestre</label>
                                <select name="trimestre" id="">
                                  <option selected>Selecionar</option>
                                    <option value="1º">1º Trimestre</option>
                                    <option value="2º">2º Trimestre</option>
                                    <option value="3º">3º Trimestre</option>
                                    <option value="4º">4º Trimestre</option>
                                </select>
                                <label for="">Funcionario</label>
                                <select name="funcionario" id="">
                                  <option value="{{Auth::user()->id}}" selected>{{Auth::user()->name}}</option>
                                   
                                </select>
                            </div>

                            <br>
                            <button class="form-btn">Criar</button>
                        </form>
        

            </div>
            
            </div>
        </div>
        </div>
        <!-- fim modal criar pauta -->


        <div class="cliente-lista">
            <div class="titulo">
                <h1>Pautas</h1>
            </div>
                <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroProf"><i class="fa-solid fa-plus"></i> Novo</a>
                 <form action="" method="get" name="pesquisar">
                 <div class="search">
                      <input placeholder="Search..." type="text">
                      <button type="submit">Ir</button>
                    </div>
                 </form>
                    
                </div>
        </div>

        <!---  Tabela apauta -->

        <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
         
          <tr >
            <th scope="col">CODIGO</th>
            <th scope="col">Ano Lectivo</th>
            <th scope="col">Trimestre</th>
            <th scope="col">Turma</th>
            <th scope="col">Periodo</th>
            <th scope="col">Classe</th>
            <th scope="col">Data</th>
            <th style="text-align: center;" scope="col">Métodos</th>
          
          </tr>
      
        </thead>
        <tbody>
        @foreach($pautas as $listap)
            <tr>
            <td scope="row">{{$listap->id}}</td>
             <td>{{$listap->anoLectivo}}</td>
             <td>{{$listap->trimestre}} Trimestre</td>
             <td>{{$listap->nome}}</td>
             <td>{{$listap->periodo}}</td>
             <td>{{$listap->classe}} Classe</td>
             <td>{{$listap->data}}</td>
            <td style="text-align: center;">
              <div class="btn-group" role="group" aria-label="Basic example">
              <div class="tooltip-container"> 
                    <button type="" class="btn-apagar" data-bs-toggle="modal" data-bs-target="#apagar{{$listap->id}}"> <i class='bx bx-trash'></i></button>
                    <span class="tooltip" style="background-color: rgb(237, 102, 102)"> Apagar</span>
                  </div>
                  
<!-- Modal -->
<div class="modal fade" id="apagar{{$listap->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: rgb(89, 4, 4);">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color: black; color: red;">
      <div class="modal-header" >
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja apagar a pauta nº {{$listap->id}} do ano lectivo {{$listap->anoLectivo}}  </h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black;">

              <form class="" method="DELETE" action="{{route('pauta.destroy',$listap->id)}}">

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
                  <button type="" class="disc-proff" data-bs-toggle="modal" data-bs-target="#elaborar{{$listap->id}}">Elaborar</button> 
                    
                  <!-- Modal filtrar turma-->
<div class="modal fade" id="elaborar{{$listap->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #003d06;">
          <div class="modal-dialog" >
            <div class="modal-content" style="background-color: black; color: white;">
              <div class="modal-header" >
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmar os dados da pauta</h1>
                <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: black; color: black;">
        
                      <form class="form" method="post" action="{{route('pauta.elaborar')}}">
        
                      @csrf
                               <div>
                                  <label for="">Ano Lectivo</label><br>
                                    <input type="text" name="anoLectivo" value="{{$listap->anoLectivo}}" placeholder="Informe ano lectivo actual" required>
                               </div>
                               <div>
                                   <label for="">Pauta</label> <br>
                                    <input type="number" name="pauta" id="" value="{{$listap->id}}">
                               </div>
                               <div>
                                 <label for="">Turma</label><br>
                                <select name="turma" id="" >
                                  <option value="{{$listap->turmaId}}" selected> {{$listap->nome}}</option>
                                
                                </select>
                                </div>
                                <div>
                                 <label for="">Classe</label><br>
                                <select name="classe" id="" >
                                <option value="{{$listap->classeId}}" selected> {{$listap->classe}}</option>
                                </select>
                              
                                </div>
                               
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-primary">Seguinte</button>
                          </div>
                      </form>
              </div>
              
            </div>
          </div>
        </div>
                    
  

                    
                    
      
        <a href="" class="turma-alun"><i class="fa-solid fa-user-tie"></i> Ver pauta</a>
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