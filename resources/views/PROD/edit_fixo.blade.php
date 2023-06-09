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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
<form class="row g-3 margin-top-12" method="post" action="{{ URL('/fixo/update/'.$product->id) }}">
    @csrf
    @method('PUT')
   
    <div class="card mb-12 search-box">
          <div class="card-header text-header title-white">
              Linha Fixo
          </div>
          <div class="card-body">
          <div class="form-row">

            <div class="form-group col-md-4">
            <label class="form-label title-white">Plano</label>
            <input type="text" name="fixo" value="{{$product->fixo}}" class="form-control" >
            </div>

            <div class="col-12">
            <div class="d-flex justify-content-between">
            <button type="submit" class="btn rbt">Atualizar</button>
            </form>
            <form action="{{ URL('/fixo/destroy/'.$product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn rbt-red btn-sm">
                <i class="fa fa-eye"></i> deletar
            </button>
            </form>
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
@endsection


