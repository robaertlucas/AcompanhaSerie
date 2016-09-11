<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Serie;

class SeriesController extends Controller
{
  //listar, editar, criar, remover e salvar
  public function listar(){
  //  $Series = Serie::all();
  $series = Serie::paginate(10);
    return view("series", ['series'=>$series]);
  }
  public function editar($id){
  //  $Serie = Serie::findOrFail($id);
  //  return $Serie;
  return view('editar', ['serie'=>Serie::find($id)]);
  return redirect()->action('SeriesController@listar');
  }
  public function criar(){

    //return $Serie = new Serie;
    return view('criar', ['serie'=> new Serie]);

  }
  public function remover($id){
      $serie = Serie::find($id);
      $serie->delete();
      return redirect()->action('SeriesController@listar');
  }
  public function salvar(Request $request){

  //$this->validate($request, ['matricula' => 'required']);

    if($request->has('id')){
      //faz update
      $id = $request->input('id');
      $Serie = Serie::find($id);
      if($request->has('id')){
      //  $Serie->update(['nome'=>'JOSE']);
        $Serie->matricula = $request->input('id');
      }
      if($request->has('serie')){
        $Serie->serie = $request->input('serie');
      }
      if($request->has('descricao')){
        $Serie->descricao = $request->input('descricao');
      }
      $Serie->save();

      return redirect()->action('SeriesController@listar');
    }else {
   //faz insert
   $Serie = new Serie;
   $Serie->serie = $request->input('serie');
   $Serie->descricao = $request->input('descricao');

   $Serie->save();
   return redirect()->action('SeriesController@listar');
  }

}
}
