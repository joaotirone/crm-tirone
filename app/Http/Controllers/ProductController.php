<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

   public function indextv(Request $request)
    {
        $grade = $request->grade;
        $product = DB::table('prod_tv')->get(); 
        return view('PROD.index_tv', compact('grade','product'));
    }

    public function searchtv(Request $request)
    {
        $grade = $request->grade;

        $product = DB::table('prod_tv');
        if($grade){
            $product = $product->where('tv', "$request->grade");
        }
        $product = $product->get();
        return view('PROD.index_tv', compact('grade','product'));
    }

    public function edittv($id){
        $product = DB::table('prod_tv')->where('id',$id)->first();
        return view('PROD.edit_tv', compact('product'));
    }

    public function updatetv(Request $request, $id)
    {
        $data = [
            'tv' =>$request->tv,  
        ];
        DB::table('prod_tv')->where('id', $id)->update($data);

        return redirect()->route('tv.index')->with('message', 'Grade de Canais Atualizada com Sucesso!');
    }

    public function destroytv($id)
    {
        
        $product = DB::table('prod_tv')->where('id',$id)->delete($id);
        return redirect()->route('tv.index')->with('message', 'Grade de Canais Deleteda com Sucesso!');

    }

    public function showtv(){
        return view('PROD.create_tv');
    }

    public function createtv(Request $request)
    {
        $data = [
            'tv' =>$request->tv,
        ];
        DB::table('prod_tv')->insert($data);
        return redirect()->route('tv.index')->with('message', 'Grade de Canais Cadastrada com Sucesso!');
    }




    public function indexnet(Request $request)
    {
        $velocidade = $request->velocidade;
        $product = DB::table('prod_net')->get(); 
        return view('PROD.index_net', compact('velocidade','product'));
    }

    public function searchnet(Request $request)
    {
        $velocidade = $request->velocidade;

        $product = DB::table('prod_net');
        if($velocidade){
            $product = $product->where('net', "$request->velocidade");
        }
        $product = $product->get();
        return view('PROD.index_net', compact('velocidade','product'));
    }

    public function editnet($id){
        $product = DB::table('prod_net')->where('id',$id)->first();
        return view('PROD.edit_net', compact('product'));
    }

    public function updatenet(Request $request, $id)
    {
        $data = [
            'net' =>$request->net,  
        ];
        DB::table('prod_net')->where('id', $id)->update($data);
        return redirect()->route('net.index')->with('message', 'Internet Atualizada com Sucesso!');
    }

    public function destroynet($id)
    {
        
        $product = DB::table('prod_net')->where('id',$id)->delete($id);
        return redirect()->route('net.index')->with('message', 'Internet Deleteda com Sucesso!');
    }

    public function shownet(){
        return view('PROD.create_net');
    }

    public function createnet(Request $request)
    {
        $data = [
            'net' =>$request->net,
        ];
        DB::table('prod_net')->insert($data);

        return redirect()->route('net.index')->with('message', 'Internet Cdastrada com Sucesso!');
    }





    public function indexfixo(Request $request)
    {
        $ligacao = $request->ligacao;
        $product = DB::table('prod_fixo')->get(); 
        return view('PROD.index_fixo', compact('ligacao','product'));
    }

    public function searchfixo(Request $request)
    {
        $ligacao = $request->ligacao;

        $product = DB::table('prod_fixo');
        if($ligacao){
            $product = $product->where('fixo', "$request->ligacao");
        }
        $product = $product->get();
        return view('PROD.index_fixo', compact('ligacao','product'));
    }

    public function editfixo($id){
        $product = DB::table('prod_fixo')->where('id',$id)->first();
        return view('PROD.edit_fixo', compact('product'));
    }

    public function updatefixo(Request $request, $id)
    {
        $data = [
            'fixo' =>$request->fixo,  
        ];
        DB::table('prod_fixo')->where('id', $id)->update($data);

        return redirect()->route('fixo.index')->with('message', 'Fixo Atualizado com Sucesso!');
    }

    public function destroyfixo($id)
    {
        
        $product = DB::table('prod_fixo')->where('id',$id)->delete($id);
        return redirect()->route('fixo.index')->with('message', 'Fixo Deletado com Sucesso!');

    }

    public function showfixo(){
        return view('PROD.create_fixo');
    }

    public function createfixo(Request $request)
    {
        $data = [
            'fixo' =>$request->fixo,
        ];
        DB::table('prod_fixo')->insert($data);
        return redirect()->route('fixo.index')->with('message', 'Fixo Cadastrado com Sucesso!');
    }





    public function indexcell(Request $request)
    {
        $plano = $request->plano;
        $product = DB::table('prod_cell')->get(); 
        return view('PROD.index_cell', compact('plano','product'));
    }

    public function searchcell(Request $request)
    {
        $plano = $request->plano;

        $product = DB::table('prod_cell');
        if($plano){
            $product = $product->where('cell', "$request->plano");
        }
        $product = $product->get();
        return view('PROD.index_cell', compact('plano','product'));
    }

    public function editcell($id){
        $product = DB::table('prod_cell')->where('id',$id)->first();
        return view('PROD.edit_cell', compact('product'));
    }

    public function updatecell(Request $request, $id)
    {
        $data = [
            'cell' =>$request->cell,  
        ];
        DB::table('prod_cell')->where('id', $id)->update($data);

        return redirect()->route('cell.index')->with('message', 'Plano Movel Atualizado com Sucesso!');
    }

    public function destroycell($id)
    {
        
        $product = DB::table('prod_cell')->where('id',$id)->delete($id);

        return redirect()->route('cell.index')->with('message', 'Plano Movel Deletado com Sucesso!');
    }

    public function showcell(){
        return view('PROD.create_cell');
    }

    public function createcell(Request $request)
    {
        $data = [
            'cell' =>$request->cell,
        ];
        DB::table('prod_cell')->insert($data);

        return redirect()->route('cell.index')->with('message', 'Plano Movel Cadastrado com Sucesso!');
    }
}
