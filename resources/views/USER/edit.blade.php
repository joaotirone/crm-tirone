
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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>

    <br>
<div class="container">
  <div class="row">
<div class="col-md-11.5 mx-auto">
<div class="card mb-10 divback">
<div class="card-header text-header  title-white">
    
</div>
<div class="form-row"> 
<div class="card-body ">
<div class="col-11.3">

<div class="card mb-12  search-box ">
<form class="row g-3 margin-top-12 p-2" method="post" action="{{ URL('/user/update/'.$fun->id) }}">
    @csrf
    @method('PUT')
    
    
          <div class="card-header title-white text-header">
            Dados pessoais
          </div>
          <div class="card-body">
          <div class="form-row">

            <div class="form-group col-md-3">
            <label class="form-label title-white">Nome Completo</label>
            <input type="text" name="name" value="{{$fun->name}}" class="form-control" >
            </div>
            <div class="form-group col-md-3">
            <label class="form-label title-white">Usuario</label>
            <input type="text" name="user_name" value="{{$fun->user_name}}" placeholder="Jose.Campos" class="form-control" >
            </div>
            
            <div class="form-group col-2">
              <label class="form-label title-white">CPF</label>
              <input type="text" name="cpf" value="{{$fun->cpf}}" class="form-control">
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Data de nascimento</label>
              <input type="text" name="birthday" value="{{$fun->birthday}}" class="form-control" >
            </div>
            <div class="form-group col-md-2">
            <label  class="form-label title-white">Cargo</label>
            <select name="role_id"  class="form-select">

            @foreach($CARGO as $co)
            <option value="{{$co->id}}" @if($co->id == $fun->role_id) selected @endif>{{$co->name}}</option>
            @endforeach
            </select>
            </div>


            <div class="form-group col-md-2">
              <label  class="form-label title-white">Telefone</label>
              <input type="text" name="tell"  value="{{$fun->tell}}" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">Segundo Telefone</label>
              <input type="text" name="tell2"  value="{{$fun->tell2}}" class="form-control" >
            </div>

            <div class="form-group col-md-2">
              <label  class="form-label title-white">supervisor</label>
              <select name="supervisor_id"  class="form-select">

                @foreach($SUPER as $SR)
                <option value="{{$SR->id}}" @if($SR->id == $fun->supervisor_id) selected @endif>{{$SR->user_name}}</option>
                @endforeach

            </select>
            </div>

          </div>
          </div>
    </div>
 
    <br>

    
    <div class="card mb-10 search-box" >
      <div class="card-header title-white text-header">
        Endereço
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Cep</label>
            <input type="text" name="cep" id="cep" value="{{$fun->cep}}" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Logradouro</label>
            <input type="text" name="logradouro" value="{{$fun->logradouro}}"  id="logradouro" class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Bairro</label>
            <input type="text" name="bairro" id="bairro"  value="{{$fun->bairro}}"  class="form-control" placeholder="exemplo@gmail.com">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-white">Numero</label>
            <input type="text" name="num_fachada"  value="{{$fun->num_fachada}}"  class="form-control">
          </div>

          <div class="form-group col-md-3 mb-3">
            <label class="form-label title-white">Complemento</label>
            <input type="text" name="complemento" value="{{$fun->complemento}}"  class="form-control">
          </div>

          <div class="form-group col-md-2 mb-3">
            <label class="form-label title-white">Cidade</label>
            <input type="text" name="cidade"  value="{{$fun->cidade}}" id="cidade"  class="form-control">
          </div>

          <div class="form-group col-md-1 mb-3">
            <label class="form-label title-white">UF</label>
            <input type="text" name="uf" value="{{$fun->uf}}" id="uf"  class="form-control">
          </div>

          <div class="col-12">
        <button type="submit" class="btn rbt">Atualizar</button>
        </form>
        <a href="{{ URL('/user/destroy/'.$fun->id) }}">
        <button class="btn rbt-red btn-sm"><i class="fa fa-eye"></i>
            deletar
        </button>
        </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
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


