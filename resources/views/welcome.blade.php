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
          <p>Não há nenhuma serie cadastrada</p>
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
              <th>Descrição</th>
              <th>Opções</th>
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
@endif
    @endsection