@extends('layouts.navbar')


@section('body')
    <br>
    <h3>MR - Search</h3>
    <br>
<section>
        <div  class="input- mb-2">
            <div class="input-group">
            <form action="{{ route('search.busca') }}" method="post" >
        @csrf   

        <!-- Form_Search_Filter -->
        <div class="row vaing-wrapper">
          <div class="input-field col s2">
        <input type="text" name="UF"  class="form-control" placeholder="UF" value="{{$UF}}">
        </div>
        <br>
        <br>
        <br>
        <div class="input-field col s2">
        <input type="text" name="MUNICIPIO"  class="form-control" placeholder="Cidade:" value="{{$MUNICIPIO}}">
        </div>
        </div>
        <div class="row vaing-wrapper">
          <div class="input-field col s3">
          <input type="text" name="LOGRADOURO"  class="form-control" placeholder="RUA:" value="{{$LOGRADOURO}}">
        </div>
        <br>
        <br>
        <br>
        <div class="input-field col s3">
        <input type="text" name="BAIRRO"  class="form-control" placeholder="Bairro:" value="{{$BAIRRO}}">
        </div>
        <br>
        <div class="input-field col s3">
        <input type="text" name="CEP"  class="form-control" placeholder="CEP:" value="{{$CEP}}">
        </div>
        </div>
        <!--  Data Superlist:
        <input type="text" name="" class="form-control" placeholder="17/06/2022" disabled="">
        <br>-->
        <br>
        <div class="row vaing-wrapper">
        <div class="input-group col s2">
        <input type="text" name="min_NU" class="form-control" placeholder="Nº" value="{{$min_NU}}">
        <input type="text" name="max_NU" class="form-control" placeholder="Nº"value="{{$max_NU}}">
        </div><br>
        <div class="input-group col s2">
        <input type="text" name="COMPLEMENTO_min" class="form-control" placeholder="Complemento Inicial" value="{{$COMPLEMENTO_min}}">
        <input type="text" name="COMPLEMENTO_max" class="form-control" placeholder="Complemento Final"value="{{$COMPLEMENTO_max}}">
        </div><br>
        </div>
          
                                             <!-- Complementos -->
        <br>
        <div class="row vaing-wrapper">
        <div class="input-group col s3">
        <input type="text" name="COMPLEMENTO_min2" class="form-control" placeholder="Complemento Inicial2" value="{{$COMPLEMENTO_min2}}">
          <input type="text" name="COMPLEMENTO_max2" class="form-control" placeholder="Complemento Final2"value="{{$COMPLEMENTO_max2}}">
        </div><br>
        <div class="input-group col s3">
        <input type="text" name="COMPLEMENTO_min3" class="form-control" placeholder="Complemento Inicial3" value="{{$COMPLEMENTO_min3}}">
          <input type="text" name="COMPLEMENTO_max3" class="form-control" placeholder="Complemento Final3"value="{{$COMPLEMENTO_max3}}">
        </div><br>
        </div> 
          <br>
          <br>
                                         <!-- Botões -->
        <button type="submit" class="btn btn-primary">Filtrar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
        <a href="{{route('list.busca')}}" class="btn btn-danger">Limpar Filtro <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg></a>
       
       
    </form>
          
</section>
    <hr>
    <section>
        <div class="card">
        <div class="card-body">
           <table  class="table table-success table-hover"> 
           <thead>
                <tr class="table-success">
                    
                                <th>   UF        </th>
                                <th>   CIDADE    </th>
                                <th>   CEP       </th>
                                <th> LOGRADOURO  </th>
                                <th>   BAIRRO    </th>
                                <th>    N°       </th>
                                <th>   COMPL1    </th>
                                <th>   COMPL2    </th>
                                <th>   COMPL3    </th>
                                <th> VIABILIDADE </th>
                                <th>   HP        </th>
                                <th>   HPC       </th>
                                <th>   HPR       </th>
                                <th>   SURVEY    </th>
                                <th>   CELULA    </th>
                                <th>   LATITUDE  </th>
                                <th>   LONGITUDE </th>
                                <th>   ID        </th>
                </tr>
            </thead>
             <tbody>
                 <?php
                 $i = 1;
                 ?>
                @foreach($enderecos as $ende)
                 
                 <tr>
                     
                     <td>   {{ $ende->UF  }}              </td> 
                     <td>   {{ $ende->MUNICIPIO }}        </td>
                     <td>   {{ $ende->CEP }}              </td>
                     <td>   {{ $ende->LOGRADOURO }}       </td>
                     <td>   {{ $ende->BAIRRO }}           </td>
                     <td>   {{ $ende->NUM_FACHADA }}      </td>
                     <td>   {{ $ende->COMPLEMENTO }}      </td>
                     <td>   {{ $ende->COMPLEMENTO2 }}     </td>
                     <td>   {{ $ende->COMPLEMENTO3 }}     </td>
                     <td<?php if ($ende->TIPO_VIABILIDADE == 'Viável') {echo ' style="background-color:#23531a;"';} /* Verde  */
                              if ($ende->TIPO_VIABILIDADE == 'Inviável (com Survey)- Célula Inativa') {echo ' style="background-color:#fe6bf8;"';} /* Rosa  */
                              if ($ende->TIPO_VIABILIDADE == 'Viável Obra (com Survey)') {echo ' style="background-color:#9932cc;"';} /* Roxo  */
                              if ($ende->TIPO_VIABILIDADE == 'Viável Obra (sem Survey)') {echo ' style="background-color:#4682b4;"';} /* Azul  */
                              if ($ende->TIPO_VIABILIDADE == 'Inviável (com Survey) - Analisar erro cadastral') {echo ' style="background-color:#ff4700;"';}  /* Laranja  */
                              if ($ende->TIPO_VIABILIDADE == 'Inviável') {echo ' style="background-color:red;"';}
                        ?>><b>{{ $ende->TIPO_VIABILIDADE }}</b></td>
                     <td>   {{ $ende->UCS_RESIDENCIAIS }} </td>
                     <td>   {{ $ende->QUANTIDADE_UMS }}   </td>
                     <td>   {{ $ende->UCS_COMERCIAIS }}   </td>
                     <td>   {{ $ende->COD_SURVEY }}       </td>
                     <td>   {{ $ende->CELULA }}           </td>
                     <td>   {{ $ende->LATITUDE }}         </td>
                     <td>   {{ $ende->LONGITUDE }}        </td>
                     <td>   {{ $i++  }}                   </td>
                 </tr>  
                 
               @endforeach
           </table>
           <hr>
           <div class="conteiner">
                @if (isset($filters))
                   {{$enderecos->appends($filters)->links()}}
                @else
                   {{$enderecos->links()}}    
                @endif
                  </ul>
            
              </div>
        </div>
    </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    @endsection
