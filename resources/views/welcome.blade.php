<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="{{asset('assetes/css/estilo.css')}}">
         <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
         <link href="./output.css" rel="stylesheet">
         <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <!-- Styles -->
        <style>
         

            
        </style>
    </head>
    <body style="margin:0; padding:0px">
    
        <div class="div-principall " style="background-image: url('/assetes/img/register.jpg') ;">
        <div class="div-opaci"></div>
      
       
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10" id="header-cabeca">
                    <div class="logo">
                  <h1> <i class='bx bxs-school'></i> GESTão <span>ESCOLAR </span></h1>
                    </div>

                    <div style="padding-right:10px">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="cadstro" >Painel Principal</a>
                    @else
                        <a href="{{ route('login') }}" class="login">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="cadstro">Registar</a>
                        @endif
                    @endauth</div>
                
            @endif</div>
                           
                 <div class="ttitulo-pri">
                            <div class="ttitulo">
                                                
                                 <span class="span1">SECRETARIA PEDAGOGICA  </span>
                                 <span class="span2"> ESCOLA BG 1037 CDTE AUGUSTO CHIPENDA</span>
                                <span class="h2">"Pela qualidade da Educação Trabalhemos em Equipe." </span>

                               </div>
                                       </div>


                    <div class="publicidadee">
                               

                                    <div class="contactoo">
                                    <div class="group duration-500 hover:-skew-x-0 skew-x-6 hover:translate-x-2"  id="xxxx" >
                                    <div class="containerrr" id="contt">
                                        <div>
                                        <i  class='bx bx-current-location'></i>
                                        </div>
                                        <div>
                                            <p class="">Benguela, Angola</p>
                                          <p class="">Rua: a definir</p>
                                        </div>
                                          
                                    </div>
                                    </div>
                                    <!--
                                    <div class="localizar">
                                        <div>

                                        </div>
                                    <div class="localizar-texto">
                                        <p>Rua N00000000000</p>
                                        <p>Rua N00000000000</p>
                                        <p>Rua N00000000000</p>
                                    </div>
                                    </div> -->
                                      <div class="contact-bo">
                                                <div class="contactoo-box">
                                            <i class='bx bx-phone'></i>
                                            <p>+224 9xx xxx xxx</p>
                                            </div>

                                            <div class="contactoo-box">
                                            <i class='bx bx-phone'></i>
                                            <p>+224 9xx xxx xxx</p>
                                            </div>
                                      </div>

                                      <div class="vetor">

                                      </div>
                                      

                                      </div>
                                      
                                     
                               </div>    
       </div>
    </body>
</html>
