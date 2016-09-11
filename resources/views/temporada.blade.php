@extends('app')
@section('title')
<title>Acompanha Series | Series </title>
@endsection
@section('content')

@if( !$series->count() )

      <!-- Exibe as series cadastradas -->
      <div class="panel panel-default">
        <div class=panel-heading>Series</div>
        <div class=panel-body>
          <p>Não há nenhuma temporada cadastrada</p>
        </div>
      </div


@else

      <!-- Exibe as series cadastradas -->
      <div class="panel panel-default">
        <div class=panel-heading>Series</div>
        <div class=panel-body>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastro">Cadastrar Serie</button>
        </div>
        <table class=table>
          <thead>
            <tr>
              <th>#</th>
              <th>Serie</th>
              <th>Temporada</th>
              <th>Episodio</th>
            </tr>
          </thead>
          <tbody>
      @foreach ($series as $serie)
          <tr>
              <td>{{ $serie->id }}</td>
              <td>{{ $serie->serie }}</td>
              <td>{{ $serie->descricao }}</td>
              <td>
                <?php
                //$frase = "EU USO ASP";
                $string = str_replace(" ", "%20", $serie->serie);

                 ?>
                <a href="/serie/{{ $serie->id }}/editar">Editar</a>
                <a href="/serie/{{ $serie->id }}/remover" onclick="return confirm('Deseja remover a serie {{ $serie->serie }}?');">Remover</a>
                <a target="_blank" href="https://www.manicomio-share.com/pesquisa.php?busca=<?= $string?>">Buscar no manicomio</a>

              </td>
          </tr>
      @endforeach

          </tbody>
        </table>
      </div>
      <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="cadastrar">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cadastrar Series</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ asset('/serie/salvar') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Serie</label>
                  <input type="text" class="form-control" name="serie" id="serie" placeholder="Nome da serie">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descrição</label>
                  <textarea class="form-control" name="descricao"></textarea>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Salvar</button>
              </form>
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
      </div>
@endif
    @endsection