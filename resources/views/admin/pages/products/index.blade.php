@extends('admin.templates.app')

@section('title')
    Pablo
@endsection

@section('content')
    <h1>Exibindo os coisos</h1>
    <a href="{{ route('products.create')}}">Cadastrar</a>


    @foreach ($teste as $key => $item)
            
        <p>
        <a href="products/{{$key}}" class="
            @if ($loop->odd)
                last
            @endif">
        {{$key . ':' . $item}}</a></p>
    @endforeach    

<hr>
@component('admin.components.cards')
    @slot('title')
        Título test
    @endslot
    Um card de exemplo
@endcomponent
<hr>
@include('admin.includes.alerts', ['content' => 'Alerta de Linguagens bacana'])
    {{-- @if (!is_array($teste))
        É array
    @elseif(is_array($teste))
        É mesmo array
    @else 
        Não array
    @endif

    @unless (!is_array($teste))
        TESTE
    @endunless --}}

    {{-- @isset($recor)
        {{$recor}}
    @endisset --}}
        
    {{-- @empty($record)
        
    @endempty --}}

    {{-- @auth
        
    @endauth --}}
@endsection

@push('style')
    <style>
        html, body {margin: 15px; padding: 15px;}
        .test {
            background: #041220;
            color: #FFF;
            font-weight:600;
            padding: 0 0 0 4px;
        }
    </style>
@endpush