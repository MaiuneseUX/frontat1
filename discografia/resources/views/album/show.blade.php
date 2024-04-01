@extends('welcome')

@section('content')
<div class="container">
    <h1>{{ $album->name }}</h1>

    <!-- Lista de Faixas -->
    <h2>Faixas</h2>
    <ul>
        @foreach ($album->tracks as $track)
        <li>{{ $track->title }} - Duração: {{ $track->duration }}</li>
        @endforeach
    </ul>

    <!-- Adicionar Nova Faixa -->
    <h2>Adicionar Nova Faixa</h2>
    <form action="{{ route('tracks.store', $album->id) }}" method="POST">
        @csrf
        <label for="title">Título da Faixa:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="duration">Duração:</label><br>
        <input type="text" id="duration" name="duration"><br>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Voltar para Lista de Álbuns -->
    <a href="{{ route('albums.index') }}">Voltar para Lista de Álbuns</a>
</div>
@endsection
