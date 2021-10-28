@extends('templates.base')
@section('title', 'Editar Recado')
@section('h1', 'Editar Recado')


@section('content')
<form method="post" action="{{ route('recados.update', $rec) }}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" placeholder="Seu nome..." class="form-control" id="nome" value={{$rec->nome}} name="nome">
    </div>

    
    <div class="mb-3">
        <label for="comentario" class="form-label">Comentário</label>
    <textarea class="form-control" id="comentario" name="comentario" rows="3">{{$rec->comentario}}</textarea>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>
@endsection