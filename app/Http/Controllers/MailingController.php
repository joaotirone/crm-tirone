<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;



class MailingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enderecos = Mailing::orderby('UF')->paginate(0);

        ($enderecos);
       
        $UF = $request->UF;
        $CIDADE = $request->CIDADE;

        $BAIRRO = $request->BAIRRO;
        $CEP = $request->CEP;
        $ENDERECO = $request->ENDERECO;

        $COMPLEMENTO = $request->COMPLEMENTO;

        $PF_PJ = $request->PF_PJ;
        
        $NU_1 = $request->NU_1;
        $NU_2 = $request->NU_2;

        $DDD_1 = $request->DDD_1;
        $DDD_2 = $request->DDD_2;
        $BLACK_LIST = $request->BLACK_LIST;



        return view('MR_MAILING.enderecos', compact('enderecos' ,'UF',
                                         'CIDADE' , 'BAIRRO' , 'CEP'  ,
                                         'ENDERECO' , 'NU_1'  , 'NU_2',
                                         'COMPLEMENTO','DDD_1','DDD_2',
                                         'PF_PJ','BLACK_LIST'));

       
        
    }
    public function search(Request $request)
    {

        $filters = $request->except('_token');
        $enderecos = \DB::table('base_vivo');
        
       
        $UF = $request->UF;
        $CIDADE = $request->CIDADE;

        $CEP = $request->CEP;
        $BAIRRO = $request->BAIRRO;
        $ENDERECO = $request->ENDERECO;
        
        $COMPLEMENTO = $request->COMPLEMENTO;
        $PF_PJ = $request->PF_PJ;
        
        $NU_1 = $request->NU_1;
        $NU_2 = $request->NU_2;

        $DDD_1 = $request->DDD_1;
        $DDD_2 = $request->DDD_2;
        $BLACK_LIST = $request->BLACK_LIST;

        if( $request->DDD_1 && $request->DDD_2){
            $enderecos = $enderecos->whereIn('DDD', [$DDD_1, $DDD_2, ]);
        }
        if( $request->UF){
            $enderecos = $enderecos->where('UF', "$request->UF");
        }
        if( $request->CIDADE){
            $enderecos = $enderecos->where('CIDADE', "$request->CIDADE");
        }
        if( $request->BAIRRO){
            $enderecos = $enderecos->where('BAIRRO', 'LIKE', "%" . $request->BAIRRO . "%");
        }
        if( $request->CEP){
            $enderecos = $enderecos->where('CEP', 'LIKE', "%" . $request->CEP . "%");
        }
        if( $request->ENDERECO){
            $enderecos = $enderecos->where('ENDERECO', 'LIKE', "%" . $request->ENDERECO . "%");
        }
        if( $request->COMPLEMENTO){
            $enderecos = $enderecos->where('COMPLEMENTO', 'LIKE', "%" . $request->COMPLEMENTO . "%")
				   ->orwhere('ENDERECO', 'LIKE', "%" . $request->COMPLEMENTO . "%")
				   ->orwhere('NUMERO', "$request->COMPLEMENTO");
        }
        if( $request->PF_PJ){
            $enderecos = $enderecos->where('PF_PJ', 'LIKE', "%" . $request->PF_PJ . "%");
        }
        if( $request->DDD){
            $enderecos = $enderecos->where('DDD', 'LIKE', "%" . $request->DDD . "%");
        }
        if( $request->NU_1 && $request->NU_2 ){
            $enderecos = $enderecos->where('NUMERO', '>=', $request->NU_1)
                         ->where('NUMERO', '<=', $request->NU_2);
        }
        if( $request->BLACK_LIST){
            $enderecos = $enderecos->is_null('BLACK_LIST');
        }
        /* if (is_null($enderecos->BLACK_LIST)) */


        $enderecos = $enderecos->paginate(2000);
        return view('MR_MAILING.enderecos', compact('enderecos' ,'UF', 'filters' ,
                                         'CIDADE' , 'BAIRRO' , 'CEP'  ,
                                         'ENDERECO' , 'NU_1'  , 'NU_2',
                                         'COMPLEMENTO','DDD_1','DDD_2',
                                         'PF_PJ','BLACK_LIST'));
    }
}
