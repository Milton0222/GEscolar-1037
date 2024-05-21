<x-app-layout>

<div class="cliente-lista">
                <div class="titulo">
                <h1>Estudante</h1>
            </div>
            <div class="cadastrar-pesquisar">
                    <a  data-bs-toggle="modal" data-bs-target="#cadastroAluno"><i class="fa-solid fa-plus"></i> </a>
                    <form action="{{route('comparticipar.buscar')}}" method="get">
                      <div class="search">
                      <input type="text" placeholder="informe o codigo " name="pesquisar">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

                      </div>
                    
                    </form>
                    
                    </div>
    </div>
    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
          <th scope="col">Matricuula</th>
            <th scope="col">Nome</th>
            <th scope="col">B.Identidade</th>
            <th scope="col">Sexo</th>
            <th scope="col">Idade</th>
            <th scope="col">Classe</th>
            <th scope="col">Ano Lectivo</th>
            <th scope="col">Data de confirmação</th>
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($matriculado as $lista)
            <tr>
                <td>{{$lista->id}}</td>
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->bi}}</td>
            <td>{{$lista->sexo}}</td>
            <td>{{$lista->idade}}</td>
            <td>{{$lista->classe}}Classe</td>
            <td>{{$lista->anoLectivo}}</td>
            <td>{{$lista->data}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#propina{{$lista->id}}">Propina</button>



<!-- Modal -->
<div class="modal fade" id="propina{{$lista->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #003d06;">
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color: black; color: white;">
      <div class="modal-header" >
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Estudante {{$lista->nome}}</h1>
        <button type="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: black; color: black;">

              <form class="form" method="post" action="{{route('comparticipar.pagar')}}">

              @csrf
                       <div>
                            <label for="">Valor</label><br>
                            <input type="number" name="valor" class="input" value=""  required >
                       </div>
                       <div>
                            <label for="">Mes</label><br>
                            <input type="date" name="mes" class="input" value=""  required >
                       </div>
                       <div>
                       <label for="">Ano Lectivo</label><br>
                       <input type="text" name="anoLectivo" class="input" value="{{$lista->anoLectivo}}" required >
                       </div>
                       <div>
                         <label for="">Estudante</label><br>
                        <select name="estudante" id="" >
                          <option selected value="{{$lista->id}}">{{$lista->nome}}</option>
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
                  <button type="" class="btn btn-primary">Faltas</button>
                 
                </div>
            </td>
            
              
          
          </tr>
     @endforeach
        </tbody>
      </table>
      </div>

      <div class="cliente-lista">
                <div class="titulo">
                <h1>Pagamentos-Estudantes</h1>
            </div>
            <div class="cadastrar-pesquisar">
                         <h1>Pagos</h1>
                     
                    </div>
    </div>


    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
         
            <th scope="col">Cod</th>
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">Mes</th>
            <th scope="col">Ano Lectivo</th>
            <th scope="col">Data</th>
            <th style="text-align: center;" colspan="3" scope="col">Métodos</th style="text-align: end;">
           
          </tr>
        </thead>
        <tbody>
      @foreach($pago as $lista)
            <tr>
                <td>{{$lista->id}}</td>
            <td scope="row">{{$lista->nome}}</td>
            <td>{{$lista->sexo}}</td>
            <td>{{$lista->mes}}</td>
            <td>{{$lista->anoLectivo}}</td>
            <td>{{$lista->created_at}}</td>
        
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
             
                  <a class="nav-link" href="{{route('recibo.show', $lista->id)}}">Recibo</a>
                 
                </div>
            </td>
            
              
          
          </tr>
     @endforeach
        </tbody>
      </table>
      </div>






</x-app-layout>