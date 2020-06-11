@extends('admin.templates.app')



@section('title', 'Editar Formulário')

@section('content')
    <h1>Editar produto 
        {{$product->id}}
    </h1>
    <a href="{{ route('products.index')}}">Voltar</a>
    @include('admin.includes.alerts')
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
        @csrf
        @method('put')
        @include('admin.pages.products._partials.form');
    </form>    
@endsection