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
    <h5 class="card-header title-white">Filtro de banda larga</h5>
    <form action="{{ route('net.search') }}" method="post" class="card-text p-4">
      @csrf
      <!-- Form_Search_Filter -->
      
      <div class="row vaing-wrapper">
        <div class="input-field col-2">
        <input type="text" name="velocidade"  class="form-control form-control-sm" placeholder="Velocidade da internet" value="{{$velocidade}}">
        </div>
        <br>
        <br>
      </div>

      <!-- Botões -->

      <div class="d-flex justify-content-end">
          <button type="submit" class="btn rbt btn-sm mr-2">Filtrar</button>
          <a href="{{route('net.index')}}" class="btn rbt-red btn-sm mr-2">Limpar Filtro</a>
          <a href="{{route('net')}}" class="btn rbt-green btn-sm mr-2">Cadastrar</a>

        </div>
    </form>
  </div>
</div>
<br>
<br>
<div class="card search-box">
<div class="card-header text-header  title-white">
    Banda larga
    </div>
    <div class="card-body">
    <table id="tbl1"  class="table table-hover search-box title-white"> 
        <thead>
        <tr >
            <th>id</th>
            <th>Megas</th>
            <th>Modificações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $f)
        <tr class="search-box">
            <td> {{$f->id}}  </td>
            <td> {{$f->net}}</td>
            <td>
                <a href="{{ URL('/net/edit/'.$f->id) }}">
                    <button class="btn rbt  btn-sm"><i class="fa fa-eye"></i>
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
</section>
@endsection

