<x-app-layout>







<div class="cliente-lista">
            <div class="titulo">
            <h1>Pautas</h1>
        </div>
        <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i>  Novo</a>
                 <form action="{{route('pauta.geral')}}" method="get" class="search">
                    <div class="form">
                      <input placeholder="Codigo aluno" type="text" name="id">
                      <input placeholder="Ano Lectivo" type="text" name="anoLectivo">
                      <select name="classe" id="" class="form-control" >
                             <option >Selecionar classe</option>
                              @foreach($classe as $aux)
                                <option value="{{$aux->id}}">{{$aux->nome}}Classe</option>
                              @endforeach
                      </select>
                      <button type="submit" class="search">Ir</button>
                    </div>
                     
                 </form>
                   
                </div>
    </div>
         
    <div class="tabela-estilo">
      
    <table class="table" id="tabelaa">
        <thead>
          <tr >
          <th scope="col">#</th>
            <th scope="col">Estudantte</th>
            <th scope="col">Identidade</th>
            <th scope="col">Genero</th> 
            <th scope="col">Disciplina</th> 
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
     @foreach($turma as $lista)
            <tr>
            <td>{{$lista->code}}</td>
            <td>{{$lista->nome}}</td>
            <td>{{$lista->bi}}</td>
            <td>{{$lista->sexo}}</td>
            <td>{{$lista->disciplina}}</td>
            @if(Auth::user()->adimin || Auth::user()->secretaria)
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagar</h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black;">

              <form class="" method="DELETE" action="">

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
                  
                    <a href="" class="text btn-histor" data-bs-toggle="modal" data-bs-target="#ver{{$lista->code}}{{$lista->discod}}"><i id="his" class='bx bxs-calendar-event'></i></a> 
                    <span class="tooltip">Pauta </span>

                    </a>
<!-- Modal Ver Pauta -->
<div class="modal fade" id="ver{{$lista->code}}{{$lista->discod}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes da pauta do {{$lista->nome}}</h5>
        <button style="color:#000" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="pauta-ver">
            <div class="pauta-ver-header">
            <div class="texto-header">
                <h1>REPÚBLICA DE ANGOLA</h1>
                <h1>MINISTÉRIO DA EDUCAÇÃO</h1>
                <h1>ESCOLA BG 1037 CDTE AUGUSTO CHIPENDAS </h1>
            </div>
          
            <div class="outro-header">
               <!--
                <div class="pri">
                    <p>Classe: <span>3ª classe</span></p>
                    <p>Turma: <span>A</span></p>
                    <p>Periodo:<span>Manhã</span></p>
                </div>-->
              <div class="segund">
              <p>Ano Lectivo: <span>{{$lista->anoLectivo}}</span></p>
              <p>Inscrição:<span>{{$lista->code}}</span></p>
              <p>Esttudante<span>{{$lista->nome}}</span></p>
              </div>
            
            </div>
            </div>

            <div class="pauta-bady">
                <div class="listaa">
                    <table class="table">
                    <thead class="thead-tr-tdd">
                        <tr>
                           
                       
                            <th scope="col">Disciplina: <span>{{$lista->disciplina}}</span></th>
                            <th scope="col">P1: <span>{{$lista->avaliacao1}}</span></th>
                            <th scope="col">P2: <span>{{$lista->avaliacao2}}</span></th>
                            <th scope="col">P2: <span>{{$lista->avaliacao3}}</span></th>
                            <th scope="col">Média: <span>{{$lista->media}}</span></th>
                            <th scope="col">Resultado: <span>{{$lista->classificacao}}</span></th>
                         
                        </tr>
         </thead>

    
                    </table>
                </div>
            </div>
             

            <div class="data-prof">
                <span>Data: 12/12/2023</span>
              
                 <p>--------------</p>
            </div>

            <div class="imprimir">
             <a href=""> <i class='bx bxs-printer'></i>imprimir</a>
            </div>
        </div>
      </div>
   
    </div>
  </div>
</div>
<!--Fim  Modal Ver Pauta -->

                
                  </div>
                 
                </div>
            </td>
            @endif
              
          
          </tr>
 @endforeach
        </tbody>
      </table>
      </div>
           

</x-app-layout>