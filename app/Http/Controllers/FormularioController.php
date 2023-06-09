<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formlist;
use App\Models\Contato;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Permission;



class FormularioController extends Controller
{

    //Pagina do list de Cadastros
    public function form(Request $request)
    {
        $form = \DB::table('form_cadastro')->paginate(15);

        $nome = $request->nome;
        $estado = $request->estado;
        $cidade = $request->cidade;
        $cep = $request->cep;
        $logradouro = $request->logradouro;
        $bairro = $request->bairro;
        $START = $request->START;
        $END = $request->END;

        return view('MR_FORM.form_site_oi' , compact('form' , 'nome', 'estado', 'cidade', 'cep', 'logradouro' , 'bairro','START','END'));
    }

         /* Filtro do Form de Cadastros   */
    public function Searchf(Request $request)
    {
        $filters = $request->except('_token');
        $form = \DB::table('form_cadastro');
        
        $nome = $request->nome;
        $estado = $request->estado;
        $cidade = $request->cidade;
        $cep = $request->cep;
        $logradouro = $request->logradouro;
        $bairro = $request->bairro;


        $START = Carbon::parse($request->START);
        $END = Carbon::parse($request->END);

        //Data
        if ($START && $END) {
            $form->whereDate('created_at', '<=', $END);
            $form->whereDate('created_at', '>=', $START);
        }
        //Nome
        if( $request->nome){
            $form = $form->where('nome', "$request->nome");
        }
        //Estado
        if( $request->estado){
            $form = $form->where('estado', "$request->estado");
        }
        //Cidades
        if( $request->cidade){
            $form = $form->where('cidade', "$request->cidade");
        }
        //Cep
        if( $request->cep){
            $form = $form->where('cep', "$request->cep");
        }
        //Logradouro
        if( $request->logradouro){
            $form = $form->where('logradouro', "$request->logradouro");
        }
        //Bairro
        if( $request->bairro){
            $form = $form->where('bairro', "$request->bairro");
        }
        // Responsavel pela quantidade de resultados na pagina      
        $form = $form->paginate(15);
        return view('MR_FORM.form_site_oi', compact('form', 'filters' , 'nome', 'estado', 'cidade', 'cep', 'logradouro' , 'bairro','START','END'));
    }


        //Pagina do list de contato
    public function contato(Request $request)
    {

        $contato = \DB::table('form_contato')->paginate(15);
        $NOME = $request->NOME;
        $CEP = $request->CEP;
        $START = $request->START;
        $END = $request->END;
        return view('MR_FORM.contato_site_oi' , compact('contato', 'NOME', 'CEP','START','END'));
    }

            /* Filtro do Form de Contatos   */

    public function Searchc(Request $request)
    {
        $filters = $request->except('_token');
        $contato = \DB::table('form_contato');
        $NOME = $request->NOME;
        $CEP = $request->CEP;
        $START = $request->START;
        $END = $request->END;

        $START = Carbon::parse($request->START);
        $END = Carbon::parse($request->END);

        //Data
        if ($START && $END) {
            $contato->whereDate('created_at', '<=', $END);
            $contato->whereDate('created_at', '>=', $START);
        }
        //Nome
        if( $request->NOME){
            $contato = $contato->where('NOME', "$request->NOME");
        }
        //Cep
        if( $request->CEP){
            $contato = $contato->where('CEP', "$request->CEP");
        }
        
        //Responsavel pela quantidade de resultados na pagina
        $contato = $contato->paginate(15);

        return view('MR_FORM.contato_site_oi', compact('contato', 'filters' , 'NOME', 'CEP','START','END'));
    
    }

}