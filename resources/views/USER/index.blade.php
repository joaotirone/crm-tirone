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


<section>
  <div class="row">
<div class="col-md-11.5 mx-auto">
<div class="card mb-10 divback">
<div class="card-header text-header  title-white">
    
</div>
<div class="form-row"> 
<div class="card-body ">
<div class="col-11.3">

<div class="card mb-12  search-box ">
  <div class="card-header title-white text-header">
  Filtro de Usuarios
  </div>
  <div class="card-body">
    <div class="form-row">
    <form action="{{ route('user.search') }}" method="post" class="card-text p-4">
      @csrf
      <!-- Form_Search_Filter -->
      <div class="row vaing-wrapper">
        <div class="input-field col-10">
        <input type="text" name="user_name"  class="form-control form-control-sm" placeholder="USER NAME" value="{{$user_name}}">
        </div>
        <br>
        <br>
      </div>
      <div class="row vaing-wrapper">
        <br>
        <div class="input-field col-10">
        <input type="text" name="cpf"  class="form-control form-control-sm" placeholder="CPF:" value="{{$cpf}}">
        </div>
              
        <br>
      </div>
      <br>
      <div class="row vaing-wrapper">
        <div class="input-field col-10">
            <select name="role_id"  class="form-select">
                <option value="">Cargo</option>
                @foreach($CARGO as $co)
                <option value="{{$co->id}}">{{$co->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
      </div>
      <br>
      <br>
      <!-- Botões -->
      <div class="d-flex justify-content-end">
          <button type="submit" class="btn rbt btn-sm mr-2">Filtrar</button>
          <a href="{{route('user.index')}}" class="btn rbt-red btn-sm mr-2">Limpar Filtro</a>
          <a href="{{route('user')}}" class="btn rbt-green btn-sm mr-2">Criar Usuário</a>
        </div>
    </form>
  </div>
</div>

<br>
<section>
<div class="card search-box">
<div class="card-header text-header title-white">
    Usuarios
    </div>
    <div class="card-body">
    <table id="tbl1"  class="table  title-white table-hover search-box" > 
        <thead>
        <tr class="search-box">
            <th>NOME DE USUARIO</th>
            <th>CPF</th>
            <th>DATA DE NASCIMENTO</th>
            <th>OPÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fun as $f)
        <tr>
            <td> {{$f->user_name}}  </td>
            <td> {{$f->cpf}}</td>
            <td> {{$f->birthday}}</td>
            
            <td>
                <a href="{{ URL('/user/edit/'.$f->id) }}">
                    <button class="btn rbt   btn-sm"><i class="fa fa-eye"></i>
                     Ver Detalhes
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
</section>
@endsection

