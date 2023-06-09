<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Permission;
use DB;




class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function side(){
        return view('layouts.sideba');
    }
    public function home()
    {   
        $user = Auth::user();
        $currentMonth  = date('m');
        $currentYear   = date('Y');


        if($user['role_id'] == 1){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 2){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 3){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('supervisor_id', $user['id'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 4){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('supervisor_id', $user['id'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 5){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 6){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 7){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 8){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->where('user_name_id', $user['user_name'])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 9){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };
        if($user['role_id'] == 10){
            $dados = DB::table('vendas')
            ->select('status_sales',  DB::raw('count(*) as total'))
            ->whereRaw('MONTH(vendas.created_at) = ?',[$currentMonth])
            ->whereRaw('YEAR(vendas.created_at) = ?',[$currentYear])
            ->groupBy('status_sales')->get();

            return view('home',compact('dados'));
        };

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['user_name' => $request->user_name,  'password' => $request->password])){
            return redirect()->route('home.page');
        }else{
            return view('login');   
        };

    }

    public function indexuser(Request $request)
    {
        $user_name = $request->user_name;
        $cpf = $request->cpf;
        $role_id = $request->role_id;
        $CARGO = DB::table('roles')->get();
        $fun = DB::table('users')->get(); 
        return view('USER.index', compact('fun','user_name', 'cpf', 'role_id','CARGO'));
    }

    public function searchuser(Request $request)
    {
        $user_name = $request->user_name;
        $cpf = $request->cpf;
        $role_id = $request->role_id;
        $CARGO = DB::table('roles')->get();
        $fun = DB::table('users');
        if($user_name){
            $fun = $fun->where('user_name', "$request->user_name");
        }
        if($cpf){
            $fun = $fun->where('cpf',"$request->cpf");
        }
        if($role_id){
            $fun = $fun->where('role_id',"$request->role_id");
        }
        $fun = $fun->get();
        return view('USER.index', compact('fun','user_name', 'cpf', 'role_id','CARGO'));
    }

    public function edituser($id){
        $fun = DB::table('users')->where('id',$id)->first();
        $CARGO = DB::table('roles')->get();
        $SUPER = DB::table('users')->wherein('role_id', [3, 4])->get();
        return view('USER.edit', compact('fun', 'CARGO', 'SUPER'));
    }

    public function updateuser(Request $request, $id)
    {
        $data = [
            'user_name' =>$request->user_name,
			'name' =>$request->name,
			'role_id' =>$request->role_id,
			'tell' =>$request->tell,
			'tell2' =>$request->tell2,
			'cpf' =>$request->cpf,
			'birthday' =>$request->birthday,
			'cep' =>$request->cep,
			'logradouro' =>$request->logradouro,
			'bairro' =>$request->bairro,
            'uf' =>$request->uf,
            'cidade' =>$request->cidade,
			'num_fachada' =>$request->num_fachada,
			'complemento' =>$request->complemento,
            'supervisor_id' =>$request->supervisor_id,
            
        ];
        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('user.index');
    }

    public function destroyuser($id)
    {
        
        $vend = DB::table('users')->where('id',$id)->delete($id);
        return redirect()->route('user.index');

    }

    public function user()
    {
        $CARGO = DB::table('roles')->get();
        $SUPER = DB::table('users')->wherein('role_id', [3, 4])->get();
        return view('USER.create',compact('CARGO', 'SUPER'));
    }

    public function create(Request $request)
    {
        if(!empty($request->all())){
        $user = new User;

        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->tell = $request->tell;
        $user->tell2 = $request->tell2;
        $user->cpf = $request->cpf;
        $user->birthday = $request->birthday;
        $user->cep = $request->cep;
        $user->bairro = $request->bairro;
        $user->logradouro = $request->logradouro;
        $user->complemento = $request->complemento;
        $user->num_fachada = $request->num_fachada;
        $user->uf = $request->uf;
        $user->cidade = $request->cidade;
        $user->supervisor_id = $request->supervisor_id;
        $user->password = bcrypt(123);
        $user->save();
        return redirect()->route('home.page');
        }
    }
}
