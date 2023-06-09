@extends('layouts.sideba')


@section('body')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
    <div class="card mb-10 divback">
  <div class="card-header text-header">
        
  </div>
  <div class="card-body">
    <div class="form-row"> 
    <div class="col-11.3">
<form class="row g-3 margin-top-12" method="post" action="{{ route('input.store') }}">
    @csrf

    <div class="card mb-10 search-box">
          <div class="card-header title-white text-header">
              Obersavações
          </div>
          <div class="card-body">
          <div class="form-row">

            <div class="form-group col-md-4 textare">
            <textarea name="text" lass="form-control"  rows="25" cols="60" placeholder="Digite o texto aqui..."></textarea>
            </div>

          </div>
          </div>
    </div>

    <div class="card mb-10 search-box" >
          <div class="card-header text-header title-white">
            Dados pessoais
          </div>
          <div class="card-body">
          <div class="form-row">

            <div class="form-group col-md-4">
            <label class="form-label title-input">Nome Completo</label>
            <input type="text" name="nome" class="form-control" >
            </div>

            <div class="form-group col-2">
              <label class="form-label title-input">CPF
              <a href="https://servicos.receita.fazenda.gov.br/servicos/cpf/consultasituacao/consultapublica.asp" 
              >Consulta CPF</a></label>
              <input type="text" name="cpf" class="form-control">
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-input">Data de nascimento</label>
              <input type="text" name="data_nascimento" class="form-control" >
            </div>

            <div class="form-group col-3">
              <label  class="form-label title-input">E-mail</label>
              <input type="email" name="email" class="form-control"  placeholder="exemplo@gmail.com">
            </div>

            <div class="form-group col-md-4">
              <label class="form-label title-input">Nome da Mãe</label>
              <input type="text" name="mae" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-input">Numero RG</label>
              <input type="text" name="rg" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-input">Telefone</label>
              <input type="text" name="tell1" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-input">Segundo Telefone</label>
              <input type="text" name="tell2" class="form-control" >
            </div>

          </div>
          </div>
    </div>
    
    <div class="card mb-10 search-box" >
      <div class="card-header text-header title-white">
        Endereço
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-input">Cep</label>
            <input type="text" name="cep" id="cep" value="" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-input">Logradouro</label>
            <input type="text" name="logradouro" value="" id="logradouro" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-input">Bairro</label>
            <input type="text" name="bairro" id="bairro" value="" class="form-control" placeholder="exemplo@gmail.com">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-input">Numero</label>
            <input type="text" name="numero" class="form-control">
          </div>

          <div class="form-group col-md-3 mb-3">
            <label class="form-label title-input">Complemento</label>
            <input type="text" name="complemento" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-input">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-input">UF</label>
            <input type="text" name="uf" id="uf" class="form-control">
          </div>

          <div class="form-group col-md-3 mb-3">
            <label class="form-label title-input">Ponto de referencia</label>
            <input type="text" name="referencia" class="form-control">
          </div>
        </div>
      </div>
    </div>



    
      <!-- GRUPO03 -->
     


    <div class="card mb-10 search-box">
        <div class="card-header text-header title-white">
        Produtos
        </div>
        <div class="card-body">
        <div class="form-row"> 

          <div class="form-group col-md-5">
          <label  class="form-label title-input">Virtua</label>
            <select  name="virtua" class="form-select">
              <option value="">Internet</option>
              @foreach($NET as $nt)
                <option value="{{$nt->net}}">{{$nt->net}}</option>
              @endforeach
            </select>
        </div>
          <div class="form-group col-md-5">
          <label  class="form-label title-input">Grade de Canais</label>
            <select  name="canais" class="form-select">
              <option value="">Grade de canais</option>
              @foreach($TV as $gd)
                <option value="{{$gd->tv}}">{{$gd->tv}}</option>
              @endforeach
            </select>
        </div>
          <div class="form-group col-md-5">
          <label   class="form-label title-input">Fixo</label>
          <select name="fixo" class="form-select">
              <option value="">Fixo</option>
              @foreach($FIX as $fx)
                <option value="{{$fx->fixo}}">{{$fx->fixo}}</option>
              @endforeach
          </select>
        </div>
          <div class="form-group col-md-5">
          <label  class="form-label title-input">Celular</label>
            <select name="celular"  class="form-select">
            <option value="">Plano Movel</option>
            @foreach($MOVEL as $ml)
                <option value="{{$ml->cell}}">{{$ml->cell}}</option>
            @endforeach
            </select>
        </div>
        
        </div>
      </div>
    </div>

    <div class="card mb-10 search-box">
        <div class="card-header  text-header title-white">
        Descrição
        </div>
        <div class="card-body">
        <div class="form-row"> 

        <div class="form-group col-md-5">
        <label  class="form-label title-input">Forma de Pagamento</label>
          <select  name="pagamento" class="form-select"  id="forma_pagamento">
            <option value="BOLETO">BOLETO</option>
            <option value="DEBITO EM CONTA">DEBITO EM CONTA</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="vencimento" class="title-input">Dia da Fatura</label>
            <Select name="fatura" class="form-select">
              <option value="">Escolha a data</option>
                @foreach($DAY as $dy)
                  <option value="{{$dy->day}}">{{$dy->day}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group col-md-5" id="campos_debito" style="display: none;" >
        <label for="banco " class="form-label title-input">Banco</label>
        <select name="banco"  id="banco" class="form-select">
                <option value="BANCO DO BRASIL">BANCO DO BRASIL</option>
                <option value="CAIXA ECONOMICA">CAIXA ECONOMICA</option>
                <option value="NUBANK">NUBANK</option>
                <option value="C6BANK">C6BANK</option>
        </select>
        </div>
        <hr>
        <div class="form-group col-md-1" id="campos_conta" style="display: none;">
        <label class="form-label title-input">Conta</label>
        <input type="text" name="conta_dcc" id="conta" class="form-control" >
        </div>
        <div class="form-group col-md-1" id="campos_agencia" style="display: none;">
        <label  class="form-label title-input">Agência</label>
        <input type="text" name="agencia_dcc"  id="agencia" class="form-control" >
        </div>
      </div>
      <hr class="search-box"  > 
      <div class="col-12">
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn rbt">Cadastrar</button>
      </div>
      </div>

    </div>
  </div>
</div>
</form>

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
