@extends('admin.templates.app')



@section('title', 'Editar Formulário')

@section('content')
    <h1>Editar produto 
        {{$products[$id]}}
    </h1>
    <a href="{{ route('products.index')}}">Voltar</a>

    <form action="{{ route('products.update', $id) }}" method="post">
        @method('put')
        @csrf
        <label for="idname">Name</label>
        <input type="text" name="name" id="idname">
        <label for="iddesc">Description</label>
        <input type="text" name="description" id="iddesc">
        <button type="submit">Enviar</button>
    </form>    
@endsection