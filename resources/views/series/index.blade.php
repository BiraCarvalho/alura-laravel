@extends('series.layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex align-items-center">
        <div><?= $serie->nome; ?></div>
        <form action="/series/{{$serie->id}}" method="post" class="ml-auto"
        onsubmit="return confirm('Deseja mesmo excluir a série {{addslashes($serie->nome)}}')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
