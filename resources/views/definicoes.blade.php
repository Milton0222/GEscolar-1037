<x-app-layout>
        <div class="definicoes-user">
            <div class="h11">  
                <h1  >Conceda permissões aos usuários</h1>
        </div>
        
 @foreach($usuarios as $lista)
        <div class="defi-user-box">
        <i class="fa fa-user "></i>
        <div class="name">
            <h2>{{$lista->name}}</h2>
            <P>{{$lista->email}}</P>
        </div>

        <div class="user-permi">
          <form action="{{route('user.permission',$lista->id)}}" method="PUT" class="form">
             @csrf
             <div>
                <span>Admin</span>
                <input type="checkbox" name="adimin">
              </div>

              <div>
                <span>Secretaria</span>
                <input type="checkbox" name="secretaria">
              </div>

              <div>
                <span>Aluno</span>
                <input type="checkbox" name="aluno">
              </div>

              <div>
                <span>Professor</span>
                <input type="checkbox" name="professor">
              </div>
              <hr>
                <div class="buttonn">
                        <button type="submit">Salvar</button>
                </div>

          </form>
             

          
        </div>
         
 
        </div>

@endforeach

    </div>
    </x-app-layout>