@extends('admin.templates.app')



@section('title', 'Cadastrar Novo Formulário')

@section('content')
    <h1>Cadastrar novo produto</h1>
    <a href="{{ route('products.index')}}" class="btn btn-danger">Voltar</a>
    <hr>
    @include('admin.includes.alerts')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.pages.products._partials.form')
    </form>
@endsection