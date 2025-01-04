<x-app-layout>
    <div class="recibo-pagamento">

    @foreach($aluno as $lista)
        <div class="sub-recibo">
            <div class="recib-titulos">
               <h1>Recibo de Pa gamento</h1>
            <h2>ESCOLA BG 1037 CDTE AUGUSTO CHIPENDA </h2> 
            </div>
            
                
                <div class="alun">
                    <div class="alun2">
                        <label for="">Aluno</label>
                    <select name="" id="" disabled>
                        <option value="">{{$lista->nome}}</option>
                     
                    </select> 
                    </div>

                    <div class="alun2">
                        <label for="">Número de Matrícula</label>
                    <select name="" id=""  disabled>
                        <option value="">{{$lista->id}}</option>
                        
                    </select> 
                    </div>

                </div>

                <div class="alun">
                    <div class="alun3">
                        <label for="">Tipo de Serviço</label>
                        <select name="" id="" disabled>
                            <option value="">Emulumento</option>
                         
                        </select>
                    </div>

                    <div class="alun3">
                    <label for="">Valor de Pagamento</label>
                   <select name="" id="">
                       <option  value="{{App\Models\propina::find($lista->idpropina)->valor}}">{{App\Models\propina::find($lista->idpropina)->valor}}</option>
                   </select>
                    </div>
              
                    <div class="alun3">
                    <label for="">Tipo de Pagamento</label>
                    <select name="" id="" disabled>
                        <option value="">Dinheiro</option>
                    </select>
                     </div>

               </div>
               
               
               <div class="alun">
                
                    <div class="assinatura">
                        <label for="">Responsavel</label>
                        <select name="" id="" disabled>
                            <option value="">{{App\Models\User::find($lista->usuario)->name}}</option>
                        </select>
                    </div>

                    <div class="dataa">
                       <span>Data de Pagamento</span><br>
                        <span>{{$lista->created_at}}</span>
                    </div>
                </div>

               <div class="alun5">
            <span>Recibo Numero: <span>{{$lista->idpropina}}</span></span>
                </div>
        </div>
        @endforeach
    </div>
    
    </x-app-layout>