<x-app-layout>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pauta Académica</h5>
        <button style="color:#000" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
    <div   class="modal-body">

  
<div class="pauta-ver">
            <div class="pauta-ver-header">
            <div class="texto-header">
                <h1>REPÚBLICA DE ANGOLA</h1>
                <h1>MINISTÉRIO DA EDUCAÇÃO</h1>
                <h1>COMPLEXO ESCOLAR NOSSA SENHORA DE FÁTIMA-SELES </h1>
            </div>
            <div class="outro-header">
                <div class="pri">
                    <p>Classe: <span>{{$classe}} classe</span></p>
                    <p>Turma: <span>{{$turma}}</span></p>
                    <p>Periodo:<span>{{$periodo}}</span></p>
                </div>
              <div class="segund">
              <p>Ano Lectivo: <span>{{$anoLectivo}}</span></p>
              <p>Ano de Conclusão: <span>...</span></p>
              <p>Esttudante:<span>{{$estudante}}</span></p>
              </div>
            
            </div>
            </div>

            <div class="pauta-bady">
                <div class="listaa">
                    <table class="table">
                    <thead class="thead-tr-tdd">
                        <tr>
                        
                            <th scope="col">Disciplina</th>
                            <th scope="col">Média</th>
                            <th scope="col">Resultado</th>
                         
                        </tr>
         </thead>

         <tbody class="tbody-tr-tdd">
             @foreach($pauta as $lista)
            <tr>
               
                <td>{{$lista->disciplina}}</td>
                <td>{{$lista->nota}}</td>
                <td>{{$lista->classificacao}}</td>
            
            </tr>

          @endforeach

         </tbody>
                    </table>
                </div>
            </div>
             

            <div class="data-prof">
                @php 
                    $ano=Date('Y-d-m')
                @endphp
                <span>Data: {{$ano}}</span>
                <p>O director</p>
            </div>

            <div class="imprimir">
             <a href=""> <i class='bx bxs-printer'></i>imprimir</a>
            </div>
        </div>
        </div>
</x-app-layout>