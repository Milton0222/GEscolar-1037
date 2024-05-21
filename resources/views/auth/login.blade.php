

<x-guest-layout>
    <x-authentication-card >
        <x-slot name="logo">
          
        </x-slot>

    
    
    
        <x-validation-errors class="mb-4 " />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



        <div class="wrapper" >
        <span class="bg-animate"></span>
        <div class="form-box login" >
            <div class="login-icon">
            <h2>LOGIN</h2>
                <a href="/">
             
            <i class="fa-solid fa-right-to-bracket"></i>
                </a>
           
           </div>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="input-box">
                    <input  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" required>
                    <label for=" ">Utilizador</label>
                    <i class='bx bxs-user' ></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" required autocomplete="current-password" required>
                    <label for=" ">Senha</label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>

            
                <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600" id="lembrar">{{ __('Lembrar') }}</span>
                </label>
            </div>
                    @if (Route::has('password.request'))
                                        <a id="lembrar" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('Recuperar senha?') }}
                                        </a>
                                    @endif
          <br>
    <br>
                <button type="submit" class="btn">Entrar</button>

                <div class="logreg-link">
                    <p>Não tem uma conta?  <a href="{{route('register')}}">Criar Conta</a></p>
                  
                </div>

            </form>
        </div>
        <div class="info-text login" style="background-image: url('assetes/img/login1.jpeg')">
        <div class="opac"></div>
            <h2 >Bem-Vindo</h2>
            <p>"O sucesso começa com uma<br> boa entrada.  Faça login <br>e comece o seu dia!"</p>
           
        </div>
    </div>






    </x-authentication-card>
</x-guest-layout>
