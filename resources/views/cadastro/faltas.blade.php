<x-app-layout>

<div class="cliente-lista">
            <div class="titulo">
            <h1>Gestão de Falta</h1>
        </div>
                <div class="cadastrar-pesquisar">
                 <a href="" data-bs-toggle="modal" data-bs-target="#cadastroProf"><i class="fa-solid fa-plus"></i> Novo</a>
                 <form action="" method="get" name="pesquisar">
                 <div class="search">
                      <input placeholder="Search..." type="text" required>
                      <button type="submit">Ir</button>
                    </div>
                 </form>
                    
                </div>
    </div>
       
    <div class="tabela-estilo">
    <table class="table" id="tabelaa">
        <thead>
          <tr >
            <th scope="col">Estudante</th>
            <th scope="col">Presença</th>
            <th scope="col">Data</th>
            
            <th style="text-align: center;" colspan="1" scope="col">Métodos</th >
          
          </tr>
        </thead>
        <tbody>
            @foreach($faltas as $lista)
            <tr>
            <td>{{App\Models\estudante::find($lista->estudante)->nome}}</td>
            <td>{{$lista->tipo}}</td>
            <td>{{$lista->data}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <div class="tooltip-container"> 
                    <button type="" class="btn-apagar" data-bs-toggle="modal" data-bs-target="#apagar{{$lista->id}}"> <i class='bx bx-trash'></i></button>
                    <span class="tooltip" style="background-color: rgb(237, 102, 102)">Apagar</span>
                  </div>
                  <div class="tooltip-container">
                  
                  <button  class="text btn-histor" data-bs-toggle="modal" data-bs-target="#actualizar{{$lista->id}}"><i class="bi bi-person-fill-add"></i></button> 
                  <span class="tooltip">Actualizar</span>

                </div>
            </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    

</x-app-layout>