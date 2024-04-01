<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discografia - Tião Carreiro e Pardinho</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <h1>Discografia - Tião Carreiro e Pardinho</h1>

        <h2>Adicionar Novo Álbum</h2>
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <label for="name">Nome do Álbum:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="release_year">Ano de Lançamento:</label><br>
            <input type="text" id="release_year" name="release_year"><br>
            <button type="submit">Salvar</button>
        </form>

        <h2>Pesquisar Álbuns</h2>
        <form action="{{ route('albums.search') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar álbuns...">
            <button type="submit">Pesquisar</button>
        </form>

        <h2>Lista de Álbuns</h2>
        <ul>
            @isset($albums)
                @foreach ($albums as $album)
                    <li>
                        <a href="{{ route('albums.show', $album->id) }}">{{ $album->name }}</a>
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </li>
                @endforeach
            @else
                <li>Nenhum álbum encontrado.</li>
            @endisset
        </ul>

        <h2>Detalhes do Álbum</h2>
        @isset($album)
            <p><strong>Nome:</strong> {{ $album->name }}</p>
            <p><strong>Ano de Lançamento:</strong> {{ $album->release_year }}</p>
            <h3>Faixas:</h3>
            <ul>
                @foreach ($album->tracks as $track)
                    <li>{{ $track->title }} - Duração: {{ $track->duration }}</li>
                @endforeach
            </ul>
        @endisset
    </div>
</body>
</html>