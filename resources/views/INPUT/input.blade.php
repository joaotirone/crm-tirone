@extends('layouts.sideba')


@section('body')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <h5 class="card-header title-white" >Filtro</h5>
    <form action="{{ route('input.search') }}" method="post"  class="card-text p-4">
      @csrf
      <!-- Form_Search_Filter -->
      @if(auth()->user()->can('search_user'))
      <div class="row vaing-wrapper">
        <div class="input-field col s1">
        <select name="user_name_id" class="form-control">
        <option value="">Vendedor</option>
          @foreach($vendedor_user as $ved)
            <option value="{{$ved->user_name}}">{{$ved->user_name}}</option>
          @endforeach
          </select>
        </div>
          <br>
          <br>
          <br>
          @endif
          @if(auth()->user()->can('search_sup'))
        <div class="input-field col s2">
          <select name="supervisor_id" class="form-control">
          <option value="">Supervisor</option>
          @foreach($supervisor_user as $sup)
            <option value="{{$sup->user_name}}">{{$sup->user_name}}</option>
          @endforeach
          </select>
        </div>
        
      </div>
      @endif
      <div class="row vaing-wrapper">
        <br>
        <div class="input-field col S1">
          <input type="text" name="nome" class="form-control" placeholder="cep:" value="{{$nome}}">
        </div>
        <br>
        <div class="input-field col S3">
          <input type="text" name="cpf" class="form-control" placeholder="cpf:" value="{{$cpf}}">
        </div>
        <div class="input-field col S3">
          <input type="text" name="num_contrato" class="form-control" placeholder="num_contrato:" value="{{$num_contrato}}">
        </div>
      </div>
      <br>
      <br>
      <br>
      
      <!-- Botões -->
      <div class="d-flex justify-content-end">
      
      <button type="submit" class="btn rbt">Filtrar</button>
        
      <br>
      <div class="ms-2">
      <a href="{{route('input.index')}}" class="btn rbt-red">Limpar Filtro</a>
      </div>
    </form>
    <form method="get" action="{{ route('input.excel') }}">

    <div style="display:none">
    <input type="text" name="user_name_id" value="{{$user_name_id}}">
    <input type="text" name="supervisor_id" value="{{$supervisor_id}}">
    <input type="text" name="nome" value="{{$nome}}">  
    <input type="text" name="cpf" value="{{$cpf}}">  
    <input type="text" name="num_contrato" value="{{$num_contrato}}">
    </div>      
    <div class="ms-auto">           
    <div class="ms-2"> 
    @if(auth()->user()->can('relatorios'))                  
    <button class="btn rbt-green" >
    <i class='bx bx-upload icon'></i>
        Relatorio</button>
    @endif
        </div>
        </div> 
    </form> 
    </div>
  </div>
</div>

<br>
<br>
<div class="card search-box">
  <div class="title-white">
<div class="card-header text-header ">
        Vendas
        </div>
        
    <div class="card-body title-white">
    <table id="tbl1"  class="table table-hover search-box"> 
        <tr class="title-white">
            <th>NOME</th>
            <th>CPF</th>
            <th>NASCIMENTO</th>
            <th>VIRTUA</th>
            <th>CONSULTOR</th>
            <th>OPÇÕES</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($vend as $v)
        <tr class="title-white">
            <td> {{$v->nome}}  </td>
            <td> {{$v->cpf}}   </td>
            <td> {{$v->data_nascimento}} </td>
            <td> {{$v->virtua}} </td>
            <td> {{$v->user_name_id}} </td>
            <td>
                <a href="{{ URL('/input/edit/'.$v->id) }}">
                    <button class="btn rbt btn-sm"><i class="fa fa-eye"></i>
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
 
</section>




@endsection
