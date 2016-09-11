@extends('app')
@section('title')
<title>Acompanha Series | Temporadas </title>
@endsection
@section('content')

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
        <h3>Cadastro de temporadas</h3>
        <form method="post" action="{{ asset('/temporada/salvar') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label >Temporada</label>
            <input type="number" class="form-control" name="temporada" id="temporada">
          </div>
          <div class="form-group">
            <label >Nº de episodios</label>
            <input type="number" class="form-control" name="episodio" id="episodio">
          </div>
          <div class="form-group">
            <label >Serie</label>
            <select class="form-control" id="sel1">
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
              <option value="">4</option>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>

    @endsection