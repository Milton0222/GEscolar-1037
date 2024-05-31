<x-app-layout>



    <div class="" style="   height: auto;" >
        <div class="" style="    height: 100%;  ">
            <div class="dashbo" style="height: 100%; ">

                    <div class="container" style="margin-top:15px; ">
                  <div class="row" id="roww" style="display: flex;  flex-wrap: wrap;">
                  <div  class="canva2" >
                                     <div class="divv-box" id="pri">
                                        <div class="div-icon">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <div class="div-textos">
                                            <strong>+{{$aluno}}</strong>
                                            <p>Alunos</p>
                                            <a href="{{route('v-aluno')}}">detalhess</a>
                                        </div>
                                    </div>

                                    <div class="divv-box">
                                        <div class="div-icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                        <div class="div-textos">
                                            <strong>+{{$professor}}</strong>
                                            <p>Professores</p>
                                            <a href="{{route('v-Prof')}}">detalhes</a>
                                        </div>
                                    </div>
                                    <div class="divv-box">
                                        <div class="div-icon">
                                        <i class="fa-solid fa-users"></i>
                                            <!--<i class="fa-solid fa-store"></i>-->
                                        </div>
                                        <div class="div-textos">
                                            <strong>+{{$user}}</strong>
                                            <p>Utilizadores</p>
                                            <a href="{{route('v-definicoes')}}">detalhes</a>
                                        </div>
                                    </div>
                      </div>
                  <div  class="canva1"  >
                      <canvas id="myChart" ></canvas>
                  </div>
                     
          
                      </div>
                      <!--
                      <div  class="canva3" >
                      <canvas style="" id="myCharttt"></canvas>
                        </div>-->

                    </div>


            
     

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [ ' {!! $nome !!}' ],
        datasets: [{
            label: 'Avaliação Docente-Média',
            data: [ '{!! $result !!} '],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
 
  var ctxxx = document.getElementById('myCharttt').getContext('2d');
var myChart = new Chart(ctxxx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

 var ctxx = document.getElementById('myChartt').getContext('2d');
var myChart = new Chart(ctxx, {
    type: 'polarArea',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 20, 8, 6, 10],
            backgroundColor: [
                '#33A3EC',
                '#47BA8E',
                '#FFCF55',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

  
</script>

      
      

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
