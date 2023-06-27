<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Permission;
use App\Exports\InputsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{

    public function index(Request $request)
    {
        $nome = $request->nome;
        $cpf = $request->cpf;
        $user_name_id = $request->user_name_id;
        $supervisor_id = $request->supervisor_id;
        $num_contrato = $request->num_contrato;
        $START = $request->START;
        $END = $request->END;
        $user = Auth::user();

        $supervisor_user = DB::table('users')->wherein('role_id', [ 3, 4  ])->get();
        $vendedor_user = DB::table('users')->wherein('role_id', [ 1, 2  ])->get();

        if($user['role_id'] == 1){
            $vend = DB::table('vendas')->where('user_name_id', $user['user_name'])->get();
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 2){
            $vend = DB::table('vendas')->where('user_name_id', $user['user_name'])->get();
            return view('home',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 3){
            $vend = DB::table('vendas')->where('supervisor_id', $user['id'])->get();
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 4){
            $vend = DB::table('vendas')->get();
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        
        if($user['role_id'] == 5){
            $vend = DB::table('vendas')->get();

            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 6){
            $vend = DB::table('vendas')->get();

           
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 7){
            $vend = DB::table('vendas')->get();

            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 8){
            $vend = DB::table('vendas')->get();

            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 9){
            $vend = DB::table('vendas')->get();

            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 10){
            $vend = DB::table('vendas')->get();

            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };

    }

    public function search(Request $request)
    {
        $vend = DB::table('vendas');
        $user = Auth::user();
        $nome = $request->nome;
        $cpf = $request->cpf;
        $user_name_id = $request->user_name_id;
        $supervisor_id = $request->supervisor_id;
        $num_contrato = $request->num_contrato;
        $START = $request->START;
        $END = $request->END;

        $START = Carbon::parse($request->START);
        $END = Carbon::parse($request->END);

        $user = Auth::user();

        $supervisor_user = DB::table('users')->wherein('role_id', [ 3, 4  ])->get();
        $vendedor_user = DB::table('users')->wherein('role_id', [ 1, 2  ])->get();
        if($user['role_id'] == 1){
            $vend = DB::table('vendas')->where('user_name_id', $user['user_name'])->get();

            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','END','START'));
        };
        if($user['role_id'] == 2){
            $vend = DB::table('vendas')->where('user_name_id', $user['user_name'])->get();

            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('home',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','END','START'));
        };
        if($user['role_id'] == 3){
            $vend = DB::table('vendas')->where('supervisor_id', $user['id'])->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','END','START'));
        };
        if($user['role_id'] == 4){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        
        if($user['role_id'] == 5){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 6){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 7){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 8){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 9){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };
        if($user['role_id'] == 10){
            $vend = DB::table('vendas')->get();

            if( $request->user_name_id){
                $vend = $vend->where('user_name_id', "$request->user_name_id");
            }
            if( $request->supervisor_id){
                $vend = $vend->where('supervisor_id', "$request->supervisor_id");
            }
            if( $request->nome){
                $vend = $vend->where('nome', "$request->nome");
            }
            if( $request->cpf){
                $vend = $vend->where('cpf', "$request->cpf");
            }
            if( $request->num_contrato){
                $vend = $vend->where('num_contrato', "$request->num_contrato");
            }
            return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
        };

        return view('INPUT.input',compact('vend','supervisor_user','vendedor_user','num_contrato','nome','cpf','user_name_id','supervisor_id','END','START'));
    }

    public function create(Request $request)
    {
        $NET = DB::table('prod_net')->get();
        $TV = DB::table('prod_tv')->get();
        $FIX = DB::table('prod_fixo')->get();
        $MOVEL = DB::table('prod_cell')->get();
        $DAY = DB::table('fatura_day')->get();
        return view('INPUT.create',compact('NET', 'TV', 'FIX', 'MOVEL', 'DAY'));
    }

    public function getChatData(Request $request){

 
    $vendId = $request->input('vend_id');
    // Consulta as notas com base no vendId
    $chat = DB::table('log_text')->where('id_venda', $vendId)->orderBy('created_at', 'asc')->get();
    // Retornar as notas como resposta em formato JSON


    $text = '';
    foreach ($chat as $ch) {
        $text .= $ch->name . ' - ' . $ch->created_at . "\n" . $ch->text . "\n-----------------------------------------------------------------------------------\n";
    }

    return $text;
}

    public function store(Request $request)
    {   
        $nomeUsuario = Auth::user()->user_name;
        $supervisorUsuario = Auth::user()->supervisor_id;
        $dt = Carbon::now();
        $data = [
            'user_name_id' =>$nomeUsuario,
            'supervisor_id' =>$supervisorUsuario,
            'nome' =>$request->nome,
			'cpf' =>$request->cpf,
			'data_nascimento' =>$request->data_nascimento,
			'email' =>$request->email,
			'mae' =>$request->mae,
			'rg' =>$request->rg,
			'tell1' =>$request->tell1,
			'tell2' =>$request->tell2,
			'cep' =>$request->cep,
			'logradouro' =>$request->logradouro,
			'bairro' =>$request->bairro,
			'numero' =>$request->numero,
			'complemento' =>$request->complemento,
			'cidade' =>$request->cidade,
			'uf' =>$request->uf,
			'referencia' =>$request->referencia,
			'virtua' =>$request->virtua,
			'canais' =>$request->canais,
			'fixo' =>$request->fixo,
			'celular' =>$request->celular,
			'pagamento' =>$request->pagamento,
			'banco' =>$request->banco,
			'conta_dcc' =>$request->conta_dcc,
			'agencia_dcc' =>$request->agencia_dcc,
            'text' =>$request->text,
            'status_sales'=> 'Ag. Auditoria',
            'fatura' =>$request->fatura,
            'created_at' => $dt,
        ];
        DB::table('vendas')->insert($data);
        return back()->with('message', 'Venda Cadastrada com Sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $NET = DB::table('prod_net')->get();
        $TV = DB::table('prod_tv')->get();
        $FIX = DB::table('prod_fixo')->get();
        $MOVEL = DB::table('prod_cell')->get();
        $DAY = DB::table('fatura_day')->get();
        $vend = DB::table('vendas')->where('id',$id)->first();
        $chat = DB::table('log_text')->where('id_venda', $id)->get();

        return view('INPUT.edit', compact('vend','chat','NET', 'TV', 'FIX', 'MOVEL', 'DAY'));
    }

    public function nota(Request $request){
        $nomeUsuario = Auth::user()->user_name;
        $dt = Carbon::now();
        $data = [
            'name' => $nomeUsuario,
            'text' => $request->text,
            'id_venda' => $request->vendId,
            'created_at' => $dt,
        ];
        
        DB::table('log_text')->insert($data);

        return response()->json(['mensagem' => 'Nota criada com sucesso']);
    }

    public function update(Request $request, $id)
    {
        $dt = Carbon::now();
        // $dateTime = Carbon::createFromFormat('D, M d, Y h:i A', $dateString)->format('Y-m-d H:i:s');

        // $todayDate = $dt->toDayDateTimeString();  
        $data = [
            'nome' =>$request->nome,
			'cpf' =>$request->cpf,
			'data_nascimento' =>$request->data_nascimento,
			'email' =>$request->email,
			'mae' =>$request->mae,
			'rg' =>$request->rg,
			'tell1' =>$request->tell1,
			'tell2' =>$request->tell2,
			'cep' =>$request->cep,
			'logradouro' =>$request->logradouro,
			'bairro' =>$request->bairro,
			'numero' =>$request->numero,
			'complemento' =>$request->complemento,
			'cidade' =>$request->cidade,
			'uf' =>$request->uf,
			'referencia' =>$request->referencia,
			'virtua' =>$request->virtua,
			'canais' =>$request->canais,
			'fixo' =>$request->fixo,
			'celular' =>$request->celular,
			'pagamento' =>$request->pagamento,
			'banco' =>$request->banco,
			'conta_dcc' =>$request->conta_dcc,
			'agencia_dcc' =>$request->agencia_dcc,
            'data_instal' =>$request->data_instal,
            'num_contrato' =>$request->num_contrato,
            'status_sales'=>$request->status_sales,
            'fatura' =>$request->fatura,
            'text' =>$request->text,
        ];
        if ($request->hasFile('image')) {
            $path = $request->file('image');
            DB::table('vendas')->where('id', $id)->update(['image' => $path]);
            
            return redirect()->route('input.index');
        }
    
        
        $user = session('user');
        $log = [
            'user_name' => Auth::User()->user_name,
            'status_sales_new'=>$request->status_sales,
            'log' => 'Update',
            'date_time' => $dt,
            

        ];
        DB::table('log_sales')->insert($log);
        DB::table('vendas')->where('id', $id)->update($data);
        return back()->with('message', 'Cadastro atualizado com Sucesso!');
    }

    public function destroy($id)
    {
        
        $vend = DB::table('vendas')->where('id',$id)->delete($id);

        return redirect()->route('input.index')->with('message', 'Cadastro Deletado com Sucesso!');

    }

    /*  PARCEIRAS */
    public function allpa(){
        $operadora = DB::table('operadoras_parc')->get();
        return view('pages.groups.allpa', compact('operadora'));
    }

    public function createpa(Request $request)
    {
        DB::table('operadoras_parc')->insert($request->all());
       return redirect()->route('config.groups.allpa');
    }

    public function editpa($id)
    {
        $operadora = DB::table('operadoras_parc')->where('id',$id)->first();
        if(!empty($operadora))
        {
            return view('pages.groups.editpa', compact('operadora'));
        }
        else
        {
            return redirect()->route('config.groups.allpa');
        }
    }

    public function updatepa(Request $request, $id)
    {
        $data = [
            'empresas_value' =>$request->empresas_value,
        ];
        DB::table('operadoras_parc')->where('id', $id)->update($data);
        return redirect()->route('config.groups.allpa');
    }

    public function deletepa(Request $request)
    {
            $id = $request->par_id;
            $operadora = DB::table('operadoras_parc')->where('id', $id)->delete($id);
            return redirect()->route('config.groups.allpa');
    }

    public function InputsExport(Request $request)
    {
        $filters = $request->all();
        // dd($filters);
        
        $export = new InputsExport($filters);
        $now = NOW();
        return Excel::download($export, 'Vendas' . $now . '.xlsx');

    }
}
