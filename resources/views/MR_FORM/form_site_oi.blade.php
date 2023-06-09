@extends('layouts.navbar')


@section('body')

    <br>
    <h3>MR - Formulario</h3>
    <br>

    <section>
        <div  class="input- mb-2">
            <div class="input-group">
            <form action="{{ route('search.form') }}" method="post" >
        @csrf   
        <!-- Form_Search_Filter -->
        <div class="row vaing-wrapper">
          <div class="input-field col s3">
        <input type="text" name="nome"  class="form-control" placeholder="Nome:" value="{{$nome}}">
        </div>
        <br>
        <br>
        <br>
        <div class="input-field col S3">
        <input type="text" name="estado"  class="form-control" placeholder="estado:" value="{{$estado}}">
        </div>
        <br>
        <br>
        <div class="input-field col S3">
          <input type="text" name="cidade"  class="form-control" placeholder="cidade:" value="{{$cidade}}">
        </div>
        </div>
        <div class="row vaing-wrapper">
        <br>
        <div class="input-field col S3">
        <input type="text" name="cep"  class="form-control" placeholder="cep:" value="{{$cep}}">
        </div>
        <br>
        <div class="input-field col S3">
        <input type="text" name="logradouro"  class="form-control" placeholder="Rua:" value="{{$logradouro}}">
        </div>
        <div class="input-field col S3">
        <input type="text" name="bairro"  class="form-control" placeholder="bairro:" value="{{$bairro}}">
        </div>
        </div>
        <br>
        <br>
        <div class="row vaing-wrapper">
        <br>
        <div class="input-field col s3">
        <input type="date" name="START"  class="form-control" placeholder="Data Inicial"  value="{{$START}}">
        </div>
        <div class="input-field col s3">
        <input type="date" name="END"  class="form-control"  value="{{$END}}">
        </div>
        </div>
        </div>
        <br>
        <br>
  
                                         <!-- Botões -->
        <button type="submit" class="btn btn-primary">Filtrar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>
                <a href="{{route('list.form')}}" class="btn btn-danger">Limpar Filtro <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
        </svg></a>
                  <button class="btn btn-success" onclick="tablesToExcel(['tbl1'], ['table table-success table-hover'], 'List.xls', 'Excel')">  Baixar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
          <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
        </svg></button>
        <br>
        <br>

       </div>
        </div>
    </form>
          
</section>
    
<section>
<div class="card">
        <div class="card-body">
           <table id="tbl1"  class="table table-success table-hover"> 
           <thead>
                <tr class="table-success">
                    
                                <th>   Nome          </th>
                                <th>   Telefone      </th>
                                <th>   Telefone 2°   </th>
                                <th>   C.P.F         </th>
                                <th>   Nasc          </th>
                                <th>   Estado        </th>
                                <th>   Cidade        </th>
                                <th>   Cep           </th>
                                <th>   Logradouro    </th>
                                <th>   Numero        </th>
                                <th>   Complemento   </th>
                                <th>   Bairro        </th>
                                <th>   Referencia    </th>
                                <th>   Solicitação   </th>

               
                </tr>
            </thead>
             <tbody>

                @foreach($form as $f)
                 
                 <tr>
                     
                     <td>   {{ $f->nome  }}               </td> 
                     <td>   {{ $f->telefone }}            </td>
                     <td>   {{ $f->tel_adicional }}       </td>
                     <td>   {{ $f->cpf }}                 </td>
                     <td>   {{ $f->datanascimento  }}     </td> 
                     <td>   {{ $f->estado }}              </td>
                     <td>   {{ $f->cidade }}              </td>
                     <td>   {{ $f->cep }}                 </td>
                     <td>   {{ $f->logradouro }}          </td>
                     <td>   {{ $f->numero  }}             </td> 
                     <td>   {{ $f->complemento }}         </td>
                     <td>   {{ $f->bairro }}              </td>
                     <td>   {{ $f->referencia }}          </td>
                     <td>   {{ $f->created_at }}          </td>

                 </tr>  
                 
               @endforeach
           </table>
           <hr>
           <div class="conteiner">
                @if (isset($filters))
                   {{$form->appends($filters)->links()}}
                @else
                   {{$form->links()}}    
                @endif
                  </ul>
            
              </div>

        </div>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
         var tablesToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
      + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
      + '<Styles>'
      + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
      + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
      + '</Styles>' 
      + '{worksheets}</Workbook>'
    , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
    , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(tables, wsnames, wbname, appname) {
      var ctx = "";
      var workbookXML = "";
      var worksheetsXML = "";
      var rowsXML = "";

      for (var i = 0; i < tables.length; i++) {
        if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
        for (var j = 0; j < tables[i].rows.length; j++) {
          rowsXML += '<Row>'
          for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
            var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
            var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
            var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
            dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
            var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
            dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
            ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                   , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                   , data: (dataFormula)?'':dataValue
                   , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                  };
            rowsXML += format(tmplCellXML, ctx);
          }
          rowsXML += '</Row>'
        }
        ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
        worksheetsXML += format(tmplWorksheetXML, ctx);
        rowsXML = "";
      }

      ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
      workbookXML = format(tmplWorkbookXML, ctx);

     console.log(workbookXML);

      var link = document.createElement("A");
      link.href = uri + base64(workbookXML);
      link.download = wbname || 'Workbook.xls';
      link.target = '_blank';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  })();
</script>
@endsection


