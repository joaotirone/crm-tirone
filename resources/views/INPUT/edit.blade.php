@extends('layouts.sideba')


@section('body')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
<br>
<div class="container">
  <div class="row">
<div class="col-md-11.5 mx-auto">
<div class="card mb-10 divback">
<div class="card-header text-header  title-white">
    
</div>
<div class="card-body">
<div class="form-row"> 
        
        
      <div class="col-11.3">
    <div class="card mb-10 search-box">
          <div class="card-header text-header title-white">
          Obersavações
          </div>
            <div class="card-body">
              <div class="form-row">
                  <div class="col-md-5">
                  <div class="ms-2"> 
                    <form action="#">
                    <textarea id="chatTextArea" name="text-back" class="form-control" readonly disabled rows="25" cols="20"></textarea>
                    <input type="hidden" id="vend_Id" value="{{$vend->id}}">
                    </form>
                  </div>
                  </div>

                  <div class="col-md-5">
                  <div class="ms-3"> 
                    <form method="POST" action="  URL('/input/edit/notas') ">
                    @csrf
                    <textarea id="noteText" name="text" class="form-control" rows="25" cols="60"></textarea>
                    <input type="hidden" id="vendId" value="{{$vend->id}}">
                    <div class="d-flex justify-content-end">
                    <button id="nota" class="btn rbt ml-auto px-4 py-2"> 
                     Obs <i class='bx bx-message-square-add icon' ></i></button>
                    </div>  
                    </form>
                  </div> 
                  </div> 
                </div>
            </div>
    </div>
    <hr>
  <br>
  <form class="row g-3 margin-top-12" method="post" enctype="multipart/form-data" action="{{ URL('/input/update/'.$vend->id) }}" >
    @csrf
    @method('PUT')

    <div class="card mb-10 search-box">
          <div class="card-header text-header title-white">
            Dados pessoais
          </div>
          <div class="card-body">
          <div class="form-row">

            <div class="form-group col-md-4">
            <label class="form-label title-white">Nome Completo</label>
            <input type="text" name="nome" value="{{$vend->nome}}" class="form-control" >
            </div>

            <div class="form-group col-2">
              <label class="form-label title-white">CPF
              <a href="https://servicos.receita.fazenda.gov.br/servicos/cpf/consultasituacao/consultapublica.asp" 
              >Consulta CPF</a></label>
              <input type="text" name="cpf" value="{{$vend->cpf}}" class="form-control">
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Data de nascimento</label>
              <input type="text" name="data_nascimento" value="{{$vend->data_nascimento}}" class="form-control" >
            </div>

            <div class="form-group col-3">
              <label  class="form-label title-white">E-mail</label>
              <input type="email" name="email" value="{{$vend->email}}" class="form-control"  placeholder="exemplo@gmail.com">
            </div>

            <div class="form-group col-md-4">
              <label class="form-label title-white">Nome da Mãe</label>
              <input type="text" name="mae" value="{{$vend->mae}}" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Numero RG</label>
              <input type="text" name="rg" value="{{$vend->rg}}" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Telefone</label>
              <input type="text" name="tell1" value="{{$vend->tell1}}" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Segundo Telefone</label>
              <input type="text" name="tell2" value="{{$vend->tell2}}" class="form-control" >
            </div>

          </div>
          </div>
    </div>
    <hr>
  <br>
    <div class="card mb-10 search-box">
      <div class="card-header text-header title-white">
        Endereço
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Cep</label>
            <input type="text" name="cep" id="cep" value="{{$vend->cep}}" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Logradouro</label>
            <input type="text" name="logradouro" value="{{$vend->logradouro}}" id="logradouro" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Bairro</label>
            <input type="text" name="bairro" value="{{$vend->bairro}}" id="bairro" class="form-control">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-white">Numero</label>
            <input type="text" name="numero" value="{{$vend->numero}}" class="form-control">
          </div>

          <div class="form-group col-md-3 mb-3">
            <label class="form-label title-white">Complemento</label>
            <input type="text" name="complemento" value="{{$vend->complemento}}" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Cidade</label>
            <input type="text" name="cidade" value="{{$vend->cidade}}" id="cidade" class="form-control">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-white">UF</label>
            <input type="text" name="uf" value="{{$vend->uf}}" id="uf" class="form-control">
          </div>

          <div class="form-group col-md-3 mb-3">
            <label class="form-label title-white">Ponto de referencia</label>
            <input type="text" name="referencia" value="{{$vend->referencia}}" class="form-control">
          </div>
        </div>
      </div>
    </div>



    
      <!-- GRUPO03 -->
      <hr>
    <br>
    <br>

    <div class="card mb-10 search-box">
        <div class="card-header text-header title-white">
        Produtos
        </div>
        <div class="card-body">
        <div class="form-row"> 

          <div class="form-group col-md-5">
          <label  class="form-label title-white">Virtua</label>
            <select  name="virtua" class="form-select">
              <option value="{{$vend->virtua}}">{{$vend->virtua}}</option>
              <option value="">Internet</option>
              @foreach($NET as $nt)
                <option value="{{ $nt->net}}">{{ $nt->net}}</option>
              @endforeach
            </select>
        </div>
          <div class="form-group col-md-5">
          <label  class="form-label title-white">Grade de Canais</label>
            <select  name="canais" class="form-select">
            <option value="{{$vend->canais}}">{{$vend->canais}}</option>
              <option value="">Grade de canais</option>
                @foreach($TV as $gd)
                  <option value="{{$gd->tv}}">{{$gd->tv}}</option>
                @endforeach
            </select>
        </div>
          <div class="form-group col-md-5">
          <label   class="form-label title-white">Fixo</label>
            <select name="fixo" class="form-select">
            <option value="{{$vend->fixo}}">{{$vend->fixo}}</option>
              <option value="">Linha Fixa</option>
              @foreach($FIX as $fx)
                <option value="{{$fx->fixo}}">{{$fx->fixo}}</option>
              @endforeach
            </select>
        </div>
          <div class="form-group col-md-5">
          <label  class="form-label title-white">Celular</label>
            <select name="celular"  class="form-select">
              <option value="{{$vend->celular}}">{{$vend->celular}}</option>
              <option value="">Plano Movel</option>
                @foreach($MOVEL as $ml)
                  <option value="{{$ml->cell}}">{{$ml->cell}}</option>
                @endforeach
            </select>
        </div>
        
        </div>
      </div>
    </div>
  <hr>
  <br>
        <!-- GRUPO03 -->

        <div class="card mb-8 search-box" >
        <div class="card-header text-header title-white">
        Pagamento
        </div>
        <div class="card-body">
        <div class="form-row"> 

        <div class="form-group col-md-7">
        <label  class="form-label title-white">Forma de Pagamento</label>
          <select  name="pagamento" class="form-select" id="forma_pagamento">
            <option value="BOLETO" {{ ($vend->pagamento == "BOLETO") ? "selected":"" }}>BOLETO</option>
            <option value="DEBITO EM CONTA" {{ ($vend->pagamento == "DEBITO EM CONTA") ? "selected":"" }}>DEBITO EM CONTA</option>
          </select>
      </div>
      <div class="form-group col-md-5">
          <label for="vencimento" class="title-white">Dia da Fatura</label>
            <Select name="fatura" class="form-select">
              <option value="{{$vend->fatura}}">{{$vend->fatura}}</option>
                @foreach($DAY as $dy)
                  <option value="{{$dy->day}}">{{$dy->day}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group col-md-5" id="campos_debito" style="display: none;" >
        <label  class="form-label title-white">Banco</label>
        <select name="banco" id="banco" class="form-select">
                <option value="BANCO DO BRASIL">BANCO DO BRASIL</option>
                <option value="CAIXA ECONOMICA">CAIXA ECONOMICA</option>
                <option value="NUBANK">NUBANK</option>
                <option value="C6BANK">C6BANK</option>
        </select>
      </div>
      <div class="form-group col-md-1" id="campos_conta" style="display: none;">
        <label class="form-label title-white">Conta</label>
        <input type="text" name="conta_dcc" id="conta" value="{{$vend->conta_dcc}}" class="form-control" >
        </div>
        <div class="form-group col-md-1" id="campos_agencia" style="display: none;">
        <label  class="form-label title-white">Agência</label>
        <input type="text" name="agencia_dcc"  value="{{$vend->agencia_dcc}}" id="agencia" class="form-control" >
        </div>
      </div>
      </div>
    </div>
  <hr>
  <br>
    <br>
    <br>
    

    <div class="card mb-10 search-box"  >
        <div class="card-header text-header title-white ">
        Descrição
        </div>
        <div class="card-body">
        <div class="form-row"> 

        <div class="form-group col-md-4">
          <label  class="form-label title-white">Status</label>
          <select  name="status_sales" class="form-select">
                  <option value="Auditado">Auditado</option>
            <option value="Pendente Instalação">Pendente Instalação</option>
            <option value="Instalada">Instalada</option>
          </select>
        </div>
        @if(auth()->user()->can('update_venda'))
          <div class="form-group col-md-4">
          <label  class="form-label title-white">Data de Agendamento</label>
          <input type="text" name="data_instal" value="{{$vend->data_instal}}" class="form-control" >
        </div>
          <div class="form-group col-md-4">
          <label   class="form-label title-white">Numero do contrato</label>
          <input type="text" name="num_contrato" value="{{$vend->num_contrato}}" class="form-control" >
        </div>
        <div class="form-group col-md-4">
              <label  class="form-label title-white">Salvar Arquivos de img</label>
              <input type="file" name="image" class="form-control" >
            </div>
        </div>
        @endif
      @if(auth()->user()->can('update_venda'))
      <div class="col-12">
      <div class="d-flex justify-content-between">
          <button type="submit" class="btn rbt">Atualizar</button>
      </form>
      @endif
      @if(auth()->user()->can('delete'))
      <form action="{{ URL('/input/destroy/'.$vend->id) }}" method="POST">
            
          @csrf
          @method('DELETE')
          <button type="submit" class="btn rbt-red btn-sm">
              <i class="fa fa-eye"></i> deletar
          </button>
      </form>
      </div>
      </div>
      @endif
    </div>
  </div>
</div>

@if (Session::has('message'))
    <script>
      swal("Message", "{{Session::get('message')}}", 'success',{
        button:true,
        button:"OK",
      });
    </script>
    @endif
      </div>
  
    </div>
  </div>
</div>

</div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#nota').click(function(e) {
            e.preventDefault();
            
            var noteText = $('#noteText').val();
            var vendId = $('#vendId').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/input/edit/notas',
                type: 'POST',
                data: {
                    _token: csrfToken,
                    text: noteText,
                    vendId: vendId
                },
                success: function(response) {
                    // Processar a resposta (opcional)
                    console.log(response);
                    // Limpar o campo de texto
                    $('#noteText').val('');
                },
                error: function(xhr, status, error) {
                    // Lidar com erros (opcional)
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        setInterval(function() {
            var vendId = $('#vend_Id').val();

            $.ajax({
                url: "{{ route('input.getChatData') }}",
                type: "GET",
                data: {vend_id: vendId},
                success: function(response) {
                    $('textarea[name="text-back"]').val(response);
                },
                error: function(xhr, status, error) {
                console.log("Status da requisição: " + status);
                console.log("Erro: " + error);
            }
            });
        }, 5000); // Atualiza a cada 5 segundos (5000 milissegundos)
    });
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $("#forma_pagamento").change(function() {
        if ($(this).val() === "DEBITO EM CONTA") {
            $("#campos_debito").show();
            $("#campos_conta").show();
            $("#campos_agencia").show();
        } else {
            $("#campos_debito").hide();
            $("#campos_conta").hide();
            $("#campos_agencia").hide();
        }
    });
});

        $(document).ready(function () {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
                $("#via").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function () {

                //Nova variável com valor do campo "cep".
                var cep = $(this).val();

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{5}-?[0-9]{3}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")
                        $("#ibge").val("...")
                        //74937420
                        //Consulta o webservice viacep.com.br/
                        //https://viacep.com.br/ws/74937-420/json/?callback=callback_name
                        $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
@endsection
