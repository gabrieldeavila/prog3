@extends('templates.base')
@section('title', 'Recados')
@section('h1', 'Página de Recados')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de Recados</p>

        <a class="btn btn-primary" href="{{route('recados.create')}}" role="button">Criar Recado</a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Comentário</th>
                <th>Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recados as $recado)
            <tr>
                <td>{{$recado->nome}}</td>
                <td>{{$recado->comentario}}</td>
                <td>
                    <a href="{{ route('recados.edit', $recado) }}" class="btn btn-primary btn-sm" role="button"><i class="bi bi-pencil-square"></i> Editar</a>
                    @if (session('usuario'))
                    <a href="{{ route('recados.remove', $recado) }}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i> Apagar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
