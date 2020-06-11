@extends('admin.templates.app')

@section('title')
    Pablo
@endsection

@section('content')
    <h1>Exibindo os coisos</h1>
    <a href="{{ route('products.create')}}">Cadastrar</a>

    <form action="{{ route('products.search') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Filtrar" value="{{$filters['filter'] ?? ''}}">
        <button type="submit"  class="btn btn-primary">Buscar</button>
    </form>

        <table>
            <thead>
                <th>Image</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        @if ($product->photo)
                            <td>
                                <img src="{{ url("storage/{$product->photo}") }}" alt="{{$product->photo}}" style="max-width:100px">
                            </td>
                        @endif

                        <td>{{$product->id}}</td>
                        
                        
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}">Editar</a>    
                            <a href="{{ route('products.show', $product->id) }}">Detalhes</a>    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (isset($filters))
            {!! $products->appends($filters)->links()!!}    
        @else
            {!! $products->links()!!}    
        @endif
@endsection