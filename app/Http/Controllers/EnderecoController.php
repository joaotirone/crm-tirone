<?php

namespace App\Http\Controllers;

use App\Models\SuperList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;


class EnderecoController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->except('_token');
        $enderecos = SuperList::orderby('UF')->paginate(100);

        ($enderecos);
        $UF = $request->UF;
        $MUNICIPIO = $request->MUNICIPIO;
        $BAIRRO = $request->BAIRRO;
        $CEP = $request->CEP;
        $LOGRADOURO = $request->LOGRADOURO;

        $min_NU = $request->min_NU;
        $max_NU = $request->max_NU;

        $COMPLEMENTO_min = $request->COMPLEMENTO_min;
        $COMPLEMENTO_max = $request->COMPLEMENTO_max;

        $COMPLEMENTO_min2 = $request->COMPLEMENTO_min2;
        $COMPLEMENTO_max2 = $request->COMPLEMENTO_max2;

        $COMPLEMENTO_min3 = $request->COMPLEMENTO_min3;
        $COMPLEMENTO_max3 = $request->COMPLEMENTO_max3;



        

        return view('MR_BUSCA.enderecos', compact('enderecos','UF','filters' ,'MUNICIPIO' ,
                                         'BAIRRO' , 'CEP' ,'LOGRADOURO','min_NU' ,'max_NU',
                                        'COMPLEMENTO_min','COMPLEMENTO_max',
                                        'COMPLEMENTO_min2','COMPLEMENTO_max2',
                                        'COMPLEMENTO_min3','COMPLEMENTO_max3'));

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $enderecos = \DB::table('superlista_oi');
        
        $UF = $request->UF;
        $MUNICIPIO = $request->MUNICIPIO;
        $BAIRRO = $request->BAIRRO;
        $CEP = $request->CEP;
        $LOGRADOURO = $request->LOGRADOURO;
        
        $min_NU = $request->min_NU;
        $max_NU = $request->max_NU;

        $COMPLEMENTO_min = $request->COMPLEMENTO_min;
        $COMPLEMENTO_max = $request->COMPLEMENTO_max;

        $COMPLEMENTO_min2 = $request->COMPLEMENTO_min2;
        $COMPLEMENTO_max2 = $request->COMPLEMENTO_max2;

        $COMPLEMENTO_min3 = $request->COMPLEMENTO_min3;
        $COMPLEMENTO_max3 = $request->COMPLEMENTO_max3;

        if( $request->UF){
            $enderecos = $enderecos->where('UF', "$request->UF");
        }
        if( $request->MUNICIPIO){
            $enderecos = $enderecos->where('MUNICIPIO',  $request->MUNICIPIO ); 
        }
        if( $request->BAIRRO){
            $enderecos = $enderecos->where('BAIRRO', 'LIKE', "%" . $request->BAIRRO . "%");
        }
        if( $request->CEP){
            $enderecos = $enderecos->where('CEP', 'LIKE', "%" . $request->CEP . "%");
        }
        if( $request->LOGRADOURO){
            $enderecos = $enderecos->where('LOGRADOURO', 'LIKE', "%" . $request->LOGRADOURO . "%");
        }
        if( $request->min_NU && $request->max_NU ){
            $enderecos = $enderecos->where('NUM_FACHADA', '>=', $request->min_NU)
                         ->where('NUM_FACHADA', '<=', $request->max_NU);
        }
        if( $request->COMPLEMENTO_min && $request->COMPLEMENTO_max ){
            $enderecos = $enderecos->where('COMPLEMENTO', '>=',  $request->COMPLEMENTO_min)
                         ->where('COMPLEMENTO', '<=', $request->COMPLEMENTO_max);
        }
        if( $request->COMPLEMENTO_min2 && $request->COMPLEMENTO_max2 ){
            $enderecos = $enderecos->where('COMPLEMENTO2', '>=', $request->COMPLEMENTO_min2)
                         ->where('COMPLEMENTO2', '<=', $request->COMPLEMENTO_max2);
        }
        if( $request->COMPLEMENTO_min3 && $request->COMPLEMENTO_max3 ){
            $enderecos = $enderecos->where('COMPLEMENTO3', '>=', $request->COMPLEMENTO_min3)
                         ->where('COMPLEMENTO3', '<=', $request->COMPLEMENTO_max3);
        }
       
      
    
        
        $enderecos = $enderecos->paginate(100);
        return view('MR_BUSCA.enderecos', compact('enderecos', 'filters' ,'UF' ,
                                       'MUNICIPIO' , 'BAIRRO' , 'CEP' ,
                                       'LOGRADOURO' , 'min_NU' ,'max_NU',
                                       'COMPLEMENTO_min','COMPLEMENTO_max',
                                       'COMPLEMENTO_min2','COMPLEMENTO_max2',
                                       'COMPLEMENTO_min3','COMPLEMENTO_max3',));
    }
}
