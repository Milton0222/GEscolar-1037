<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        
        </x-slot>

        <x-validation-errors class="mb-4" />

      <div class="wrapper2">
        
      <div class="info-text login" style="background-image: url('assetes/img/register.jpg')">
        <div class="opac"></div>
            <h2>Bem Vindo</h2>
            <p>"Estamos animados para <br> conhecê-lo(a)!  Registre-se<br> para começar." "</p>
           
        </div>

        <span class="bg-animate"></span>
        <div  class="form-box login">
        <div class="login-icon">
           <h2>Cadastrar</h2>
           <a href="/">
           <i class="fa-solid fa-user"></i>
            </a>
           </div>
           
           
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-box">
                    <input  type="text" name="name" :value="old('Nome')" required autofocus autocomplete="username" required>
                    <label for=" ">Nome</label>
                    <i class='bx bxs-user' ></i>
                </div>

                <div class="input-box">
                    <input  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" required>
                    <label for=" ">email</label>
                    <i class='bx bxs-user' ></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" required autocomplete="current-password" required>
                    <label for=" ">Senha</label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>

                <div class="input-box">
                    <input id="password_confirmation" type="password"  name="password_confirmation" required autocomplete="current-password" required>
                    <label for=" ">Senha</label>
                    <i class='bx bxs-lock-alt' ></i>
                </div>

            
                <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600" id="lembrar">{{ __('Lembrar') }}</span>
                </label>
            </div>
                
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
          <br>
   
                <button type="submit" class="btn">Cadastrar</button>

                <div class="logreg-link">
                    <p>Possui uma conta?  <a href="{{route('login')}}">Entrar</a></p>
                  
                </div>

            </form>
        </div>
       
    </div>
    </x-authentication-card>
</x-guest-layout>
