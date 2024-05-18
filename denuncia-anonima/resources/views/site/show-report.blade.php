@extends('head')

@section('title', 'Detalhes da Denúncia')

@section('content')

<div class="container">
    <h1>Detalhes da Denúncia</h1>

    <p><strong>Título:</strong> {{ $denuncia->titulo }}</p>
    <p><strong>Pessoas Afetadas:</strong> {{ $denuncia->pessoas_afetadas }}</p>
    <p><strong>Tipos de Denúncia:</strong>
        @if($denuncia->tipos_denuncia && $denuncia->tipos_denuncia->isNotEmpty())
            @foreach($denuncia->tipos_denuncia as $tipo)
                {{ $tipo->titulo }}@if(!$loop->last), @endif
            @endforeach
        @else
            Nenhum tipo de denúncia associado.
        @endif
    </p>
    <p><strong>Descrição:</strong> {{ $denuncia->descricao }}</p>
</div>

@endsection
