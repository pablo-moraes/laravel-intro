@extends('admin.templates.app')



@section('title', 'Cadastrar Novo Formulário')

@section('content')
    <h1>Cadastrar novo produto</h1>
    <a href="{{ route('products.index')}}">Voltar</a>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
        @csrf
        <label for="idname">Name</label>
        <input type="text" name="name" id="idname">
        <label for="iddesc">Description</label>
        <input type="text" name="description" id="iddesc">
        <input type="file" name="photo">
        <button type="submit">Enviar</button>
    </form>    
@endsection