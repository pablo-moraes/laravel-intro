@extends('admin.templates.app')

@section('title', "Detalhes do produto {$product}")

@section('content')
    <h1>Produto {{ $product->name }}</h1>

    <ul>
        <li><strong>Nome: </strong> {{ $product->name}}</li>
        <li><strong>Preço: </strong> {{ $product->price}}</li>
        <li><strong>Descrição: </strong> {{ $product->description}}</li>
    </ul>

    <form action="{{ route('products.destroy', $product->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class=" btn btn-danger">Deletar o produto</button>
        
    </form>
@endsection

<style> * {list-style:none;}</style>