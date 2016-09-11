<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TemporadasController extends Controller
{
  public function listar(){
  //  $Temporadas = Temporada::all();
  $temporadas = Temporada::paginate(10);
    return view("temporadas", ['temporadas'=>$temporadas]);
  }
  public function editar($id){
  //  $Temporada = Temporada::findOrFail($id);
  //  return $Temporada;
  return view('editar', ['Temporada'=>Temporada::find($id)]);
  return redirect()->action('TemporadasController@listar');
  }
  public function criar(){

    //return $Temporada = new Temporada;
    return view('temporada', ['Temporada'=> new Temporada]);

  }
  public function remover($id){
      $Temporada = Temporada::find($id);
      $Temporada->delete();
      return redirect()->action('TemporadasController@listar');
  }
  public function salvar(Request $request){

  //$this->validate($request, ['matricula' => 'required']);

    if($request->has('id')){
      //faz update
      $id = $request->input('id');
      $Temporada = Temporada::find($id);
      if($request->has('temporada')){
        $Temporada->Temporada = $request->input('temporada');
      }
      if($request->has('episodio')){
        $Temporada->episodio = $request->input('episodio');
      }if($request->has('episodio')){
        $Temporada->serie = $request->input('serie');
      }
      $Temporada->save();

      return redirect()->action('TemporadasController@listar');
    }else {
   //faz insert
   $Temporada = new Temporada;
   $Temporada->temporada = $request->input('Temporada');
   $Temporada->episodio = $request->input('episodio');
   $Temporada->serie = $request->input('serie');

   $Temporada->save();
   return redirect()->action('TemporadasController@listar');
  }

}
}
